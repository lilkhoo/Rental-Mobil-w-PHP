<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}


require 'ambil.php';
$pelanggan = sambung("SELECT * FROM tb_pelanggan");



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pelanggan</title>
	<link rel="stylesheet" href="css/crud.css">
	<link rel="shortcut icon" href="gambar/logo.png" type="image/x-icon" />
</head>
<body>

	<center>
		<h1>Daftar Pelanggan</h1>
		<a href="logout.php">Logout</a><br><br>
		<a href="costumerservice.php">Kembali</a>
	</center>
<br>
<br>
	<center>
		<form action="" method="post">
			<input type="text" name="keyword" size="25" autofocus placeholder="" autocomplete="off">
			<button type="submit" name="cari">Cari!</button>
		</form>
	</center>
<br>


<center>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Nama Pelanggan</th>
		<th>Merk Mobil</th>
		<th>Email</th>
		<th>No Telepon</th>
		<th>Kota</th>
		<th>Tanggal Sewa</th>
		<th>Tanggal Kembali</th>
		<th>Pesan</th>
	</tr>


	<?php $i = 1; ?>
	<?php foreach( $pelanggan as $row ) : ?>
	<tr>
		<td><?= $i ?></td>
		<td><?php echo $row["nama_pelanggan"]; ?></td>
		<td><?php echo $row["mobil"];?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><?php echo $row["notelp"]; ?></td>
		<td><?php echo $row["kota"]; ?></td>
		<td><?php echo $row["tgl_sewa"]; ?></td>
		<td><?php echo $row["tgl_kembali"]; ?></td>
		<td><?php echo $row["pesan"]; ?></td>
		
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

</table>
</center>


</body>
</html>