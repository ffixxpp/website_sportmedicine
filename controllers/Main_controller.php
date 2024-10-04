<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        
    }

    //MANAGE DISPLAY FRONT-END
    function header()
    {
        $this->load->view('template/header');
    }

    function navbar()
    {
        $this->load->view('template/navbar');
    }

    function css()
    {
        $this->load->view('template/css');
    }

    function javascript()
    {
        $this->load->view('template/javascript');
    }

    function footer($data = '')
    {
        $this->load->view('template/footer');
    }
    function footer_cms($data = '')
    {
        $this->load->view('template/footer_cms');
    }

    function sidebar($data = '')
    {
        $this->load->view('template/sidebar', $data);
    }


    function output($body = '', $data = '')
    {
        $this->header();
        $this->css();
        $this->javascript();
        $this->navbar();
        $this->load->view($body, $data);
        // $this->footer();
    }

    function output_cms($body = '', $data = '')
    {
        $this->header();
        $this->css();
        $this->javascript();
        $this->sidebar();
        $this->load->view($body, $data);
        // $this->footer_cms();
    }

    function output_auth($body = '', $data = '')
    {
        $this->header();
        $this->css();
        $this->javascript();
        $this->load->view($body, $data);

        // $this->navbar();
        $this->footer();
    }
}
