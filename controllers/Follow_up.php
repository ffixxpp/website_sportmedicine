<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Main_controller.php';

// Controller สำหรับการติดตาม
class Follow_up extends Main_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_follow_up', 'fu'); // โหลดโมเดล
        // โหลด Check_login library เพื่อเช็คการเข้าสู่ระบบ
        $this->load->library('Check_login');
        $this->check_login->check_session();
    }

    // หน้าแรกของเมนูการติดตาม
    public function index()
    {
        // ดึง user_id จาก session
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            // ถ้า user_id ไม่พบ ให้ทำการ redirect หรือแสดงข้อความผิดพลาด
            show_error('User ID ไม่ถูกต้อง หรือคุณยังไม่ได้เข้าสู่ระบบ', 500);
        }

        // ตัวอย่างการดึงข้อมูลจากโมเดล
        $data['pain_score'] = $this->fu->get_pain_score($user_id); // ดึงคะแนนความเจ็บปวด
        $data['exercise_vital_sign'] = $this->fu->get_vital_sign($user_id); // ดึงข้อมูล Vital Sign
        $data['exercise_duration'] = $this->fu->get_exercise_duration($user_id); // ดึงข้อมูลระยะเวลาในการออกกำลังกาย
        $data['injury_history'] = $this->fu->get_injury_history($user_id); // ดึงข้อมูลประวัติการบาดเจ็บ
        $data['treatment_goal'] = $this->fu->get_treatment_goal($user_id); // ดึงเป้าหมายการรักษา
        $data['allergy_history'] = $this->fu->get_allergy_history($user_id); // ดึงประวัติแพ้ยา
        $data['description'] = $this->fu->get_description($user_id); // ดึงรายละเอียดเพิ่มเติม
        $data['record_date'] = $this->fu->get_record_date($user_id); // ดึงวันที่ในการบันทึก
        $data['times'] = $this->fu->get_times($user_id); // ดึงข้อมูลจำนวนครั้ง

        // ส่งข้อมูลไปยัง View
        $this->output_cms('cms/follow_up/main_page', $data);
    }
}
