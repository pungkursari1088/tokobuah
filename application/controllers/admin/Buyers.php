<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buyers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("buyer_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["buyers"] = $this->buyer_model->getAll();
        $this->load->view("admin/buyer/list", $data);
    }

    public function add()
    {
        $buyer = $this->buyer_model;
        $validation = $this->form_validation;
        $validation->set_rules($buyer->rules());

        if ($validation->run()) {
            $buyer->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/buyer/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/buyers');
       
        $buyer = $this->buyer_model;
        $validation = $this->form_validation;
        $validation->set_rules($buyer->rules());

        if ($validation->run()) {
            $buyer->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["buyer"] = $buyer->getById($id);
        if (!$data["buyer"]) show_404();
        
        $this->load->view("admin/buyer/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->buyer_model->delete($id)) {
            redirect(site_url('admin/buyers'));
        }
    }
}
