<?php 
	
	require '../functions.php';

	if ( isset($_POST['submit']) ) {

		session_start();

		//data yang diinput di form login ditangkap disini
		$username = $_POST['username'];
		$password = $_POST['password'];

		//memilah data username dan password berdasarkan level
		// $login = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username' AND password = '$password'");
		$query = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
		$data = login($username, $password, $query);
				
		// if ( $cek > 0 ) {
		//memberikan nilai yang berisi record pada database sebagai array
		// $data = mysqli_fetch_array($login);

		switch($data['level']) {
			case 'user':
				$_SESSION['id'] = $data['id'];
				$_SESSION['nim'] = $data['kd_nim'];
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "user";
				header("Location: ../index_pengguna.php");
				break;
			case 'admin':
				$_SESSION['id'] = $data['id'];
				$_SESSION['username'] = $username;
				$_SESSION['nim'] = $data['kd_nim'];
				$_SESSION['level'] = "admin";
				header("Location: ../index_admin.php");
				break;
			default:
				header("Location: login.php?pesan=gagal");
				break;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/style_regis.css">
	<title>Login</title>
</head>
<body>


	<!-- pesan kesalahan -->
	<?php
		if (isset($_GET['pesan'])) {
			if ($_GET['pesan'] == 'gagal') {
				?> 
					<script type="text/javascript">
						alert('Username dan Password Salah');
					</script>
				<?php
			}
			if ($_GET['pesan'] == 'guest') {
				?> 
					<script type="text/javascript">
						alert('Anda belum login. login terlebih dahulu');
					</script>
				<?php
			}			
		}
	?>

	<!-- input data username dan password
	login untuk semua level -->
	<div id="all">

	<form action="" method="post">
		<header>
            <div id="kepala">
                <div id="logo-gambar" onclick="cari_toggle()">
                    <a href="../index.php"><img src="../img/logo/head/logo-gambar.png" alt="UNMUL LOGO" width="100px" height="100px"></a>
                </div> <br>
                <div id="logo-text" onclick="cari_toggle()">
                    <a href="../index.php"><span>PERPUSTAKAAN PUSAT<br>UNIVERSITAS MULAWARMAN</span></a> <hr>
                </div>
            </div>
        </header>
		<div class="regis login">
			<table border="0">
				<tr>
					<td id="head">LOGIN</td>
				</tr>
				<tr>
					<td>
						USERNAME
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="username" class="form_login" placeholder="e-mail/nama pengguna" required="required" id="username">
					</td>
				</tr>
				<tr>
					<td>
						PASSWORD
					</td>
				</tr>
				<tr>
					<td>
						<input type="password" name="password" class="form_login" placeholder="kata sandi" required="required" id="password">
					</td>
				</tr>
				<tr>
					<td  style="padding-bottom: 0px;">
						<input type="submit" name="submit" class="tombol_login" value="Login" style="margin: 20px 0 5px; width: 150px; height: 50px;">
						<!--<a href="regis.php"> <input type="button" value="Daftar" style="margin: 20px 0; width: 150px; height: 50px;"></a> -->					</td>
				</tr>
				<tr>
					<td>
						<span>Apakah anda sudah memiliki akun? </span> <a href="regis.php" style="color: blue;">Daftar</a>
					</td>
				</tr>
			</table>
			<!-- <table>
				<tr>
					<td colspan="3" id="head">LOGIN</td>
				</tr>
				<tr>
					<td>USERNAME</td>
					<td>:</td>
					<td>
						<input type="text" name="username" class="form_login" placeholder="e-mail/nama pengguna" required="required" id="username">
					</td>
				</tr>
				<tr>
					<td>PASSWORD</td>
					<td>:</td>
					<td>
						<input type="password" name="password" class="form_login" placeholder="kata sandi" required="required" id="password">
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<input type="submit" name="submit" class="tombol_login" value="Login" style="margin: 20px 0; width: 150px; height: 50px;">
						<a href="regis.php"><input type="button" value="Daftar" style="margin: 20px 0; width: 150px; height: 50px;"></a>
					</td>
				</tr>
			</table> -->
		</div>
	</form>
	<footer>
            <div id="copyright">
                <span>&copy; 2018 Perpustakaan, UNMUL.</span>
            </div>
        </footer>

	</div>	
</body>
</html>