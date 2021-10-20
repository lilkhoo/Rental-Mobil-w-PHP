<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

include 'functions.php';

$id = $_GET['id'];

mysqli_query($koneksi,"delete from tb_mobil where id='$id'");

 if ( hapus($id) > 0 ) {
	echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'index.php';
		</script>
		";
} else {
	echo "
		<script>
			alert('Armada Berkurang!!!');
			document.location.href = 'index.php';
		</script>
		";
}
?>