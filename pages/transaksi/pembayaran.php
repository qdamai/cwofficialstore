<?php  
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
    echo "<script type='text/javascript'>alert('Anda harus login terlebih dahulu!');</script>
          <meta http-equiv='refresh' content='0; url=?page=home'>";
}
// jika user sudah login, maka jalankan perintah untuk ubah password
else { ?>
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        
                        Pembayaran
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong> Selamat!</strong> Anda telah berhasil melakukan proses pemesanan. <br>
                        Silahkan lakukan pembayaran ke salah satu rekening kami. Setelah itu lakukan konfirmasi pembayaran melalui menu <strong>Konfirmasi Pembayaran</strong>. Jika pembayaran belum diterima selama 3 hari maka transaksi akan dibatalkan. Terima Kasih
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                        <?php  
                        $query = mysqli_query($mysqli, "SELECT sum(total_bayar) as total FROM tbl_transaksi
                                                        WHERE id_konsumen='$_SESSION[id_konsumen]' AND status='Menunggu Pembayaran'")
                                                        or die('Ada kesalahan pada query total bayar: '.mysqli_error($mysqli));
                              
                        $data = mysqli_fetch_assoc($query);

                        $total_bayar = $data['total'];
                        ?>
                            <h4>Total : Rp. <?php echo number_format($total_bayar,2); ?></h4>
                        </div>
                    </div> <!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4>Rekening Pembayaran</h4>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <strong>BCA</strong><br>
                                            Nomor rekening: <strong>54740101345678</strong> <br>
                                            Atas Nama: <strong> : CV.Agus Furnitur </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <strong>BNI</strong> <br>
                                            Nomor rekening: <strong>576598786444</strong> <br>
                                            Atas Nama: <strong>CV.Agus Furnitur</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.panel -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->
<?php
}
?>

