<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Data Ongkir</h3>
                    </div>
                    <?php
                    include "koneksi.php";
                    $id = $_GET['id_kategori'];
                    $sqlubah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tbl_kategori` WHERE id_kategori='$id'"));
                    ?>
                    <form class="form-horizontal" method="POST" action="">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="id_kategori" value="<?= $sqlubah['id_kategori'] ?>">
                                    <input type="text" class="form-control" name="nama" value="<?= $sqlubah['nama_kategori'] ?>">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="index.php?page=data_kategori" type="button" class="btn btn-danger pull-left"><i class="fa fa-arrow-left"></i> BACK</a>
                            <button type="submit" name="ubahongkir" class="btn btn-info pull-right"><i class="fa fa-check"></i> UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

 <?php
include 'koneksi.php';
if (isset($_POST['ubahongkir'])) {

    $id_kategori = $_POST['id_kategori'];
    $nama = $_POST['nama'];

    $sqlkategori = mysqli_query($koneksi, "UPDATE `tbl_kategori` SET `nama_kategori`='$nama' WHERE `id_kategori`='$id_kategori'");
    if ($sqlkategori) {
        echo "<script>alert('Data Berhasil Ditambahkan');</script>";
        echo "<script>location='index.php?page=data_kategori';</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan');</script>";
        echo "<script>location='index.php?page=data_kategori';</script>";
    }
}
