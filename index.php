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
	header("Location: html/index.php");
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
			$_SESSION['userdata'] = $row;

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
	<title>SinarMobil | Rental Mobil</title>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/util.css">
</head>
<body>




<form action="" method="post">
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg'); ">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Login
						<?php if( isset($error) ) : ?>
						<p style="color: red; font-style: italic;">Username/Password Salah</p>
						<?php endif; ?>
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<label class="label-input100">Username</label>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<label class="label-input100">Password</label>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div>
						<input type="checkbox" name="remember">
						<label for="remember">Remember Me</label>
						<a href="../index.html" style="text-decoration: none; color: blue; font-weight: bold; float: right;">Kembali</a>
					</div>
					<br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

						<p>Belum Punya Akun?</p>
						<a href="#" class="txt2">
							<a href="registrasi.php"  style="color: #1E90FF; text-decoration:none">Klik Disini</a>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</form>	



<div id="dropDownSelect1"></div>

	<script href="../js/main.js"></script>





</body>
</html>