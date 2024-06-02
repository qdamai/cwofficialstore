 <div class="content-wrapper">
     <section class="content">
         <div class="row">
             <div class="col-md-12">
                 <div class="box box-info">
                     <div class="box-header with-border">
                         <h3 class="box-title">Input Biaya Pengiriman</h3>
                     </div>
                                         <?php
                    include "koneksi.php";
                    $id = $_GET['id_biaya'];
                    $sqlubah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tbl_biaya_kirim` WHERE id_biaya='$id'"));
                    ?>
                     <form class="form-horizontal" method="POST" action="">
                         <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"> Provinsi :</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="provinsi">
                                    <option value="0">Pilih Provinsi :</option>
                                    <?php
                                    $tampilkat = mysqli_query($koneksi, "SELECT * FROM tbl_provinsi");
                                    while ($kat = mysqli_fetch_array($tampilkat)) { ?>
                                        <option value="<?php echo "$kat[id_provinsi]"; ?>"><?php echo $kat['nama_provinsi'] ?></option>
                                    <?php }  ?>
                                </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"> Kabupaten/Kota :</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="kabupaten">
                                    <option value="0">Pilih Kabupaten/Kota :</option>
                                    <?php
                                    $tampilkat = mysqli_query($koneksi, "SELECT * FROM tbl_kabkota");
                                    while ($kat = mysqli_fetch_array($tampilkat)) { ?>
                                        <option value="<?php echo "$kat[id_kabkota]"; ?>"><?php echo $kat['nama_kabkota'] ?></option>
                                    <?php }  ?>
                                </select>
                                </div>
                              </div>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Biaya</label>

                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" name="ongkir" value="<?= $sqlubah['biaya'] ?>" placeholder="Rp ....." onkeypress="return hanyaAngka(event)">
                                     <input type="hidden" class="form-control" name="id_biaya" value="<?= $sqlubah['id_biaya'] ?>">
                                 </div>
                             </div>
                         </div>
                         <!-- /.box-body -->

                         <div class="modal-footer">
                             <a href="index.php?page=data_ongkir" type="button" class="btn btn-warning pull-left"><i></i> Kembali</a>
                             <button type="submit" name="tambahongkir" class="btn btn-success"><i></i> Simpan</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </section>
 </div>
 <?php
include 'koneksi.php';
if (isset($_POST['tambahongkir'])) {
    session_start();
    $id_biaya = $_POST['id_biaya'];
    $provinsi = $_POST['provinsi'];
    $kabupaten = $_POST['kabupaten'];
    $ongkir = $_POST['ongkir'];



    $sqlsimpanproduk = mysqli_query($koneksi, "UPDATE `tbl_biaya_kirim` SET `provinsi`='$provinsi',`kabkota`='$kabupaten',`biaya`='$ongkir' WHERE `id_biaya`='$id_biaya'");
    if ($sqlsimpanproduk) {
        echo "<script>alert('Data Berhasil');</script>";
        echo "<script>location='index.php?page=data_ongkir';</script>";
    } else {
        echo "<script>alert('Data Gagal');</script>";
        echo "<script>location='index.php?page=data_ongkir';</script>";
    }
}