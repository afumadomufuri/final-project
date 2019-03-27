<?php 

	session_start();

	//memeriksa apakah saat sedang mengakses halaman ini sudah login atau tidak
	if ($_SESSION['level'] == "") {
		header("Location: ../../login.php?pesan=guest");
	}

	if ($_SESSION['level'] == "admin") {
		header("Location: ../../index.php");
	}

?>

<?php

    require "../../../functions.php";

    $nim = $_SESSION['nim'];
    $profile = read_profile("SELECT * from mahasiswa where nim = '$nim'");
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style_profileuser.css" />
    <script src="main.js"></script>
</head>
<body>
    
    <div id=all>
    <header>
            <div id="kepala">
                <div id="logo-gambar" onclick="cari_toggle()">
                    <a href="../../../index_pengguna.php"><img src="../../../img/logo/head/logo-gambar.png" alt="UNMUL LOGO" width="100px" height="100px"></a>
                </div> <br>
                <div id="logo-text" onclick="cari_toggle()">
                    <a href="../../../index_pengguna.php"><span>PERPUSTAKAAN PUSAT<br>UNIVERSITAS MULAWARMAN</span> </a> <hr>
                </div>
            </div>
        </header>

    <!-- <a href="ubah_profil.php?nim=<?= $_SESSION["nim"]; ?>">ubah profil</a> -->
    <div class="profil">
        <table width="100%">
            <?php foreach ($profile as $rows) : ?>
            <tr>
                <th>Profil</th>
            </tr>
            <tr>
                <td><img src="../../../img/<?= $rows['gambar']; ?>"></td>
            </tr>
            <tr>
                <td><?= $rows['nama']; ?><hr></td>
            </tr>
            <tr>
                <td><?= $rows['nim']; ?><hr></td>
            </tr>
            <tr>
                <td><?= $rows['alamat']; ?><hr></td>
            </tr>
            <tr>
                <td><?= $rows['no_hp']; ?><hr></td>
            </tr>
            <tr>
                <td><?= $rows['kd_fakultas']; ?><hr></td>
            </tr>
            <tr>
                <td><a href="ubah_profil.php?nim=<?= $_SESSION["nim"]; ?>">ubah profil</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
        
    </div>
    <footer>
            <div id="copyright">
                <span>&copy; 2018 Perpustakaan, UNMUL.</span>
            </div>
        </footer>
    </div>
</body>
</html>