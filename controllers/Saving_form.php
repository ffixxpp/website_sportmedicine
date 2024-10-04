<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Main_controller.php';

// Controller ของเมนูการบันทึกแบบฟอร์ม
class Saving_form extends Main_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_saving_form', 'sf');
         // โหลด Check_login library ตรวจสอบการเข้าสู่ระบบ
         $this->load->library('Check_login');
         $this->check_login->check_session();
    }

    //หน้าแรกของเมนูการบันทึกฟอร์ม
    public function index()
    {
        $this->output_cms('cms/saving_form/main_page');
    }
    // ฟังก์ชันสำหรับบันทึกข้อมูลจากฟอร์ม
    public function save_form()
    {
        // รับข้อมูลจากฟอร์ม
        $data = array(
            'opd_recode' => $this->input->post('opd_recode'),
            'name' => $this->input->post('name'),
            'age' => $this->input->post('age'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'hn' => $this->input->post('hn'),
            'gender' => $this->input->post('gender'),
            'chief_complain' => $this->input->post('chief_complain'),
            'previous_injuries' => $this->input->post('previous_injuries'),
            'underlying_allergy' => $this->input->post('underlying_allergy'),
            'subjective_examination' => $this->input->post('subjective_examination'),
            'objective_examination' => $this->input->post('objective_examination'),
            'diagnosis' => $this->input->post('diagnosis'),
            'goal_plan_of_treatment' => $this->input->post('goal_plan_of_treatment'),
            'functional_score' => $this->input->post('functional_score')
        );

        // เรียกใช้ Model เพื่อบันทึกข้อมูลลงฐานข้อมูล
        $inserted = $this->sf->save_form_data($data);

        if ($inserted) {
            // ถ้าบันทึกสำเร็จ ให้เปลี่ยน URL ในการ Redirect
            $this->session->set_flashdata('success', 'บันทึกข้อมูลสำเร็จ');
            redirect('saving_form/index');
        } else {
            // ถ้าบันทึกไม่สำเร็จ ให้เปลี่ยน URL ในการ Redirect
            $this->session->set_flashdata('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
            redirect('saving_form/index');
        }
    }
}
