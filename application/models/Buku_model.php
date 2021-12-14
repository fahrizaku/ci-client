<?php 
use GuzzleHttp\Client;
class Buku_model extends CI_model {
    
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/ci-server2/api/'
        ]);
    }

    public function getAllBuku()
    {
        //return $this->db->get('buku')->result_array();
        
        $response = $this->_client->request('GET','buku');
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    public function getBukuById($id)
    {
        $response = $this->_client->request('GET','buku',[
            'query' => ['id' => $id]]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    public function tambahDataBuku()
    {
        $data = [
            "judul" => $this->input->post('judul', true),
            "tahun" => $this->input->post('tahun', true),
            "pengarang" => $this->input->post('pengarang', true),
            "deskripsi" => $this->input->post('deskripsi', true)
        ];

        //$this->db->insert('buku', $data);
        $response = $this->_client->request('POST','buku',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusDataBuku($id)
    {
        //$this->db->delete('buku', ['id' => $id]);
        $response = $this->_client->request('DELETE','buku',[
            'form_params' => [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function ubahDataBuku()
    {
        $data = [
            "judul" => $this->input->post('judul', true),
            "tahun" => $this->input->post('tahun', true),
            "pengarang" => $this->input->post('pengarang', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "id" => $this->input->post('id', true)
        ];

        $response = $this->_client->request('PUT','buku',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function cariDataBuku()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('judul', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        $this->db->or_like('tahun', $keyword);
        $this->db->or_like('pengarang', $keyword);
        return $this->db->get('buku')->result_array();
    }
}