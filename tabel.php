<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}


require 'functions.php';
$mobil = query("SELECT * FROM tb_mobil");


// Tombol cari di klik
if( isset($_POST["cari"]) ) {
	$mobil = cari($_POST["keyword"]);
}






 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" href="css/crud.css">
	<link rel="shortcut icon" href="gambar/logo.png" type="image/x-icon" />
</head>
<body>

	<center>
		<h1>Daftar Mobil</h1>
		<a href="logout.php">Logout</a><br><br>
		<a href="tambah.php">Tambah Armada +</a>
	</center>
<br>
<br>
	<center>
		<form action="" method="post">
			<input type="text" name="keyword" size="25" autofocus placeholder="Cari Kendaraan!" autocomplete="off">
			<button type="submit" name="cari">Cari!</button>
		</form>
	</center>
<br>


<center>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Gambar</th>
		<th>Merk Mobil</th>
		<th>Tipe Mobil</th>
		<th>Jenis Mobil</th>
		<th>Harga</th>
		<th>Ubah</th>
	</tr>


	<?php $i = 1; ?>
	<?php foreach( $mobil as $row ) : ?>
	<tr>
		<td><?= $i ?></td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="100"></td>
		<td><?php echo $row["merk"]; ?></td>
		<td><?php echo $row["tipe"];?></td>
		<td><?php echo $row["jenis"]; ?></td>
		<td><?php echo $row["harga"]; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>"><button>ubah</button></a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>"onclick="return confirm('Yakin Kamu Akan Menghapus Data?');">hapus</a>
		</td>
		
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

</table>
</center>


</body>
</html>