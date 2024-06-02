<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Tentang Kami
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5px">No</th>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";
                                $no = 1;
                                $a = mysqli_query($koneksi, "SELECT * FROM `tbl_informasi` where id_informasi='2'");
                                while ($tampilkota = mysqli_fetch_array($a)) {
                                    ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $tampilkota['judul'] ?></td>
                                        <td><?= $tampilkota['keterangan'] ?></td>

                                        <td>
                                            <a href="index.php?page=input_cara_pembelian&id_informasi=<?= $tampilkota['id_informasi'] ?>"><i class="fa fa-edit btn btn-warning"></i></a>
                                           
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