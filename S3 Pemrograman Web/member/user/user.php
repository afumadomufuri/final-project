<?php 

	session_start();

	//memeriksa apakah saat sedang mengakses halaman ini sudah login atau tidak
	if ($_SESSION['level'] == "") {
		header("Location: ../login.php?pesan=guest");
	}

	if ($_SESSION['level'] == "admin") {
		header("Location: ../../index.php");
	}

?>

<?php

	require "../../functions.php";

	$nim = $_SESSION['nim'];
	$buku = read_buku("SELECT buku.*,transaksi.* FROM transaksi join buku on (buku.isbn=transaksi.buku) where peminjam='$nim'");

	if(isset($_GET['confirm'])){
		if($_GET['confirm'] == 'yes'){

			if ( kembali_buku($_GET['isbn'], $nim) > 0 ) {
				?>
				<script type="text/javascript">
					alert("buku berhasil dihapus");
					window.location.href = './user.php';
				</script>
				<?php
			}
			else {
				?>
				<script type="text/javascript">
					alert("buku gagal dihapus");
				</script>
				<?php
			}
	  
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>user</title>
	
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/style_user.css" />
</head>
<body>
	<div id="all">

	<header>
            <div id="kepala">
                <div id="logo-gambar" onclick="cari_toggle()">
                    <a href="../../index_pengguna.php"><img src="../../img/logo/head/logo-gambar.png" alt="UNMUL LOGO" width="100px" height="100px"></a>
                </div> <br>
                <div id="logo-text" onclick="cari_toggle()">
                    <a href="../../index_pengguna.php"><span>PERPUSTAKAAN PUSAT<br>UNIVERSITAS MULAWARMAN</span> </a> <hr>
                </div>
            </div>
		</header>
		
		<div id="navigasi">
			<a href="buku/buku.php"><button>PINJAM BUKU</button></a>
			<a href="profil/profil.php?nim=<?= $_SESSION['nim']?>"> <button>PROFIL	</button> </a>
		</div>

		<div class="tampilan">
	<table border='1' cellspacing='0' width="100%">
		<tr>
			<td colspan="10" align="center" style="font-size: 24pt; font-weight: bold;">Buku yang Dipinjam</td>
		</tr>
		<tr>
			<th>ISBN</th>
			<th>jenis</th>
			<th>pengarang</th>
			<th>judul</th>
			<th>penerbit</th>
			<th>Tahun</th>
			<th>cover</th>
			<th>tanggal pinjam</th>
			<th>tanggal kembali</th>
			<th>opsi</th>
		</tr>
		<?php foreach($buku as $rows) : ?>
		<tr>
            <td><?= $rows['isbn']; ?></td>
            <td><?= $rows['jenis']; ?></td>
            <td><?= $rows['pengarang']; ?></td>
            <td><?= $rows['judul']; ?></td>
            <td><?= $rows['penerbit']; ?></td>
            <td><?= $rows['status']; ?></td>
            <td><?= $rows['cover']; ?></td>
            <td><?= $rows['tgl_pinjam']; ?></td>
            <td><?= $rows['tgl_kembali']; ?></td>
            <td>
                <a href='./user.php?isbn=<?= $rows['isbn']; ?>&confirm=yes' 
                onclick="return confirm('Yakin ingin menghapus buku dari koleksi?')">kembalikan buku</a>
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