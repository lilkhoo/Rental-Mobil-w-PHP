<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require './functions.php';
// Cek Apakah Tombol Submit Sudah Ditekan Atau Belum
if(isset($_POST["submit"]) ) {


	// Cek apakah data berhasil ditambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
		<script>
			alert('Armada Bertambah !!!');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('armada gagal ditambah !!!');
			document.location.href = 'index.php';
		</script>
		";
	}



}



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Armada</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
</head>
<body>

	<h1>Tambah Armada</h1>

	<center>
		<form action="" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td><label for="merk">Merk</label></td>
					<td>:</td>
					<td><input type="text" name="merk" class="masukan" id="merk" required></td>
				</tr>
				<tr>
					<td><label for="tipe">Tipe</label></td>
					<td>:</td>
					<td><input type="text" name="tipe" class="masukan" id="tipe"></td>
				</tr>
				<tr>
					<td><label for="jenis">Jenis</label></td>
					<td>:</td>
					<td><input type="text" name="jenis" class="masukan" id="jenis"></td>
				</tr>
				<tr>
					<td><label for="harga">Harga</label></td>
					<td>:</td>
					<td><input type="text" name="harga" class="masukan" id="harga"></td>
				</tr>
				<tr>
					<td><label for="gambar">Gambar</label></td>
					<td>:</td>
					<td><input type="file" name="gambar" id="gambar"></td>
				</tr>
				<tr>
					<td><label for="jml_penumpang">Jumlah Penumpang</label></td>
					<td>:</td>
					<td><input type="number" name="jml_penumpang" class="masukan" id="jml_penumpang"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><button type="submit" name="submit" class="tbl">Tambah Armada</button></td>
				</tr>
			</table>

		</form>
	</center>

</body>
</html>