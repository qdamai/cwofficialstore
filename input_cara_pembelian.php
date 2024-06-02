
  <div class="content-wrapper">
    <section class="content">
      <form action="" method="post" enctype="multipart/form-data">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tentang Kami</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
                 <?php
          include 'koneksi.php';
          $id = $_GET['id_informasi'];
          $sqlubah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tbl_informasi` WHERE id_informasi='$id'"));
          ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Judul :</label>
                <input type="text" class="form-control" value="<?= $sqlubah['judul'] ?>" name="nama" placeholder="" >
                <input type="hidden" class="form-control" value="<?= $sqlubah['id_informasi'] ?>" name="id_informasi" placeholder="" >
                
              </div>
              <!-- /.form-group -->              
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Keterangan :
                  </h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                  <form>
                        <textarea id="editor1" name="deskripsi" rows="10" cols="80">
                                  <?= $sqlubah['keterangan'] ?>             
                        </textarea>
                  </form>
                </div>
              </div>
          </div>
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-info pull-right btn-sm">Simpan</button>
            </div>
      </div>
  </form>
  </section>
</div>
<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    session_start();
    $id_informasi = $_POST['id_informasi'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];


    $sqlsimpanproduk = mysqli_query($koneksi, "UPDATE `tbl_informasi` SET `judul`='$nama',`keterangan`='$deskripsi' WHERE `id_informasi`='$id_informasi'");
    if ($sqlsimpanproduk) {
        echo "<script>alert('Data Berhasil');</script>";
        echo "<script>location='index.php?page=data_cara_pembelian';</script>";
    } else {
        echo "<script>alert('Data Gagal');</script>";
        echo "<script>location='index.php?page=data_cara_pembelian';</script>";
    }
}





