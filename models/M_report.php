<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_report extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // ในกรณีที่ต้องการติดต่อกับฐานข้อมูล สามารถโหลดไลบรารี Database ได้ดังนี้
        $this->load->database();
    }
}
