<?php
include 'koneksi.php';
include 'tglindo.php';
$idorder = $_GET['idorder'];
$sql = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tbl_orders` JOIN `tbl_anggota` USING (idanggota) JOIN `tbl_kota` USING (idkota) WHERE idorder='$idorder'"));
?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-book"></i> Detail Order
              <small class="pull-right">Tanggal: <?= TanggalIndo($sql['tglorder']) ?></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <h4>
              No Order : <b><?= $sql['idorder'] ?></b><br>
              Nama : <?= $sql['namalengkapanggota'] ?><br>
              Alamat : <?= $sql['alamatanggota'] ?><br>
            </h4>
          </div>
          <!-- /.col -->
          <div class="col-sm-8 invoice-col">
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Jumlah Beli</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;

                $sqlorder = mysqli_query($koneksi, "SELECT * FROM `tbl_orderdetail` JOIN `tbl_produk` ON tbl_orderdetail.idproduk = tbl_produk.idproduk WHERE idorder = '$idorder'");
                while ($b = mysqli_fetch_array($sqlorder)) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b['namaproduk'] ?></td>
                    <td>Rp. <?= number_format($b['hargaproduk'],2) ?></td>
                    <td><?= $b['jumlahbeli'] ?></td>
                    <td>Rp. <?= number_format($b['subtotal'],2) ?></td>
                  </tr>
                <?php }  ?>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-6">
          </div>
          <!-- /.col -->
          <div class="col-xs-6">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <th style="width:55%">Total :</th>
                    <?php
                    $j = mysqli_query($koneksi, "SELECT SUM(subtotal) AS total FROM `tbl_orderdetail` WHERE idorder='$idorder'");
                    $jml = mysqli_fetch_array($j);
                    $jmlc = $jml['total'];
                    ?>
                    <td>Rp <?= number_format($jmlc,2)  ?></td>
                  </tr>
                  <tr>
                    <th>Ongkos Kirim :</th>
                    <td>Rp. <?= number_format($sql['ongkir'],2) ?></td>
                  </tr>
                  <tr>
                    <th>Total Bayar :</th>
                    <td>Rp. <?= number_format($sql['total'],2) ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <a href="index.php?page=data_order" class="btn btn-danger"><i></i> Kembali</a>
      </section>
    </div>
  </section>
</div>