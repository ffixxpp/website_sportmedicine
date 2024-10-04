<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Main_controller.php';

// Controller ของเมนูตรวจประเมิน
class Assessment extends Main_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_assessment', 'as');

        // โหลด Check_login library ตรวจสอบการเข้าสู่ระบบ
        $this->load->library('Check_login');
        $this->check_login->check_session();
    }

    //แปลงวันที่
    function convertDateToYMD($date)
    {
        // แยกวัน เดือน ปีออกจากกัน โดยใช้เครื่องหมาย / เป็นตัวแบ่ง
        $dateParts = explode('/', $date);

        // ตรวจสอบว่ามี 3 ส่วน (วัน, เดือน, ปี)
        if (count($dateParts) === 3) {
            // จัดรูปแบบใหม่เป็น ปี-เดือน-วัน
            return $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
        } else {
            // ถ้ารูปแบบไม่ถูกต้อง ให้คืนค่าเดิมหรือแสดงข้อผิดพลาด
            return "Invalid date format";
        }
    }

    //หน้าเมนูตรวจประเมินเบื้องต้น
    public function index()
    {
        $data['assessment'] = $this->as->get_assessment();
        $this->output_cms('cms/assessment/main_page', $data);
    }

    //หน้าตรวจประเมินเบื้องต้น
    public function add_form()
    {
        $data['data_session'] = $this->as->get_data_session($_SESSION['user_id']);
        $this->output_cms('cms/assessment/add_page', $data);
    }

    //get HN number
    public function gen_HN()
    {
        $get_assessment = $this->as->get_assessment();

        $HN = '';
        if (empty($get_assessment)) {
            $HN = 'HN00001';
        } else {
            // นับจำนวนการประเมินทั้งหมด + 1 เพื่อสร้างหมายเลข HN ถัดไป
            $nextNumber = count($get_assessment) + 1;

            // จัดรูปแบบหมายเลข HN โดยเติมศูนย์ให้ครบ 5 หลัก
            $HN = 'HN' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
        }

        return $HN;
    }

    //บันทึกข้อมูล
    public function save()
    {
        $HN_number = $this->input->post('HN_Number'); //เลข HN
        $iName = $this->input->post('iName'); //คำนำหน้า
        $fName = $this->input->post('fName'); //ชื่อ
        $sName = $this->input->post('sName'); //นามสกุล
        $age = $this->input->post('age'); //อายุ
        $gender = $this->input->post('gender'); //เพศ
        $weight = $this->input->post('weight'); //น้ำหนัก
        $height = $this->input->post('height'); //ส่วนสูง
        $blood_group = $this->input->post('blood_group'); //กรุ๊ปเลือด
        $birthday = $this->input->post('birthday'); //วันเกิด
        $state_marital = $this->input->post('state_marital'); //สถานภาพ
        $as_studentID = $this->input->post('as_studentID'); //รหัสนักศึกษา
        $as_faculty = $this->input->post('as_faculty'); //คณะ/สาขา
        $as_Affiliation = $this->input->post('as_Affiliation'); //สังกัด
        $occupation = $this->input->post('occupation'); //อาชีพ
        $educate = $this->input->post('educate'); //วุฒิการศึกษา
        $cardID = $this->input->post('cardID'); //เลขประจำตัวประชาชน
        $address = $this->input->post('address'); //ที่อยู่ปัจจุบัน
        $phone = $this->input->post('phone'); //เบอร์โทร
        $fatherName = $this->input->post('fatherName'); //ชื่อบิดา
        $matherName = $this->input->post('matherName'); //ชื่อมารดา
        $relateName = $this->input->post('relateName'); //ชื่อผู้ติดต่อได้
        $isrelate = $this->input->post('isrelate'); //เกี่ยวข้องเป็น
        $relatePhone = $this->input->post('relatePhone'); //เบอร์โทรผู้ติดต่อได้
        $recommend = $this->input->post('recommend'); //ผู้แนะนำ
        $recomendother = $this->input->post('recomendother'); //ผู้แนะนำหากเป็นแพทย์โปรดระบุ
        $do_date = $this->input->post('do_date'); //วันทำประวัติ
        $allow = $this->input->post('allow'); //1=ยินยอม, 0=ไม่ยินยอม

        //บันทึกลงฐานข้อมูล
        $data_assessment = [
            'as_hn' => $HN_number,
            'as_iName' => $iName,
            'as_fName' => $fName,
            'as_sName' => $sName,
            'as_age' => $age,
            'as_gender' => $gender,
            'as_weight' => $weight,
            'as_height' => $height,
            'as_blood_group' => $blood_group,
            'as_birthday' => $this->convertDateToYMD($birthday),
            'as_state_marital' => $state_marital,
            'as_occupation' => $occupation,
            'as_studentID' => $as_studentID,
            'as_faculty' => $as_faculty,
            'as_Affiliation' => $as_Affiliation,
            'as_educate' => $educate,
            'as_cardID' => $cardID,
            'as_address' => $address,
            'as_phone' => $phone,
            'as_fatherName' => $fatherName,
            'as_matherName' => $matherName,
            'as_relateName' => $relateName,
            'as_isrelate' => $isrelate,
            'as_relatePhone' => $relatePhone,
            'as_recommend' => $recommend,
            'as_recomendother' => $recomendother,
            'as_do_date' => $this->convertDateToYMD($do_date),
            'as_status' => '1',
            'as_allow' => $allow
        ];


        $assessment_id = $this->as->save_assessment($data_assessment);

        //บันทึกข้อมูล Painscore
        $painscore = $this->input->post('painscore'); //pain score
        $frequency = $this->input->post('frequency'); //ความถี่ในการออกกำลังกาย
        $type_sport = $this->input->post('type_sport'); //ประเภทกีฬา
        $timeexercise = $this->input->post('timeexercise'); //ระยะเวลาในการออกกำลังกาย
        $history = $this->input->post('history'); // ประวัติการบาดเจ็บ
        $history_other = $this->input->post('history_other'); //โปรดระบุการบาดเจ็บ
        $hope = $this->input->post('hope'); //ความมุ่งหวังในการรับการรักษา
        $hope_other = $this->input->post('hope_other'); //อื่นๆ ของความมุ่งหวัง
        $defeat_med = $this->input->post('defeat_med'); //ประวัติแพ้ยา
        $defeat_med_other = $this->input->post('defeat_med_other'); //ระบุแพ้ยา

        $data_painscore = [
            'pc_painscore' => $painscore,
            'pc_frequency' => $frequency,
            'pc_type_sport' => $type_sport,
            'pc_timeexercise' => $timeexercise,
            'pc_history' => $history,
            'pc_history_other' => $history_other,
            'pc_hope' => $hope,
            'pc_hope_other' => $hope_other,
            'pc_defeat_med' => $defeat_med,
            'pc_defeat_med_other' => $defeat_med_other,
            'as_id' => $assessment_id,
        ];
        $this->as->save_pain_score($data_painscore);

        redirect(base_url() . 'assessment');
    }


    //ลบข้อมูล 
    public function delete($as_id)
    {
        //ลบข้อมูลตาราง assessment
        $this->as->delete_assessment($as_id);
        //ลบข้อมูลตาราง painscore
        $this->as->delete_pain_score($as_id);

        redirect(base_url() . 'assessment');
    }

    //หน้าแก้ไข
    public function edit($as_id)
    {
        $data['assessment'] = $this->as->get_assessment_painscore_by_id($as_id);
        $this->output_cms('cms/assessment/edit_page', $data);
    }

    //แก้ไขข้อมูล
    public function change()
    {
        $as_id = $this->input->post('as_id');
        $pc_id = $this->input->post('pc_id');
        $iName = $this->input->post('iName'); //คำนำหน้า
        $fName = $this->input->post('fName'); //ชื่อ
        $sName = $this->input->post('sName'); //นามสกุล
        $age = $this->input->post('age'); //อายุ
        $gender = $this->input->post('gender'); //เพศ
        $weight = $this->input->post('weight'); //น้ำหนัก
        $height = $this->input->post('height'); //ส่วนสูง
        $blood_group = $this->input->post('blood_group'); //กรุ๊ปเลือด
        $birthday = $this->input->post('birthday'); //วันเกิด
        $state_marital = $this->input->post('state_marital'); //สถานภาพ
        $as_studentID = $this->input->post('as_studentID'); //รหัสนักศึกษา
        $as_faculty = $this->input->post('as_faculty'); //คณะ/สาขา
        $as_Affiliation = $this->input->post('as_Affiliation'); //สังกัด
        $occupation = $this->input->post('occupation'); //อาชีพ
        $educate = $this->input->post('educate'); //วุฒิการศึกษา
        $cardID = $this->input->post('cardID'); //เลขประจำตัวประชาชน
        $address = $this->input->post('address'); //ที่อยู่ปัจจุบัน
        $phone = $this->input->post('phone'); //เบอร์โทร
        $fatherName = $this->input->post('fatherName'); //ชื่อบิดา
        $matherName = $this->input->post('matherName'); //ชื่อมารดา
        $relateName = $this->input->post('relateName'); //ชื่อผู้ติดต่อได้
        $isrelate = $this->input->post('isrelate'); //เกี่ยวข้องเป็น
        $relatePhone = $this->input->post('relatePhone'); //เบอร์โทรผู้ติดต่อได้
        $recommend = $this->input->post('recommend'); //ผู้แนะนำ
        $recomendother = $this->input->post('recomendother'); //ผู้แนะนำหากเป็นแพทย์โปรดระบุ
        $do_date = $this->input->post('do_date'); //วันทำประวัติ

        //บันทึกลงฐานข้อมูล
        $data_assessment = [
            'as_iName' => $iName,
            'as_fName' => $fName,
            'as_sName' => $sName,
            'as_age' => $age,
            'as_gender' => $gender,
            'as_weight' => $weight,
            'as_height' => $height,
            'as_blood_group' => $blood_group,
            'as_birthday' => $this->convertDateToYMD($birthday),
            'as_state_marital' => $state_marital,
            'as_occupation' => $occupation,
            'as_studentID' => $as_studentID,
            'as_Affiliation' => $as_Affiliation,
            'as_faculty' => $as_faculty,
            'as_educate' => $educate,
            'as_cardID' => $cardID,
            'as_address' => $address,
            'as_phone' => $phone,
            'as_fatherName' => $fatherName,
            'as_matherName' => $matherName,
            'as_relateName' => $relateName,
            'as_isrelate' => $isrelate,
            'as_relatePhone' => $relatePhone,
            'as_recommend' => $recommend,
            'as_recomendother' => $recomendother,
            'as_do_date' => $this->convertDateToYMD($do_date),
        ];

        $this->as->change_assessment($as_id, $data_assessment);

        //บันทึกข้อมูล Painscore
        $painscore = $this->input->post('painscore'); //pain score
        $frequency = $this->input->post('frequency'); //ความถี่ในการออกกำลังกาย
        $type_sport = $this->input->post('type_sport'); //ประเภทกีฬา
        $timeexercise = $this->input->post('timeexercise'); //ระยะเวลาในการออกกำลังกาย
        $history = $this->input->post('history'); // ประวัติการบาดเจ็บ
        $history_other = $this->input->post('history_other'); //โปรดระบุการบาดเจ็บ
        $hope = $this->input->post('hope'); //ความมุ่งหวังในการรับการรักษา
        $hope_other = $this->input->post('hope_other'); //อื่นๆ ของความมุ่งหวัง
        $defeat_med = $this->input->post('defeat_med'); //ประวัติแพ้ยา
        $defeat_med_other = $this->input->post('defeat_med_other'); //ระบุแพ้ยา

        $data_painscore = [
            'pc_painscore' => $painscore,
            'pc_frequency' => $frequency,
            'pc_type_sport' => $type_sport,
            'pc_timeexercise' => $timeexercise,
            'pc_history' => $history,
            'pc_history_other' => $history_other,
            'pc_hope' => $hope,
            'pc_hope_other' => $hope_other,
            'pc_defeat_med' => $defeat_med,
            'pc_defeat_med_other' => $defeat_med_other,
        ];
        $this->as->change_pain_score($pc_id, $data_painscore);

        redirect(base_url() . 'assessment');
    }
}
