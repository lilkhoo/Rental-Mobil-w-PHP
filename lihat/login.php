<?php 
session_start();
require 'functions.php';

// Cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// Ambil Username berdasarkan id
	$result = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// Cek cookie dan username
	if( $key === hash('snefru256', $row['username']) ) {
		$_SESSION['login'] = true;
	}
}


if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}



if( isset($_POST["login"]) ) {


	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");


	// Cek Username 
	if( mysqli_num_rows($result) === 1 ) {

		// Cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// Set session
			$_SESSION["login"] = true;


			// Cek remember me
			if( isset($_POST['remember']) ) {
				// Buat cookie
				setcookie('id', $row['id'], time() + 86400);
				setcookie('key', hash('snefru256', $row['username']), time() + 86400);
			}


			header("Location: index.php");
			exit;
		}
	}

	$error = true;



}





 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>


	<h1>Halaman Login</h1>

<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">Username/Password Salah</p>
<?php endif; ?>



<form action="" method="post">

	<ul>
		<li>
			<label for="username">Username</label>
			<input type="text" name="username">
		</li>
		<li>
			<label for="password">Password</label>
			<input type="password" name="password">
		</li>
			<input type="checkbox" name="remember">
			<label for="remember">Remember Me</label>
	</ul>

	<button type="submit" name="login">Login</button>
	<br>
	<br>
	<p>Belum Punya Akun?</p>
	<a href="registrasi.php">Klik Disini</a>
</form>


</body>
</html>