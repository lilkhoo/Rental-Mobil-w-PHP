<?php

require '../functions.php';
require './ambil.php';
// Cek Apakah Tombol Submit Sdh Ditekan Atau Blm

if (isset($_POST['submit'])) {
	if (masuk($_POST) > 0) {
		echo "<script>
		alert(' Pesanan Anda Sedang Diproses! ');
			</script>";
	} else {
		echo "<script>
		alert(' Pesanan Anda gagal Diproses! ');
			</script>";
	}
} else {
	$error = true;
}


?>

<!DOCTYPE html>
<html>

<head>
	<title>Struk</title>
	<!-- <link rel="stylesheet" href="../css/style.css"> -->
	<link rel="stylesheet" href="../css/struk.css">
	<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
</head>

<body>

	<nav class="navbar1">
		<div>
			<img src="../images/logo.png" alt="">
			<h3><span>Rental Mobil</span> Kepercayaan Anda</h3>
		</div>

	</nav>
	<nav class="navbar2">
		<h4>Struk Penyewaan Anda</h4>
	</nav>

	<center>
		<section>
			<table class="border">
				<tr>
					<td colspan="3">
						<h3>Data Pemesanan</h3>
					</td>
				</tr>
			</table>
			<table class="struk">
				<tr class="bd">
					<td class="nama">Nama</td>
					<td>:</td>
					<td style="font-weight: bold;">
						<p><?= $_POST['nama'] ?></p>
					</td>
				</tr>
				<tr class="bd">
					<td class="nama">Mobil</td>
					<td>:</td>
					<td>
						<p><?= $_POST['mobil'] ?></p>
					</td>
				</tr>
				<tr class="bd">
					<td class="nama">Email</td>
					<td>:</td>
					<td>
						<p><?= $_POST['email'] ?></p>
					</td>
				</tr>
				<tr class="bd">
					<td class="nama">Nomor Hp</td>
					<td>:</td>
					<td>
						<p><?= $_POST['notelp'] ?></p>
					</td>
				</tr>
				<tr class="bd">
					<td class="nama">Kota</td>
					<td>:</td>
					<td>
						<p><?= $_POST['kota'] ?></p>
					</td>
				</tr>
				<tr class="bd">
					<td class="nama">Kecamatan</td>
					<td>:</td>
					<td>
						<p><?= $_POST['Kecamatan'] ?></p>
					</td>
				</tr>
				<tr class="bd">
					<td class="nama">Tanggal Sewa</td>
					<td>:</td>
					<td>
						<p><?= $_POST['tanggal'] ?></p>
					</td>
				</tr>
				<tr class="bd">
					<td class="nama">Tanggal Kembali</td>
					<td>:</td>
					<td>
						<p><?= $_POST['tanggalkembali'] ?></p>
					</td>
				</tr>
				<tr>
					<td class="nama">Pesan</td>
					<td>:</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3" class="pesan">
						<p><?= $_POST['pesan'] ?></p>
					</td>
				</tr>
			</table>
			<table class="struk">
				<td colspan="3">
					<a href="index.php"><button>Kembali</button></a>
					<a href="costumerservice.php"><button>Booking Lagi</button>
				</td></a>
			</table>
		</section>
	</center>
	<section>

	</section>


</body>

</html>