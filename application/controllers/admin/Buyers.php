<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buyers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("buyer_model");
        $this->load->model("book_model");
        $this->load->model("user_model");
        $this->load->model("historybook_model");
        $this->load->library('form_validation');
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["buyers"] = $this->buyer_model->getData();
        $this->load->view("admin/buyer/list", $data);
    }
    public function newBuyer(){
        $data["books"] = $this->book_model->getAll();
        $this->load->view("admin/buyer/new_form", $data);
    }

    public function add()
    {
        $buyer = $this->buyer_model;
        $book = $this->book_model;
        $history = $this->historybook_model;
        $validation = $this->form_validation;
        $validation->set_rules($buyer->rules());

        if ($validation->run()) {
            $post = $this->input->post();
            $_book = $book->getById($post["id_buku"]);
            //menghitung total harga produk yang dibeli
            $data["total"] = ($_book->harga)*$post["jumlah_order"]+$post["ongkos_kirim"];
            $buyer->save($data);
            //menghitung sisa buku yang dipesan
            $data["jumlah"] = ($_book->jumlah)-$post["jumlah_order"]; 
            $history->simpanPesanan();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        redirect(site_url('admin/buyers/newBuyer'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/buyers');
       
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["buyer"] = $product->getById($id);
        if (!$data["buyer"]) show_404();
        
        $this->load->view("admin/buyer/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            redirect(site_url('admin/products'));
        }
    }
}
