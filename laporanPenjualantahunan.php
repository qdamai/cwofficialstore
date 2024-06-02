<?php 
$bln_ini=date("Y");
  ?>
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
<h3> Laporan Penjualan PerTahun</h3>
 <div class="row">
                <div class="col-md-4" style="margin-left: 10px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
            <form name="f1" method=post action="cetaklaporantahunan.php" target="_blank">
            <input type="year" name="tahun" class="form-control" value="<?php echo $bln_ini;?>" >

<input type="submit" name="simpan" value="Print" class="btn btn-success" style="width: 70px; margin-top: 10px;">
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
  