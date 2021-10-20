<?php 
// Koneksi Ke Databases
$koneksi = mysqli_connect("localhost", "root", "", "db_moren");




function query($query) {
	global $koneksi;
	
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;

}


function tambah($data) {
	global $koneksi;
	// Ambil data dari tiap elemen dalam form
	$merk = htmlspecialchars($data["merk"]);
	$tipe = htmlspecialchars($data["tipe"]);
	$jenis = htmlspecialchars($data["jenis"]);
	$harga = htmlspecialchars($data["harga"]);
	$jml_penumpang = htmlspecialchars($data["jml_penumpang"]);

	// Upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}


	// query insert data
	$query = "INSERT INTO tb_mobil
				VALUES
				('', '$merk', '$tipe', '$jenis', '$harga', '$gambar', '$jml_penumpang')
				";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);


}

function upload() {

	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload
	if( $error === 4 ) {
		echo "<script>
				alert('Upload Gambar Terlebih Dahulu');
				</script>";
			return false;
	}

	// Cek Yang diupload adalah gambar
	$ekstensigambarvalid = ['jpg', 'jpeg', 'png', 'webp'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	if( !in_array($ekstensigambar, $ekstensigambarvalid) ) {
		echo "<script>
				alert('Yang anda Upload bukan gambar');
				</script>";
			return false;
	}

	// Cek jika ukuran nya terlalu besar
	if( $ukuranfile > 10000000 ) {
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
				</script>";
			return false;
	}

	// Lolos pengecekan gambar siap diUpload
	// generate nama gambar baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;

	move_uploaded_file($tmpname, 'img/' . $namafilebaru);

	return $namafilebaru;




}


function hapus($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM tb_mobil WHERE id = $id");
	return mysqli_affected_rows($koneksi);



}







function ubah($data) {
	global $koneksi;
	
	$id = $data["id"];
	$merk = htmlspecialchars($data["merk"]);
	$tipe = htmlspecialchars($data["tipe"]);
	$jenis = htmlspecialchars($data["jenis"]);
	$harga = htmlspecialchars($data["harga"]);
	$gambarlama = htmlspecialchars($data["gambarlama"]);

	// Cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarlama;
	} else {
			$gambar = upload();
	}

	


	// query insert data
	$query = "UPDATE tb_mobil SET merk = '$merk', tipe = '$tipe', jenis = '$jenis', harga = '$harga', gambar = '$gambar' WHERE id = $id";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}


function cari($keyword) {
	$query = "SELECT * FROM tb_mobil WHERE merk LIKE '%$keyword%' OR tipe LIKE '%$keyword%' OR jenis LIKE '%$keyword%' OR harga LIKE '%$keyword%'";

			return query($query);
}



function registrasi($data) {
	global $koneksi;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($koneksi, $data["password"]);
	$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);


	// Cek username sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah ada!');
			</script>";
		return false;	
	}



	// Cek Konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			</script>";

		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	// Tambahkan user baru ke database
	mysqli_query($koneksi, "INSERT INTO tb_user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($koneksi);


}
