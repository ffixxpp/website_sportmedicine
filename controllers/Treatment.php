<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Main_controller.php';

// Controller ของเมนูการรักษา
class Treatment extends Main_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        // โหลด Model
        $this->load->model('M_treatment');
    }

    // ฟังก์ชันหน้าแรกสำหรับแสดงรายการ assessment
    public function index()
    {
        // ดึงข้อมูลจาก Model
        $data['assessment'] = $this->M_treatment->get_assessments();

        // ถ้าไม่มีข้อมูลใน $data['assessment'] ให้กำหนดเป็นอาเรย์ว่าง
        if (empty($data['assessment'])) {
            $data['assessment'] = array();
        }

        // ส่งข้อมูลไปยัง View
        $this->output_cms('cms/treatment/main_page', $data);
    }

    // ฟังก์ชันแสดงฟอร์มเพิ่มข้อมูลการรักษา
    public function treatment_view($as_id = null)
    {
        $data['assessment'] = $this->M_treatment->get_assessment_painscore_by_id($as_id);
        $data['pain_score'] = $this->M_treatment->get_painscore_by_id($as_id);
        $data['treatment_option'] = $this->M_treatment->treatment_option();
        $data['treatment_data'] = $this->M_treatment->check_data($data['assessment'][0]['as_hn']);

        // ส่งข้อมูลไปยัง View
        $this->output_cms('cms/treatment/treatment_view', $data);
    }


    //บันทึกการรักษา
    public function save()
    {
        // รับข้อมูลจากฟอร์ม
        $to_option = $this->input->post('to_option');
        $detail = $this->input->post('detail');
        $owner = $this->input->post('owner');
        $as_hn = $this->input->post('as_hn');
        $date_create = $this->input->post('date_create');

        //เช็คว่ามีการบันทึกข้อมูลแล้วรึเปล่า ถ้ามีให้แก้ไขข้อมูล
        $check_data = $this->M_treatment->check_data($as_hn);

        if (empty($check_data)) {
            // ตรวจสอบว่ามีการอัปโหลดไฟล์หรือไม่
            if (!empty($_FILES['file']['name'])) {
                // กำหนดค่าการอัปโหลด
                $config['upload_path'] = './uploads/treatment/'; // โฟลเดอร์สำหรับเก็บรูปภาพ
                $config['allowed_types'] = 'jpg|jpeg|png'; // ประเภทไฟล์ที่อนุญาต
                $config['max_size'] = 5000; // ขนาดสูงสุดของไฟล์ (2MB)
                $config['file_name'] = time() . '_' . $_FILES['file']['name']; // ตั้งชื่อไฟล์ไม่ให้ซ้ำ

                $this->load->library('upload');
                $this->upload->initialize($config);

                // ตรวจสอบว่าอัปโหลดสำเร็จหรือไม่
                if ($this->upload->do_upload('file')) {
                    // อัปโหลดสำเร็จ
                    $fileData = $this->upload->data();
                    $file_name = $fileData['file_name']; // ชื่อไฟล์ที่ถูกอัปโหลด
                }
            } else {
                $file_name = null; // หากไม่มีไฟล์ก็ให้เป็นค่าว่าง
                $error = $this->upload->display_errors();
                echo $error; // แสดงข้อผิดพลาด
            }

            // เตรียมข้อมูลสำหรับบันทึกลงฐานข้อมูล
            $data = array(
                'td_create_date' => $date_create,
                'td_to_option' => $to_option,
                'td_detail' => $detail,
                'td_file_name' => $file_name, // ชื่อไฟล์รูปภาพ (ถ้ามี)
                'td_owner' => $owner,
                'td_as_hn' => $as_hn,
            );

            // บันทึกข้อมูลลงฐานข้อมูลผ่าน Model
            $insert = $this->M_treatment->save_treatment($data);

            if ($insert) {
                echo "<script>
            alert('บันทึกข้อมูลสำเร็จ');
            window.location.href = '" . base_url('treatment') . "';
            </script>";
            } else {
                echo "<script>
            alert('บันทึกข้อมูลไม่สำเร็จ');
            window.location.href = '" . base_url('treatment') . "';
            </script>";
            }
        } else {
            // ตรวจสอบว่ามีการอัปโหลดไฟล์หรือไม่
            if (!empty($_FILES['file']['name'])) {

                $file_name_old = $this->input->post('file_name_old');
                if (!empty($file_name_old) && file_exists('./uploads/treatment/' . $file_name_old)) {
                    unlink('./uploads/treatment/' . $file_name_old); // ลบไฟล์เก่าออก
                }

                // กำหนดค่าการอัปโหลด
                $config['upload_path'] = './uploads/treatment/'; // โฟลเดอร์สำหรับเก็บรูปภาพ
                $config['allowed_types'] = 'jpg|jpeg|png'; // ประเภทไฟล์ที่อนุญาต
                $config['max_size'] = 5000; // ขนาดสูงสุดของไฟล์ (2MB)
                $config['file_name'] = time() . '_' . $_FILES['file']['name']; // ตั้งชื่อไฟล์ไม่ให้ซ้ำ

                $this->upload->initialize($config);

                // ตรวจสอบว่าอัปโหลดสำเร็จหรือไม่
                if ($this->upload->do_upload('file')) {
                    // อัปโหลดสำเร็จ
                    $fileData = $this->upload->data();
                    $file_name = $fileData['file_name']; // ชื่อไฟล์ที่ถูกอัปโหลด
                }
            } else {
                $file_name = $this->input->post('file_name_old'); // หากไม่มีไฟล์ก็ให้เป็นค่าว่าง
            }

            // เตรียมข้อมูลสำหรับบันทึกลงฐานข้อมูล
            $data = array(
                'td_create_date' => $date_create,
                'td_to_option' => $to_option,
                'td_detail' => $detail,
                'td_file_name' => $file_name, // ชื่อไฟล์รูปภาพ (ถ้ามี)
                'td_owner' => $owner,
            );

            // บันทึกข้อมูลลงฐานข้อมูลผ่าน Model
            $insert = $this->M_treatment->update_treatment($as_hn, $data);

            if ($insert) {
                echo "<script>
            alert('บันทึกข้อมูลสำเร็จ');
            window.location.href = '" . base_url('treatment') . "';
            </script>";
            } else {
                echo "<script>
            alert('บันทึกข้อมูลไม่สำเร็จ');
            window.location.href = '" . base_url('treatment') . "';
            </script>";
            }
        }
    }
}
