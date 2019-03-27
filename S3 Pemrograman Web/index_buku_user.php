<?php 

	session_start();

	// if ($_SESSION['level'] == "admin") {
	// 	header("Location: ../../../index.php");
	// }

?>

<?php 

    require "functions.php";
    $kd = $_GET['kd_fakultas'];
    $buku = read_buku("SELECT * from buku WHERE kd_fakultas ='$kd'");
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_tampilbuku.css">
    <script src="main.js"></script>
</head>
<body>
       
<div id=all>
<header>
            <div id="kepala">
                <div id="logo-gambar" onclick="cari_toggle()">
                    <a href="index_pengguna.php"><img src="img/logo/head/logo-gambar.png" alt="UNMUL LOGO" width="100px" height="100px"></a>
                </div> <br>
                <div id="logo-text" onclick="cari_toggle()">
                    <a href="index_pengguna.php"><span>PERPUSTAKAAN PUSAT<br>UNIVERSITAS MULAWARMAN</span> </a> <hr>
                </div>
            </div>
        </header>
    <div class="tampilan_buku cari_buku">
    <div id="head"><span>Daftar Buku</span></div>
    <table border="0" cellspacing="3" width="100%">
        <?php foreach ($buku as $rows) : ?>
        <tr>
            <td rowspan="7" style="width: 200px;"><a href="member/user/buku/pinjam.php?isbn=<?= $rows['isbn']; ?>"><img src="img/<?= $rows['cover']; ?>" ></a></td>
            </tr>
            
                <tr>
                    <td style="width: 30px;">ISBN</td>
                    <td style="width: 10px;">:</td>
                    <td><?= $rows['isbn']; ?></td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>:</td>
                    <td><?= $rows['jenis']; ?></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>:</td>
                    <td><?= $rows['pengarang']; ?></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>:</td>
                    <td><?= $rows['judul']; ?></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>:</td>
                    <td><?= $rows['penerbit']; ?></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>:</td>
                    <td><?= $rows['status']; ?></td>
                </tr>
 
       
        <?php endforeach; ?>
    </table>
    <!-- <a href="../../logout.php">logout</a> -->
    <footer>
            <div id="copyright">
                <span>&copy; 2018 Perpustakaan, UNMUL.</span>
            </div>
        </footer>
    </div>
</body>
</html>