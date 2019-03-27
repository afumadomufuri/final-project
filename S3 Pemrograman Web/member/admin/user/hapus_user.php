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

    $buku = $_GET['buku'];
    // $peminjam = $_GET['peminjam'];
    $nim = $_GET['nim'];

    if ($buku != NULL) {
        ?>
        <script type="text/javascript">
            alert("user masih meminjam buku");
            window.location.href = 'lihat_user.php';
        </script>
        <?php
    }else{
        if ( hapus_user($nim) > 0 ) {
            ?>
            <script type="text/javascript">
                alert("user berhasil dihapus");
                window.location.href = 'lihat_user.php';
            </script>
            <?php
        }
        else {
            ?>
            <script type="text/javascript">
                alert("user gagal dihapus");
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
    <title>hapus user</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
</body>
</html>