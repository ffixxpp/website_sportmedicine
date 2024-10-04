<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_saving_form extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // ในกรณีที่ต้องการติดต่อกับฐานข้อมูล สามารถโหลดไลบรารี Database ได้ดังนี้
        $this->load->database();
    }
    
    // ฟังก์ชันสำหรับบันทึกข้อมูลจากฟอร์มลงในฐานข้อมูล
    public function save_form_data($data)
    {
        // ตรวจสอบว่าตาราง 'opd' ในฐานข้อมูลของคุณมีการตั้งค่าและมีฟิลด์ที่ตรงกับข้อมูลที่ส่งมาหรือไม่
        return $this->db->insert('opd', $data); // 'opd' เป็นชื่อตารางที่ต้องตรงกับฐานข้อมูลของคุณ
    }

    // ฟังก์ชันสำหรับดึงข้อมูลทั้งหมดจากตาราง 'opd' เพื่อนำไปแสดงผล
    public function get_all_data()
    {
        $query = $this->db->get('opd'); // ดึงข้อมูลทั้งหมดจากตาราง 'opd'
        return $query->result_array(); // ส่งผลลัพธ์กลับในรูปแบบ array
    }
}

