<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kategori
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a href="?page=input_kategori" class="btn btn-success"><i class="fa fa-plus"> Input Kategori</i></a>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5px">No</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";
                                $no = 1;
                                $a = mysqli_query($koneksi, "SELECT * FROM `tbl_kategori`");
                                while ($tampilkota = mysqli_fetch_array($a)) {
                                    ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>K0<?= $tampilkota['id_kategori'] ?></td>
                                        <td><?= $tampilkota['nama_kategori'] ?></td>

                                        <td>
                                            <a href="index.php?page=ubah_kategori&id_kategori=<?= $tampilkota['id_kategori'] ?>"><i class="fa fa-edit btn btn-warning"></i></a>
                                            <a onclick="return confirm('Yakin ingin menghapus data ?');" href="hapus_kategori.php?id_kategori=<?= $tampilkota['id_kategori'] ?>"><i class="fa fa-trash-o btn btn-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>