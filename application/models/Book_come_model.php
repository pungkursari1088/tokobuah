<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Book_come_model extends CI_Model
{
    private $_table = "books_come";
    private $_table_book = "books";

    public $id;
    public $id_book;
    public $book_order_in;
    public $date_come;
    

    public function rules()
    {
        return [
            ['field' => 'id_book',
            'label' => 'Book_Id',
            'rules' => 'required'],

            ['field' => 'book_order_in',
            'label' => 'Book_Order_In',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        $this->db->select('books_come.id AS book_come_id,
        books.book_name,
        books_come.book_order_in,
        books_come.date_come');
        $this->db->from('books_come');
        $this->db->join('books', 'books_come.id_book = books.id','left');
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        
        $date = date('Y-m-d H:i:s');
        $post = $this->input->post();
        $this->id_book = $post["id_book"];
        $this->book_order_in = $post["book_order_in"];
        $this->date_come = $date;
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $date = date('Y-m-d H:i:s');
        $post = $this->input->post();
        $this->id_book = $post["id_book"];
        $this->book_order_in = $post["book_order_in"];
        $this->date_come = $date;
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}
