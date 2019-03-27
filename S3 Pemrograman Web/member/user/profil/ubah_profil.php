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

    require "../../../functions.php";

    $nim = $_SESSION['nim'];
    $row = read_profile("SELECT * from mahasiswa where nim = '$nim'")[0];


    if ( isset($_POST['submit']) ) {
        
        if ( ubah_profile($_POST, $nim) > 0 ) {
            ?>
            <script type="text/javascript">
                alert("profil berhasil diubah");
                window.location.href = '../user.php';
            </script>
            <?php
        }
        else {
            ?>
            <script type="text/javascript">
                alert("profil gagal diubah");
            </script>
            <?php
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ubah profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style_ubahdata.css" />
    <script src="main.js"></script>
</head>
<body>
<div id="all">
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
    <div class="ubahdata">
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="gambarlama" value="<?= $row['gambar']; ?>">
        
    <table border="0" cellspacing="0" width="100%">
            <tr>
                <td id="head" colspan="3">
                    UBAH DATA
                </td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td><input type="file" name="gambar" 
                placeholder="gambar" autocomplete="off" 
                id="gambar"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama" placeholder="nama" autocomplete="off" id="nama" value="<?= $row['nama']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <input type="text" name="alamat" 
                    placeholder="alamat" autocomplete="off" 
                    id="alamat" value="<?= $row['alamat']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>:</td>
                <td>
                    <input type="text" name="no_hp" 
                    placeholder="no_hp" autocomplete="off" 
                    id="no_hp" value="<?= $row['no_hp']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td>:</td>
                <td>
                    <select name="kd_fakultas" id="kd_fakultas" >
                        <option value="<?= $row['kd_fakultas']; ?>"></option>
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
                    <!-- <input type="text" name="kd_fakultas" 
                    placeholder="kd_fakultas" autocomplete="off" 
                    id="kd_fakultas" value="<?= $row['kd_fakultas']; ?>" required> -->
                </td>
            </tr>
                <td colspan="3">
                    <input type="submit" value="Ubah" name="submit">
                    <!-- <button type="submit" name="submit">Ubah!</button> -->
                </td>
            </tr>
        </table>
        <!-- <input type="hidden" name="gambarlama" value="<?= $row['gambar']; ?>">
        <table border="1" cellspacing="0">
            <tr>
                <td>
                    <label for="gambar">foto</label>
                    <input type="file" name="gambar" 
                    placeholder="gambar" autocomplete="off" 
                    id="gambar">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nama">nama</label>
                    <input type="text" name="nama" 
                    placeholder="nama" autocomplete="off" 
                    id="nama" value="<?= $row['nama']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="alamat">alamat</label>
                    <input type="text" name="alamat" 
                    placeholder="alamat" autocomplete="off" 
                    id="alamat" value="<?= $row['alamat']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="no_hp">nomor hp</label>
                    <input type="text" name="no_hp" 
                    placeholder="no_hp" autocomplete="off" 
                    id="no_hp" value="<?= $row['no_hp']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kd_fakultas">kd_fakultas</label>
                    <input type="text" name="kd_fakultas" 
                    placeholder="kd_fakultas" autocomplete="off" 
                    id="kd_fakultas" value="<?= $row['kd_fakultas']; ?>" required>
                </td>
            </tr>
                <td>
                    <button type="submit" name="submit">Ubah!</button>
                </td>
            </tr>
        </table> -->
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