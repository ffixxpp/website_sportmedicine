<?php
class M_follow_up extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // ดึงคะแนนความเจ็บปวด
    public function get_pain_score($user_id) {
        $this->db->select('pain_score');
        $this->db->from('treatment_records');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        // ตรวจสอบว่ามีผลลัพธ์จาก query หรือไม่
        if ($query->num_rows() > 0) {
            return $query->row()->pain_score;
        } else {
            return null; // คืนค่า null ถ้าไม่มีข้อมูล
        }
    }
    
    // เพิ่มวิธีการดึงข้อมูลอื่นๆ เหมือนกัน

    public function get_vital_sign($user_id) {
        $this->db->select('exercise_vital_sign');
        $this->db->from('treatment_records');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->exercise_vital_sign;
        } else {
            return null;
        }
    }
    
    public function get_exercise_duration($user_id) {
        $this->db->select('exercise_duration');
        $this->db->from('treatment_records');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->exercise_duration;
        } else {
            return null;
        }
    }
    
    public function get_injury_history($user_id) {
        $this->db->select('injury_history');
        $this->db->from('treatment_records');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->injury_history;
        } else {
            return null;
        }
    }

    public function get_treatment_goal($user_id) {
        $this->db->select('treatment_goal');
        $this->db->from('treatment_records');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->treatment_goal;
        } else {
            return null;
        }
    }

    public function get_allergy_history($user_id) {
        $this->db->select('allergy_history');
        $this->db->from('treatment_records');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->allergy_history;
        } else {
            return null;
        }
    }

    public function get_description($user_id) {
        $this->db->select('description');
        $this->db->from('treatment_records');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->description;
        } else {
            return null;
        }
    }

    public function get_record_date($user_id) {
        $this->db->select('record_date');
        $this->db->from('treatment_records');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->record_date;
        } else {
            return null;
        }
    }

    public function get_times($user_id) {
        $this->db->select('times');
        $this->db->from('treatment_records');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->times;
        } else {
            return null;
        }
    }
}
