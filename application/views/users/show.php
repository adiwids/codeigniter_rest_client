<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<!-- utf-8 charset support -->
	<meta charset="UTF-8">
	<!-- responsive support -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- import file css bootstrap (offline) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
	<!-- menampilkan "icon" website pada "title" browser-->
	<link rel="icon" href="<?php echo base_url('assets/favicon.png') ?>" sizes="32x32" type="image/png" />
</head>
<body style="padding: 10px">
	<?php include(VIEWPATH.'/shared/navbar.php'); ?>
	<h2 style="text-align: center;font-weight: bold;margin-bottom: 20px"><i class="fa fa-user" aria-hidden="true"></i> User Profile</h2>
	<div style="width: 99%">
		<!-- tampilkan foto ("controllers/Clogin.php" baris 70) -->
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-12"><img src="<?php echo $user->foto ?>" style="width:100px; height:100px;" /></div>
		</div>
		<!-- tampilkan provider ("controllers/Clogin.php" baris 64) -->
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">Provider</div>
			<div class="col-sm-9">: <?php echo $user->provider; ?></div>
		</div>
		<!-- tampilkan uid ("controllers/Clogin.php" baris 65) -->
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">UID</div>
			<div class="col-sm-9">: <?php echo $user->uid; ?></div>
		</div>
		<!-- tampilkan nama lengkap ("controllers/Clogin.php" baris 66) -->
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">Nama Lengkap</div>
			<div class="col-sm-9">: <?php echo $user->nama_lengkap; ?></div>
		</div>
		<!-- tampilkan nama depan ("controllers/Clogin.php" baris 67) -->
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">Nama Depan</div>
			<div class="col-sm-9">: <?php echo $user->nama_depan; ?></div>
		</div>
		<!-- tampilkan nama belakang ("controllers/Clogin.php" baris 68) -->
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">Nama Belakang</div>
			<div class="col-sm-9">: <?php echo $user->nama_belakang; ?></div>
		</div>
		<!-- tampilkan email ("controllers/Clogin.php" baris 69) -->
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">Alamat E-Mail</div>
			<div class="col-sm-9">: <?php echo $user->email; ?></div>
		</div>

	</div>

	<div style="text-align: center;margin-top: 20px">
		<form action="<?php echo site_url('SessionsController/destroy'); ?>" method="delete">
			<button class="btn btn-success" style="width: 250px" type="submit">
				<i class="fa fa-power-off" aria-hidden="true"></i> Logout
			</button>
		</form>
	</div>

	<!-- import jquery (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js') ?>"></script>
	<!-- import file js bootstrap (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
	<!-- import font-awesome (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/fa-icon.min.js') ?>"></script>
</body>
</html>

