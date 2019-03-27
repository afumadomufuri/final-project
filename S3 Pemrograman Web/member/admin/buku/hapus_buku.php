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

    $isbn = $_GET['isbn'];

    if ( hapus_buku($isbn) > 0 ) {
        ?>
        <script type="text/javascript">
            alert("buku berhasil dihapus");
            window.location.href = 'lihat_buku.php';
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

?>