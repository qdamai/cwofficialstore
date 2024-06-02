<?php
include 'koneksi.php';
if (isset($_POST['updatestattus'])) {
   $idorder = $_POST['idorder'];
   $sqlupdate = mysqli_query($koneksi, "UPDATE `tbl_orders` SET `statusorder`='Proses Pengiriman' WHERE idorder='$idorder'");
   if ($sqlupdate) {
      echo "<script>alert('Konfirmasi Diubah');</script>";
      echo "<script>location='index.php?page=data_order';</script>";
   } else {
      echo "<script>alert('Konfirmasi Tidak Bisa Diubah');</script>";
      echo "<script>location='index.php?page=data_order';</script>";
   }
}
