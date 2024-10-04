<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_clinic_register extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // ในกรณีที่ต้องการติดต่อกับฐานข้อมูล สามารถโหลดไลบรารี Database ได้ดังนี้
        $this->load->database();
    }

    // get ข้อมูล roles
    public function get_data_roles($role)
    {
        $this->db->select('*');
        $this->db->from('roles');
        $this->db->where('role_name', $role);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
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
}
