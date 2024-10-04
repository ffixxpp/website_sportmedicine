<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // ในกรณีที่ต้องการติดต่อกับฐานข้อมูล สามารถโหลดไลบรารี Database ได้ดังนี้
        $this->load->database();
    }

    public function get_data_role()
    {
        $this->db->select('*');
        $this->db->from('roles');
        $this->db->where_not_in('role_id', array('2', '4'));
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }
}
