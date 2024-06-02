<?php
include 'koneksi.php';
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];

	$sqlcek = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' AND level='$level' ");
	if ($sqlcek->num_rows > 0) {
		$r = mysqli_fetch_assoc($sqlcek);	
	 	session_start();
		$_SESSION['idadmin'] = $r['id_admin'];
 		$_SESSION['namalengkap'] = $r['nama_admin'];
 		$_SESSION['level'] = $r['level'];
		echo "<script>location='index.php';</script>";
		die();
	}
	else {
		echo "<script>alert('Login Gagal. Username / Password Salah');</script>";
		echo "<script>location='index.php';</script>";
	}
}
