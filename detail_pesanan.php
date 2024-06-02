<?php  
if ($_GET['form']=='detail') { 
	 $query = mysqli_query($koneksi, "SELECT * FROM tbl_konsumen as a INNER JOIN tbl_kabkota as b INNER JOIN tbl_provinsi as c 
                                    ON a.kota=b.id_kabkota AND a.provinsi=c.id_provinsi
                                    WHERE id_konsumen='$_GET[id_konsumen]'")
                                    or die('Ada kesalahan pada query tampil data konsumen: '.mysqli_error($koneksi));

    $data = mysqli_fetch_assoc($query);

    $id_konsumen   = $data['id_konsumen'];
    $nama_konsumen = $data['nama_konsumen'];
    $alamat        = $data['alamat'];
    $id_kabkota    = $data['id_kabkota'];
    $nama_kabkota  = $data['nama_kabkota'];
    $id_provinsi   = $data['id_provinsi'];
    $nama_provinsi = $data['nama_provinsi'];
    $kode_pos      = $data['kode_pos'];
    $telepon       = $data['telepon'];
    $email         = $data['email'];
?>
 	<!-- tampilkan form detail data -->
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
				<!--PAGE CONTENT BEGINS-->
				<div class="timeline-item clearfix">
					<div style="margin-left:0" class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h5 class="widget-title smaller">
								<span class="blue">Alamat Tujuan</span>
							</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<p>
                                    <i style="margin-right:7px" class="fa fa-user"></i>
                                    Nama : <?php echo $nama_konsumen; ?>
                                </p>
                                <p>
                                    <i style="margin-right:7px" class="fa fa-map-marker"></i>
                                    Alamat : <?php echo $alamat; ?>, <?php echo $nama_kabkota; ?>, <?php echo $nama_provinsi; ?>, <?php echo $kode_pos; ?>
                                </p>
                                <p>
                                    <i style="margin-right:7px" class="fa fa-phone"></i>
                                   No Telepon : <?php echo $telepon; ?>
                                </p>
							</div>
						</div>
					</div>
				</div>

				<br>

				<div class="row">
					<div class="col-xs-12">
						<div>
							<table id="simple-table" class="table table-striped table-bordered table-hover">
								<thead>
	                                <tr > 
	                                    <th>No.</th>
	                                    <th>Gambar</th>
	                                    <th>Nama Barang</th>
	                                    <th>Harga</th>
	                                    <th>Jumlah Beli</th>
	                                    <th>Jumlah Bayar</th>
	                                </tr>
	                            </thead>   

	                            <tbody>
	                            <?php
	                            $no = 1;
	                            $a=$_GET['id'];
	                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi_detail  INNER JOIN tbl_barang  INNER JOIN tbl_transaksi  ON tbl_transaksi_detail.id_barang=tbl_barang.id_barang AND tbl_transaksi_detail.id_transaksi=tbl_transaksi.id_transaksi WHERE tbl_transaksi.id_transaksi='$a'");
	                            $jumlah_bayar = 0;
	                      	
	                            while ($data = mysqli_fetch_assoc($query)) { 
	                                $id_barang    = $data['id_barang'];
	                                $jumlah_beli  = $data['jumlah_beli'];
									$jumlah_bayar = $data['jumlah_bayar'];

								
	                            ?>
	                        
	                                <tr>
	                                    <td width='40' class='center'><?php echo $no; ?></td>
	                                    <td width='60' class="center"><img src="../images/barang/<?php echo $data['gambar']; ?>" width="100"></td>
	                                    <td width='180'><?php echo $data['nama_barang']; ?></td>
	                                    <td width='180'>Rp. <?php echo number_format($data['harga'],2); ?></td>
	                                    <td width='180'><?php echo $jumlah_beli; ?></td>
	                                    <td width='180'>Rp. <?php echo number_format($jumlah_bayar,2); ?></td>
	                                </tr>
	                            <?php
	                                $no++;
	                            }

	                            

	                            $query2 = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim
	                                                            WHERE provinsi='$id_provinsi' AND kabkota='$id_kabkota'")
	                                                            or die('Ada kesalahan pada query biaya kirim: '.mysqli_error($koneksi));
	                      
	                            $data2 = mysqli_fetch_assoc($query2);
	                            $biaya_kirim = $data2['biaya'];

	                            $total_pembayaran = $jumlah_bayar + $biaya_kirim;
	                            ?>
	                                <tr>
	                                    <td align="right" colspan="5"><strong>Total Harga</strong></td>
	                                    <td align="left"><strong>Rp. <?php echo $jumlah_bayar; ?></strong></td>
	                                </tr><tr>
	                                    <td align="right" colspan="5"><strong>Biaya Kirim</strong></td>
	                                    <td align="left"><strong>Rp. <?php echo $biaya_kirim; ?></strong></td>
	                                </tr>
	                                <tr>
	                                    <td align="right" colspan="5"><strong>Total Pembayaran</strong></td>
	                                    <td align="left"><strong>Rp. <?php echo $total_pembayaran; ?></strong></td>
	                                </tr>
	                            </tbody>
							</table>
						</div>
					</div>
				</div><!-- PAGE CONTENT ENDS -->
				
				<div class="clearfix form-actions">
					<div class="col-md-offset-0 col-md-12">
						<a style="width:100px" href="?page=data_order" class="btn btn-danger">Kembali</a>
					</div>
				</div>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php } ?>