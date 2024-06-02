<?php 
$hari_ini=date("Y-m-d");
  ?>

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
<h3 ><span ></span>  Laporan Penjualan Perhari</h3>
 <div class="row">
                <div class="col-md-6" style="margin-left: 10px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
            <form name="f1" method=post action="cetaklaporanharian.php" target="_blank">
            <input type="date" name="tanggal1" class="form-control" value="<?php echo $hari_ini;?>">

            <input type="submit" name="simpan" value="Cetak" class="btn btn-success" style="width: 70px; margin-top: 10px; ">
            </form>
            </div>
         </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#tgl").datepicker({dateFormat : 'yy/mm/dd'});              
    });
  </script>
  