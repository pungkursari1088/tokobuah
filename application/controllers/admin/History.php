<?php

defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("history_model");
        $this->load->model("book_model");
        $this->load->model("buyer_model");
        $this->load->model("user_model");
        $this->load->model("buyer_address_model");
        if ($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        // $data["historys"] = $this->historybook_model->getAll();
        $data["historys"] = $this->history_model->getAll();
        $this->load->view("admin/history/list", $data);
    }

    public function add()
    {
        $data["books"] = $this->book_model->getAll();
        $data["buyers"] = $this->buyer_model->getAll();
        $history = $this->history_model;
        $validation = $this->form_validation;
        $validation->set_rules($history->rules());

        if ($validation->run()) {
            $history->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/history/new_form", $data);
    }

    public function edit($id = null)
    {
        $data["books"] = $this->book_model->getAll();
        $data["buyers"] = $this->buyer_model->getAll();
        if (!isset($id)) redirect('admin/history');

        $history = $this->history_model;
        $validation = $this->form_validation;
        $validation->set_rules($history->rules());

        if ($validation->run()) {
            $history->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["history"] = $history->getById($id);
        if (!$data["history"]) show_404();
        $data["buyer_addresses"] = $this->buyer_address_model->get_buyer_address($data["history"]->id_buyer);
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view("admin/history/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->book_model->delete($id)) {
            redirect(site_url('admin/books'));
        }
    }
}
