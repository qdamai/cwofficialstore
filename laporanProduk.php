<?php include "koneksi.php" ;
//include "../../tglindo.php" ;
$tgl = date('M Y');
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

<table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">
                <tr><th >No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
<!--                <th>Tanggal Masuk</th>
                <th>Di Beli</th> -->
</tr>
<?php
$sql = mysqli_query($koneksi,"SELECT * FROM tbl_barang as a INNER JOIN tbl_kategori as b
                                                            ON a.id_kategori=b.id_kategori
                                                            ORDER BY a.id_barang ASC");
$no=1;
while($r = mysqli_fetch_array($sql)){

?>
<tr>
    <td class='td' align='center'><span class="style3"><?php echo $no; ?></span></td>

                    <td align="center">B00-<?php echo $r['id_barang']; ?></td>
                    <td><?php echo $r['nama_barang']; ?></td>
                    
                    <td align="right">Rp.    <?php echo number_format($r['harga'], 2, ".", ","); ?></td>
                    <td align="center"><?php echo $r['stok']; ?></td>
<!--                    <td align="center"><?php echo $r['tanggal_masuk']; ?></td>
                    <td align="center"><?php echo $r['terjual']; ?></td -->
</tr>
<?php
$no++;
}
?>
</table>
<br>


<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="63%" bgcolor="#FFFFFF">
<p align="center"><br/>
</td>
 <td width="37%" bgcolor="#FFFFFF"><div align="center">Solok, <?php $tgl = date('d M Y');
echo " $tgl";?><br/>
Pimpinan
<br/><br/>
<br/><br/>
(...............................)
<br/>
</div>
</td>
</tr></table> 
