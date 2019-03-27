<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PENGGUNA</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_fakultas.css">
    <link rel="stylesheet" href="css/cari_buku.css">
    <!-- <script src="js/index_pengguna.js"></script> -->
    <!-- <script src="js/fakultas.js"></script> -->
</head>
<body>
    <div id=all>
        <header>
            <div id="kepala">
                <div id="logo-gambar" onclick="cari_toggle()">
                    <img src="img/logo/head/logo-gambar.png" alt="UNMUL LOGO" width="100px" height="100px">
                </div> <br>
                <div id="logo-text" onclick="cari_toggle()">
                    <span>PERPUSTAKAAN PUSAT<br>UNIVERSITAS MULAWARMAN</span> <hr>
                </div>
            </div>
        </header>
        <nav>
            <div id="masuk">
                <span onclick="display_toggle('masuk')">
                    <a href="member/login.php">MASUK</a>
                </span>
            </div>
            <div id="daftar">
                <span>
                    <a href="member/regis.php">DAFTAR</a>
                </span>
            </div>
            <div id="akun">
                
            </div>
            <div id="keluar">
                <span onclick="display_toggle('keluar')">KELUAR</span>
            </div>
        </nav>
        <article>
            <div id="konten">
                <div id="fakultas">
                    <!-- <form action="" method="post"> -->
                    <table width="100%" border="0">
                        <tr>
                            <td>
                                <div class="fk" id="fahutan" onclick="fakultas_toggle('fahutan')"><a href="index_buku.php?kd_fakultas=9"><img src="img/logo/fk/fahutan.png" alt="FAKULTAS KEHUTANAN" title="FAKULTAS KEHUTANAN" height="125px" width="125px" id=""></a></div>
                            </td>
                            <td>
                                <div class="fk" id="faperta" onclick="fakultas_toggle('faperta')"><a href="index_buku.php?kd_fakultas=13"> <img src="img/logo/fk/faperta.png" alt="FAKULTAS PERTANIAN" title="FAKULTAS PERTANIAN" height="125px" width="125px" id=""></a> </div>
                            </td>
                            <td>
                                <div class="fk" id="farmasi" onclick="fakultas_toggle('farmasi')"><a href="index_buku.php?kd_fakultas=3"> <img src="img/logo/fk/farmasi.png" alt="FAKULTAS FARMASI" title="FAKULTAS FARMASI" height="125px" width="125px" id=""></a> </div>
                            </td>
                            <td>
                                <div class="fk" id="feb" onclick="fakultas_toggle('fekon')"> <a href="index_buku.php?kd_fakultas=2"><img src="img/logo/fk/fekon.png" alt="FAKULTAS EKONOMI DAN BISNIS" title="FAKULTAS EKONOMI DAN BISNIS" height="125px" width="125px" id=""></a> </div>
                            </td>
                            <td>
                                <div class="fk" id="hukum" onclick="fakultas_toggle('hukum')"><a href="index_buku.php?kd_fakultas=4"> <img src="img/logo/fk/fh.png" alt="FAKULTAS HUKUM" title="FAKULTAS HUKUM" height="125px" width="125px" id=""></a> </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fk" id="fpik" onclick="fakultas_toggle('fpik')"><a href="index_buku.php?kd_fakultas=12"> <img src="img/logo/fk/fpik.png" alt="FAKULTAS PERIKANAN DAN KELAUTAN" title="FAKULTAS PERIKANAN DAN KELAUTAN" height="125px" width="125px" id=""></a> </div>
                            </td>
                            <td>
                                <div class="fk" id="fisipol" onclick="fakultas_toggle('fisipol')"><a href="index_buku.php?kd_fakultas=6"> <img src="img/logo/fk/fisipol.png" alt="FAKULTAS ILMU SOSIAL DAN ILMU POLITIK" title="FAKULTAS ILMU SOSIAL DAN ILMU POLITIK" height="125px" width="125px" id=""></a> </div>
                            </td>
                            <td>
                                <div class="fk" id="fk" onclick="fakultas_toggle('fk')"><a href="index_buku.php?kd_fakultas=7"> <img src="img/logo/fk/fk.png" alt="FAKULTAS KEDOKTERAN" title="FAKULTAS KEDOKTERAN" height="125px" width="125px" id=""></a> </div>
                            </td>
                            <td>
                                <div class="fk" id="kesmas" onclick="fakultas_toggle('kesmas')"><a href="index_buku.php?kd_fakultas=10"> <img src="img/logo/fk/kesmas.png" alt="FAKULTAS KESEHATAN MASYARAKAT" title="FAKULTAS KESEHATAN MASYARAKAT" height="125px" width="125px" id=""></a> </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fk" id="fkip" onclick="fakultas_toggle('fkip')"><a href="index_buku.php?kd_fakultas=8"> <img src="img/logo/fk/fkip.png" alt="FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN" title="FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN" height="125px" width="125px" id=""></a> </div>
                            </td>
                            <td>
                                <div class="fk" id="fkti" onclick="fakultas_toggle('fkti')"><a href="index_buku.php?kd_fakultas=1"> <img src="img/logo/fk/fkti.png" alt="FAKULTAS ILMU KOMPUTER DAN TEKNOLOGI INFORMASI" title="FAKULTAS ILMU KOMPUTER DAN TEKNOLOGI INFORMASI" height="125px" width="125px" id=""></a> </div>
                            </td>
                            <td>
                                <div class="fk" id="mipa" onclick="fakultas_toggle('mipa')"><a href="index_buku.php?kd_fakultas=11"> <img src="img/logo/fk/mipa.png" alt="FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM" title="FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM" height="125px" width="125px" id=""></a> </div>
                            </td>
                            <td>
                                <div class="fk" id="teknik" onclick="fakultas_toggle('teknik')"><a href="index_buku.php?kd_fakultas=14"> <img src="img/logo/fk/teknik.png" alt="FAKULTAS TEKNIK" title="FAKULTAS TEKNIK" height="125px" width="125px" id=""></a> </div>
                            </td>
                            <td>
                                <div class="fk" id="fib" onclick="fakultas_toggle('fib')"><a href="index_buku.php?kd_fakultas=5"> <img src="img/logo/fk/fib.png" alt="FAKULTAS ILMU BUDAYA" title="FAKULTAS ILMU BUDAYA" height="125px" width="125px" id=""></a> </div>
                            </td>
                        </tr>
                    </table>
                <!-- </form> -->

<!-- <?php 

// require "functions.php";
// $kd = $_GET['kd_fakultas'];
// $buku = read_buku("SELECT * from buku where kd_fakultas='$kd'");

?> -->

                </div>
                <div id="cari_buku">
                    <input type="text" name="cari_buku" placeholder="Cari Buku">
                    <input type="button" value="CARI">
                </div>
                <div id="hasil_cari">
                    <!-- tabel buku -->
                    <!-- <table border="0" cellspacing="3" width="100%">
        <?php foreach ($buku as $rows) : ?>
        <tr>
            <td rowspan="7"><?= $rows['cover']; ?></td>
            </tr>
            
                <tr>
                    <td>ISBN</td>
                    <td>:</td>
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
                    <td>Status</td>
                    <td>:</td>
                    <td><?= $rows['status']; ?></td>
                </tr>
 
       
        <!-- <?php endforeach; ?> -->
    </table> -->
                </div>
            </div>
        </article>

        <footer>
            <div id="copyright">
                <span>&copy; 2018 Perpustakaan, UNMUL.</span>
            </div>
        </footer>
    </div>
</body>
</html>