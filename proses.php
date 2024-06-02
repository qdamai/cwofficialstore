<?php
include 'koneksi.php';

    if ($_GET['act']=='terima') {
        if (isset($_GET['bayar'])) {
            // ambil data hasil submit dari form
            $id_bayar     = mysqli_real_escape_string($koneksi, trim($_GET['bayar']));
            $id_transaksi = mysqli_real_escape_string($koneksi, trim($_GET['transaksi']));
            $id_barang    = mysqli_real_escape_string($koneksi, trim($_GET['barang']));
            $terjual      = mysqli_real_escape_string($koneksi, trim($_GET['terjual'])) + mysqli_real_escape_string($koneksi, trim($_GET['jumlah']));
            
            $status_bayar = 'Pembayaran Diterima';
            $status       = 'Proses Pengiriman';

            // perintah query untuk mengubah data pada tabel pembayaran
            $query = mysqli_query($koneksi, "UPDATE tbl_pembayaran SET status_bayar  = '$status_bayar'
                                                                WHERE id_bayar      = '$id_bayar'")
                                                        or die('Ada kesalahan pada query update : '.mysqli_error($koneksi));

            // cek query
            if ($query) {
                // perintah query untuk mengubah data pada tabel transaksi
                $query1 = mysqli_query($koneksi, "UPDATE tbl_transaksi SET status        = '$status'
                                                                    WHERE id_transaksi  = '$id_transaksi'")
                                                            or die('Ada kesalahan pada query update : '.mysqli_error($koneksi));

                if ($query1) {
                    // perintah query untuk mengubah data pada tabel transaksi
                    $query2 = mysqli_query($koneksi, "UPDATE tbl_barang SET terjual   = '$terjual'
                                                                     WHERE id_barang = '$id_barang'")
                                                                or die('Ada kesalahan pada query update : '.mysqli_error($koneksi));

                    if ($query2) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: index.php?page=data_konfirmasi");
                    }   
                } 
            }       
        }
    }

    elseif ($_GET['act']=='tolak') {
        if (isset($_GET['bayar'])) {
            // ambil data hasil submit dari form
            $id_bayar     = mysqli_real_escape_string($koneksi, trim($_GET['bayar']));
            $id_transaksi = mysqli_real_escape_string($koneksi, trim($_GET['transaksi']));
            
            $status       = 'Pembayaran Ditolak';

            // perintah query untuk mengubah data pada tabel pembayaran
            $query = mysqli_query($koneksi, "UPDATE tbl_pembayaran SET status_bayar  = '$status'
                                                                WHERE id_bayar      = '$id_bayar'")
                                                        or die('Ada kesalahan pada query update : '.mysqli_error($koneksi));

            // cek query
            if ($query) {
                // perintah query untuk mengubah data pada tabel transaksi
                $query1 = mysqli_query($koneksi, "UPDATE tbl_transaksi SET status        = '$status'
                                                                    WHERE id_transaksi  = '$id_transaksi'")
                                                            or die('Ada kesalahan pada query update : '.mysqli_error($koneksi));

                if ($query1) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: index.php?page=data_konfirmasi");
                } 
            }       
        }
    }              
?>