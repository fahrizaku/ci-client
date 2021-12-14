<?php 
use GuzzleHttp\Client;
class Karyawan_model extends CI_model {
    
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/ci-server/api/'
        ]);
    }

    public function getAllKaryawan()
    {
        //return $this->db->get('Karyawan')->result_array();
        
        $response = $this->_client->request('GET','karyawan');
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    public function getKaryawanById($id)
    {
        $response = $this->_client->request('GET','karyawan',[
            'query' => ['id' => $id]]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    public function tambahDataKaryawan()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "kode" => $this->input->post('kode', true),
            "telp" => $this->input->post('telp', true),
            "bagian" => $this->input->post('bagian', true)
        ];

        //$this->db->insert('Karyawan', $data);
        $response = $this->_client->request('POST','karyawan',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusDataKaryawan($id)
    {
        //$this->db->delete('Karyawan', ['id' => $id]);
        $response = $this->_client->request('DELETE','karyawan',[
            'form_params' => [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function ubahDataKaryawan()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "kode" => $this->input->post('kode', true),
            "telp" => $this->input->post('telp', true),
            "bagian" => $this->input->post('bagian', true),
            "id" => $this->input->post('id', true)
        ];

        $response = $this->_client->request('PUT','karyawan',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function cariDataKaryawan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('bagian', $keyword);
        $this->db->or_like('kode', $keyword);
        $this->db->or_like('telp', $keyword);
        return $this->db->get('karyawan')->result_array();
    }
}