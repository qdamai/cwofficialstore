<!-- Page Heading/Breadcrumbs -->
<!DOCTYPE html>
<html lang="id">
<head>
<style>
  /* Enhanced CSS styles for a more attractive form */

  /* General body styles */
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    color: #444;
    line-height: 1.6;
  }

  /* Container for the form */
  .form-container {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  /* Style for the form header */
  .page-header {
    font-size: 24px;
    color: #5D5C61;
    margin-bottom: 20px;
    border-bottom: 2px solid #5D5C61;
    padding-bottom: 10px;
  }

  /* Style for form elements */
  .form-control {
    border: 2px solid #5D5C61;
    border-radius: 4px;
    padding: 10px;
    margin-bottom: 20px;
    width: 95%;
  }

  /* Style for the submit button */
  .btn-submit {
    background-color: #7395AE;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .btn-submit:hover {
    background-color: #557A95;
  }

  /* Style for alert messages */
  .alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
    font-size: 16px;
  }

  .alert-danger {
    background-color: #F08080;
    color: white;
  }

  .alert-success {
    background-color: #78C2AD;
    color: white;
  }

  /* Responsive design for smaller screens */
  @media (max-width: 768px) {
    .form-container {
      width: 90%;
      padding: 15px;
    }

    .form-control {
      width: 90%;
    }
  }
</style>
</head>
<body>
</body>
</html>


<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    Pendaftaran
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php  
                // fungsi untuk menampilkan pesan
                // jika alert = "" (kosong)
                // tampilkan pesan "" (kosong) 
                if (empty($_GET['alert'])) {
                  echo "";
                } 
                // jika alert = 1
                // tampilkan pesan Gagal "email sudah terdaftar"
                elseif ($_GET['alert'] == 1) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><i class="glyphicon glyphicon-alert"></i> Gagal!</strong> email sudah terdaftar.
                    </div>
                <?php
                } 
                // jika alert = 2
                // tampilkan pesan Sukses "pendaftaran Anda berhasil, silahkan login melalui menu Login"
                elseif ($_GET['alert'] == 2) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><i class="glyphicon glyphicon-ok-circle"></i> Sukses!</strong> pendaftaran Anda berhasil, silahkan pilih menu login untuk masuk ke sistem
                    </div>
                <?php
                } 
                ?>

                <div class="panel panel-default">
                    <div class="panel-body">
                          <!-- tampilan form hubungi kami -->
                        <form class="form-horizontal" method="POST" action="pages/daftar/proses.php">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nama" autocomplete="off" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyz., ',this)" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="alamat" rows="3" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kabupaten/Kota</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="kabkota" placeholder="Pilih Kabupaten/Kota" required>
                                    <option value=""></option>
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * FROM tbl_kabkota order by nama_kabkota ASC");

                                    while($data = mysqli_fetch_assoc($query)) {
                                        echo"<option value=\"$data[id_kabkota]\"> $data[nama_kabkota] </option>";

                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Provinsi</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="provinsi" placeholder="Pilih Provinsi" required>
                                    <option value=""></option>
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * FROM tbl_provinsi order by nama_provinsi ASC");

                                    while($data = mysqli_fetch_assoc($query)) {
                                        echo"<option value=\"$data[id_provinsi]\"> $data[nama_provinsi] </option>";

                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kode Pos</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="kode_pos" autocomplete="off" maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">No. Telepon</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="no_telepon" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" name="email" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" autocomplete="off" required>
                                   
                                </div>
                            </div>

                            <hr/>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input style="width:150px" type="submit" class="btn btn-primary btn-sm btn-submit" name="daftar" value="Daftar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
