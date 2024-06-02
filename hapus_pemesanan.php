<?php
include 'koneksi.php';
$id = $_GET['idorder'];
echo $id;
$sqlhapus = mysqli_query($koneksi, "DELETE FROM `tbl_orders` WHERE idorder='$id'");
if ($sqlhapus) {
	echo "<script>alert('Batalkan pesanan berhasil');</script>";
	echo "<script>location='index.php?page=data_order';</script>";
}
