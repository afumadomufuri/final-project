<?php 

$conn = mysqli_connect("localhost","root","","perpustakaan");

//mengecek ketersediaan database
if (mysqli_connect_errno()) {
	echo "koneksi database gagal";
}

function login($user, $pass, $q) {
	global $conn;

	$result = mysqli_query($conn, $q);
	$rows = mysqli_fetch_assoc($result);

	return $rows;
}

function read_buku($read) {
	global $conn;

	$result = mysqli_query($conn, $read);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	
	return $rows;
}

function tambah_buku($data) {
	global $conn;

	$isbn = $data['isbn'];
	$jenis = $data['jenis'];
	$pengarang = $data['pengarang'];
	$judul = $data['judul'];
	$penerbit = $data['penerbit'];
	$status = $data['status'];
	$kd_fakultas = $data['kd_fakultas'];

	$cover = upload_buku();
	if ( !$cover ) {
		return false;
	}

	$query = "INSERT INTO buku VALUES 
				(
					'$isbn','$jenis',
					'$pengarang','$judul',
					'$penerbit','$status',
					'$cover','$kd_fakultas'
				)";

	$result = mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload_buku() {

	$namafile = $_FILES['cover']['name'];
	$ukuranfile = $_FILES['cover']['size'];
	$error = $_FILES['cover']['error'];
	$tmpName = $_FILES['cover']['tmp_name'];

	if ( $error === 4 ) {
		echo "<script>
					alert('upload gambar dahulu');
				</script>";
		return false;
	}
	
	$extgambarvalid = ['jpg','jpeg','png'];
	$extgambar = explode('.',$namafile);
	$extgambar = strtolower(end($extgambar));

	if ( !in_array($extgambar, $extgambarvalid) ) {
		echo "<script>
					alert('upload hanya gambar');
				</script>";
		return false;
	}

	if ( $ukuranfile > 2000000 ) {
		echo "<script>
					alert('ukuran melebihi 2mb');
				</script>";
		return false;
	}

	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $extgambar;

	move_uploaded_file($tmpName, '../../../img/'.$namafilebaru);

	return $namafilebaru;
}

function ubah_buku($data) {
	global $conn;

	$isbn = $data['isbn'];
	$jenis = $data['jenis'];
	$pengarang = $data['pengarang'];
	$judul = $data['judul'];
	$penerbit = $data['penerbit'];
	$status = $data['status'];
	$kd_fakultas = $data['kd_fakultas'];
	$coverlama = $data['coverlama'];

	if ($_FILES['cover']['error'] == 4) {
		$cover = $coverlama;
	}else{
		$cover = upload_buku();
	}
	
	$query = "UPDATE buku SET 
				jenis='$jenis',	pengarang='$pengarang', 
				judul='$judul',	penerbit='$penerbit',
				status='$status', cover='$cover', 
				kd_fakultas='$kd_fakultas'
			WHERE isbn='$isbn';
			";

	$result = mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus_buku($isbn) {
	global $conn;

	mysqli_query($conn, "DELETE FROM buku WHERE isbn='$isbn'");

	return mysqli_affected_rows($conn);
}

function kembali_buku($isbn,$nim) {
	global $conn;
    
    //denda
    $result = mysqli_query($conn, "SELECT tgl_kembali from transaksi WHERE buku='$isbn' and peminjam='$nim'");

    $rows = mysqli_fetch_assoc($result);
    
//    var_dump($rows['tgl_kembali']);
    $row = explode('-',$rows['tgl_kembali']);
    $kembali = implode('',$row);
    
    $today = date("Ymd");
//    var_dump($kembali);
//    var_dump($today);
    
    if($kembali < $today){
        echo "<script>
            alert('Karena mengembalikan buku melewati batas yang ditentukan, dikenai denda sebesar 50.000');
        </script>";
    }
    
	mysqli_query($conn, "DELETE FROM transaksi WHERE buku='$isbn' and peminjam='$nim'");

	return mysqli_affected_rows($conn);
}

function pinjam_buku($isbn, $nim) {
	global $conn;

	$today = date("Y-m-d");
	$to7day = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
	$seminggu = date("Y-m-d", $to7day);

	$query = "INSERT INTO transaksi VALUES
				(
					'','$nim','$isbn',
					'$today','$seminggu',''
				)";

	$result = mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function read_user($read) {
	global $conn;

	$result = mysqli_query($conn, $read);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	
	return $rows;
}

function tambah_user($data) {
	global $conn;

	$nama = $data['nama'];
	$nim = $data['nim'];
	$kd_fakultas = $data['kd_fakultas'];
	$alamat = $data['alamat'];
	$no_hp = $data['no_hp'];
	$username = $data['username'];
	$password = $data['password'];

	$gambar = upload_gambar(1);
	if ( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO mahasiswa VALUES
				(
					'$gambar','$nama','$nim',
					'$alamat','$no_hp',
					'$kd_fakultas'
				)";

	$query2 = "INSERT INTO akun (username,password,level,kd_nim) values 
				(
					'$username',
					'$password','user','$nim'
				)";

	$result = mysqli_query($conn,$query);
	$result2 = mysqli_query($conn,$query2);

	return mysqli_affected_rows($conn);
}

function upload_gambar($cek) {

	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	if ( $error === 4 ) {
		echo "<script>
					alert('upload gambar dahulu');
				</script>";
		return false;
	}
	
	$extgambarvalid = ['jpg','jpeg','png'];
	$extgambar = explode('.',$namafile);
	$extgambar = strtolower(end($extgambar));

	if ( !in_array($extgambar, $extgambarvalid) ) {
		echo "<script>
					alert('upload hanya gambar');
				</script>";
		return false;
	}

	if ( $ukuranfile > 2000000 ) {
		echo "<script>
					alert('ukuran melebihi 2mb');
				</script>";
		return false;
	}

	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $extgambar;

	if ($cek == 1)
        move_uploaded_file($tmpName, '../img/'.$namafilebaru);
    if ($cek == 2)
        move_uploaded_file($tmpName, '../../../img/'.$namafilebaru);        

	return $namafilebaru;	
}

// function upload_gambar_user() {

// 	$namafile = $_FILES['gambar']['name'];
// 	$ukuranfile = $_FILES['gambar']['size'];
// 	$error = $_FILES['gambar']['error'];
// 	$tmpName = $_FILES['gambar']['tmp_name'];

// 	if ( $error === 4 ) {
// 		echo "<script>
// 					alert('upload gambar dahulu');
// 				</script>";
// 		return false;
// 	}
	
// 	$extgambarvalid = ['jpg','jpeg','png'];
// 	$extgambar = explode('.',$namafile);
// 	$extgambar = strtolower(end($extgambar));

// 	if ( !in_array($extgambar, $extgambarvalid) ) {
// 		echo "<script>
// 					alert('upload hanya gambar');
// 				</script>";
// 		return false;
// 	}

// 	if ( $ukuranfile > 2000000 ) {
// 		echo "<script>
// 					alert('ukuran melebihi 2mb');
// 				</script>";
// 		return false;
// 	}

// 	$namafilebaru = uniqid();
// 	$namafilebaru .= '.';
// 	$namafilebaru .= $extgambar;

// 	move_uploaded_file($tmpName, '../../../img/'.$namafilebaru);

// 	return $namafilebaru;	
// }

function hapus_user($nim) {
	global $conn;

		// mysqli_query($conn, "DELETE FROM transaksi WHERE peminjam='$peminjam' AND buku='$buku'");
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim='$nim'");

	return mysqli_affected_rows($conn);
}

function read_profile($read) {
	global $conn;

	$result = mysqli_query($conn, $read);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	
	return $rows;
}

function ubah_profile($data, $nim) {
	global $conn;

	$nama = $data['nama'];
	$alamat = $data['alamat'];
	$no_hp = $data['no_hp'];
	$kd_fakultas = $data['kd_fakultas'];

	$gambarlama = $data['gambarlama'];

	if ($_FILES['gambar']['error'] == 4) {
		$gambar = $gambarlama;
	    $gambar = upload_gambar(2);
	}else{
		$gambar = upload_gambar(2);
	}

//	$gambar = upload_gambar();
	if ( !$gambar ) {
		return false;
	}

	$query = "UPDATE mahasiswa SET 
				gambar='$gambar', nama='$nama', 
				alamat='$alamat', no_hp='$no_hp', 
				kd_fakultas='$kd_fakultas'
			WHERE nim='$nim';
			";

	$result = mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// function admin_read_buku($read) {
// 	global $conn;

// 	$result = mysqli_query($conn, $read);
// 	$rows = [];
// 	while ( $row = mysqli_fetch_assoc($result) ) {
// 		$rows[] = $row;
// 	}
	
// 	return $rows;
// }


?>