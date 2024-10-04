<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Main_controller.php';

class Home extends Main_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    // หน้าแรกหลังเข้าสู่ระบบ
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            $this->output('frontend/welcome');
        } else {
            $this->output('frontend/home');
        }
    }

}
