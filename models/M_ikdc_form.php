<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ikdc_form extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // ตรวจสอบให้แน่ใจว่าได้โหลดฐานข้อมูลแล้ว
    }

    public function save_response($data)
    {
        $this->db->insert('ikdc_responses', $data);
        return $this->db->insert_id(); // Return the inserted ID for reference
    }

    public function save_answers($answers)
    {
        $this->db->insert_batch('ikdc_answers', $answers); // Use insert_batch for inserting multiple rows at once
    }

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('ikdc_responses');
        if ($_SESSION['user_role_id'] == '2') {
            $this->db->where('as_hn', $_SESSION['user_hn']);
        }
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    public function get_record_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('ikdc_responses')->row_array(); // แก้ไขตามชื่อของตาราง
    }

    public function update_record($id, $update_data)
    {
        $this->db->where('id', $id);
        return $this->db->update('ikdc_responses', $update_data);
    }

    public function get_answers_by_response_id($response_id)
    {
        $this->db->where('response_id', $response_id);
        $result = $this->db->get('ikdc_answers');
        return $result->result_array();
    }

    public function update_answers($answers_data)
    {
        foreach ($answers_data as $answer) {
            $this->db->where('response_id', $answer['response_id']);
            $this->db->where('question_key', $answer['question_key']);
            $this->db->update('ikdc_answers', array(
                'answer_value' => $answer['answer_value'],
                'ques_desc' => $answer['ques_desc']
            ));
        }
    }
    public function delete_record($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ikdc_responses');
    }

    public function get_data_by_hn($id)
    {
        $this->db->select('*');
        $this->db->from('ikdc_responses');
        $this->db->where('id', $id);
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }

    public function get_data_answer_by_hn($id){
        $this->db->select('*');
        $this->db->from('ikdc_answers');
        $this->db->where('response_id', $id);
        $result = $this->db->get();
        $query = $result->result_array();
        return $query;
    }
}
