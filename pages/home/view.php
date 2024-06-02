<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-md-3">

        <!-- panggil file "sidebar-kanan.php" untuk menampilkan menu -->
        <!--  <?php include "sidebar-kiri-home.php" ?> -->

    </div>

    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <br>


                            <object data="images\cwofficial1.svg" width='1093' height='606'>
                                <embed src="images\cwofficial1.svg" width="1093" height="700">
                                </embed>
                            </object> <br> <br> <br>
                            <object data="images\cwofficial2.svg" width='1093' height='606'>
                                <embed src="images\cwofficial2.svg" width="1093" height="700">
                                </embed>
                            </object> <br> <br> <br>
                            <object data="images\cwofficial3.svg" width='1093' height='606'>
                                <embed src="images\cwofficial3.svg" width="1093" height="700">
                                </embed>
                            </object> <br> <br> <br>
                            <object data="images\cwofficial4.svg" width='1093' height='606'>
                                <embed src="images\cwofficial4.svg" width="1093" height="700">
                                </embed>
                            </object>
                            <object data="images\cwofficial5.svg" width='1093' height='606'>
                                <embed src="images\cwofficial5.svg" width="1093" height="700">
                                </embed>
                            </object>

                            <br> <br> <br>




                            <div class="row">
                                <?php
                error_reporting(0);
                // fungsi query untuk menampilkan data dari tabel barang
                $query = mysqli_query($mysqli, "SELECT * FROM tbl_barang ORDER BY id_barang DESC LIMIT 12")
                                                or die('Ada kesalahan pada query tampil data barang baru : '.mysqli_error($mysqli));
                

                while($data = mysqli_fetch_assoc($query)) {
                $sql =mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(*) as jml , sum(rating) as jml_beli from tbl_komentar tk, tbl_barang tb WHERE tk.id_barang=tb.id_barang AND tb.id_barang='$data[id_barang]'"));

                $bintang=round($sql['jml_beli']/$sql['jml']);
                ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <a href="?page=detail&produk=<?php echo $data['id_barang']; ?>">
                                            <img style="height:200px" src="images/barang/<?php echo $data['gambar']; ?>"
                                                alt="Produk Terlaris">
                                        </a>
                                        <div style="border-top:1px solid #eee;margin-top:10px" class="caption">
                                            <h4 style="font-size:17px"><?php echo $data['nama_barang']; ?></h4>
                                            <p>Rp. <?php echo format_rupiah_nol($data['harga']); ?></p>
                                            <p>
                                                <?php  
                                if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])) { ?>
                                                <a style="width:70px" href="javascript:void(0);"
                                                    onclick="alert('Anda harus login terlebih dahulu!');"
                                                    class="btn btn-danger    " role="button">
                                                    Pesan
                                                </a>
                                                <?php
                                }
                                // jika user sudah login, maka jalankan perintah untuk ubah password
                                else { ?>
                                                <a style="width:70px"
                                                    href="?page=beli&produk=<?php echo $data['id_barang']; ?>"
                                                    class="btn btn-danger  " role="button">
                                                    Pesan
                                                </a>
                                                <?php  
                                }
                                ?>
                                                <a style="width:80px"
                                                    href="?page=detail&produk=<?php echo $data['id_barang']; ?>"
                                                    class="btn btn-warning" role="button"> Detail</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php  
                }
                ?>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
            <!-- /.row -->