<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Main_controller.php';

// Controller ของเมนูตรวจประเมิน
class Admin extends Main_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_admin', 'admin');
    }

    public function index()
    {
        $data['roles'] = $this->admin->get_data_role();
        $this->output_auth('frontend/admin', $data);
    }

    public function success($user_id)
    {
        $data['data_user'] = $this->admin->get_data_user($user_id);
        $this->output_auth('frontend/_gen_success', $data);
    }
}
