<?php
include 'koneksi.php';
$id = $_GET['id_kategori'];
echo $id;
$sqlhapus = mysqli_query($koneksi, "DELETE FROM `tbl_kategori` WHERE id_kategori='$id'");
if ($sqlhapus) {
    echo "<script>alert('data Berhasil Dihapus');</script>";
    echo "<script>location='index.php?page=data_kategori';</script>";
}
