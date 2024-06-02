<?php  
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
    echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu!');</script>
          <meta http-equiv='refresh' content='0; url=?page=home'>";
}
else { ?>

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                       
                        Keranjang Belanja
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">


                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Foto</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah Beli</th>
                                            <th>Jumlah Bayar</th>
                                            <th></th>
                                        </tr>
                                    </thead>   

                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi_tmp as a INNER JOIN tbl_barang as b
                                                                    ON a.id_barang=b.id_barang 
                                                                    WHERE id_konsumen='$_SESSION[id_konsumen]'")
                                                                    or die('Ada kesalahan pada query tmp transaksi: '.mysqli_error($mysqli));
                                    
                                    $count = mysqli_num_rows($query);

                                    if ($count>0) {
                                        while ($data = mysqli_fetch_assoc($query)) { ?>

                                            <tr>
                                                <td width='40' class='center'><?php echo $no; ?></td>
                                                <td width='60'><img src="images/barang/<?php echo $data['gambar']; ?>" width="150"></td>
                                                <td width='150'><?php echo $data['nama_barang']; ?></td>
                                                <td width='120'>Rp. <?php echo format_rupiah_nol($data['harga']); ?></td>
                                                <td width='100'><?php echo $data['jumlah_beli']; ?></td>
                                                <td width='120'>Rp. <?php echo format_rupiah_nol($data['jumlah_bayar']); ?></td>

                                                <td width='80' class="center">
                                                    <div>
                                                        <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger " href="pages/transaksi/proses_keranjang.php?id_konsumen=<?php echo $data['id_konsumen'];?>&id_barang=<?php echo $data['id_barang'];?>&stok=<?php echo $data['stok'];?>&jumlah_beli=<?php echo $data['jumlah_beli'];?>" onclick="return confirm('Anda yakin ingin menghapus produk <?php echo $data['nama_barang']; ?>?');">
                                                            <i class="glyphicon glyphicon-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                    } else { ?>
                                        <tr><td>Tidak Ada Barang</td></tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>           
                                </table>
                            </div>
                        </div>
                    </div> <!-- /.panel -->

                    <div class="">
                    <?php  
                    if ($count>0) { ?>
                        <a href="?page=home" class="btn btn-primary"> Tambah Belanja </i></a>
                        &nbsp; &nbsp; 
                        <a href="?page=checkout" class="btn btn-primary pull-right"> Chekout</i></a>
                    <?php
                    }
                    ?>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->
<?php
}
?>

