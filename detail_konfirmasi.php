  <?php  
// fungsi untuk pengecekan tampilan form
// jika form detail data yang dipilih
if ($_GET['form']=='detail') { 
  $query = mysqli_query($koneksi, "SELECT a.id_bayar,a.tanggal_bayar,a.id_transaksi,a.rekening_asal,a.no_rekening_asal,a.pemilik_rekening,a.rekening_tujuan,a.jumlah_bayar,a.bukti_bayar,a.status_bayar,
                                    b.id_transaksi,b.tanggal_transaksi,b.id_konsumen,b.total_bayar,
                                    c.id_konsumen,c.nama_konsumen
                                    FROM tbl_pembayaran as a INNER JOIN tbl_transaksi as b INNER JOIN tbl_konsumen as c
                                    ON a.id_transaksi=b.id_transaksi AND b.id_konsumen=c.id_konsumen
                                    WHERE a.id_bayar='$_GET[id]'")
                                    or die('Ada kesalahan pada query tampil data konfirmasi: '.mysqli_error($koneksi));

    $data = mysqli_fetch_assoc($query);

  $id_bayar          = $data['id_bayar'];
  
  
  $id_transaksi      = $data['id_transaksi'];
  
  
  $total_bayar       = $data['total_bayar'];
  
  $rekening_asal     = $data['rekening_asal'];
  $no_rekening_asal  = $data['no_rekening_asal'];
  $pemilik_rekening  = $data['pemilik_rekening'];
  $rekening_tujuan   = $data['rekening_tujuan'];
  $jumlah_bayar      = $data['jumlah_bayar'];
  $bukti_bayar       = $data['bukti_bayar'];
  $status_bayar      = $data['status_bayar'];
  $id_konsumen       = $data['id_konsumen'];
  $nama_konsumen     = $data['nama_konsumen'];
?>
  <div class="content-wrapper">
    <section class="content-header">
        <h1>
            Konfirmasi Pembayaran
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row"> <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <div class="box">
                      <span class="profile-picture">
                      <img class="editable img-responsive" alt="Bukti Pembayaran" id="avatar2" src="../images/konfirmasi/<?php echo $bukti_bayar; ?>" width="365" />
                      </span>
                    </div>
                  </div>

                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">Nama Konsumen</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?php echo $nama_konsumen; ?></p>
                    </div>
                  </div>                  
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">Tanggal Transaksi</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?php echo $data['tanggal_bayar']; ?></p>
                    </div>
                  </div>                  
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">Total Yang Harus Di Bayarkan</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: Rp. <?php echo number_format($total_bayar); ?></p>
                    </div>
                  </div>                  
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">Tanggal Bayar</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?php echo $data['tanggal_bayar']; ?></p>
                    </div>
                  </div> <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">Rekening Asal</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?php echo $rekening_asal; ?></p>
                    </div>
                  </div>                  
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">No Rekening Asal</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?php echo $no_rekening_asal; ?></p>
                    </div>
                  </div>                  
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">Pemilik Rekening</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?php echo $pemilik_rekening; ?></p>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">Rekening Tujuan</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?php echo $rekening_tujuan; ?></p>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">Jumlah Pembayaran</label>
                    </div>
                    <div class="col-sm-9">
                      <p>: Rp. <?php echo number_format($jumlah_bayar); ?></p>
                    </div>
                  </div>
                   <div class="modal-body">
                    <div class="col-sm-3">
                      <label for="">Status </label>
                    </div>
                    <div class="col-sm-9">
                      <p>: <?php echo $status_bayar; ?></p>
                    </div>
                  </div>
                    <div class="clearfix form-actions">
                      <div class="class=col-md-12">
                      <?php  
                      if ($status_bayar=='Menunggu Verifikasi Pembayaran') { 
                        $query1 = mysqli_query($koneksi, "SELECT COUNT(id_detail) as jumlah FROM tbl_transaksi_detail
                                                                    WHERE id_transaksi='$id_transaksi'")
                                                                    or die('Ada kesalahan pada query detail: '.mysqli_error($koneksi));
                                  
                                    $data1 = mysqli_fetch_assoc($query1);
                                    $jumlah = $data1['jumlah'];

                                    $query2 = mysqli_query($koneksi, "SELECT a.id_transaksi,a.id_barang,b.id_barang,b.stok,b.terjual FROM tbl_transaksi_detail as a INNER JOIN tbl_barang as b
                                          ON a.id_barang=b.id_barang
                                          WHERE a.id_transaksi='$id_transaksi'")
                                          or die('Ada kesalahan pada query tampil data barang: '.mysqli_error($koneksi));
                        $data2     = mysqli_fetch_assoc($query2);
                        $id_barang = $data2['id_barang'];
                        $stok      = $data2['stok'];
                        $terjual   = $data2['terjual'];
                      ?>
 
                        <a style="width:100px" href="proses.php?act=terima&bayar=<?php echo $id_bayar; ?>&transaksi=<?php echo $id_transaksi; ?>&jumlah=<?php echo $jumlah; ?>&barang=<?php echo $id_barang; ?>&stok=<?php echo $stok; ?>&terjual=<?php echo $terjual; ?>" class="btn btn-primary">Terima</a>
                        &nbsp; &nbsp;
                        <a style="width:100px" href="proses.php?act=tolak&bayar=<?php echo $id_bayar; ?>&transaksi=<?php echo $id_transaksi; ?>" class="btn btn-danger">Tolak</a>
                        &nbsp; &nbsp;
                      <?php
                      }
                      ?>
                        <a style="width:100px" href="?module=konfirmasi" class="btn btn-danger btn-sm">Kembali</a>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
}
?>
