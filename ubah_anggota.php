<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data Konsumen</h3>
          </div>
          <?php
          include 'koneksi.php';
          $id = $_GET['id_konsumen'];
          $sqlubah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tbl_konsumen` WHERE id_konsumen='$id'"));
          ?>
          <form class="form-horizontal" method="POST" action="">
            <div class="box-body">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nama </label>
                <div class="col-sm-10">
                  <input type="hidden" class="form-control" name="id_konsumen" value="<?= $sqlubah['id_konsumen'] ?>">
                  <input type="text" class="form-control" name="nama" value="<?= $sqlubah['nama_konsumen'] ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat" value="<?= $sqlubah['alamat'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">No Telepon </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="no" value="<?= $sqlubah['telepon'] ?>">
                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" value="<?= $sqlubah['email'] ?>">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="index.php?page=data_pelanggan" type="button" class="btn btn-warning pull-left"><i></i> Kembali</a>
              <button type="submit" name="ubahanggota" class="btn btn-info pull-right"><i></i> Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
if (isset($_POST['ubahanggota'])) {
    $id_konsumen = $_POST['id_konsumen'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $email = $_POST['email'];

    $sqlupdateanggota = mysqli_query($koneksi, "UPDATE `tbl_konsumen` SET `nama_konsumen`='$nama',`alamat`='$alamat',`telepon`='$no',`email`='$email' WHERE  `id_konsumen`='$id_konsumen'");
    if ($sqlupdateanggota) {
        echo "<script>alert('data Berhasil Diubah');</script>";
        echo "<script>location='index.php?page=data_pelanggan';</script>";
    } else {
        echo "<script>alert('data Gagal Diubah');</script>";
        echo "<script>window.history.go(-1);</script>";
    }
  }