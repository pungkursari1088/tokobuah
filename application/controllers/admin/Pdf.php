<?php

defined('BASEPATH') or exit('No direct script access allowed');

// reference the Dompdf namespace 
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

class Pdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("user_model");
        $this->load->model("history_model");
        if ($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["historys"] = $this->history_model->getAll();
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setIsRemoteEnabled(TRUE);
        $options->isPhpEnabled(TRUE);
        $options->isJavascriptEnabled(true);
        $options->isHtml5ParserEnabled(true);
        $dompdf->setOptions($options);
        $html = $this->load->view('admin/history/list_print', $data, true);
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

        // $this->load->view('admin/history/list_print', $data);
    }
}
