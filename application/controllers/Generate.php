<?php
// require_once FCPATH .'vendor/dompdf/dompdf/';
use Dompdf\Dompdf;

class Generate extends CI_Controller{

    public function __construct(){
        parent::__construct();
        cek_only_admin();
        $this->load->model('M_generate');
    }

    public function index(){
        $data['title'] = 'Aplikasi Pengaduan Masyarakat | Home';
		$data['pengguna'] = $this->db->get_where('tbl_admin',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('generate/index');
		$this->load->view('templates/footer');
    }

    private function to_generate($html, $filename = ''){
        $pdf = new DOMPDF();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4','portrait');
        $pdf->render();
        $pdf->stream($filename . 'pdf', array('Attachment' => 0));
    }

    public function gen_pengaduan(){
        $tglAwal = $this->input->post('tglAwal');
        $tglAkhir = $this->input->post('tglAkhir');
        $status = $this->input->post('status');

        $data['pengaduan'] = $this->M_generate->getPengaduanByTgl($tglAwal, $tglAkhir, $status);
       
       $html = $this->load->view('generate/pengaduan', $data, true);
       $this->to_generate($html, 'Data Laporan Pengaduan');

    }

    public function gen_masyarakat(){
        $data['masyarakat'] = $this->M_generate->getMasyarakatAll();
        $html = $this->load->view('generate/masyarakat', $data, true);
        $this->to_generate($html, 'Data Masyarakat');
    }

    public function gen_petugas(){
        $data['petugas'] = $this->M_generate->getPetugasAll();
        $html = $this->load->view('generate/petugas', $data, true);
        $this->to_generate($html, 'Data Petugas');
    }

public function gen_admin(){
    $data['petugas'] = $this->M_generate->getAdminAll();
    $html = $this->load->view('generate/admin', $data, true);
    $this->to_generate($html, 'Data Admin');

    }
    public function gen_tanggapan(){
        $data['tanggapan'] = $this->M_generate->gen_TanggapanAll();
        $html = $this->load->view('generate/tanggapan',$data, true);
        $this->to_generate($html,'Data Tanggapan');
    }
}
