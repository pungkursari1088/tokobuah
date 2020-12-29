<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer_model extends CI_Model
{
    private $_table = "buyers";

    public $id;
    public $user_name;
    public $telephone;
    public $email;
    
    public function rules()
    {
        return [
            ['field' => 'user_name',
            'label' => 'User_Name',
            'rules' => 'required'],

            ['field' => 'telephone',
            'label' => 'Telephone',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required']
        
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
        $this->user_name = $post["user_name"];
        $this->telephone = $post["telephone"];
		$this->email = $post["email"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->user_name = $post["user_name"];
        $this->telephone = $post["telephone"];
		$this->email = $post["email"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}
