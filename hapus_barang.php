<?php
	include 'koneksi.php';
	$id = $_GET['id_barang'];

	$sqlhapus = mysqli_query($koneksi,"DELETE FROM `tbl_barang` WHERE id_barang='$id'");
	if ($sqlhapus) {
		echo "<script>alert('data Berhasil Dihapus');</script>";
		echo "<script>location='index.php?page=data_barang';</script>";
	}
