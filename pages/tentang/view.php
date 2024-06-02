<?php
// fungsi query untuk menampilkan data dari tabel tantang tpi
$query = mysqli_query($mysqli, "SELECT * FROM tbl_informasi WHERE id_informasi='1'")
                                or die('Ada kesalahan pada query tampil data informasi : '.mysqli_error($mysqli));

$data = mysqli_fetch_assoc($query);
?>
<!-- Page Heading/Breadcrumbs -->
<style type="text/css">
    <!--
    .style1 {
        font-family: Arial, Helvetica, sans-serif
    }
    -->
</style>

<link href="/OneDrive/Damai Puti Afifah/SEMESTER 2/DESIGN WEB/Simple Website - CodingLab/style.css" rel="stylesheet"
    type="text/css" />
<p class="style1">&nbsp;</p>
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <h3 align="center" class="page-header"><strong>Tentang Kami</strong> </h3>
            </div>
        </div>


        <object data="images\tentangkami.svg"" width='1093' height='606'>
          <embed src=" images\tentangkami.svg" width="1093" height="700"> </embed>
        </object>
		
		
		
		
		
        <div class="row"><div class="col-lg-12"><div style="padding: 0 10px;text-align:justify"><br>
                    <p align="center" class="style1" style="margin-bottom:5px;font-size:20px">&nbsp;<strong>CW OFFICIAL
                            STORE</strong></p>
                    <p align="center" class="style1" style="margin-bottom:5px;font-size:20px"><strong> Toko Berkualitas
                            untuk Produk Kecantikan Anda!</strong>&nbsp;</p>
                    <p align="center" class="style1" style="margin-bottom:5px;font-size:20px">&nbsp;</p>
          <div>
            <p align="left" class="style1" style="margin-bottom:5px;font-size:20px">Semua orang berhak
                        mendapatkan kulit yang sehat, baik dari dalam maupun dari luar. &quot;CW Official Store &quot;
              di bangun pada tahun 2021,                  bukan hanya soal hasil yang cepat dan efektif, kami juga mengutamakan keamanan kulit anda dalam
              jangka panjang, &quot;CW Official Store &quot; akan memberikan solusi terbaik untuk anda. Kami
                        tidak hanya memberikan hasil yang efektif dan tepat, namun juga aman dan lembut, bahkan untuk
              orang dengan kulit sensitif. </p>
            <p align="left" class="style1" style="margin-bottom:5px;font-size:20px">&nbsp;</p>
          </div>
                    <div>
                      <p align="left" class="style1" style="margin-bottom:5px;font-size:20px">Dalam perjalanan mencari
                        produk yang sempurna,<strong> CW Official Store</strong>&nbsp;adalah tujuan yang tak boleh
                        dilewatkan. Dengan berbagai pilihan produk berkualitas, toko ini memanjakan Anda dengan gaya dan
                        kenyamanan.</p>
                    </div>
                    <p align="left" class="style1" style="margin-bottom:5px;font-size:20px">&nbsp;</p>
                    <div style="margin-bottom: 5px">
                      <h3><span class="page-header">Kami hadir di platform Shopee, sebagai : </span></h3>
                    </div>
                    <p align="left" class="style1" style="margin-bottom:5px;font-size:20px">
                      <object data="images\shopee.png"" width='1291' height='191'>
                        <embed src="images\shopee.png" width="1291" height="191"> </embed>
                      </object>
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="form1" name="form1" method="post" action="">
                              <h3 align="center" class="page-header">Produk Terlaris: </h3>
                                    <p align="center" class="page-header">&nbsp;</p>
                                    <div class="row">
                                      <?php
                /* Pagination */
                $batas = 12;

                $jumlah_record = mysqli_query($mysqli, "SELECT * FROM tbl_barang")
                                                        or die('Ada kesalahan pada query jumlah_record: '.mysqli_error($mysqli));

                $jumlah  = mysqli_num_rows($jumlah_record);
                $halaman = ceil($jumlah / $batas);
                $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
                $mulai   = ($page - 1) * $batas;
                /*-------------------------------------------------------------------*/

                // fungsi query untuk menampilkan data dari tabel barang
                $query = mysqli_query($mysqli, "SELECT * FROM tbl_barang ORDER BY terjual DESC LIMIT $mulai, $batas")
                                                or die('Ada kesalahan pada query tampil data barang terlaris : '.mysqli_error($mysqli));

                while($data = mysqli_fetch_assoc($query)) {
                ?>
                                      <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail"> <a href="?page=detail&amp;produk=<?php echo $data['id_barang']; ?>"> <img style="height:200px" src="images/barang/<?php echo $data['gambar']; ?>" alt="Produk Terlaris" /> </a>
                                            <div style="border-top:1px solid #eee;margin-top:10px" class="caption">
                                              <h4 style="font-size:17px"><?php echo $data['nama_barang']; ?></h4>
                                              <p>Rp. <?php echo format_rupiah_nol($data['harga']); ?></p>
                                              <p>
                                                <?php  
                                if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])) { ?>
                                                <a style="width:70px" href="javascript:void(0);" onclick="alert('Anda harus login terlebih dahulu!');" class="btn btn-primary" role="button"> <i class="fa fa-shopping-cart"></i> Beli </a>
                                                <?php
                                }
                                // jika user sudah login, maka jalankan perintah untuk ubah password
                                else { ?>
                                                <a style="width:70px" href="?page=beli&amp;produk=<?php echo $data['id_barang']; ?>" class="btn btn-primary" role="button"> <i class="fa fa-shopping-cart"></i> Beli </a>
                                                <?php  
                                }
                                ?>
                                              <a style="width:80px" href="?page=detail&amp;produk=<?php echo $data['id_barang']; ?>" class="btn btn-default" role="button"><i class="fa fa-eye"></i> Detail</a> </p>
                                            </div>
                                        </div>
                                      </div>
                                      <?php  
                }

                if (empty($_GET['hal'])) {
                    $halaman_aktif = '1';
                } else {
                    $halaman_aktif = $_GET['hal'];
                }
                ?>
                                    </div>
                                    <p align="center" class="page-header">&nbsp;</p>
                                    <div align="center"><a href="?page=terbaru"><strong>
                                                <button type="button" style="font-size: 12px;"
                                                    class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#sampleUpdate<?php echo $d['kode']; ?>">Produk
                                                    Lainnya </button>
                                            </strong></a></div>
                            </form>
                        </div>
                    </div>
                    <p align="left" class="style1" style="margin-bottom:5px;font-size:20px">&nbsp;</p>
                    <p class="style1" style="margin-bottom:5px;font-size:20px">&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

