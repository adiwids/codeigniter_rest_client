<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Pelanggan</title>
	<!-- utf-8 charset support -->
	<meta charset="UTF-8">
	<!-- responsive support -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- import file css bootstrap (offline) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
</head>
<body style="padding: 10px">
	<h2 style="font-weight: bold">Tampil Data Pelanggan</h2>
	<div style="text-align: center;margin-bottom: 30px;margin-top: 0px">
		<button class="btn btn-success" style="width: 150px" name="tambah" onclick="tambah();"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
		<button class="btn btn-outline-secondary" style="width: 150px" onclick="refresh();"><i class="fa fa-sync-alt" aria-hidden="true"></i> Refresh</button>
	</div>
	<table style="width: 100%" border="1" cellspacing="0" cellpadding="10">
		<!-- buat judul tabel -->
		<thead>
			<tr style="text-align: center;">
				<th style="width: 5%">No.</th>
				<th style="width: 10%">NIK</th>
				<th style="width: 50%">Nama</th>
				<th style="width: 15%">Telepon</th>
				<th style="width: 10%">Ubah Data</th>
				<th style="width: 10%">Hapus Data</th>
			</tr>
		</thead>
		<!-- buat isi tabel -->
		<tbody>
			<!-- looping data pelanggan dari "controller/pelanggan.php"-->
			<!-- awal looping -->
			<?php
				//buat no urut
				$no = 1;
				foreach ($pelanggan as $data)
				{
					//definisikan field dari "tb_pelanggan" yang ingin ditampilkan
					$nik = $data->nik_pelanggan;
					$nama = $data->nama_pelanggan;
					$telepon = $data->telepon_pelanggan;
			?>
			<tr>
				<td style="text-align: center;"><?php echo $no; ?></td>
				<td style="text-align: center;"><?php echo $nik; ?></td>
				<td style="text-align: justify;"><?php echo $nama; ?></td>
				<td style="text-align: center;"><?php echo $telepon; ?></td>
				<td style="text-align: center;">
					<button class="btn btn-primary btn-sm" onclick="ubah('<?php echo $nik; ?>')"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Ubah Data</button>
				</td>
				<td style="text-align: center;">
					<button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $nik; ?>')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus Data</button>
				</td>
			</tr>
			<?php
					//increament "$no"
					$no++;
				}
			?>
			<!-- akhir looping -->
		</tbody>
	</table>

	<!-- import jquery (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js') ?>"></script>
	<!-- import file js bootstrap (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
	<!-- import font-awesome (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/fa-icon.min.js') ?>"></script>


	<script type="text/javascript">
		/* fungsi tambah data (fungsi ini dipanggil pada baris 15) */
		function tambah()
		{
			location.href='<?php echo $loginUrl; ?>';
		}
		/* fungsi refresh data (fungsi ini dipanggil pada baris 16) */
		function refresh()
		{
			location.href='<?php echo site_url('pelanggan')?>';
		}
		/* fungsi ubah data (fungsi ini dipanggil pada baris 50) */
		function ubah(x)
		{
			location.href='<?php echo site_url('pelanggan/ubah')?>'+'/'+x;
		}
		/* fungsi hapus data (fungsi ini dipanggil pada baris 53) */
		function hapus(x)
		{
			location.href='<?php echo site_url('pelanggan/hapus')?>'+'/'+x;
		}
	</script>
</body>
</html>