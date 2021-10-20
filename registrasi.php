<?php 
require 'functions.php';


if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {

		echo "<script>
				alert('user baru berhasil ditambahkan!');
			</script>";
	} else {
		echo "<script>
				alert('user baru gagal ditambahkan!');
			</script>";
	}


}


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/util.css">
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>


<form action="" method="post">
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg'); ">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			<form class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Daftar
					</span>
				<form class="login100-form validate-form">

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<label class="label-input100" for="username">Username</label>
						<input class="input100" type="text" name="username" id="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<label class="label-input100">Password</label>
						<input class="input100" type="password"  name="password" id="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<br>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
					<label for="password2" class="label-input100">konfirmasi password :</label>
						<input class="input100" type="password" name="password2" id="password2" placeholder="cek your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<a href="index.php" style="float:right; color:#1E90FF; font-weight: bold; text-decoration:none">Kembali !</a>
					<br>
					<br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="register">
								register
							</button>
						</div>
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