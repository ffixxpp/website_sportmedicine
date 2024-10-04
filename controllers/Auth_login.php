<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Main_controller.php';

class Auth_login extends Main_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_auth_login', 'al');
    }

    // login
    public function login($type)
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->al->get_user_by_email($email); //check email
        $check_role = $this->al->check_role($user[0]['user_id']); //check role

        if (!empty($user) && password_verify($password, $user[0]['password'])) {
            if (!empty($check_role)) {
                if ($type == 'officer' && $check_role[0]['role_id'] == '1' || $check_role[0]['role_id'] == '3' || $check_role[0]['role_id'] == '4') {
                    // เข้าสู่ระบบสำเร็จ
                    // บันทึกข้อมูลผู้ใช้ลง session
                    $this->session->set_userdata('user_id', $user[0]['user_id']);
                    $this->session->set_userdata('user_email', $user[0]['email']);
                    $this->session->set_userdata('user_username', $user[0]['username']);
                    $this->session->set_userdata('user_hn', $user[0]['HN_Number']);
                    $this->session->set_userdata('user_role_id', $check_role[0]['role_id']);
                    $this->session->set_userdata('user_role_name', $check_role[0]['role_name']);
                    // และ redirect ไปยังหน้าหลักหรือหน้า Dashboard
                    redirect(base_url() . 'home');
                } else if ($type == 'general' && $check_role[0]['role_id'] == '2') {
                    // เข้าสู่ระบบสำเร็จ
                    // บันทึกข้อมูลผู้ใช้ลง session
                    $this->session->set_userdata('user_id', $user[0]['user_id']);
                    $this->session->set_userdata('user_email', $user[0]['email']);
                    $this->session->set_userdata('user_username', $user[0]['username']);
                    $this->session->set_userdata('user_hn', $user[0]['HN_Number']);
                    $this->session->set_userdata('user_role_id', $check_role[0]['role_id']);
                    $this->session->set_userdata('user_role_name', $check_role[0]['role_name']);
                    // และ redirect ไปยังหน้าหลักหรือหน้า Dashboard
                    redirect(base_url() . 'home');
                } else {
                    // เข้าสู่ระบบไม่สำเร็จ
                    $this->session->set_flashdata('error', 'ไม่สามารถ ');
                    $this->session->set_flashdata('swal_type', 'error');
                    $this->session->set_flashdata('swal_title', 'เข้าสู่ระบบไม่สำเร็จ');
                    $this->session->set_flashdata('swal_text', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
                    redirect(base_url() . 'Auth/' . $type);
                }
            } else {
                // เข้าสู่ระบบไม่สำเร็จ
                $this->session->set_flashdata('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
                $this->session->set_flashdata('swal_type', 'error');
                $this->session->set_flashdata('swal_title', 'เข้าสู่ระบบไม่สำเร็จ');
                $this->session->set_flashdata('swal_text', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
                redirect(base_url() . 'Auth/' . $type);
            }
        } else {
            // เข้าสู่ระบบไม่สำเร็จ
            $this->session->set_flashdata('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
            $this->session->set_flashdata('swal_type', 'error');
            $this->session->set_flashdata('swal_title', 'เข้าสู่ระบบไม่สำเร็จ');
            $this->session->set_flashdata('swal_text', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
            redirect(base_url() . 'Auth/' . $type);
        }
    }

    //get HN number
    public function gen_HN()
    {
        $get_hn = $this->al->get_hn();

        $HN = '';
        if (empty($get_hn)) {
            $HN = 'HN00001' . '-' . substr((date('Y') + 543), 2);
        } else {
            // นับจำนวนการประเมินทั้งหมด + 1 เพื่อสร้างหมายเลข HN ถัดไป
            $nextNumber = count($get_hn) + 1;

            // จัดรูปแบบหมายเลข HN โดยเติมศูนย์ให้ครบ 5 หลัก
            $HN = 'HN' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT) . '-' . substr((date('Y') + 543), 2);
        }

        return $HN;
    }

    //register
    public function auth_regis()
    {
        $HN = $this->gen_HN();
        $username = $this->input->post('username');
        $phone = $this->input->post('phone');
        $cardID = $this->input->post('cardID');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        if ($role == '1' || $role == '3') {
            $HN = '-';
        } else {
            $HN = $HN;
        }

        $data = [
            'HN_Number' => $HN,
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'cardID' => $cardID,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $save_id = $this->al->save_register($data);

        $data_role = [
            'user_id' => $save_id,
            'role_id' => $role
        ];

        $save_role = $this->al->save_role($data_role);

        if ($save_id && $save_role) {
            echo json_encode("success");
        }
    }

    //logout
    public function logout()
    {
        // ลบ session หรือ cookie ที่เกี่ยวข้องกับการเข้าสู่ระบบ
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_username');
        $this->session->unset_userdata('user_role_id');
        $this->session->unset_userdata('user_role_name');
        // และ redirect ไปยังหน้า login
        redirect(base_url());
    }

    //gen account
    public function gen_account()
    {
        $HN = '-';
        $username = $this->input->post('username');
        $phone = $this->input->post('phone');
        $cardID = $this->input->post('cardID');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        $data = [
            'HN_Number' => $HN,
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'cardID' => $cardID,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $save_id = $this->al->save_register($data);

        $data_role = [
            'user_id' => $save_id,
            'role_id' => $role
        ];

        $save_role = $this->al->save_role($data_role);

        if ($save_id && $save_role) {
            echo "<script>
                alert('สร้าง Account สำเร็จ สามารถนำไปเข้าสู่ระบบได้เลยครับ');
                window.location.href = '" . base_url('admin') . "';
            </script>";
        } else {
            echo "<script>
                alert('สร้าง Account ไม่สำเร็จ! กรุณาติดต่อผู้ดูแลระบบ');
                window.location.href = '" . base_url('admin') . "';
            </script>";
        }
    }
}
