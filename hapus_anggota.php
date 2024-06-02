<?php
	include 'koneksi.php';
	$id = $_GET['id_konsumen'];
	echo $id;
	$sqlhapus = mysqli_query($koneksi,"DELETE FROM `tbl_konsumen` WHERE id_konsumen='$id'");
	if ($sqlhapus) {
		echo "<script>alert('data Berhasil Dihapus');</script>";
		echo "<script>location='index.php?page=data_pelanggan';</script>";
	}
