<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer_address_model extends CI_Model
{
    private $_table = "buyer_addresses";

    public $id;
    public $id_buyer;
    public $alias;
    public $address;
    public $city;
    public $province;
    public $pos_code;

    public function rules()
    {
        return [
            ['field' => 'id_buyer',
            'label' => 'Id_buyer',
            'rules' => 'required'],

            ['field' => 'alias',
            'label' => 'Alias',
            'rules' => 'required'],

            ['field' => 'address',
            'label' => 'Address',
            'rules' => 'required'],

            ['field' => 'city',
            'label' => 'City',
            'rules' => 'required'],

            ['field' => 'province',
            'label' => 'Province',
            'rules' => 'required'],

            ['field' => 'pos_code',
            'label' => 'Pos_Code',
            'rules' => 'numeric'],
        
        ];
    }

    public function getAll()
    {
        
        $this->db->select('ba.id as ba_id,
        b.user_name,
        ba.alias,
        ba.address,
        ba.city,
        ba.province,
        ba.pos_code');
        $this->db->from('buyer_addresses AS ba');
        $this->db->join('buyers AS b', 'ba.id_buyer = b.id','left');
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
        $post = $this->input->post();
        $this->id_buyer = $post["id_buyer"];
        $this->alias = $post["alias"];
        $this->address = $post["address"];
        $this->city = $post["city"];
        $this->province = $post["province"];
        $this->pos_code = $post["pos_code"];
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
