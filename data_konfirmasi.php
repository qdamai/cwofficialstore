<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Konfirmasi Pesanan
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div>
                        <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Konsumen</th>
                                    <th>Jumlah</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                            $no = 1;
                            include 'koneksi.php';
                            include 'tglindo.php';
                            $query = mysqli_query($koneksi, "SELECT a.id_bayar,a.tanggal_bayar,a.id_transaksi,a.status_bayar,
                                                            b.id_transaksi,b.tanggal_transaksi,b.id_konsumen,b.total_bayar,
                                                            c.id_konsumen,c.nama_konsumen
                                                            FROM tbl_pembayaran as a INNER JOIN tbl_transaksi as b INNER JOIN tbl_konsumen as c
                                                            ON a.id_transaksi=b.id_transaksi AND b.id_konsumen=c.id_konsumen
                                                            WHERE a.status_bayar!='Menunggu Pembayaran'
                                                            ORDER BY a.id_bayar DESC")
                                                            or die('Ada kesalahan pada query konfirmasi: '.mysqli_error($koneksi));
                      
                            while ($data = mysqli_fetch_assoc($query)) { 

                                $query1 = mysqli_query($koneksi, "SELECT COUNT(id_detail) as jumlah FROM tbl_transaksi_detail
                                                            WHERE id_transaksi='$data[id_transaksi]'")
                                                            or die('Ada kesalahan pada query detail: '.mysqli_error($koneksi));
                      
                                $data1 = mysqli_fetch_assoc($query1);
                            ?>
                                <tr>
                                    <td width="40" class="center"><?php echo $no; ?></td>
                                    <td width="100" class="center"><?php echo  TanggalIndo($data['tanggal_bayar']); ?></td>
                                    <td width="150"><?php echo $data['nama_konsumen']; ?></td>
                                    <td width="70" class="center"><?php echo $data1['jumlah']; ?> barang</td>
                                    <td width="100" align="right">Rp. <?php echo number_format($data['total_bayar']); ?></td>
                                    <td width="150"><?php echo $data['status_bayar']; ?></td>

                                    <td width="60" class="center">
                                        <div class="action-buttons">
                                            <a data-rel="tooltip" data-placement="top" title="Detail" class="blue tooltip-info" href="?page=detail_konfirmasi&form=detail&id=<?php echo $data['id_bayar']; ?>">
                                                <i class="fa fa-eye"></i> Konfirmasi
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
            </div><!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section>
</div><!-- /.page-content -->