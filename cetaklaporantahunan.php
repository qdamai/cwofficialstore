
<?php
include 'koneksi.php';
include 'tglindo.php';

if (isset($_POST['simpan'])) {
   $tahun = $_POST['tahun'];
}else{
}
?>
<body onLoad="javascript:print()"> 
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
.style5 {font-size: 24px}
</style>

<div class="panel-heading">
        <div class="row">
        <div style='margin-top:10px' align="center">
            <h3>
                <img src="images/12.png" style="width:700px; height:150px" alt="No Image">
            </h3>
            <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
        </div>
    </div>
</div>
<center>Laporan Penjualan Pertahun<br>Tahun : <?php echo $tahun ?></h4></center>
<table id='theList' border=1 width='60%' class='table table-bordered table-striped' cellspacing="0" align="center">
        <tr><th >No.</th>
        <th>Bulan</th>
        <th>Jumlah</th>
        <th>Total</th>
        
</tr>
<?php
$sql = mysqli_query($koneksi, "SELECT tbl_transaksi.tanggal_transaksi, tbl_transaksi.total_bayar, SUM(tbl_transaksi.total_bayar) as sumtot , SUM(tbl_transaksi_detail.jumlah_beli) as jumlah FROM tbl_transaksi,tbl_transaksi_detail WHERE tbl_transaksi.id_transaksi=tbl_transaksi_detail.id_transaksi and tbl_transaksi.tanggal_transaksi LIKE '$_POST[tahun]%' group by month(tbl_transaksi.tanggal_transaksi)");
$no=1;
while($r = mysqli_fetch_array($sql)){
  $tanggal = $r['tanggal_transaksi'];
?>
<tr>
            <td class='td' align='center'><span class="style3"><?php echo $no; ?></span></td>
                      <td align="center"><?php $tgl = strtotime($tanggal); 
            $namabulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"); 
            $bulan = date('n', $tgl)-1; 
            echo $namabulan[$bulan]; ?></td>
            <td class='td' align='center'><span class="style3"><?php echo $r['jumlah']; ?></span></td>
            <td align="right">Rp.    <?php echo number_format($r['sumtot'], 2, ".", "."); ?></td>
          
</tr>
<?php
$no++;
}
$query = mysqli_query($koneksi,"SELECT sum(total_bayar) as jml from tbl_transaksi WHERE tanggal_transaksi LIKE '$_POST[tahun]%'");
$data = mysqli_fetch_array($query);
$total = $data['jml'];
?>
<tr>
<td colspan="3">
<div align="center">Total </div></td>
<?php if($total == NULL){ ?>
  <td align="right">Rp.<?php echo number_format(0, 2, ".", ","); ?> </td>
<?php }else { ?>
  <td align="right">Rp.<?php echo number_format($total, 2, ".", ","); ?> </td>
<?php } ?>
</tr>
</table>
<br>

<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="54%" bgcolor="#FFFFFF">
<p align="center"><br/>
</td>
 <td width="56%" bgcolor="#FFFFFF"><div align="center"> Solok, <?php $tgl = date('d M Y');
echo " $tgl";?><br/>
Pimpinan
<br/><br/>
<br/><br/>
(...............................)
<br/>
</div>
</td>
</tr></table> 
