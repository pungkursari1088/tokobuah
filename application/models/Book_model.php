<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model
{
    private $_table = "books";

    public $id;
    public $nama;
    public $harga;
    public $jumlah;
    

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric'],
            
            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        
        $this->nama = $post["nama"];
		$this->harga = $post["harga"];
        $this->jumlah = $post["jumlah"];
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
