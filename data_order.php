<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Daftar Pesanan
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
                                    <th>No.</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Konsumen</th>
                                    <th>Jumlah</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                            include 'koneksi.php';
                            include 'tglindo.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi as a INNER JOIN tbl_konsumen as b
                                                            ON a.id_konsumen=b.id_konsumen
                                                            ORDER BY a.id_transaksi DESC")
                                                            or die('Ada kesalahan pada query transaksi: '.mysqli_error($koneksi));
                      
                            while ($data = mysqli_fetch_assoc($query)) { 

                                $query1 = mysqli_query($koneksi, "SELECT COUNT(id_detail) as jumlah FROM tbl_transaksi_detail
                                                            WHERE id_transaksi='$data[id_transaksi]'")
                                                            or die('Ada kesalahan pada query detail: '.mysqli_error($koneksi));
                      
                                $data1 = mysqli_fetch_assoc($query1);
                            ?>
                                <tr>
                                    <td width="40" class="center"><?php echo $no; ?></td>
                                    <td width="100" class="center"><?php echo TanggalIndo($data['tanggal_transaksi']); ?></td>
                                    <td width="150"><?php echo $data['nama_konsumen']; ?></td>
                                    <td width="70" class="center"><?php echo $data1['jumlah']; ?> barang</td>
                                    <td width="100" align="right">Rp. <?php echo number_format($data['total_bayar'],2); ?></td>
                                    <td width="150"><?php echo $data['status']; ?></td>

                                    <td width="60" class="center">
                                        <div class="action-buttons">
                                            <a data-rel="tooltip" data-placement="top" title="Detail" class="blue tooltip-info" href="?page=detail_pesanan&form=detail&id=<?php echo $data['id_transaksi']; ?>&id_konsumen=<?php echo $data['id_konsumen']; ?>">
                                               <i class="fa fa-eye btn btn-success btn-sm">  Detail Pesanan </i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>