<?php
	//tampilkan data pelanggan yang dipilih berdasarkan fungsi ubah (lihat baris 175 pada file "controllers/Pelanggan.php")
	foreach ($pelanggan as $data)
	{
		$nik_lama = $data->nik_pelanggan;
		$nama_lama = $data->nama_pelanggan;
		$telepon_lama = $data->telepon_pelanggan;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Pelanggan</title>
	<!-- utf-8 charset support -->
	<meta charset="UTF-8">
	<!-- responsive support -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- import file css bootstrap (offline) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
</head>
<body style="padding: 10px">
	<h2 style="font-weight: bold">Ubah Data Pelanggan</h2>
	<div style="text-align: center;margin-bottom: 30px;margin-top: 0px">
		<button class="btn btn-success" style="width: 150px" onclick="tampil();"><i class="fa fa-table" aria-hidden="true"></i> Tampil Data</button>
	</div>


		<form style="width: 99%" method="post">
			<!-- komponen hidden data
				 value="<?php echo $id; ?>"; dimana "$id" diambil dari '$data["$id"]' (lihat baris 169 pada file "controllers/Pelanggan.php") -->
			<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
			<!-- komponen isian data NIK -->
  			<div class="form-group row">
			    <label for="nik" class="col-sm-3 col-form-label">NIK Pelanggan</label>
			    <div class="col-sm-4">
			      <!-- value="<?php echo $nik_lama; ?>"; dimana "$nik_lama" diambil dari hasil pembacaan data "nik_pelanggan" (lihat baris ke 5) -->
			      <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $nik_lama; ?>">
			    </div>
			</div>
			<!-- komponen isian data Nama -->
			<div class="form-group row">
			    <label for="nama" class="col-sm-3 col-form-label">Nama Pelanggan</label>
			    <div class="col-sm-4">
			      <!-- value="<?php echo $nama_lama; ?>"; dimana "$nama_lama" diambil dari hasil pembacaan data "nama_pelanggan" (lihat baris ke 6) -->
			      <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_lama; ?>">
			    </div>
			</div>
			<!-- komponen isian data Telepon -->
			<div class="form-group row">
			    <label for="telepon" class="col-sm-3 col-form-label">Telepon Pelanggan</label>
			    <div class="col-sm-4">
			      <!-- value="<?php echo $telepon_lama; ?>"; dimana "$telepon_lama" diambil dari hasil pembacaan data "telepon_pelanggan" (lihat baris ke 7) -->
			      <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $telepon_lama; ?>">
			    </div>
			</div>

			<!-- komponen tombol "Ubah" dan "Refresh" -->
			<div class="form-group row">
				<div class="col-sm-12">
					<button class="btn btn-primary" name="ubah" style="width: 100px" onclick=""><i class="fa fa-pencil-alt" aria-hidden="true"></i> Ubah</button>

					<button class="btn btn-outline-secondary" style="width: 100px" onclick="refresh()"><i class="fa fa-sync" aria-hidden="true"></i> Refresh</button>
				</div>
			</div>
		</form>



	<!-- import jquery (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js') ?>"></script>
	<!-- import file js bootstrap (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
	<!-- import font-awesome (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/fa-icon.min.js') ?>"></script>


	<script type="text/javascript">

		/* fungsi tampil data (fungsi ini dipanggil pada baris 24) */
		function tampil()
		{
			location.href='<?php echo site_url('pelanggan')?>';
		}
		/* fungsi refresh data (fungsi ini dipanggil pada baris 62) */
		function refresh()
		{
			location.href='<?php echo site_url('pelanggan/ubah')?>'+"/"+$id;
		}
	</script>
</body>
</html>