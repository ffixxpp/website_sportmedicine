<?php
class M_diagnosis extends CI_Model {

    // ฟังก์ชันสำหรับบันทึกข้อมูล
    public function save_form_data($data) {
        return $this->db->insert('opd', $data); // ชื่อตาราง 'opd' ให้เปลี่ยนตามจริง
    }

    // ฟังก์ชันสำหรับอัพเดตข้อมูล
    public function update_data($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('opd', $data); // ชื่อตาราง 'opd' ให้เปลี่ยนตามจริง
    }

    // ฟังก์ชันสำหรับลบข้อมูล
    public function delete_data($id) {
        $this->db->where('id', $id);
        return $this->db->delete('opd'); // ชื่อตาราง 'opd' ให้เปลี่ยนตามจริง
    }

    // ฟังก์ชันสำหรับการดึงข้อมูลทั้งหมด
    public function get_all_data() {
        $query = $this->db->get('opd'); // ชื่อตาราง 'opd' ให้เปลี่ยนตามจริง
        return $query->result_array();
    }

    // ฟังก์ชันสำหรับการดึงข้อมูลตาม ID
    public function get_data_by_id($id) {
        $query = $this->db->get_where('opd', array('id' => $id)); // ชื่อตาราง 'opd' ให้เปลี่ยนตามจริง
        return $query->row_array();
    }

    // ฟังก์ชัน get_assessment สำหรับดึงข้อมูลจากตาราง assessment
    public function get_assessment() {
        $query = $this->db->get('assessment'); // ตรวจสอบว่าตาราง 'assessment' มีอยู่ในฐานข้อมูล
        return $query->result_array();
    }

    // อัปเดตสถานะใน assessment
    public function update_assessment_status($data_update) {
        $this->db->where('as_id', $data_update['as_id']);
        $this->db->update('assessment', $data_update);
    }

    // อัปเดตสถานะตาม hn
    public function update_assessment_status_by_hn($data_update) {
        $this->db->where('as_hn', $data_update['as_hn']);
        $this->db->update('assessment', $data_update);
    }

    // สำหรับเรียกข้อมูล Ajax
    public function ajax_assessment($id_as) {
        $this->db->where('as_id', $id_as);
        $query = $this->db->get('assessment');
        return $query->result_array();
    }
}
