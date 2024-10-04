<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Main_controller.php';

// Controller ของเมนูรายงานผลลัพธ์
class Report extends Main_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_report', 'report');
         // โหลด Check_login library ตรวจสอบการเข้าสู่ระบบ
         $this->load->library('Check_login');
         $this->check_login->check_session();
    }

    //หน้าแรกของเมนูการรักษา
    public function index()
    {
        $this->output_cms('cms/report/main_page');
    }
}
