<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_admin.css">
    <style>
        table tr td a:hover {
            text-decoration: none;
            color: white;
        }
        table tr td a {
            text-decoration: none;
            color: black;
        }
        table tr td#admin {
            
            color: black;
            background:   rgba(163, 163, 163, 0.678);
        }
    </style>
</head>
<body>
    <div id=all>
        <header>
            <div id="kepala">
                <div id="logo-gambar">
                    <img src="img/logo/head/logo-gambar.png" alt="UNMUL LOGO" width="100px" height="100px">
                </div> <br>
                <div id="logo-text">
                    <span>PERPUSTAKAAN PUSAT<br>UNIVERSITAS MULAWARMAN</span> <hr>
                </div>
            </div>
        </header>
        
        <article>
            <div id="konten">
                <div id="fakultas">
                    <table width="100%" border="0">
                        <tr>
                            <td>
                                <div class="fk" id="pengguna"><a href="member/admin/user/lihat_user.php"><img src="img/logo/admin/pengguna.png" alt="PENGGUNA" title="PENGGUNA" height="125px" width="125px" id=""></a></div>
                            </td>
                            <td>
                                <div class="fk" id="buku"><a href="member/admin/buku/lihat_buku.php"><img src="img/logo/admin/buku.png" alt="BUKU" title="BUKU" height="125px" width="125px" id=""></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fk" id="pegawai"><a href=""><img src="img/logo/admin/pegawai.png" alt="PEGAWAI" title="PEGAWAI" height="125px" width="125px" id=""></a></div>
                            </td>
                            <td id="admin" style=" padding: 50px 20px; font-size: 18pt;">
                                <?php echo "Hai, ".$_SESSION['username']; ?><br>
                                <a href="member/logout.php"> Keluar </a>
                            </div>
                            </td>
                            <td>
                                <div class="fk" id="fakultas"><a href=""><img src="img/logo/admin/fakultas.png" alt="FAKULTAS" title="FAKULTAS" height="125px" width="125px" id=""></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fk" id="peminjaman"><a href=""><img src="img/logo/admin/peminjaman.png" alt="PEMINJAMAN" title="PEMINJAMAN" height="125px" width="125px" id=""></a></div>
                            </td>
                            <td>
                                <div class="fk" id="pengembalian"><a href=""><img src="img/logo/admin/pengembalian.png" alt="PENGEMBALIAN" title="PENGEMBALIAN" height="125px" width="125px" id=""></a></div>
                            </td>
                        </tr>
                    </table>
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