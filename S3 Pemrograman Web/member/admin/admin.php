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
	
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
</head>
<body>

	<ul>
		<li><a href="buku/lihat_buku.php">kelola buku</li>
		<li><a href="user/lihat_user.php">kelola user</a></li>
		<li><a href="../logout.php">logout</a></li>
	</ul>

</body>
</html>