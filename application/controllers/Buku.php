<?php

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Buku';
        $data['buku'] = $this->Buku_model->getAllBuku();
        if( $this->input->post('keyword') ) {
            $data['buku'] = $this->Buku_model->cariDataBuku();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Buku';

         $this->form_validation->set_rules('judul', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('buku/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Buku_model->tambahDataBuku();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('buku');
        }
    }

    public function hapus($id)
    {
        $this->Buku_model->hapusDataBuku($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('buku');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Buku';
        $data['buku'] = $this->Buku_model->getBukuById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('buku/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Buku';
        $data['buku'] = $this->Buku_model->getBukuById($id);
        $data['deskripsi'] = ['Gramedia Pustaka', 'Penerbit Erlangga', 'Mizan', 'Elexmedia Komputindo', 'Agro Media'];

        $this->form_validation->set_rules('judul', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('buku/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Buku_model->ubahDataBuku();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('buku');
        }
    }

}
