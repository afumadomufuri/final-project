<?php

	require "../functions.php";

	if(isset($_POST['submit'])) {

		session_start();
        
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nim = $_POST['nim'];
		
			if ( tambah_user($_POST) > 0 ) {
				$_SESSION['username']=$username;
				$_SESSION['nim']=$nim;
				$_SESSION['level']='user';
				?>
				<script type="text/javascript">
					alert("user berhasil ditambahkan");
					window.location.href = 'user/user.php';
				</script>
				<?php
			}
			else {
				?>
				<script type="text/javascript">
					alert("user gagal ditambahkan");
				</script>
				<?php
			}
		

	} 

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/style_regis.css">
	<title>Regis</title>
</head>
<body>
	<div id="all">
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
	<div class="regis">
		<form action="" method="POST" enctype="multipart/form-data">
			<table border="0">
				<tr>
					<td colspan="3" id="head">REGISTRASI</td>
				</tr>
				<!-- <tr>
					<td>FOTO</td>
					<td>:</td>
					<td><input type="file" name="gambar" class="form_login" 
			id="gambar"></td>
				</tr>
				<tr> -->
					<td>NAMA</td>
					<td>:</td>
					<td><input type="text" name="nama" class="form_login" 
			placeholder="Nama Lengkap" required="required" id="nama"></td>
				</tr>
				<tr>
					<td>NIM</td>
					<td>:</td>
					<td><input type="number" name="nim" class="form_login" 
			placeholder="Nomor Induk Mahasiswa" required="required" id="nim" maxlength="10" minlength="10"></td>
				</tr>
				<tr>
					<td>FAKULTAS</td>
					<td>:</td>
					<td>
					<select name="kd_fakultas" id="kd_fakultas">
							<option value="">Pilih Fakultas...</option>
							<option value="2">Ekonomi dan Bisnis</option>
							<option value="6">Ilmu Sosial dan Politik</option>
							<option value="13">Pertanian</option>
							<option value="9">Kehutanan</option>
							<option value="8">Keguruan dan Ilmu Pendidikan</option>
							<option value="12">Perikanan dan Ilmu Kelautan</option>
							<option value="11">Matematika dan Ilmu Pengetahuan Alam</option>
							<option value="14">Teknik</option>
							<option value="4">Hukum</option>
							<option value="7">Kedokteran</option>
							<option value="10">Kesehatan Masyarakat</option>
							<option value="3">Farmasi</option>
							<option value="5">Ilmu Budaya</option>
							<option value="1">Ilmu Komputer dan Tekonologi Informasi</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>ALAMAT</td>
					<td>:</td>
					<td>
						<textarea name="alamat" id="" cols="42" rows="5"></textarea>
					<!-- <input type="text" name="alamat" class="form_login" 
			placeholder="kata sandi" required="required" id="alamat"></td> -->
				</tr>
				<tr>
					<td>NO HP</td>
					<td>:</td>
					<td><input type="number" name="no_hp" class="form_login" 
			placeholder="Nomor Handphone" required="required" id="no_hp"></td>
				</tr>
				<tr>
					<td>USERNAME</td>
					<td>:</td>
					<td><input type="text" name="username" class="form_login" 
			placeholder="e-mail/nama pengguna" required="required" id="username"></td>
				</tr>
				<tr>
					<td>PASSWORD</td>
					<td>:</td>
					<td><input type="password" name="password" class="form_login" 
			placeholder="kata sandi" required="required" id="password"></td>
				</tr>
				<tr>
					<td>FOTO</td>
					<td>:</td>
					<td><input type="file" name="gambar" class="form_login" 
			id="gambar" style="background-color: transparent;"></td>
				</tr>
				<tr>
				<tr>
					<td colspan="3" style="text-align: center;">
						<input type="submit" name="submit" class="tombol_login" value="DAFTAR" style="margin: 20px 0; width: 150px; height: 50px;">
						<input type="reset" name="reset" class="tombol_login" value="RESET" style="margin: 20px 0; width: 150px; height: 50px;">
					</td>
				</tr>

			</table>
		</form>
	</div>
	<footer>
            <div id="copyright">
                <span>&copy; 2018 Perpustakaan, UNMUL.</span>
            </div>
        </footer>
</div>
</body>
</html>
<!-- 
<label for="nama">nama</label>
		<input type="text" name="nama" class="form_login" 
		placeholder="e-mail/nama pengguna" required="required" id="nama">
		<br>

		<label for="nim">nim</label>
		<input type="number" name="nim" class="form_login" 
		placeholder="kata sandi" required="required" id="nim">
		<br>

		<label for="fakultas">fakultas</label>
		<input type="text" name="kd_fakultas" class="form_login" 
		placeholder="e-mail/nama pengguna" required="required" id="kd_fakultas">
		<br>

		<label for="alamat">alamat</label>
		<textarea cols="30" rows="3" name="kampank">
			
		</textarea>
		<input type="password" name="alamat" class="form_login" 
		placeholder="kata sandi" required="required" id="alamat">
		<br>

		<label for="no_hp">no_hp</label>
		<input type="number" name="no_hp" class="form_login" 
		placeholder="e-mail/nama pengguna" required="required" id="no_hp">
		<br>

		<label for="username">Username</label>
		<input type="text" name="username" class="form_login" 
		placeholder="e-mail/nama pengguna" required="required" id="username">
		<br>

		<label for="password">Password</label>
		<input type="password" name="password" class="form_login" 
		placeholder="kata sandi" required="required" id="password">
		<br>

		<input type="submit" name="submit" class="tombol_login" value="login">
	 -->