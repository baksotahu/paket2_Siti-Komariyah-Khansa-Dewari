<!DOCTYPE html>
<html>

<head>
	<title>Aplikasi Pengaduan Masyarakat | Register</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/bootstrap/'); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/bootstrap/'); ?>css/stylee.css">
</head>

<body>

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

	<div class="col-lg-5">

		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-12">
						<div class="p-3">
							<div class="text-center">
								<h2 class="text-center">LOGIN NOW</h2>
								<h1 class="h4 text-gray-900 mb-4">Aplikasi Pelaporan Pengaduan Masyarakt</h1> <!-- judul -->
							</div>

						<?php if ($this->session->flashdata('false')) : ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= $this->session->flashdata('false'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php endif; ?>

						<form action="<?= base_url('auth/register'); ?>" method="post">

							<div class="form-group">
								<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
								<input type="text" name="nik" class="form-control" placeholder="NIK" id="form" autocomplete="off" value="<?= set_value('nik'); ?>">
							</div>
							<div class="row">
								<div class="form-group col-sm-6">
									<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
									<input type="text" name="nama" class="form-control" placeholder="Nama" id="form" autocomplete="off" value="<?= set_value('nama'); ?>">
								</div>

								<div class="form-group col-sm-6">
									<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
									<input type="text" name="username" class="form-control" placeholder="Username" id="form" autocomplete="off" value="<?= set_value('username'); ?>">
								</div>
							</div>

							<div class="form-group">
								<?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
								<input type="text" name="telp" class="form-control" placeholder="No Telp" id="form" autocomplete="off" value="<?= set_value('telp'); ?>">
							</div>

							<div class="row">
								<div class="form-group col-sm-6">
									<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
									<input type="password" name="password" class="form-control" placeholder="Password" id="form" autocomplete="off">
								</div>

								<div class="form-group col-sm-6">
									<?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
									<input type="password" name="repassword" class="form-control" placeholder="Ulangi Password" id="form" autocomplete="off">
								</div>
							</div>

							<button type="submit" id="btn" class="bg-primary">Register</button>
							<p class="text-center mt-2">Sudah punya akun, <a href="<?= base_url('auth'); ?>">Login</a> Sekarang</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="<?= base_url('asset/bootstrap/'); ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('asset/bootstrap/'); ?>js/jquery.js"></script>
	<script src="<?= base_url('asset/bootstrap/'); ?>js/popper.min.js"></script>
</body>

</html>