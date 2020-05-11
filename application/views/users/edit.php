<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Pengguna</title>
	<?php include(VIEWPATH.'/shared/meta_link.php'); ?>
</head>
<body style="padding: 10px">
	<?php include(VIEWPATH.'/shared/navbar.php'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 style="text-align: center;font-weight: bold;margin-bottom: 20px">
          <i class="fa fa-user" aria-hidden="true"></i>
          <?php echo $user->nama_lengkap; ?>
        </h2>
        <em><?php echo $user->email; ?></em><br>
        <img src="<?php echo $user->foto; ?>" alt="<?php echo $user->uid; ?>" class="img img-thumbnail" width="96px">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-lg-offset-2">
        <form action="<?php echo site_url('users/'.$user->id.'/update'); ?>" method="post" class="form-horizontal">
          <div class="form-group">
            <label for="nama_depan" class="control-label">Nama Depan</label>
            <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?php echo $user->nama_depan; ?>">
          </div>
          <div class="form-group">
            <label for="nama_belakang" class="control-label">Nama Belakang</label>
            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?php echo $user->nama_belakang; ?>">
          </div>
          <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Ubah</button>
        </form>
        <?php if($user->id != $current_user->id) { ?>
        <form action="<?php echo site_url(sprintf('users/%s/delete', $user->id)); ?>" method="post">
          <button type="submit" class="btn btn-danger">
            <i class="fa fa-trash"></i>
            Hapus
          </button>
        </form>
        <?php } ?>
      </div>
    </div>
  </div>

  <?php include(VIEWPATH.'/shared/scripts.php'); ?>
</body>
</html>

