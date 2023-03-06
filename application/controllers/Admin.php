<?php

/**
 * 
 */
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_admin_all_level();
		$this->load->model('M_master');
		$this->load->model('M_admin');
		$this->load->model('M_pengaduan');
	}
	public function index()
	{
		$data['title'] = 'Aplikasi Pengaduan Masyarakat | Home';
		$data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->db->limit(5);
		$this->db->order_by('id_pengaduan', 'DESC');
		$data['pengaduan'] = $this->M_pengaduan->getAllPengaduan();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

		// Untuk Menambahkan Data Admin / Admin
		public function add_admin()
		{
			$data['title'] = 'Tambah Data Admin';
			$data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
	
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]', [
				'required' => 'Nama harus di isi',
				'min_length' => 'Nama min 3 huruf'
			]);
			$this->form_validation->set_rules('telp', 'No telp', 'required|trim|min_length[11]|max_length[13]|is_unique[tbl_admin.no_telp]|numeric', [
				'required' => 'No Telp harus di isi',
				'min_length' => 'No Telp min 11 angka',
				'max_length' => 'No Telp max 13 angka',
				'is_unique' => 'No Telp sudah terdaftar',
				'numeric' => 'No Telp harus angka'
			]);
			$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[tbl_admin.username]', [
				'required' => 'Username harus di isi',
				'min_length' => 'Username min 5 karakter',
				'is_unique' => 'Username sudah terdaftar'
			]);
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[repassword]', [
				'required' => 'Password harus di isi',
				'min_length' => 'Password min 5 karakter',
				'matches' => 'Password harus sama dengan Ulangi Password'
			]);
			$this->form_validation->set_rules('repassword', 'Ulangi Password', 'required|trim|matches[password]', [
				'required' => 'Ulangi Password harus di isi',
				'matches' => 'Ulangi Password harus sama dengan Password'
			]);
			$this->form_validation->set_rules('level', 'Level', 'required', ['required' => 'Harap pilih salah satu']);
	
			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar');
				$this->load->view('templates/topbar', $data);
				$this->load->view('admin/add');
				$this->load->view('templates/footer');
			} else {
				$this->M_master->add_admin();
			}
		}

	public function tes() {
		$data['pengaduan'] = $this->db->get('tbl_pengaduan')->result();
		var_dump($data['pengaduan']);die;
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('nama', 'nama', 'required|trim|min_length[3]', [
			'required' => 'Nama harus di isi',
			'min_length' => 'Nama min 3 huruf'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->M_admin->edit_nama();
		}
	}

	public function edit_Telp()
	{
		$data['title'] = 'Edit No Telp';
		$data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('telp', 'telp', 'required|trim|min_length[11]|max_length[13]|is_unique[tbl_admin.no_telp]|numeric', [
			'required' => 'No telp harus di isi',
			'min_length' => 'No telp min 11 angka',
			'is_unique' => 'No telp sudah terdaftar, coba dengan no telp lain',
			'max_length' => 'No telp max 13 angka',
			'numeric' => 'No telp harus angka'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/edit_telp', $data);
			$this->load->view('templates/footer');
		} else {
			$this->M_admin->edit_telp();
		}
	}

	public function edit_password()
	{
		$data['title'] = 'Edit Password';
		$data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('pl', 'pl', 'required|trim', ['required' => 'Password lama harus di si']);
		$this->form_validation->set_rules('pb', 'pb', 'required|trim|min_length[5]|matches[kpb]', [
			'required' => 'Password baru harus di isi',
			'min_length' => 'Password baru min 5 karakter',
			'matches' => 'Password baru harus sama dengan konfirmasi password baru',
		]);
		$this->form_validation->set_rules('kpb', 'kpb', 'required|trim|matches[pb]', [
			'required' => 'Konfirmasi password baru harus di isi',
			'matches' => 'Konfirmasi password baru harus sama dengan password baru',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/edit_pass', $data);
			$this->load->view('templates/footer');
		} else {
			$this->M_admin->edit_password();
		}
	}
}
