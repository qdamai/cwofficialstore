



<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Barang
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        <a href="?page=input_barang" class="btn btn-success"><i class="fa fa-plus"> Input Barang Masuk</i></a>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Gambar Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga </th>
                                    <th>Stok </th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";
                                $sqlt = mysqli_query($koneksi, "SELECT * FROM `tbl_barang` WHERE id_barang");
                                $no = 1;
                                while ($dat = mysqli_fetch_array($sqlt)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>B00-<?= $dat['id_barang']; ?></td>
                                        <td><img src="../images/barang/<?php echo $dat['gambar']; ?>" width="120"></td>
                                        <td><?= $dat['nama_barang']; ?></td>
                                        <td><?= number_format($dat['harga'],2) ?></td>
                                        <td><?= $dat['stok']; ?></td>
                                        <td><?= $dat['deskripsi']; ?></td>
                                        <td>
                                            <a href="index.php?page=ubah_barang&id_barang=<?= $dat['id_barang'] ?>"><i class="fa fa-edit btn btn-warning"></i></a>
                                            <a onclick="return confirm('Yakin ingin menghapus data ?');" href="hapus_barang.php?id_barang=<?= $dat['id_barang'] ?>"><i class="fa fa-trash-o btn btn-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>