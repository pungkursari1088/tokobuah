<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer_model extends CI_Model
{
    private $_table = "buyers";

    public $id;
    public $nama;
    public $alamat;
    public $kota;
    public $provinsi;
    public $kode_pos;
    public $ekspedisi;
    public $ongkos_kirim;
    public $berat_kiriman;
    public $tanggal;
    public $telepone;
    public $email;
    public $status;
    public $id_buku;
    public $jumlah_order;
    public $total;
    

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'kota',
            'label' => 'Kota',
            'rules' => 'required'],

            ['field' => 'provinsi',
            'label' => 'Provinsi',
            'rules' => 'required'],

            ['field' => 'kode_pos',
            'label' => 'Kode_pos',
            'rules' => 'required'],

            ['field' => 'ekspedisi',
            'label' => 'Ekspedisi',
            'rules' => 'required'],

            ['field' => 'ongkos_kirim',
            'label' => 'Ongkos_kirim',
            'rules' => 'required'],

            ['field' => 'berat_kiriman',
            'label' => 'Berat_kiriman',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'telepone',
            'label' => 'Telepone',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'id_buku',
            'label' => 'Id_buku',
            'rules' => 'numeric'],

            ['field' => 'jumlah_order',
            'label' => 'Jumlah_order',
            'rules' => 'numeric'],
            
            ['field' => 'total',
            'label' => 'Total',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getData(){
        // $this->db->query("SELECT buyers.id,buyers.nama AS nama_pembeli,books.nama AS nama_buku
        // FROM buyers 
        // LEFT JOIN books 
        // ON buyers.id_buku = books.id");
        $this->db->select('buyers.id,
        buyers.nama AS nama_pembeli,
        books.nama AS nama_buku,
        buyers.alamat,
        buyers.jumlah_order,
        buyers.total');
        $this->db->from('buyers');
        $this->db->join('books','books.id = buyers.id_buku','left');
        $query =  $this->db->get()->result();
        return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save($data)
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
		$this->alamat = $post["alamat"];
        $this->kota = $post["kota"];
        $this->provinsi = $post["provinsi"];
        $this->kode_pos = $post["kode_pos"];
        $this->ekspedisi = $post["ekspedisi"];
        $this->ongkos_kirim = $post["ongkos_kirim"];
        $this->berat_kiriman = $post["berat_kiriman"];
        $this->tanggal = $post["tanggal"];
        $this->telepone = $post["telepone"];
        $this->email = $post["email"];
        $this->status = $post["status"];
        $this->id_buku = $post["id_buku"];
        $this->jumlah_order = $post["jumlah_order"];
        //total = harga buku*jumlah order + ongkos kirim
        $this->total = $data["total"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
		$this->alamat = $post["alamat"];
        $this->kota = $post["kota"];
        $this->provinsi = $post["provinsi"];
        $this->kode_pos = $post["kode_pos"];
        $this->ekspedisi = $post["ekspedisi"];
        $this->ongkos_kirim = $post["ongkos_kirim"];
        $this->berat_kiriman = $post["berat_kiriman"];
        $this->tanggal = $post["tanggal"];
        $this->telepone = $post["telepone"];
        $this->email = $post["email"];
        $this->status = $post["status"];
        $this->id_buku = $post["id_buku"];
        $this->jumlah_order = $post["jumlah_order"];
        $this->total = $post["total"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
	}

}
