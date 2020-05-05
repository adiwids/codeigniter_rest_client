<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Pelanggan</title>
	<!-- utf-8 charset support -->
	<meta charset="UTF-8">
	<!-- responsive support -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- import file css bootstrap (offline) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
</head>
<body style="padding: 10px">
	<h2 style="font-weight: bold">Tambah Data Pelanggan</h2>
	<div style="text-align: center;margin-bottom: 30px;margin-top: 0px">
		<button class="btn btn-success" style="width: 150px" onclick="tampil();"><i class="fa fa-table" aria-hidden="true"></i> Tampil Data</button>
	</div>


		<form style="width: 99%" method="post">
			<!-- komponen isian data NIK -->
  			<div class="form-group row">
			    <label for="nik" class="col-sm-3 col-form-label">NIK Pelanggan</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="nik" name="nik">
			    </div>
			</div>
			<!-- komponen isian data Nama -->
			<div class="form-group row">
			    <label for="nama" class="col-sm-3 col-form-label">Nama Pelanggan</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="nama" name="nama">
			    </div>
			</div>
			<!-- komponen isian data Telepon -->
			<div class="form-group row">
			    <label for="telepon" class="col-sm-3 col-form-label">Telepon Pelanggan</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="telepon" name="telepon">
			    </div>
			</div>

			<!-- komponen tombol "Simpan" dan "Refresh" -->
			<div class="form-group row">
				<div class="col-sm-12">
					<button class="btn btn-primary" name="simpan" style="width: 100px" onclick=""><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>

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

		/* fungsi tampil data (fungsi ini dipanggil pada baris 15) */
		function tampil()
		{
			location.href='<?php echo site_url('pelanggan')?>';
		}
		/* fungsi refresh data (fungsi ini dipanggil pada baris 46) */
		function refresh()
		{
			location.href='<?php echo site_url('pelanggan/tambah')?>';
		}
	</script>
</body>
</html>