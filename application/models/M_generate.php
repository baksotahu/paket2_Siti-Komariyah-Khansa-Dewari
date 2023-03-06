<?php

class M_generate extends CI_Model{
    public function getPengaduanByTgl($tglAwal, $tglAkhir, $status){
        // $query = "SELECT tbl_pengaduan.id_pengaduan, tbl_pengaduan.nik, tbl_pengaduan.isi_laporan, tbl_pengaduan.status, tbl_masyarakat.nama FROM tbl_pengaduan, tbl_masyarakat WHERE tbl_pengaduan.nik = tbl_masyarakat.nik  
        // AND tbl_pengaduan.tgl_pengaduan BETWEEN '".$tglAwal."' AND '".$tglAkhir."' AND tbl_pengaduan.status ='".$status."' ORDER BY tbl_pengaduan.tgl_pengaduan AND tbl_pengaduan.status  
        // ASC";
        
        // $this->db->select('tbl_pengaduan.id_pengaduan, tbl_pengaduan.nik, tbl_pengaduan.isi_laporan, tbl_pengaduan.status, tbl_masyarakat.nama, tbl_tanggapan.tgl_tanggapan')
        $this->db->select('*')
                ->join('tbl_masyarakat', 'tbl_masyarakat.nik=tbl_pengaduan.nik')
                // ->join('tbl_tanggapan', 'tbl_tanggapan.id_pengaduan=tbl_pengaduan.id_pengaduan')
                ->where("tbl_pengaduan.tgl_pengaduan BETWEEN '".$tglAwal."' AND '".$tglAkhir."'");
                // ->where("status_diterima", $status);

        if ($status != '') {
            $this->db->where('tbl_pengaduan.status', $status);
        }

                
        return $this->db->get('tbl_pengaduan')->result(); 
    }
    
    public function getMasyarakatAll(){
        return $this->db->get('tbl_masyarakat')->result();
    }

    public function getPetugasAll(){
        return $this->db->get_where('tbl_admin',['level' => 2])->result();

    }

    public function getAdminAll(){
        return $this->db->get_where('tbl_admin',['level' => 1])->result();

    }

    public function getTanggapanAll(){
        $this->db->select('*,tbl_masyarakat.nama as nama_pelapor,tbl_admi.nama as nama_petugas');
        $this->db->join('tbl_pengaduan','tbl_pengaduan.id_pengaduan_pengaduan=tbl_tanggapan.id_pengaduan');
        $this->db->join('tbl_masyarakat','tbl_masyarakat.nik=tbl_pengaduan.nik');
        $this->db->join('tbl_admin','tbl_admin.id_admin=tbl_tangggapan.id_admin');
        return $this->db->get_where('tbl_tanggapan')->result();
    }
}