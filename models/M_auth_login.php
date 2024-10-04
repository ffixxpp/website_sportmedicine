<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth_login extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // ในกรณีที่ต้องการติดต่อกับฐานข้อมูล สามารถโหลดไลบรารี Database ได้ดังนี้
        $this->load->database();
    }

    //check email
    public function get_user_by_email($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_roles', 'users.user_id=user_roles.user_id');
        $this->db->join('roles', 'user_roles.role_id=user_roles.role_id');
        $this->db->where('users.email', $email);
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    //check role
    public function check_role($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_roles');
        $this->db->join('roles', 'user_roles.role_id=roles.role_id');
        $this->db->where('user_roles.user_id', $user_id);
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    //get data roles
    public function get_data_roles()
    {
        $this->db->select('*');
        $this->db->from('roles');
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    // บันทึกข้อมูลผู้ใช้
    public function save_register($data)
    {
        $save = $this->db->insert('users', $data);
        if ($save) {
            return $this->db->insert_id(); // คืนค่า ID ของแถวที่เพิ่มล่าสุด
        } else {
            return false;
        }
    }

    //บันทึกข้อมูล role
    public function save_role($data)
    {
        $save = $this->db->insert('user_roles', $data);
        if ($save) {
            return true;
        } else {
            return false;
        }
    }

    //check email
    public function checkemail($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $result = $this->db->get();
        $query = $result->result_array();


        if (!empty($query)) {
            return true; // มีอีเมลนี้ในฐานข้อมูล
        } else {
            return false; // ไม่มีอีเมลนี้ในฐานข้อมูล
        }
    }

    //check HN
    public function get_hn()
    {
        $this->db->select('*');
        $this->db->from('user_roles');
        $this->db->where('role_id', '2');
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }
}
