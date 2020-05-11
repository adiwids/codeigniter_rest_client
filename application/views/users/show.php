<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<?php include(VIEWPATH.'/shared/meta_link.php'); ?>
</head>
<body style="padding: 10px">
	<?php include(VIEWPATH.'/shared/navbar.php'); ?>

	<h2 style="text-align: center;font-weight: bold;margin-bottom: 20px"><i class="fa fa-user" aria-hidden="true"></i>Profil Pengguna</h2>

	<div style="width: 99%">
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-12"><img src="<?php echo $user->foto ?>" style="width:100px; height:100px;" /></div>
		</div>
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">Provider</div>
			<div class="col-sm-9">: <?php echo $user->provider; ?></div>
		</div>
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">UID</div>
			<div class="col-sm-9">: <?php echo $user->uid; ?></div>
		</div>
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">Nama Lengkap</div>
			<div class="col-sm-9">: <?php echo $user->nama_lengkap; ?></div>
		</div>
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">Nama Depan</div>
			<div class="col-sm-9">: <?php echo $user->nama_depan; ?></div>
		</div>
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">Nama Belakang</div>
			<div class="col-sm-9">: <?php echo $user->nama_belakang; ?></div>
		</div>
		<div class="row" style="margin: 10px 0px">
			<div class="col-sm-3">Alamat E-Mail</div>
			<div class="col-sm-9">: <?php echo $user->email; ?></div>
		</div>
	</div>
	<?php if($user->uid == $current_user->uid) { ?>
	<div style="text-align: center;margin-top: 20px">
		<form action="<?php echo site_url('SessionsController/destroy'); ?>" method="delete">
			<button class="btn btn-danger" style="width: 250px" type="submit">
				<i class="fa fa-power-off" aria-hidden="true"></i> Logout
			</button>
		</form>
	</div>
	<?php } ?>
</body>

<?php include(VIEWPATH.'/shared/scripts.php'); ?>
</html>

