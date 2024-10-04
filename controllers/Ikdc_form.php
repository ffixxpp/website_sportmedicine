<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'Main_controller.php';

class Ikdc_form extends Main_Controller
{
    public function __construct()
    {
        parent::__construct();
        // โหลดโมเดลที่ต้องใช้
        $this->load->model('M_ikdc_form');
    }

    // ฟังก์ชันสำหรับแสดงฟอร์ม
    public function index()
    {
        $this->load->view('cms/diagnosis/ikdc_form'); // โหลด view ของฟอร์ม
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

    // ฟังก์ชันสำหรับบันทึกข้อมูลจากฟอร์ม
    public function submit()
    {
        // บันทึกข้อมูลหลัก
        $as_hn = $this->input->post('as_hn');
        $as_cardID = $this->input->post('as_cardID');
        $as_fName = $this->input->post('as_fName');
        $doc_date = $this->input->post('doc_date');
        $injury_date = $this->input->post('injury_date');

        $response_data = array(
            'as_hn' => $as_hn,
            'as_cardID' => $as_cardID,
            'as_fName' => $as_fName,
            'doc_date' => $this->convertDateToYMD($doc_date),
            'injury_date' => $this->convertDateToYMD($injury_date),
        );

        // Save the response and get the response ID
        $response_id = $this->M_ikdc_form->save_response($response_data);

        // Prepare the answers data
        $answers_data = array(
            array(
                'response_id' => $response_id,
                'question_key' => 'question_1',
                'answer_value' => implode(', ', $this->input->post('question_1')),
                'ques_desc' => 'ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการชัดเจน?',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_2',
                'answer_value' => $this->input->post('question_2'),
                'ques_desc' => 'ในช่วง 4 สัปดาห์ที่ผ่านมา หรือตั้งแต่ท่านได้รับบาดเจ็บ ท่านรู้สึกปวดบ่อยเพียงใด?',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_3',
                'answer_value' => $this->input->post('question_3'),
                'ques_desc' => 'หากท่านรู้สึกปวด อาการปวดนั้นมีความรุนแรงเท่าใด?',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_4',
                'answer_value' => implode(', ', $this->input->post('question_4')),
                'ques_desc' => 'ในช่วง 4 สัปดาห์ที่ผ่านมา หรือตั้งแต่ท่านได้รับบาดเจ็บ เข่าของท่านมีอาการข้อฝืดแข็งหรือบวมแค่ไหน?',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_5',
                'answer_value' => implode(', ', $this->input->post('question_5')),
                'ques_desc' => 'ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการเข่าบวมชัดเจน?',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_6',
                'answer_value' => $this->input->post('question_6'),
                'ques_desc' => 'ในช่วง 4 สัปดาห์ที่ผ่านมา หรือตั้งแต่ท่านได้รับบาดเจ็บ เข่าของท่านมีอาการข้อติดหรือข้อขัดหรือไม่?',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_7',
                'answer_value' => implode(', ', $this->input->post('question_7')),
                'ques_desc' => 'ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการข้อเข่าทรุดอย่างชัดเจน?',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_8',
                'answer_value' => implode(', ', $this->input->post('question_8')),
                'ques_desc' => 'ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้เป็นกิจวัตรปกติ?',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_9_1',
                'answer_value' => $this->input->post('question_9_1'),
                'ques_desc' => 'ก. ขึ้นบันได',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_9_2',
                'answer_value' => $this->input->post('question_9_2'),
                'ques_desc' => 'ข. ลงบันได',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_9_3',
                'answer_value' => $this->input->post('question_9_3'),
                'ques_desc' => 'ค. คุกเข่า',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_9_4',
                'answer_value' => $this->input->post('question_9_4'),
                'ques_desc' => 'ง. นั่งยองๆ',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_9_5',
                'answer_value' => $this->input->post('question_9_5'),
                'ques_desc' => 'จ. นั่งงอเข่า',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_9_6',
                'answer_value' => $this->input->post('question_9_6'),
                'ques_desc' => 'ฉ. ลุกจากเก้าอี้',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_9_7',
                'answer_value' => $this->input->post('question_9_7'),
                'ques_desc' => 'ช. วิ่งตรงไปข้างหน้า',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_9_8',
                'answer_value' => $this->input->post('question_9_8'),
                'ques_desc' => 'ซ. กระโดดและลงพื้น',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_9_9',
                'answer_value' => $this->input->post('question_9_9'),
                'ques_desc' => 'ฌ. หยุดและออกตัวอย่างรวดเร็ว',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_10_1',
                'answer_value' => $this->input->post('question_10_1'),
                'ques_desc' => 'การใช้งานก่อนบาดเจ็บของเข่าท่าน',
            ),
            array(
                'response_id' => $response_id,
                'question_key' => 'question_10_2',
                'answer_value' => $this->input->post('question_10_2'),
                'ques_desc' => 'การใช้งานของเข่าท่านในปัจจุบัน',
            ),
        );

        // Save the answers to the database
        $this->M_ikdc_form->save_answers($answers_data);

        // Redirect to the homepage after saving
        redirect(base_url() . 'ikdc_form/show');
    }

    public function show()
    {
        // ดึงข้อมูลจากฐานข้อมูล
        $data['ikdc_data'] = $this->M_ikdc_form->get_all_data();

        // โหลด View และส่งข้อมูลไปยัง View
        $this->output_cms('cms/diagnosis/ikdc_show', $data);
    }

   
    public function view($id)
    {
        $data['ikdc_data'] = $this->M_ikdc_form->get_data_by_hn($id);
        $data['ikdc_answer'] = $this->M_ikdc_form->get_data_answer_by_hn($id);
        $this->output_cms('cms/diagnosis/view_ikdc', $data);
    }

    public function edit($id)
{
    // ดึงข้อมูลที่ต้องการแก้ไขจากฐานข้อมูล
    $data['ikdc_data'] = $this->M_ikdc_form->get_record_by_id($id);
    $data['ikdc_answers'] = $this->M_ikdc_form->get_answers_by_response_id($id);

    // โหลด View สำหรับการแก้ไขและส่งข้อมูลไปยัง View
    $this->load->view('cms/diagnosis/ikdc_edit_form', $data);
}

public function update()
{
    // รับข้อมูลจากฟอร์ม
    $id = $this->input->post('id');
    
    $answers_data = array(
        array(
            'response_id' => $id,
            'question_key' => 'question_1',
            'answer_value' => implode(', ', $this->input->post('question_1')),
            'ques_desc' => 'ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการชัดเจน?'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_2',
            'answer_value' => $this->input->post('question_2'),
            'ques_desc' => 'ในช่วง 4 สัปดาห์ที่ผ่านมา ท่านรู้สึกปวดบ่อยเพียงใด?'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_3',
            'answer_value' => $this->input->post('question_3'),
            'ques_desc' => 'หากท่านรู้สึกปวด อาการปวดนั้นมีความรุนแรงเท่าใด?'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_4',
            'answer_value' => implode(', ', $this->input->post('question_4')),
            'ques_desc' => 'ในช่วง 4 สัปดาห์ที่ผ่านมา เข่าของท่านมีอาการข้อฝืดแข็งหรือบวมแค่ไหน?'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_5',
            'answer_value' => implode(', ', $this->input->post('question_5')),
            'ques_desc' => 'ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการเข่าบวมชัดเจน?'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_6',
            'answer_value' => $this->input->post('question_6'),
            'ques_desc' => 'ในช่วง 4 สัปดาห์ที่ผ่านมา หรือตั้งแต่ท่านได้รับบาดเจ็บ เข่าของท่านมีอาการข้อติดหรือข้อขัดหรือไม่?'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_7',
            'answer_value' => implode(', ', $this->input->post('question_7')),
            'ques_desc' => 'ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการข้อเข่าทรุดอย่างชัดเจน?'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_8',
            'answer_value' => implode(', ', $this->input->post('question_8')),
            'ques_desc' => 'ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้เป็นกิจวัตรปกติ?'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_9_1',
            'answer_value' => $this->input->post('question_9_1'),
            'ques_desc' => 'ก. ขึ้นบันได'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_9_2',
            'answer_value' => $this->input->post('question_9_2'),
            'ques_desc' => 'ข. ลงบันได'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_9_3',
            'answer_value' => $this->input->post('question_9_3'),
            'ques_desc' => 'ค. คุกเข่า'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_9_4',
            'answer_value' => $this->input->post('question_9_4'),
            'ques_desc' => 'ง. นั่งยองๆ'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_9_5',
            'answer_value' => $this->input->post('question_9_5'),
            'ques_desc' => 'จ. นั่งงอเข่า'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_9_6',
            'answer_value' => $this->input->post('question_9_6'),
            'ques_desc' => 'ฉ. ลุกจากเก้าอี้'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_9_7',
            'answer_value' => $this->input->post('question_9_7'),
            'ques_desc' => 'ช. วิ่งตรงไปข้างหน้า'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_9_8',
            'answer_value' => $this->input->post('question_9_8'),
            'ques_desc' => 'ซ. กระโดดและลงพื้น'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_9_9',
            'answer_value' => $this->input->post('question_9_9'),
            'ques_desc' => 'ฌ. หยุดและออกตัวอย่างรวดเร็ว'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_10_1',
            'answer_value' => $this->input->post('question_10_1'),
            'ques_desc' => 'การใช้งานก่อนบาดเจ็บของเข่าท่าน'
        ),
        array(
            'response_id' => $id,
            'question_key' => 'question_10_2',
            'answer_value' => $this->input->post('question_10_2'),
            'ques_desc' => 'การใช้งานของเข่าท่านในปัจจุบัน'
        ),
    );

    // อัปเดตคำตอบในตาราง ikdc_answers
    $this->M_ikdc_form->update_answers($answers_data);

    // หลังจากอัปเดตเสร็จแล้ว ให้ redirect ไปยังหน้าที่ต้องการ
    redirect('Ikdc_form/show');
}

}