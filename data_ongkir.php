<div class="content-wrapper">
    <section class="content-header">
        <h1>
             Biaya Pengiriman
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a href="?page=input_ongkir" class="btn btn-success"><i class="fa fa-plus"> Input Biaya Pengiriman</i></a>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5px">No</th>
                                    <th>Kabupaten / Kota</th>
                                    <th>Biaya Pengiriman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";
                                $no = 1;
                                $a = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim join tbl_kabkota on tbl_biaya_kirim.kabkota=tbl_kabkota.id_kabkota");
                                while ($tampilkota = mysqli_fetch_array($a)) {
                                    ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $tampilkota['nama_kabkota'] ?></td>
                                        <td>Rp. <?= number_format($tampilkota['biaya'],2) ?></td>

                                        <td>
                                            <a href="index.php?page=ubah_ongkir&id_biaya=<?= $tampilkota['id_biaya'] ?>"><i class="fa fa-edit btn btn-warning"></i></a>
                                            <a onclick="return confirm('Yakin ingin menghapus data ?');" href="hapus_ongkir.php?id_biaya=<?= $tampilkota['id_biaya'] ?>"><i class="fa fa-trash-o btn btn-danger"></i></a>
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