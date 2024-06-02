<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<?php
					include "koneksi.php";
					include 'tglindo.php';
					$sqlStruk = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tbl_konfirmasi` WHERE idorder= '$_GET[idorder]'"));
					?>
					<form action="updatestatus.php" method="POST" enctype="multipart/form-data">
						<div class="container">
							<input type="hidden" name="idorder" value="<?= $sqlStruk['idorder'] ?>">
							<h2>Bukti Pemabayaran</h2>
							<h2>Nomor Order : <?= $sqlStruk['idorder'] ?></h2>
							<table class="table table-bordered">
								<thead>
									<tr>
										<td><b>Nama Pengirim</b></td>
										<td><?= $sqlStruk['namapengirim'] ?></td>
									</tr>

									<tr>
										<td><b>Bank Pengirim</b></td>
										<td><?= $sqlStruk['bankpengirim'] ?></td>
									</tr>

									<tr>
										<td><b>Tanggal Transfer</b></td>
										<td> <?= TanggalIndo($sqlStruk['tgltransfer']) ?></th>

									</tr>

									<tr>
										<td><b>Nominal Transfer</b></td>
										<td>Rp. <?= number_format($sqlStruk['nominal'],2) ?></td>

									</tr>

									<tr>
										<td><b>Bank Penerima</b></td>
										<td><?= $sqlStruk['bankpenerima'] ?></td>
									</tr>

									<tr>
										<td><b>Bukti Pembayaran</b></td>
										<td><img src="dist/faktur/<?= $sqlStruk['bukti'] ?>"></td>
									</tr>
								</thead>
							</table>
							<a href="index.php?page=data_order" class="btn btn-danger"><i class=""></i> Kembali</a>
							<button class="btn btn-success" type="submit" name="updatestattus" style="margin-left: 20px"><i></i> Konfirmasi</button>
						</div>
					</form>
				</div>
			</div>
			<!-- //contact form -->
		</div>

	</section>
</div>
<!-- //contact -->