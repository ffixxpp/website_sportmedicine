<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Main_controller.php';

class Auth extends Main_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_auth_login', 'al');
    }

    // หน้าหลัก login
    public function index()
    {
        $this->output_auth('frontend/login');
    }

    //สำหรับบุคคลทั่วไป
    public function general()
    {
        $data['type'] = 'general';
        $this->output_auth('frontend/login', $data);
    }

    //สำหรับเจ้าหน้าที่
    public function officer()
    {
        $data['type'] = 'officer';
        $this->output_auth('frontend/login', $data);
    }

    //หน้า register 
    public function register($type)
    {
        $data['type'] = $type;
        $data['roles'] = $this->al->get_data_roles();
        $this->output_auth('frontend/register', $data);
    }

    //check email
    public function checkemail()
    {
        // ตรวจสอบค่าอีเมล
        $email = $this->input->post('email');
        $result = $this->al->checkemail($email);

        if ($result) {
            echo 'false'; // อีเมลนี้มีอยู่แล้วในฐานข้อมูล
        } else {
            echo 'true'; // สามารถใช้อีเมลนี้ได้
        }
    }
}
