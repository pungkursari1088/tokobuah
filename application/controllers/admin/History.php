<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("historybook_model");
        $this->load->library('form_validation');
        $this->load->model("book_model");
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["historys"] = $this->historybook_model->getAll();
        $this->load->view("admin/history/list_history", $data);
    }

    public function add()
    {
        $book = $this->book_model;
        $validation = $this->form_validation;
        $validation->set_rules($book->rules());

        if ($validation->run()) {
            $book->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/book/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/books');
       
        $book = $this->book_model;
        $validation = $this->form_validation;
        $validation->set_rules($book->rules());

        if ($validation->run()) {
            $book->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["book"] = $book->getById($id);
        if (!$data["book"]) show_404();
        
        $this->load->view("admin/book/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->book_model->delete($id)) {
            redirect(site_url('admin/books'));
        }
    }
}
