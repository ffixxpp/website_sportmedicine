<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_assessment extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // ในกรณีที่ต้องการติดต่อกับฐานข้อมูล สามารถโหลดไลบรารี Database ได้ดังนี้
        $this->load->database();
    }

    //บันทึกข้อมูลตรวจประเมิน
    public function save_assessment($data)
    {
        $save = $this->db->insert('assessment', $data);
        if ($save) {
            return $this->db->insert_id(); // คืนค่า ID ของแถวที่เพิ่มล่าสุด
        } else {
            return false;
        }
    }

    //บันทึกข้อมูล painscore
    public function save_pain_score($data)
    {
        $save = $this->db->insert('pain_score', $data);
        if ($save) {
            return true;
        } else {
            return false;
        }
    }

    //query ข้อมูล assessment
    public function get_assessment()
    {
        $this->db->select('*');
        $this->db->from('assessment');

        if ($_SESSION['user_role_id'] == '2') {
            $this->db->where('as_hn', $_SESSION['user_hn']);
        }
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    public function get_data_session($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    //ลบข้อมูลตาราง assessment
    public function delete_assessment($as_id)
    {
        $this->db->where('as_id', $as_id);
        $this->db->delete('assessment');

        if ($this->db->affected_rows() > 0) {
            return true; // ลบสำเร็จ
        } else {
            return false; // ลบไม่สำเร็จ
        }
    }

    //ลบข้อมูลตาราง painscore
    public function delete_pain_score($as_id)
    {
        $this->db->where('as_id', $as_id);
        $this->db->delete('pain_score');

        if ($this->db->affected_rows() > 0) {
            return true; // ลบสำเร็จ
        } else {
            return false; // ลบไม่สำเร็จ
        }
    }

    //get ข้อมูล assessment join painscore
    public function get_assessment_painscore_by_id($as_id)
    {
        $this->db->select('*');
        $this->db->from('assessment as as');
        $this->db->join('pain_score as pc', 'as.as_id=pc.as_id', 'inner');
        $this->db->where('as.as_id', $as_id);
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    //แก้ไขข้อมูล assessment
    public function change_assessment($as_id, $data)
    {
        $this->db->where('as_id', $as_id);
        $this->db->update('assessment', $data);

        if ($this->db->affected_rows() > 0) {
            return true; // แก้ไขสำเร็จ
        } else {
            return false; // แก้ไขไม่สำเร็จ
        }
    }

    //แก้ไขข้อมูล painscore
    public function change_pain_score($pc_id, $data)
    {
        // กำหนดเงื่อนไขในการเลือกข้อมูลที่ต้องการแก้ไข
        $this->db->where('pc_id', $pc_id);

        // อัพเดตข้อมูลในตารางที่กำหนด
        $this->db->update('pain_score', $data);

        // ตรวจสอบว่ามีการแก้ไขข้อมูลหรือไม่
        if ($this->db->affected_rows() > 0) {
            return true; // แก้ไขสำเร็จ
        } else {
            return false; // แก้ไขไม่สำเร็จ
        }
    }
}
