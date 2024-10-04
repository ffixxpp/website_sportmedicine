<style>
    .custom-table {
        background-color: #D9D9D9 !important;
        color: #2E568C !important;
        text-align: center;
    }

    .custom-btn-add {
        border: 2px solid #9B9797;
        border-radius: 20px;
        color: #2E568C;
        font-weight: bold;
        width: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-btn-add:hover {
        border: 2px solid #2E568C;
    }

    .card {
        border: 2px solid #2E568C;
    }
</style>

<?php
function convertDate($date)
{
    // แปลงวันที่จากรูปแบบ Y/m/d เป็น d/m/Y
    $newDate = date("d/m/Y", strtotime($date));
    return $newDate;
}
?>

<div class="height-100" style="background-color: #ffffff; color: #2E568C;">
    <div class="d-flex justify-content-between">
        <h3 style="font-weight: bold;">การรักษา</h3>
        <a href="<?= base_url() ?>treatment" class="btn custom-btn-add">กลับ &nbsp;<i class="fa-solid fa-circle-chevron-left"></i></a>
        <!-- <a href="<?= base_url() ?>treatment/treatment_view" class="btn custom-btn-add">เพิ่ม &nbsp;<i class="fa-solid fa-circle-plus"></i></a> -->
    </div>
    <hr>
    <?php
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    ?>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <span>เลขประจำตัวประชาชน : <b><?= $assessment[0]['as_cardID'] ?></b></span>
                        </div>
                        <div class="col-md-4">
                            <span>ชื่อ-สกุล : <b><?= $assessment[0]['as_fName'] . ' ' . $assessment[0]['as_sName'] ?></b></span>
                        </div>
                        <div class="col-md-2">
                            <span>อายุ : <b><?= $assessment[0]['as_age'] ?></b></span>
                        </div>
                        <div class="col-md-2">
                            <span>เพศ : <b><?= ($assessment[0]['as_gender'] == 'male') ? 'ชาย' : 'หญิง' ?></b></span>
                        </div>
                        <div class="col-md-2">
                            <span>น้ำหนัก : <b><?= $assessment[0]['as_weight'] ?></b></span>
                        </div>
                        <div class="col-md-2">
                            <span>ส่วนสูง : <b><?= $assessment[0]['as_height'] ?></b></span>
                        </div>
                        <div class="col-md-3">
                            <span>วันทำประวัติ : <b><?= convertDate($assessment[0]['as_do_date']) ?></b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-2 d-flex justify-content-between">
                            <h5>อาการเบื้องต้น</h5>
                            <span>วันที่ : <?= convertDate($pain_score[0]['pc_create_date']) ?></span>
                        </div>
                        <div class="col-md-12">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-10">
                                    <span>Painscore : <b><?= ($pain_score[0]['pc_painscore'] != '') ? $pain_score[0]['pc_painscore'] : '-' ?></b></span><br>
                                    <span>ความถี่ในการออกกำลังกาย : <b><?= ($pain_score[0]['pc_frequency'] != '') ? $pain_score[0]['pc_frequency'] : '-' ?></b></span><br>
                                    <span>ระยะเวลาในการออกกำลังกาย : <b><?= ($pain_score[0]['pc_timeexercise'] != '') ? $pain_score[0]['pc_timeexercise'] : '-'  ?></b></span><span class="ms-5">ประเภทกีฬา : <b><?= ($pain_score[0]['pc_type_sport'] != '') ? $pain_score[0]['pc_type_sport'] : '-' ?></b></span><br>
                                    <span>ประวัติความบาดเจ็บ/เจ็บป่วย : <b><?= ($pain_score[0]['pc_history'] != '') ? $pain_score[0]['pc_history'] : '-' ?></b></span><br>
                                    <span>ความมุ่งหวังในการรับการรักษา : <b><?= ($pain_score[0]['pc_hope'] != '') ?  $pain_score[0]['pc_hope'] : '-'  ?></b></span><br>
                                    <span>ประวัติแพ้ยา : <b><?= ($pain_score[0]['pc_defeat_med'] != '') ? $pain_score[0]['pc_defeat_med'] : '' ?></b></span><br>
                                    <span>รายละเอียด : <b><?= ($pain_score[0]['pc_defeat_med_other'] != '') ? $pain_score[0]['pc_defeat_med_other'] : '-' ?></b></span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 mb-2">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url() ?>treatment/save" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="as_hn" value="<?= $assessment[0]['as_hn'] ?>">

                        <?php if (!empty($treatment_data[0]['td_file_name'])) { ?>
                            <input type="hidden" name="file_name_old" value="<?= $treatment_data[0]['td_file_name'] ?>">
                        <?php } ?>

                        <div class="row">
                            <div class="col-md-12 mb-2 d-flex justify-content-between">
                                <h5>บันทึกการรักษา</h5>
                                <div class="d-flex align-items-center">
                                    <label>วันที่บันทึก : </label>
                                    <?php if ($_SESSION['user_role_id'] != '2') { ?>
                                        <input type="text" name="date_create" value="<?= (!empty($treatment_data[0]['td_create_date'])) ? $treatment_data[0]['td_create_date'] : '' ?>" class="form-control ms-2 datepicker-th-current" style="width: 120px;">
                                    <?php } else { ?>
                                        <span class="ms-2"><?= (!empty($treatment_data[0]['td_create_date'])) ? $treatment_data[0]['td_create_date'] : '' ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label>วิธีการรักษา : </label>
                                        <?php if ($_SESSION['user_role_id'] != '2') { ?>
                                            <select name="to_option" class="form-select">
                                                <option value="" selected disabled>-เลือก-</option>
                                                <?php for ($i = 0; $i < count($treatment_option); $i++) { ?>
                                                    <option value="<?= $treatment_option[$i]['to_option'] ?>" <?= (!empty($treatment_data) && $treatment_data[0]['td_to_option'] == $treatment_option[$i]['to_option']) ? 'selected' :  '' ?>><?= $treatment_option[$i]['to_option'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php } else { ?>
                                            <span><?= (!empty($treatment_data[0]['td_to_option'])) ? $treatment_data[0]['td_to_option'] : '' ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label>รายละเอียด :</label>
                                        <textarea name="detail" rows="4" class="form-control" <?= ($_SESSION['user_role_id'] == '2') ? 'readonly' : '' ?>><?= (!empty($treatment_data)) ? $treatment_data[0]['td_detail'] : '' ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <?php if ($_SESSION['user_role_id'] != '2') { ?>
                                            <label>อัพโหลดภาพ :</label>
                                            <input type="file" name="file" class="form-control" id="imageUpload" accept="image/*">
                                        <?php } ?>
                                        <img id="imagePreview" src="<?= (!empty($treatment_data[0]['td_file_name'])) ? base_url() . 'uploads/treatment/' . $treatment_data[0]['td_file_name'] : '' ?>" alt="พรีวิวภาพ" style="display:<?= (!empty($treatment_data[0]['td_file_name'])) ? 'block' : 'none' ?>; width: 100px; height: auto; margin: 10px auto;" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label>แพทย์ที่ดูแลการรักษา :</label>
                                        <?php if ($_SESSION['user_role_id'] != '2') { ?>
                                            <input type="text" name="owner" class="form-control" value="<?= (!empty($treatment_data)) ? $treatment_data[0]['td_owner'] : $_SESSION['user_username'] ?>" <?= ($_SESSION['user_role_id'] == '2') ? 'readonly' : '' ?>>
                                        <?php } else { ?>
                                            <input type="text" name="owner" class="form-control" value="<?= (!empty($treatment_data)) ? $treatment_data[0]['td_owner'] : '' ?>" <?= ($_SESSION['user_role_id'] == '2') ? 'readonly' : '' ?>>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <?php if ($_SESSION['user_role_id'] != '2') { ?>
                                            <button type="submit" class="btn btn-success">บันทึก</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.datepicker-th-current').datepicker({
            language: 'th',
            format: 'dd/mm/yyyy',
            autoclose: true,
        })

        // อัปเดตวันที่ใน datepicker ตามค่าใน input
        $('.datepicker-th-current').each(function() {
            var dateValue = $(this).val(); // รับค่าวันที่จาก input
            if (dateValue) {
                $(this).datepicker('setDate', dateValue); // ตั้งค่าวันที่จาก value ที่มีอยู่
            } else {
                $(this).datepicker('setDate', new Date()); // ตั้งค่าวันที่จาก value ที่มีอยู่
            }
        });
    });
</script>

<script>
    // ฟังก์ชันพรีวิวรูปภาพ
    document.getElementById('imageUpload').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('imagePreview').style.display = 'none';
        }
    });
</script>