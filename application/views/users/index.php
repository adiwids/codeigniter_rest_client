<!DOCTYPE html>
<html>
<head>
	<title>Data Pengguna</title>
	<?php include(VIEWPATH.'/shared/meta_link.php'); ?>
</head>
<body style="padding: 10px">
	<?php include(VIEWPATH.'/shared/navbar.php'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
      <div style="text-align: center;margin-bottom: 30px;margin-top: 0px">
        <a href="<?php echo $loginURL; ?>"class="btn btn-success" style="width: 250px" name="tambah">
          <i class="fab fa-google" aria-hidden="true"></i> Ganti Akun Google
        </a>
      </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Foto</th>
              <th>Email</th>
              <th>Nama Lengkap</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php $num = 1; ?>
          <?php foreach($users as $user) { ?>
          <tr>
            <td><?php echo $num;?></td>
            <td>
              <img src="<?php echo $user->foto; ?>" class="img img-thumbnail" width="96px" alt="<?php echo $user->uid; ?>" />
            </td>
            <td><?php echo $user->email; ?></td>
            <td><?php echo $user->nama_lengkap; ?></td>
            <td>
              <a href="<?php echo site_url(sprintf('users/%s/edit', $user->id)); ?>" class="btn btn-default">
                <i class="fa fa-edit"></i>
                Ubah
              </a>
              <?php if($user->id != $current_user->id) { ?>
              <form action="<?php echo site_url(sprintf('users/%s/delete', $user->id)); ?>" method="post">
                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-trash"></i>
                  Hapus
                </button>
              </form>
              <?php } ?>
            </td>
          </tr>
          <?php $num++; ?>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include(VIEWPATH.'/shared/scripts.php'); ?>
</body>
</html>