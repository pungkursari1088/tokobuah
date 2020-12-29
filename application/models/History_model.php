<?php defined('BASEPATH') OR exit('No direct script access allowed');

class History_model extends CI_Model
{
    private $_table = "history";

    public $id;
    public $id_buyer;
    public $id_address;
    public $expedition;
    public $sending_price;
    public $weight_packet;
    public $date_order;
    public $date_send;
    public $payment_status;
    public $buyer_status;
    public $id_book;
    public $book_order_out;
    public $id_group;
    public $date_history;
    public $description;

    public function rules()
    {
        return [
            ['field' => 'id_buyer',
            'label' => 'Id_buyer',
            'rules' => 'required'],

            ['field' => 'id_address',
            'label' => 'Id_address',
            'rules' => 'required'],

            ['field' => 'expedition',
            'label' => 'Expedition',
            'rules' => 'required'],

            ['field' => 'sending_price',
            'label' => 'Sending_price',
            'rules' => 'numeric'],

            ['field' => 'weight_price',
            'label' => 'Weight_price',
            'rules' => 'numeric'],

            ['field' => 'date_order',
            'label' => 'Date_order',
            'rules' => 'date'],

            ['field' => 'date_send',
            'label' => 'Date_send',
            'rules' => 'date'],

            ['field' => 'payment_status',
            'label' => 'Payment_status',
            'rules' => 'required'],

            ['field' => 'buyer_status',
            'label' => 'Buyer_status',
            'rules' => 'required'],

            ['field' => 'id_book',
            'label' => 'Id_book',
            'rules' => 'numeric'],

            ['field' => 'book_order_out',
            'label' => 'Book_order_out',
            'rules' => 'numeric'],

            ['field' => 'id_group',
            'label' => 'Id_group',
            'rules' => 'numeric'],

            ['field' => 'order_group',
            'label' => 'Order_group',
            'rules' => 'required'],

            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required'],
        
        ];
    }

    public function getAll()
    {
        
        $this->db->select('hi.id as hi_id,
        b.user_name,
        ba.address,
        hi.expedition,
        hi.weight_packet,
        bo.book_name,
        hi.book_order_out');
        $this->db->from('history AS hi');
        $this->db->join('buyers AS b', 'hi.id_buyer = b.id','left');
        $this->db->join('buyer_addresses AS ba', 'hi.id_address = ba.id','left');
        $this->db->join('books AS bo', 'hi.id_book = bo.id','left');
        $query = $this->db->get()->result();
        return $query;

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function get_buyer_address($buyer_id){
		return $this->db->get_where($this->_table, ["id_buyer" => $buyer_id])->result();
	}

    public function save()
    {
        $date = date('Y-m-d H:i:s');
        $post = $this->input->post();
        $this->id_buyer = $post["id_buyer"];
        $this->id_address = $post["id_address"];
        $this->expedition = $post["expedition"];
        $this->sending_price = $post["sending_price"];
        $this->weight_packet = $post["weight_packet"];
        $this->date_order = $post["date_order"];
        $this->date_send = $post["date_send"];
        $this->payment_status = $post["payment_status"];
        $this->buyer_status = $post["buyer_status"];
        $this->id_book = $post["id_book"];
        $this->book_order_out = $post["book_order_out"];
        $this->id_group = $post["id_group"];
        $this->date_history = $date;
        $this->description = $post["description"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->id_buyer = $post["id_buyer"];
        $this->alias = $post["alias"];
        $this->address = $post["address"];
        $this->city = $post["city"];
        $this->province = $post["province"];
        $this->pos_code = $post["pos_code"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}
