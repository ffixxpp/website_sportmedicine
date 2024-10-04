<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_treatment extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // ในกรณีที่ต้องการติดต่อกับฐานข้อมูล สามารถโหลดไลบรารี Database ได้ดังนี้
        $this->load->database();
    }

    public function get_assessments()
    {
        $query = $this->db->get('assessment');
        return $query->result_array();
    }

    // ฟังก์ชันดึงข้อมูลผู้ป่วยจาก assessment โดยใช้ as_id
    public function get_patient_info($as_id)
    {
        $this->db->where('as_id', $as_id);
        $query = $this->db->get('assessment');
        return $query->row_array();
    }

    // ฟังก์ชันดึงข้อมูล pain score จาก pain_score โดยใช้ as_id
    public function get_pain_score($as_id)
    {
        $this->db->where('as_id', $as_id);
        $query = $this->db->get('pain_score');
        return $query->row_array();
    }

    // ฟังก์ชันบันทึกข้อมูลการรักษา
    public function insert_treatment($data)
    {
        $this->db->insert('treatment_record', $data);
    }

    //get ข้อมูล assessment join painscore
    public function get_assessment_painscore_by_id($as_id)
    {
        $this->db->select('*');
        $this->db->from('assessment as as');
        $this->db->where('as.as_id', $as_id);
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    public function get_painscore_by_id($as_id)
    {
        $this->db->select('*');
        $this->db->from('pain_score');
        $this->db->where('as_id', $as_id);
        $this->db->order_by('pc_id', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    public function treatment_option()
    {
        $this->db->select('*');
        $this->db->from('treatment_option');
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    public function save_treatment($data)
    {
        $save = $this->db->insert('treatment_data', $data);
        if ($save) {
            return true; // คืนค่า ID ของแถวที่เพิ่มล่าสุด
        } else {
            return false;
        }
    }

    public function check_data($as_hn)
    {
        $this->db->select('*');
        $this->db->from('treatment_data');
        $this->db->where('td_as_hn', $as_hn);
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    public function update_treatment($as_hn ,$data)
    {
        $this->db->where('td_as_hn', $as_hn);
        $this->db->update('treatment_data', $data);

        if ($this->db->affected_rows() > 0) {
            return true; // แก้ไขสำเร็จ
        } else {
            return false; // แก้ไขไม่สำเร็จ
        }
    }
}
