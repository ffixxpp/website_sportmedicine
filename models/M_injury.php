<?php
class M_injury extends CI_Model {

    // ฟังก์ชันสำหรับบันทึกข้อมูลลงในตาราง medical_reports
    public function insert_report($data) {
        $this->db->insert('medical_reports', $data);
        return $this->db->insert_id(); // ส่งคืน report_id ที่เพิ่งบันทึก
    }

    // ฟังก์ชันสำหรับบันทึกข้อมูลการบาดเจ็บลงในตาราง injuries
    public function insert_injury($data) {
        return $this->db->insert('injuries', $data);
    }

    public function insert_medical_report($data) {
        $this->db->insert('medical_report', $data);
        return $this->db->insert_id();
    }

    public function insert_injury_report($data) {
        $this->db->insert('injury_report', $data);
    }

    public function insert_illness_report($data) {
        $this->db->insert('illness_report', $data);
    }
}
?>