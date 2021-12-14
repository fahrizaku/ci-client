<?php

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        // $this->load->model('Login_model');
        // $this->login_model->keamanan();
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->model('Login_model');
        $this->Login_model->keamanan();
        $data['judul'] = 'Daftar Karyawan';
        $data['karyawan'] = $this->Karyawan_model->getAllKaryawan();
        if( $this->input->post('keyword') ) {
            $data['karyawan'] = $this->Karyawan_model->cariDataKaryawan();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('karyawan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Karyawan';

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->tambahDataKaryawan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('karyawan');
        }
    }

    public function hapus($id)
    {
        $this->Karyawan_model->hapusDataKaryawan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('karyawan');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Karyawan';
        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('karyawan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Karyawan';
        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id);
        $data['bagian'] = ['CEO', 'Sekretaris', 'Bendahara', 'Kasir', 'Anggota'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->ubahDataKaryawan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('karyawan');
        }
    }

}
