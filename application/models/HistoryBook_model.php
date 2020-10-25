<?php defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryBook_model extends CI_Model
{
    private $_table ="books_history";

    public $id_buku;
    public $jml_masuk;
    public $jml_keluar;
    public $tanggal;
    
    public function rules()
    {
        return [
            ['field' => 'id_buku',
            'label' => 'Id_buku',
            'rules' => 'required'],

            ['field' => 'jml_masuk',
            'label' => 'Jml_masuk',
            'rules' => 'numeric'],

            ['field' => 'jml_keluar',
            'label' => 'Jml_keluar',
            'rules' => 'numeric'],
            
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('books_history.id,
        books.nama AS nama_buku,
        books_history.jml_masuk,
        books_history.jml_keluar,
        books_history.tanggal');
        $this->db->from('books_history');
        $this->db->join('books','books.id = books_history.id_buku','left');
        $query =  $this->db->get()->result();
        return $query;

        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function simpanPesanan()
    {
        $now = date("Y-m-d H:i:s");
        $post = $this->input->post();
        $this->id_buku = $post["id_buku"];
		$this->jml_keluar = $post["jumlah_order"];
        $this->tanggal = $now;
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
		$this->harga = $post["harga"];
        $this->jumlah = $post["jumlah"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
    
    public function updateOrder($data)
    {
        $post = $this->input->post();
        $this->id = $post["id_buku"];
        $this->jumlah = $data["jumlah"];
        $this->db->update($this->_table, $this, array('id' => $post['id_buku']));
    }

}
