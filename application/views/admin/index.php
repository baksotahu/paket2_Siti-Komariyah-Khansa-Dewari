        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>


          <div class="row">
            <div class="col-lg-3">
              <div class="card shadow border-left-info">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Petugas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get_where('tbl_admin', ['level' => 2])->num_rows(); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="card shadow border-left-dark">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Masyarakat</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get('tbl_masyarakat')->num_rows(); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if ($this->session->userdata('level') == 1) : ?>
              <div class="col-lg-3">
                <div class="card shadow border-left-warning">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get_where('tbl_admin', ['level' => 1])->num_rows(); ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <div class="col-lg-3">
              <div class="card shadow border-left-danger">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Jumlah Pengaduan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get('tbl_pengaduan')->num_rows(); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if ($this->session->userdata('level') == 2) : ?>
              <div class="col-lg-3">
                <div class="card shadow border-left-warning">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          Hari Ini
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php date_default_timezone_set('Asia/Jakarta');
                          echo date('D,d M Y'); ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <h5 class="ml-3 mt-4">Data Pengaduan Terbaru</h5>

            <div class="col-lg-12">
              <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                  <tr>
                      <th>Tanggal</th>
                      <th>Nama Pelapor</th>
                      <th>Isi Pengaduan</th>
                      <th>Foto</th>
                      <th>Verifikasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pengaduan as $p) { ?>
                    <?php if ($p->status_diterima == null) : ?>
                    <tr>
                      <td><?= date('D,d M Y H:i:s', $p->id_pengaduan); ?></td>
                      <td><?= $p->nama; ?></td>
                      <td><?= $p->isi_laporan; ?></td>
                      <td><img src="<?= base_url('asset/upload/') . $p->foto; ?>" width="100px"></td>
                      <td>
                        <?php if ($p->status_diterima == null) : ?>
                          <a href="<?= base_url('pengaduan/tolak_pengaduan/') . $p->id_pengaduan; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Tolak </a>
                          <a href="<?= base_url('pengaduan/terima_pengaduan/') . $p->id_pengaduan; ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right">Terima</i></a>
                        <?php else: ?>
                          <?php if ($p  ->status_diterima == "diterima") : ?>
                          <span class="badge badge-success badge-pill py-3 px-4">
                            Diterima
                          </span>
                        <?php else : ?>
                          <span class="badge badge-danger badge-pill py-3 px-4">
                            Ditolak
                          </span>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endif; ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>


          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->