<!DOCTYPE html>
<html>

<head>
	<title>Aplikasi Pengaduan Masyarakat | Login Page</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/bootstrap/'); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/bootstrap/'); ?>css/style.css">
	<link rel="stylesheet" href="<?= base_url('asset/sbadmin/vendor/fontawesome-free/css/all.min.css'); ?>">
	<style>
		form {
			text-align: center;
		}
	</style>
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
                                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1> <!-- judul -->
                                </div>

			<h5 class="text-center">Aplikasi Pengaduan Masyarakat</h5>
				<div class="card" style="border: none;">
					<div class="card-body">

						<?php if ($this->session->flashdata('true')) : ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<?= $this->session->flashdata('true'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php elseif ($this->session->flashdata('false')) : ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= $this->session->flashdata('false'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php endif; ?>

						<form action="<?= base_url('auth'); ?>" method="post">
							<div class="form-group">
								<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
								<input type="text" name="username" class="form-control" placeholder="Username" id="form" autocomplete="off">
							</div>

							<div class="form-group">
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
								<input type="password" name="password" class="form-control" placeholder="Password" id="form">
							</div>

							<button type="submit" id="btn" class="btn bg-primary">Login</button>
							<p class="text-center">Belum punya akun, <a href="<?= base_url('auth/register'); ?>">Daftar</a> di sini</p>   
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="<?= base_url('asset/bootstrap/'); ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('asset/bootstrap/'); ?>js/jquery.js"></script>
</body>

</html>