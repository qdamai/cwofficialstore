
  <div class="content-wrapper">
    <section class="content">
        <?php
        include "koneksi.php";
        $id = $_GET['id_barang'];
        $sqlubah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tbl_barang` WHERE id_barang='$id'"));
        ?>
      <form action="" method="post" enctype="multipart/form-data">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Input Barang</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
       
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Nama Barang :</label>
                <input type="hidden" class="form-control" value="<?= $sqlubah['id_barang'] ?>" name="id_barang" placeholder="" > 
                 <input type="text" class="form-control" value="<?= $sqlubah['nama_barang'] ?>" name="nama_barang" placeholder="" >
                
              </div>
              <!-- /.form-group -->              
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Deskripsi :
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
                                      <?= $sqlubah['deskripsi'] ?>         
                        </textarea>
                  </form>
                </div>
              </div>
          </div>
            </div>



            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal :</label>
                        <input type="date" class="form-control" value="<?= $sqlubah['tanggal_masuk'] ?>" name="tanggal" placeholder="" >
                </div>
              <!-- /.form-group -->
            <div class="form-group">
                <label> Kategori :</label>
                <select class="form-control" name="kategori">
                    <option value="0">Pilih Kategori :</option>
                    <?php
                    $tampilkat = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                    while ($kat = mysqli_fetch_array($tampilkat)) { ?>
                        <option value="<?php echo "$kat[id_kategori]"; ?>"><?php echo $kat['nama_kategori'] ?></option>
                    <?php }  ?>
                </select>
              </div>
                <div class="form-group">
                    <label>Harga (Rp.) :</label>
                    <input type="number" class="form-control" value="<?= $sqlubah['harga'] ?>" name="harga" placeholder="" >
                </div>              <!-- /.form-group -->
                <div class="form-group">
                    <label>Stok :</label>
                    <input type="text" class="form-control"  value="<?= $sqlubah['stok'] ?>" name="stok" placeholder="" >
                </div>              <!-- /.form-group -->
                <div class="form-group">
                    <label>Gambar :</label>
                    <input type="file" class="form-control"  value="" name="gambar" placeholder="" >
                     <p>  <?= $sqlubah['gambar'] ?>  </p>
                    <p style="color:red">* Ukuran MAX 1 MB</p>
                </div>
            </div>
            <!-- /.col -->
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
    $id_barang = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $foto = $_FILES['gambar']['name'];



    $x = explode('.', $foto);
    $file_tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($file_tmp, 'dist/img/' . $foto);



    $sqlsimpanproduk = mysqli_query($koneksi, "UPDATE `tbl_barang` SET `id_kategori`='$kategori',`tanggal_masuk`='$tanggal',`nama_barang`='$nama',`deskripsi`='$deskripsi',`harga`='$harga',`stok`='$stok',`gambar`='$foto' WHERE `id_barang`='$id_barang'");
    if ($sqlsimpanproduk) {
        echo "<script>alert('Data Berhasil');</script>";
        echo "<script>location='index.php?page=data_barang';</script>";
    } else {
        echo "<script>alert('Data Gagal');</script>";
        echo "<script>location='index.php?page=data_barang';</script>";
    }
}



