<?php
// fungsi query untuk menampilkan data dari tabel tantang tpi
$query = mysqli_query($mysqli, "SELECT * FROM tbl_informasi WHERE id_informasi='2'")
                                or die('Ada kesalahan pada query tampil data informasi : '.mysqli_error($mysqli));

$data = mysqli_fetch_assoc($query);
?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                   
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div style="padding: 0 10px;text-align:justify"> 
                    <p style="margin-bottom:5px;font-size:20px"><?php echo $data['judul']; ?></p>
                    <p><?php echo $data['keterangan']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
