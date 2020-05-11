<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login with Google Account</title>
	<?php include(VIEWPATH.'/shared/meta_link.php'); ?>
</head>
<body style="padding: 10px">

	<h2 style="text-align: center;font-weight: bold;margin-bottom: 20px"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> Login with Google Account</h2>

	<div style="text-align: center;margin-bottom: 30px;margin-top: 0px">
		<a href="<?php echo $loginURL; ?>"class="btn btn-success" style="width: 250px" name="tambah">
			<i class="fab fa-google" aria-hidden="true"></i> Login
		</a>
	</div>

	<?php include(VIEWPATH.'/shared/scripts.php'); ?>
</body>
</html>

