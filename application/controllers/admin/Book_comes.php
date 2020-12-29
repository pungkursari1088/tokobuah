<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Book_comes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("book_come_model");
        $this->load->model("book_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["book_comes"] = $this->book_come_model->getAll();
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view("admin/book_come/list", $data);
    }

    public function add()
    {
        //mengambil nilai data dari book untuk dropdown list
        $data["books"] = $this->book_model->getAll();

        $book_come = $this->book_come_model;
        $validation = $this->form_validation;
        $validation->set_rules($book_come->rules());

        if ($validation->run()) {
            $book_come->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/book_come/new_form",$data);
    }

    public function edit($book_come_id = null)
    {
        
        if (!isset($book_come_id)) redirect('admin/books_come');

        

        $book_come = $this->book_come_model;
        $validation = $this->form_validation;
        $validation->set_rules($book_come->rules());

        if ($validation->run()) {
            $book_come->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        //mengambil nilai data dari book untuk dropdown list
        $data["books"] = $this->book_model->getAll();

        $data["book_come"] = $book_come->getById($book_come_id);
        if (!$data["book_come"]) show_404();

        $this->load->view("admin/book_come/edit_form",$data);
    }

    public function delete($book_come_id=null)
    {
        if (!isset($book_come_id)) show_404();
        
        if ($this->book_come_model->delete($book_come_id)) {
            redirect(site_url('admin/book_comes'));
        }
    }
}
