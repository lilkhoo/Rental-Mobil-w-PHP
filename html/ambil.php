<?php

// Koneksi Ke Databases
$koneksi = mysqli_connect("localhost", "root", "", "db_moren");


function sambung($query)
{
	global $koneksi;

	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function masuk($data)
{
	global $koneksi;
	// Ambil data dari struk.php
	$id_mobil = htmlspecialchars($data["id_mobil"]);
	$id_pemesan = htmlspecialchars($data["id_pemesan"]);

	$nama_pelanggan = htmlspecialchars($data["nama"]);
	$mobil = htmlspecialchars($data["mobil"]);
	$email = htmlspecialchars($data["email"]);
	$notelp = htmlspecialchars($data["notelp"]);
	$kota = htmlspecialchars($data["kota"]);
	$kecamatan = htmlspecialchars($data["Kecamatan"]);
	$tgl_sewa = htmlspecialchars($data["tanggal"]);
	$tgl_kembali = htmlspecialchars($data["tanggalkembali"]);
	$pesan = htmlspecialchars($data["pesan"]);


	// query insert data
	$query = "INSERT INTO tb_pelanggan
				VALUES
				('', '$id_pemesan', '$nama_pelanggan', '$mobil', '$email', '$notelp', '$kota', '$kecamatan', '$tgl_sewa', '$tgl_kembali', '$pesan')";
	mysqli_query($koneksi, $query);

	// jika insert berhasil, ubah data disewa menjadi 'y'
	if (mysqli_affected_rows($koneksi)) {
		mysqli_query($koneksi, "UPDATE `tb_mobil` SET `disewa`='y' WHERE id = '$id_mobil'");
		return mysqli_affected_rows($koneksi);
	}
}
