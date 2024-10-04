<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Main_controller.php';

class Diagnosis extends Main_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // โหลดฐานข้อมูล
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_diagnosis', 'ds'); // โหลดโมเดล M_diagnosis
        $this->load->library('Check_login');
        $this->check_login->check_session();
    }

    public function index()
    {
        $this->output_cms('cms/saving_form/main_page');
    }

    // ฟังก์ชันสำหรับแสดงหน้า opd
    public function opd()
    {
        $data['assessment'] = $this->ds->get_assessment();
        $this->output_cms('cms/diagnosis/opd', $data);
    }

    // ฟังก์ชันสำหรับบันทึกข้อมูลจากฟอร์ม
    public function save_form()
    {
        // แปลงรูปแบบวันเกิดจาก d/m/Y เป็น Y-m-d
        $date_of_birth = DateTime::createFromFormat('d/m/Y', $this->input->post('date_of_birth'));
        $date_of_treatment = DateTime::createFromFormat('Y-m-d', $this->input->post('data_of_treatment')); // รับจาก input type=date

        $Name = $this->input->post('name');
        $split_name = explode("@", $Name);

        // ตรวจสอบการแปลงวันที่ให้เป็น null ถ้าการแปลงไม่สำเร็จ
        $date_of_birth = $date_of_birth ? $date_of_birth->format('Y-m-d') : null;
        $date_of_treatment = $date_of_treatment ? $date_of_treatment->format('Y-m-d') : null;

        // รับข้อมูลจากฟอร์ม
        $data = array(
            'opd_recode' => $this->input->post('opd_recode'),
            'name' => $split_name[1],
            'age' => $this->input->post('age'),
            'date_of_birth' => $date_of_birth,
            'hn' => $this->input->post('hn'),
            'gender' => $this->input->post('gender'),
            'chief_complain' => $this->input->post('chief_complain'),
            'previous_injuries' => $this->input->post('previous_injuries'),
            'underlying_allergy' => $this->input->post('underlying_allergy'),
            'subjective_examination' => $this->input->post('subjective_examination'),
            'objective_examination' => $this->input->post('objective_examination'),
            'diagnosis' => $this->input->post('diagnosis'),
            'goal_plan_of_treatment' => $this->input->post('goal_plan_of_treatment'),
            'functional_score' => $this->input->post('functional_score'),
            'data_of_treatment' => $date_of_treatment, // เพิ่มข้อมูลวันรักษา
            'progression_note' => $this->input->post('progression_note') // เพิ่มข้อมูลหมายเหตุการรักษา
        );

        // บันทึกข้อมูลลงฐานข้อมูล
        $inserted = $this->ds->save_form_data($data);

        // อัปเดทสถานะข้อมูลใน assessment
        $data_update = [
            'as_status' => '2',
            'as_id' => $split_name[0]
        ];
        $this->ds->update_assessment_status($data_update);

        if ($inserted) {
            $this->session->set_flashdata('success', 'บันทึกข้อมูลสำเร็จ');
            redirect('diagnosis/display_data'); // เปลี่ยนเส้นทางไปยังหน้าตารางข้อมูล
        } else {
            $this->session->set_flashdata('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
            redirect('diagnosis/opd');
        }
    }

    // ฟังก์ชันสำหรับแสดงข้อมูลในรูปแบบตาราง
    public function display_data()
    {
        $data['records'] = $this->ds->get_all_data();
        $this->output_cms('cms/diagnosis/display_data', $data);
    }

    // ฟังก์ชันสำหรับแก้ไขข้อมูล
    public function edit($id)
    {
        $data['record'] = $this->ds->get_data_by_id($id);
        $this->output_cms('cms/diagnosis/edit_form', $data);
    }

    // ฟังก์ชันสำหรับอัพเดตข้อมูลที่แก้ไขแล้ว
    public function update()
    {
        $id = $this->input->post('id');
        $data = array(
            'hn' => $this->input->post('hn'),
            'name' => $this->input->post('name'),
            'chief_complain' => $this->input->post('chief_complain'),
            'previous_injuries' => $this->input->post('previous_injuries'),
            'underlying_allergy' => $this->input->post('underlying_allergy'),
            'subjective_examination' => $this->input->post('subjective_examination'),
            'objective_examination' => $this->input->post('objective_examination'),
            'diagnosis' => $this->input->post('diagnosis'),
            'goal_plan_of_treatment' => $this->input->post('goal_plan_of_treatment'),
            'functional_score' => $this->input->post('functional_score'),
            'data_of_treatment' => $this->input->post('data_of_treatment'),
            'progression_note' => $this->input->post('progression_note')
        );

        $this->ds->update_data($id, $data);
        $this->session->set_flashdata('success', 'อัพเดตข้อมูลสำเร็จ');
        redirect('diagnosis/display_data');
    }

    // ฟังก์ชันสำหรับลบข้อมูล
    public function delete($id, $hn)
    {
        $data_update = [
            'as_status' => '1',
            'as_hn' => $hn
        ];
        $this->ds->update_assessment_status_by_hn($data_update);

        $this->ds->delete_data($id);
        $this->session->set_flashdata('success', 'ลบข้อมูลสำเร็จ');
        redirect('diagnosis/display_data');
    }

    // Ajax ข้อมูล assessment
    public function ajax_assessment()
    {
        $id_as = $this->input->post('id_as');
        $data = $this->ds->ajax_assessment($id_as);
        echo json_encode($data);
    }
}
