<?php
include 'koneksi.php';
$id = $_GET['id_biaya'];
echo $id;
$sqlhapus = mysqli_query($koneksi, "DELETE FROM `tbl_biaya_kirim` WHERE id_biaya='$id'");
if ($sqlhapus) {
    echo "<script>alert('data Berhasil Dihapus');</script>";
    echo "<script>location='index.php?page=data_ongkir';</script>";
}
