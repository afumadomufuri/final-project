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

    $isbn = $_GET['isbn'];
    $row = read_buku("SELECT * FROM buku where isbn='$isbn'")[0];
        
    if ( isset($_POST['submit']) ) {
        
        if ( ubah_buku($_POST) > 0 ) {
            ?>
            <script type="text/javascript">
                alert("buku berhasil ditambahkan");
                window.location.href = 'lihat_buku.php';
            </script>
            <?php
        }
        else {
            ?>
            <script type="text/javascript">
                alert("buku gagal ditambahkan");
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
    <title>Admin | Ubah Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/style_ubahdata.css" />
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

    <form action="" method="post" enctype="multipart/form-data">
    <div class="ubahdata">
        <table>
            <tr>
                <td colspan="3" id="head">Ubah Buku</td>
            </tr>
            <!-- <tr>
                <td>
                    <input type="image" name="coverlama" value="<?= $row['cover']; ?>">
                </td>
            </tr> -->
            <tr>
                <td>ISBN</td>
                <td>:</td>
                <td><input type="hidden" name="isbn" value="<?= $row['isbn']; ?>"><?= $row['isbn']; ?></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>:</td>
                <td><input type="text" name="jenis" 
                    placeholder="jenis" autocomplete="off" id="jenis" value="<?= $row['jenis']; ?>" required></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>:</td>
                <td><input type="text" name="pengarang" 
                    placeholder="pengarang" autocomplete="off" id="pengarang" value="<?= $row['pengarang']; ?>" required></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input type="text" name="judul" 
                    placeholder="judul" autocomplete="off" id="judul" value="<?= $row['judul']; ?>" required></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><input type="text" name="penerbit" 
                    placeholder="penerbit" autocomplete="off" id="penerbit" value="<?= $row['penerbit']; ?>" required></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><input type="text" name="status" 
                    placeholder="status" autocomplete="off" id="status" value="<?= $row['status']; ?>" required></td>
            </tr>
            <tr>
                <td>Cover</td>
                <td>:</td>
                <td display="inline-block">
                    <input type="file" name="cover" placeholder="cover" autocomplete="off" id="cover" style="width: 200px; margin-top: -20px;">
                    <img src="../../../img/<?= $row['cover']; ?>" height="40" width="40"><input type="hidden" name="coverlama" value="<?= $row['cover']; ?>">
                </td>
            </tr>
            <tr>
                <td>Kode Fakultas</td>
                <td>:</td>
                <td>
                    <input type="hidden" name="kd_fakultas" value="<?= $row['kd_fakultas']?>">
						<select name="kd_fakultas" id="kd_fakultas">
							<option value="<?= $row['kd_fakultas']?>"><?= $row['kd_fakultas']?></option>
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
                <td colspan="3"><input type="submit" value="Ubah Buku" name="submit"></td>
            </tr>
        </table>
        </div>
    
        <!-- <table border="1" cellspacing="0">
            <input type="hidden" name="coverlama" value="<?= $row['cover']; ?>">
            <tr>
                <td>
                    <label for="isbn">ISBN</label>
                    <input type="hidden" name="isbn" 
                    placeholder="isbn" autocomplete="off" 
                    id="isbn" value="<?= $row['isbn']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jenis">Jenis</label>
                    <input type="text" name="jenis" 
                    placeholder="jenis" autocomplete="off" 
                    id="jenis" value="<?= $row['jenis']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pengarang">Pengarang</label>
                    <input type="text" name="pengarang" 
                    placeholder="pengarang" autocomplete="off" 
                    id="pengarang" value="<?= $row['pengarang']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" 
                    placeholder="judul" autocomplete="off" 
                    id="judul" value="<?= $row['judul']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="penerbit">Penerbit</label>
                    <input type="text" name="penerbit" 
                    placeholder="penerbit" autocomplete="off" 
                    id="penerbit" value="<?= $row['penerbit']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status">Status</label>
                    <input type="text" name="status" 
                    placeholder="status" autocomplete="off" 
                    id="status" value="<?= $row['status']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="../../../img/<?= $row['cover']; ?>">
                    <label for="cover">Cover</label>
                    <input type="file" name="cover" 
                    placeholder="cover" autocomplete="off" 
                    id="cover">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kd_fakultas">Kode Fakultas</label>
                    <input type="text" name="kd_fakultas" 
                    placeholder="Kode_fakultas" autocomplete="off" 
                    id="kd_fakultas" value="<?= $row['kd_fakultas']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="submit">Tambah!</button>
                </td>
            </tr>
        </table> -->
    </form>
    <footer>
            <div id="copyright">
                <span>&copy; 2018 Perpustakaan, UNMUL.</span>
            </div>
        </footer>
    </div>
</body>
</html>

