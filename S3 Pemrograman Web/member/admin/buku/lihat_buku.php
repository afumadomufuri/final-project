<?php

	session_start();

	//memeriksa apakah saat sedang mengakses halaman ini sudah login atau tidak
	if ($_SESSION['level'] == "") {
		header("Location: ../../login.php?pesan=guest");
	}

	if ($_SESSION['level'] == "user") {
		header("Location: ../../index.php");
	}

?>

<?php

    require "../../../functions.php";

    $buku = read_buku("SELECT * FROM buku");
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Kelola Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style_tampiluser.css" />
    <script src="main.js"></script>
    <style>
        img {
            border-radius: 0;
        }
        button:hover {
            background-color: rgba(255,255,255,0.2);
        }
    </style>
</head>
<body>
    <div id=all>
        <header>
            <div id="kepala">
                <div id="logo-gambar" onclick="cari_toggle()">
                    <a href="../../../index_admin.php"><img src="../../../img/logo/head/logo-gambar.png" alt="UNMUL LOGO" width="100px" height="100px"></a>
                </div> <br>
                <div id="logo-text" onclick="cari_toggle()">
                    <a href="../../../index_admin.php"><span>PERPUSTAKAAN PUSAT<br>UNIVERSITAS MULAWARMAN</span> </a> <hr>
                </div>
            </div>
        </header>

    
    <div class="tampilan">
    <table border="0" cellspacing="3">
        <tr>
            <th id="head" colspan="8" style="">Daftar Buku<br><a href="tambah_buku.php"><button>tambah buku</button></a></th>
        </tr>

        <tr>
            <th>isbn</th>
            <th>jenis</th>
            <th>pengarang</th>
            <th>judul</th>
            <th>penerbit</th>
            <th>Tahun</th>
            <th>cover</th>
            <th>opsi</th>
        </tr>

        <?php foreach ($buku as $rows) : ?>
        <tr>
            <td><?= $rows['isbn']; ?></td>
            <td><?= $rows['jenis']; ?></td>
            <td><?= $rows['pengarang']; ?></td>
            <td><?= $rows['judul']; ?></td>
            <td><?= $rows['penerbit']; ?></td>
            <td><?= $rows['status']; ?></td>
            <td style="padding: 0;"><img src="../../../img/<?= $rows['cover']; ?>"></td>
            <td>
                <a href="ubah_buku.php?isbn=<?= $rows['isbn']; ?>">ubah</a>
                &nbsp;&nbsp;
                <a href="hapus_buku.php?isbn=<?= $rows['isbn']; ?>" 
                onclick="return confirm('Yakin ingin menghapus buku dari koleksi?')">hapus</a>
            </td>
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