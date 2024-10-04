<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Main_controller.php';

class Injury_form extends Main_controller
{
    public function __construct() {
        parent::__construct();
        // โหลด model ที่เกี่ยวข้อง
        $this->load->model('M_injury');
    }

    // ฟังก์ชันแสดงฟอร์ม
    public function index() {
        // เรียก View ที่อยู่ใน 'cms/diagnosis/injury_form'
        // $this->load->view('cms/diagnosis/injury_form');
        $this->output_cms('cms/diagnosis/injury_form');
    }

        public function save() {
            // โหลด Model
            $this->load->model('M_injury');
    
            // รับข้อมูลจากฟอร์ม
            $medical_report_data = array(
                'country' => $this->input->post('country'),
                'date_of_report' => $this->input->post('date_of_report'),
                'form_completed_by' => $this->input->post('form_completed_by'),
                'contact_details' => $this->input->post('contact_details')
            );
    
            // บันทึกข้อมูล medical report
            $report_id = $this->M_injury->insert_medical_report($medical_report_data);
    
            // บันทึกข้อมูล injury
            $injury_data = array(
                'medical_report_id' => $report_id,
                'age' => $this->input->post('age'),
                'gender' => $this->input->post('gender'),
                'sport_event' => $this->input->post('sport_event'),
                'date_of_injury' => $this->input->post('date_injury'),
                'competition_training' => $this->input->post('com_training'),
                'code' => $this->input->post('code'),
                'onset_code' => $this->input->post('onset_code'),
                'new_code' => $this->input->post('new_code'),
                'injury_mechanism' => $this->input->post('i_mechanism'),
                'injury_body_region' => $this->input->post('i_body'),
                'injury_type' => $this->input->post('i_type'),
                'time_loss' => $this->input->post('time_loss'),
                'duration' => $this->input->post('duration')
            );
            $this->M_injury->insert_injury_report($injury_data);
    
            // บันทึกข้อมูล illness
            $illness_data = array(
                'medical_report_id' => $report_id,
                'age' => $this->input->post('age'),
                'gender' => $this->input->post('gender'),
                'sport_event' => $this->input->post('sport_event'),
                'date_of_onset' => $this->input->post('date_onset'),
                'organ_system_region' => $this->input->post('organ_system'),
                'code' => $this->input->post('code'),
                'aetiology' => $this->input->post('aetiology'),
                'new_recurrent_code' => $this->input->post('new_recurrent'),
                'time_loss' => $this->input->post('time_loss'),
                'duration' => $this->input->post('duration_additional')
            );
            $this->M_injury->insert_illness_report($illness_data);
    
            // เปลี่ยนหน้าไปที่ success page หลังจากบันทึกข้อมูลเสร็จ
            redirect('success_page');
        }
    }