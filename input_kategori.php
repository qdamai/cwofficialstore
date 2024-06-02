 <div class="content-wrapper">
     <section class="content">
         <div class="row">
             <div class="col-md-12">
                 <div class="box box-info">
                     <div class="box-header with-border">
                         <h3 class="box-title">Input Kategori</h3>
                     </div>
                     <form class="form-horizontal" method="POST" action="">
                         <div class="box-body">
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>

                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" name="kota" placeholder="">
                                 </div>
                             </div>
                         </div>
                         <!-- /.box-body -->

                         <div class="modal-footer">
                             <a href="index.php?page=data_kategori" type="button" class="btn btn-warning pull-left"><i></i> Kembali</a>
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

    $kota = $_POST['kota'];

    $sqlkategori = mysqli_query($koneksi, "INSERT INTO `tbl_kategori`(`id_kategori`, `nama_kategori`) VALUES (null,'$kota')");
    if ($sqlkategori) {
        echo "<script>alert('Data Berhasil Ditambahkan');</script>";
        echo "<script>location='index.php?page=data_kategori';</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan');</script>";
        echo "<script>location='index.php?page=data_kategori';</script>";
    }
}
