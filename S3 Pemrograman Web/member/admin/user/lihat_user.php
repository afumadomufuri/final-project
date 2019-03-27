<?php

	session_start();

	//memeriksa apakah saat sedang mengakses halaman ini sudah login atau tidak
	if ($_SESSION['level'] == "") {
		header("Location: ../login.php?pesan=guest");
	}

	if ($_SESSION['level'] == "user") {
		header("Location: ../../index.php");
	}

?>

<?php

    require "../../../functions.php";

    $user = read_user("SELECT mahasiswa.*,transaksi.peminjam,transaksi.buku,transaksi.tgl_pinjam,transaksi.tgl_kembali,transaksi.denda 
                        from transaksi right join mahasiswa on (transaksi.peminjam=mahasiswa.nim) 
                        where mahasiswa.nama not like 'admin'");
                        
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>lihat user</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style_tampiluser.css" />
    <script src="main.js"></script>
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
            <table border="0" cellspacing="3" width="100%">
                <tr>
                    <th colspan="11" id="head">Data Member</th>
                </tr>
                <tr>
                    <th>foto</th>
                    <th>nama</th>
                    <th>nim</th>
                    <th>alamat</th>
                    <th>nomor hp</th>
                    <th>kd fakultas</th>
                    <th>buku</th>
                    <th>tanggal peminjaman</th>
                    <th>tanggal kembali</th>
                    <th>denda</th>
                    <th>opsi</th>
                </tr>
                <?php foreach ($user as $rows) : ?>
                <tr>
                    <td><img src="../../../img/<?= $rows['gambar']; ?>"></td>
                    <td><?= $rows['nama']; ?></td>
                    <td><?= $rows['nim']; ?></td>
                    <td><?= $rows['alamat']; ?></td>
                    <td><?= $rows['no_hp']; ?></td>
                    <td><?= $rows['kd_fakultas']; ?></td>
                    <td><?= $rows['buku']; ?></td>
                    <td><?= $rows['tgl_pinjam']; ?></td>
                    <td><?= $rows['tgl_kembali']; ?></td>
                    <td><?= $rows['denda']; ?></td>
                    <td>
                        <a href="hapus_user.php?nim=<?= $rows['nim']; ?>&buku=<?= $rows['buku'] ?>" 
                        onclick="return confirm('Yakin ingin menghapus data dari transaksi?')">hapus</a>
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

<!-- <table border="1" cellspacing="1">
        <tr>
            <th>foto</th>
            <th>nama</th>
            <th>nim</th>
            <th>alamat</th>
            <th>nomor hp</th>
            <th>kd fakultas</th>
            <th>buku</th>
            <th>tanggal peminjaman</th>
            <th>tanggal kembali</th>
            <th>denda</th>
            <th>opsi</th>
        </tr>

        <?php foreach ($user as $rows) : ?>
        <tr>
            <td><img src="../../../img/<?= $rows['gambar']; ?>"></td>
            <td><?= $rows['nama']; ?></td>
            <td><?= $rows['nim']; ?></td>
            <td><?= $rows['alamat']; ?></td>
            <td><?= $rows['no_hp']; ?></td>
            <td><?= $rows['kd_fakultas']; ?></td>
            <td><?= $rows['buku']; ?></td>
            <td><?= $rows['tgl_pinjam']; ?></td>
            <td><?= $rows['tgl_kembali']; ?></td>
            <td><?= $rows['denda']; ?></td>
            <td>
                <a href="hapus_user.php?nim=<?= $rows['nim']; ?>&buku=<?= $rows['buku'] ?>" 
                onclick="return confirm('Yakin ingin menghapus data dari transaksi?')">hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table> -->

</body>
</html>