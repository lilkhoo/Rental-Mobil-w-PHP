<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$mobil = query("SELECT * FROM tb_mobil");

// Tombol cari di klik
if( isset($_POST["cari"]) ) {
	$mobil = cari($_POST["keyword"]);
}

if($_GET){
	$merk = $_GET['merk'];
	$mobil = query("SELECT * FROM tb_mobil WHERE merk = '$merk'");
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" href="css/tabel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
<body>
<div class="topnav">
  <a class="active" href="#home">Daftar Mobil</a>
  <a href="../html/index.php">Kembali</a>
  <a href="tambah.php">Tambah Armada</a>
  <input type="text" name="keyword" size="25" autofocus placeholder="Search" autocomplete="off" id="keyword" class="search-data">
</div>

<br>
<center>
<div id="container">
	<table border="1" cellpadding="10" cellspacing="0">
	<tr class="judul">
		<th>id</th>
		<th>aksi</th>
		<th>gambar</th>
		<th>merk</th>
		<th>tipe</th>
		<th>jenis</th>
		<th>harga</th>
		<th>Penumpang</th>
	</tr>


	<?php $i = 1; ?>
	<?php foreach( $mobil as $row ) : ?>
	<tr>
		<td><?= $i ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>"onclick="return confirm('Yakin Kamu Akan Menghapus Data?');">hapus</a>
		</td>
		<td><img src="../../admin/img/<?= $row["gambar"]; ?>" width="100"></td>
		<td><?php echo $row["merk"]; ?></td>
		<td><?php echo $row["tipe"];?></td>
		<td><?php echo $row["jenis"]; ?></td>
		<td><?php echo $row["harga"]; ?></td>
		<td><?php echo $row["jml_penumpang"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

	</table>
</div>
</center>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>