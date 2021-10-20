<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// Ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id nya
$mobil = query("SELECT * FROM tb_mobil WHERE id = $id")[0];






// Cek Apakah Tombol Submit Sudah Ditekan Atau Belum
if( isset($_POST["submit"]) ) {


	// Cek apakah data berhasil diubah atau tidak
	if(ubah($_POST) > 0 ) {
		echo "
		<script>
			alert('Data Berhasil Diubah!');
			document.location.href = 'index.php';
		</script>";
	} else {
		echo "
		<script>
			alert('Data Gagal Diubah !!!');
			document.location.href = 'index.php';
		</script>";
	}



}



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data</title>
	<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<h1>Ubah Data</h1>

	<center>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $mobil["id"]; ?>">
			<input type="hidden" name="gambarlama" value="<?= $mobil["gambar"]; ?>">
			<table>
				<tr>
					<td><label for="merk">Merk</label></td>
					<td>:</td>
					<td><input type="text" name="merk" class="masukan" id="merk" value="<?= $mobil["merk"]; ?>"></td>
				</tr>
				<tr>
					<td><label for="tipe">Tipe</label></td>
					<td>:</td>
					<td><input type="text" name="tipe" class="masukan" id="tipe" value="<?= $mobil["tipe"]; ?>"></td>
				</tr>
				<tr>
					<td><label for="jenis">Jenis</label></td>
					<td>:</td>
					<td><input type="text" name="jenis" class="masukan" id="jenis" value="<?= $mobil["jenis"]; ?>"></td>
				</tr>
				<tr>
					<td><label for="harga">Harga</label></td>
					<td>:</td>
					<td><input type="text" name="harga" class="masukan" id="harga" value="<?= $mobil["harga"]; ?>"></td>
				</tr>
				<tr>
					<td><label for="gambar">Gambar : </label></td>
					<td>:</td>
					<td>
						<img src="img/<?= $mobil['gambar']; ?>" width="75">
						<input type="file" name="gambar" id="gambar">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><button type="submit" name="submit" class="tbl">Ubah Data</button></td>
				</tr>
			</table>
		</form>
	</center>

</body>
</html>