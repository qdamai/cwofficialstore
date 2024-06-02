<?php
include "koneksi.php";
$sqlp = mysqli_query($koneksi,"SELECT * FROM tbl_barang");
$jmlm = 0;
while($rm = mysqli_fetch_array($sqlp)){
  $jmlm++;
}
$sql = mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
$jmll = 0;
while($rm = mysqli_fetch_array($sql)){
  $jmll++;
}
$sql = mysqli_query($koneksi,"SELECT * FROM tbl_konsumen");
$jmlt = 0;
while($rm = mysqli_fetch_array($sql)){
  $jmlt++;

}
$sql = mysqli_query($koneksi,"SELECT * FROM `tbl_transaksi` WHERE 1");
$jmlg = 0;
while($rm = mysqli_fetch_array($sql)){
  $jmlg++;
}
?>  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Dashboard
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
<!--           <div class="col-lg-12 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner" align="center">
                        <h3>SISTEM INFORMASI PEMASARAN SEKALIGUS MEDIA <br>PROMOSI PRODUK <br>“TEMPE MATAHARI KHAS JAWA” </h3>
                        
                        <p style="font-size: 20px;"><b>Welcome To Administrator </b></p>
                    </div>
                    <div class="icon">
                    </div>
                    <a href="#" class="small-box-footer"></a>
                </div>
            </div> -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                      <div class="inner">
                          <h3><?php echo "$jmlm" ?></h3>

                          <p>Data Pelanggan</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-bag"></i>
                      </div>
                      <a href="?page=data_pelanggan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                      <div class="inner">
                          <h3><?php echo "$jmll" ?><sup style="font-size: 20px"></sup></h3>

                          <p>Data Produk</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="?page=data_produk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                      <div class="inner">
                          <h3><?php echo "$jmlt" ?></h3>

                          <p>Data Ongkir</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-person-add"></i>
                      </div>
                      <a href="?page=data_ongkir" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                      <div class="inner">
                          <h3><?php echo "$jmlg" ?></h3>

                          <p>Data Pemesanan</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="?page=data_order" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
          </div>


      </section>
      <!-- /.content -->
  </div>