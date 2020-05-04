<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login with Google Account</title>
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
	<h2 style="text-align: center;font-weight: bold;margin-bottom: 20px"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> Login with Google Account</h2>
	<div style="text-align: center;margin-bottom: 30px;margin-top: 0px">
		<button class="btn btn-success" style="width: 250px" name="tambah" onclick="login();"><i class="fab fa-google" aria-hidden="true"></i> Login</button>
	</div>

	<!-- import jquery (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js') ?>"></script>
	<!-- import file js bootstrap (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
	<!-- import font-awesome (offline) -->
	<script type="text/javascript" src="<?php echo base_url('assets/fa-icon.min.js') ?>"></script>

	<script type="text/javascript">
		//fungsi ini dipanggil di baris 16
		function login()
		{
			//alihkan ke halaman autentikasi email
			location.href='<?php echo $loginURL;?>';
		}
	</script>
</body>
</html>

