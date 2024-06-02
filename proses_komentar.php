<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
include "koneksi.php";


    if ($_GET['act']=='insert') {
        if (isset($_POST['balas'])) {
            // ambil data hasil submit dari form
            $id_barang   = mysqli_real_escape_string($koneksi, trim($_POST['id_barang']));
            $id_konsumen = "0";
            $komentar    = mysqli_real_escape_string($koneksi, trim($_POST['komentar']));
            $status      = "y";
            $id_komentar = mysqli_real_escape_string($koneksi, trim($_POST['id_komentar']));

            // perintah query untuk menyimpan data ke tabel komentar
            $query = mysqli_query($koneksi, "INSERT INTO tbl_komentar(id_barang,id_konsumen,komentar,status,balas)
                                            VALUES('$id_barang','$id_konsumen','$komentar','$status','$id_komentar')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($koneksi));    

            // cek query
            if ($query) {
                // perintah query untuk mengubah data pada tabel komentar
                $query2 = mysqli_query($koneksi, "UPDATE tbl_komentar SET status       = '$status'
                                                                   WHERE id_komentar  = '$id_komentar'")
                                                or die('Ada kesalahan pada query update status : '.mysqli_error($koneksi));

                // cek query
                if ($query2) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: index.php?page=form_komentar&form=reply&id=$id_komentar");
                }
            }   
        }   
    }

    elseif ($_GET['act']=='update_status') {
        if (isset($_GET['id'])) {
            // ambil data hasil submit dari form
            $id_komentar = mysqli_real_escape_string($koneksi, trim($_GET['id']));
            $status      = "y";

            // perintah query untuk mengubah data pada tabel komentar
            $query = mysqli_query($koneksi, "UPDATE tbl_komentar SET status       = '$status'
                                                              WHERE id_komentar  = '$id_komentar'")
                                            or die('Ada kesalahan pada query update status : '.mysqli_error($koneksi));
            
            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location:index.php?page=data_komentar");
            }       
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_komentar = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel komentar
            $query = mysqli_query($koneksi, "DELETE FROM tbl_komentar WHERE id_komentar='$id_komentar'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($koneksi));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location:index.php?page=data_komentar");
            }
        }
    }            
?>