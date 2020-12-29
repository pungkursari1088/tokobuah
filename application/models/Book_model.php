<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model
{
    private $_table = "books";

    public $id;
    public $book_name;
    public $book_price;
    

    public function rules()
    {
        return [
            ['field' => 'book_name',
            'label' => 'Book_Name',
            'rules' => 'required'],

            ['field' => 'book_price',
            'label' => 'Book_Price',
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
        $this->book_name = $post["book_name"];
		$this->book_price = $post["book_price"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->book_name = $post["book_name"];
		$this->book_price = $post["book_price"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
    
    // public function updateOrder($data)
    // {
    //     $post = $this->input->post();
    //     $this->id = $post["id_buku"];
    //     $this->jumlah = $data["jumlah"];
    //     $this->db->update($this->_table, $this, array('id' => $post['id_buku']));
    // }

}
