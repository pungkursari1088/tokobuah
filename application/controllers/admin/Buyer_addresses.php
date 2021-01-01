<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buyer_addresses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("buyer_address_model");
        $this->load->model("buyer_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if ($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["buyer_addresses"] = $this->buyer_address_model->getAll();
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view("admin/buyer_address/list", $data);
    }

    public function add()
    {
        //mengambil nilai data dari pembeli untuk dropdown list
        $data["buyers"] = $this->buyer_model->getAll();
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $buyer_address = $this->buyer_address_model;
        $validation = $this->form_validation;
        $validation->set_rules($buyer_address->rules());

        if ($validation->run()) {
            $buyer_address->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/buyer_address/new_form", $data);
    }

    public function edit($ba_id = null)
    {
        $data["buyers"] = $this->buyer_model->getAll();
        if (!isset($ba_id)) redirect('admin/buyer_addresses');
        $buyer_address = $this->buyer_address_model;
        $validation = $this->form_validation;
        $validation->set_rules($buyer_address->rules());

        if ($validation->run()) {
            $buyer_address->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["buyer_address"] = $buyer_address->getById($ba_id);
        if (!$data["buyer_address"]) show_404();
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view("admin/buyer_address/edit_form", $data);
    }

    public function delete($ba_id = null)
    {
        if (!isset($ba_id)) show_404();

        if ($this->buyer_model->delete($ba_id)) {
            redirect(site_url('admin/buyer_addressess'));
        }
    }

    function get_buyer_address()
    {
        $id_buyer = $this->input->post('id_buyer', TRUE);
        $data = $this->buyer_address_model->get_buyer_address($id_buyer);
        // echo '<pre>' . var_export($data, true) . '</pre>';
        echo json_encode($data);
    }
}
