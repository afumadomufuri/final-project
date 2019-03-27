<?php 

	session_start();

	//memeriksa apakah saat sedang mengakses halaman ini sudah login atau tidak
	if ($_SESSION['level'] == "") {
		header("Location: ../../login.php?pesan=guest");
	}

	if ($_SESSION['level'] == "admin") {
		header("Location: ../../../index.php");
	}

?>

<?php

    require "../../../functions.php";

    $isbn = $_GET['isbn'];    
    $nim = $_SESSION['nim'];
    
    $buku = read_buku("SELECT * from buku WHERE isbn='$isbn'")[0];
        // var_dump($buku);

    if(isset($_GET['confirm'])){
        if($_GET['confirm'] == 'yes'){

            if ( pinjam_buku($_GET['isbn_fix'], $nim) > 0 ) {
                ?>
                <script type="text/javascript">
                    alert("buku berhasil dipinjam");
                    window.location.href = '../user.php';
                </script>
                <?php
            }
            else {
                ?>
                <script type="text/javascript">
                    alert("buku gagal dipinjam");
                    window.location.href = 'buku.php';
                </script>
                <?php
            }
        
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Informasi Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style_profileuser.css" />
    <script src="main.js"></script>
    <style>
        button {
            height: 30px;
            font-size: 14pt;
            width: 100px;
        }
    </style>
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
        <div class="tampilan">
        <div class="profil">
        <table width="100%">
            <tr>
                <th>Data Buku</th>
            </tr>
            <tr>
                <td><img src="../../../img/<?= $buku['cover']; ?>" style="border-radius: 10px;"></td>
            </tr>
            <tr>
                <td><?= $buku['isbn']; ?><hr></td>
            </tr>
            <tr>
                <td><?= $buku['jenis']; ?><hr></td>
            </tr>
            <tr>
                <td><?= $buku['pengarang']; ?><hr></td>
            </tr>
            <tr>
                <td><?= $buku['judul']; ?><hr></td>
            </tr>
            <tr>
                <td><?= $buku['penerbit']; ?><hr></td>
            </tr>
            <tr>
                <td><a href='pinjam.php?isbn_fix=<?= $buku['isbn']; ?>&confirm=yes' 
    onclick="return confirm('Yakin ingin meminjam buku dari koleksi?')"><button>Pinjam!</button></a>
    <a href="buku.php"><button>Kembali</button></a></td>
            </tr>
        </table>
        
        </div>

 <footer>
            <div id="copyright">
                <span>&copy; 2018 Perpustakaan, UNMUL.</span>
            </div>
        </footer>
    </div>
    <!-- <table border="1" cellspacing="0">
        <tr>
            <td><?= $buku['cover']; ?></td>
            <td>
                <ul>
                    <li>ISBN = <?= $buku['isbn']; ?></li>
                    <li>Jenis = <?= $buku['jenis']; ?></li>
                    <li>Pengarang<?= $buku['pengarang']; ?></li>
                    <li>Judul<?= $buku['judul']; ?></li>
                    <li>Penerbit<?= $buku['penerbit']; ?></li>
                    <li>Status<?= $buku['status']; ?></li>
                </ul>
            </td>
        </tr>
    </table> -->

    
    

</body>
</html>
