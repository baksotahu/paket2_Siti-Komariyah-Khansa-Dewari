        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h3>Management Data Admin</h3>

        	<div class="row">
        		<div class="col-lg-12">
				<div class="alert alert-warning">
					<strong>Note : </strong> Jika anda menghapus data masyarakat maka data pengaduan dan data tanggapan dengan NIK yang sama akan ikut terhapus.
				</div>
        			<div class="card shadow">
        				<div class="card-body">
                        <a href="<?= base_url('master/add_admin'); ?>" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data Admin</a>
        					<table class="table table-striped table-bordered" id="myTable">
        						<thead class="table-info">
        							<tr>
        								<th>No</th>
        								<th>Nama</th>
        								<th>Username</th>
        								<th>Aksi</th>
        							</tr>
        						</thead>
        						<tbody>
        							<?php
        							$i = 1;
        							foreach ($petugas as $m) { ?>
        								<tr>
        									<td><?= $i++; ?></td>
        									<td><?= $m->nama; ?></td>
        									<td><?= $m->username; ?></td>
        									<td>
        										<a href="<?= base_url('master/del_admin/') . $m->id_admin; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></a>
        									<?php } ?>
        								</tbody>
        							</table>
        						</div>
        					</div>
        				</div>
        			</div>

        		</div>
        		<!-- /.container-fluid -->

        	</div>
        	<!-- End of Main Content -->
