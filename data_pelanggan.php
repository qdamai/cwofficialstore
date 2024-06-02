<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Konsumen
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
                                    <th>No</th>
                                    <th>Kode Konsumen</th>
                                    <th>Nama Konsumen</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Email</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";
                                $sqlt = mysqli_query($koneksi, "SELECT * FROM `tbl_konsumen` WHERE 1");
                                $no = 1;
                                while ($dat = mysqli_fetch_array($sqlt)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>P00<?= $dat['id_konsumen']; ?></td>
                                        <td><?= $dat['nama_konsumen']; ?></td>
                                        <td><?= $dat['alamat']; ?></td>
                                        <td><?= $dat['telepon']; ?></td>
                                        <td><?= $dat['email']; ?></td>
                                        <td><?= $dat['tanggal_daftar']; ?></td>
                                        <td>
                                            <a href="index.php?page=ubah_anggota&id_konsumen=<?= $dat['id_konsumen'] ?>"><i class="fa fa-edit btn btn-warning"></i></a>
                                            <a onclick="return confirm('Yakin ingin menghapus data ?');" href="hapus_anggota.php?id_konsumen=<?= $dat['id_konsumen'] ?>"><i class="fa fa-trash-o btn btn-danger"></i></a>
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