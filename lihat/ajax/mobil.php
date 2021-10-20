<?php 
require '../functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM tb_mobil WHERE merk LIKE '%$keyword%' OR tipe LIKE '%$keyword%' OR jenis LIKE '%$keyword%' OR harga LIKE '%$keyword%'";
$mobil = query($query);



 ?>
 <table border="1" cellpadding="10" cellspacing="0">
	

	<tr>
		<th>id</th>
		<th>aksi</th>
		<th>gambar</th>
		<th>merk</th>
		<th>tipe</th>
		<th>jenis</th>
		<th>harga</th>
	</tr>


	<?php $i = 1; ?>
	<?php foreach( $mobil as $row ) : ?>
	<tr>
		<td><?= $i ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>"onclick="return confirm('Yakin Kamu Akan Menghapus Data?');">hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="100"></td>
		<td><?php echo $row["merk"]; ?></td>
		<td><?php echo $row["tipe"];?></td>
		<td><?php echo $row["jenis"]; ?></td>
		<td><?php echo $row["harga"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>





</table>