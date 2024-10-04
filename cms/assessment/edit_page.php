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

    input::placeholder {
        color: #ccc !important;
        opacity: 1;
    }

    select {
        color: #2E568C !important;
    }

    .box-bottom {
        border: 2px solid #2e568c7a;
        border-radius: 5px;
        padding: 10px;
        display: flex;
        align-items: center;
        overflow: auto;
    }

    .custom-radio {
        display: inline-flex;
        align-items: center;
        margin-right: 10px;
    }

    .custom-radio input[type="radio"] {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #2E568C;
        border-radius: 4px;
        outline: none;
        cursor: pointer;
        margin-right: 5px;
    }

    .custom-radio input[type="radio"]:checked {
        background-color: #2E568C;
        border-color: #2E568C;
    }

    .custom-radio label {
        margin: 0;
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
        <div class="d-flex align-items-baseline">
            <h3 style="font-weight: bold;">ตรวจประเมิน</h3>
            <span>(แก้ไขข้อมูล <span class="text-danger"><?= $assessment[0]['as_hn'] ?></span>)</span>
        </div>
        <a href="<?= base_url() ?>assessment" class="btn custom-btn-add">กลับ &nbsp;<i class="fa-solid fa-circle-chevron-left"></i></a>
    </div>
    <hr>
    <form action="<?= base_url() ?>assessment/change" method="post">
        <input type="hidden" name="as_id" value="<?= $assessment[0]['as_id'] ?>">
        <input type="hidden" name="pc_id" value="<?= $assessment[0]['pc_id'] ?>">

        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <input type="hidden" class="form-control" name="HN_Number" style="background-color: #90ee908c;" value="<?= $assessment[0]['as_hn'] ?>" readonly required>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">คำนำหน้า :</label>
                        <select name="iName" class="form-select" required>
                            <option value="" disabled>-คำนำหน้า-</option>
                            <option value="นาย" <?= ($assessment[0]['as_iName'] == 'นาย') ? 'selected' : '' ?>>นาย</option>
                            <option value="นาง" <?= ($assessment[0]['as_iName'] == 'นาง') ? 'selected' : '' ?>>นาง</option>
                            <option value="ด.ช." <?= ($assessment[0]['as_iName'] == 'ด.ช.') ? 'selected' : '' ?>>ด.ช.</option>
                            <option value="ด.ญ." <?= ($assessment[0]['as_iName'] == 'ด.ญ.') ? 'selected' : '' ?>>ด.ญ.</option>
                            <option value="Mr." <?= ($assessment[0]['as_iName'] == 'Mr.') ? 'selected' : '' ?>>Mr.</option>
                            <option value="Mrs." <?= ($assessment[0]['as_iName'] == 'Mrs.') ? 'selected' : '' ?>>Mrs.</option>
                            <option value="Miss." <?= ($assessment[0]['as_iName'] == 'Miss.') ? 'selected' : '' ?>>Miss.</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">ชื่อ :</label>
                        <input type="text" class="form-control" name="fName" value="<?= $assessment[0]['as_fName'] ?>" placeholder="ชื่อ" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">นามสกุล :</label>
                        <input type="text" class="form-control" name="sName" value="<?= $assessment[0]['as_sName'] ?>" placeholder="นามสกุล" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">อายุ :</label>
                        <input type="number" min="1" name="age" class="form-control" value="<?= $assessment[0]['as_age'] ?>" placeholder="อายุ" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">เพศ :</label>
                        <select name="gender" class="form-select" required>
                            <option value="" disabled>-เพศ-</option>
                            <option value="male" <?= ($assessment[0]['as_gender'] == 'male') ? 'selected' : '' ?>>ชาย</option>
                            <option value="female" <?= ($assessment[0]['as_gender'] == 'female') ? 'selected' : '' ?>>หญิง</option>
                            <option value="not_specified" <?= ($assessment[0]['as_gender'] == 'not_specified') ? 'selected' : '' ?>>ไม่ระบุ</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">น้ำหนัก :</label>
                        <input type="text" class="form-control" placeholder="น้ำหนัก" value="<?= $assessment[0]['as_weight'] ?>" name="weight" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">ส่วนสูง :</label>
                        <input type="text" class="form-control" placeholder="ส่วนสูง" value="<?= $assessment[0]['as_height'] ?>" name="height" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">กรุ๊ปเลือด :</label>
                        <input type="text" class="form-control" placeholder="กรุ๊ปเลือด" value="<?= $assessment[0]['as_blood_group'] ?>" name="blood_group" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">วัน/เดือน/ปีเกิด :</label>
                        <input type="text" class="form-control datepicker-th" placeholder="วัน/เดือน/ปีเกิด" value="<?= convertDate($assessment[0]['as_birthday']) ?>" maxlength="10" name="birthday" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">สถานภาพ :</label>
                        <input type="text" class="form-control" placeholder="สถานภาพ" value="<?= $assessment[0]['as_state_marital'] ?>" name="state_marital" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">รหัสนักศึกษา :</label>
                        <input type="text" class="form-control" placeholder="รหัสนักศึกษา" value="<?= $assessment[0]['as_studentID'] ?>" name="as_studentID">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">คณะ/สาขา :</label>
                        <input type="text" class="form-control" placeholder="คณะ/สาขา" value="<?= $assessment[0]['as_faculty'] ?>" name="as_faculty">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">สังกัด :</label>
                        <input type="text" class="form-control" placeholder="สังกัด" value="<?= $assessment[0]['as_Affiliation'] ?>"  name="as_Affiliation">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">อาชีพ :</label>
                        <input type="text" class="form-control" placeholder="อาชีพ" value="<?= $assessment[0]['as_state_marital'] ?>" name="occupation" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">วุฒิการศึกษา :</label>
                        <select name="educate" class="form-select" required>
                            <option value="" disabled>-วุฒิการศึกษา-</option>
                            <option value="1" <?= ($assessment[0]['as_educate'] == '1') ? 'selected' : '' ?>>ต่ำกว่า ป.ตรี</option>
                            <option value="2" <?= ($assessment[0]['as_educate'] == '2') ? 'selected' : '' ?>>ป.ตรี</option>
                            <option value="3" <?= ($assessment[0]['as_educate'] == '3') ? 'selected' : '' ?>>ป.โท</option>
                            <option value="4" <?= ($assessment[0]['as_educate'] == '4') ? 'selected' : '' ?>>ป.เอก</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">เลขประจำตัวประชาชน :</label>
                        <input type="text" class="form-control" maxlength="13" name="cardID" value="<?= $assessment[0]['as_cardID'] ?>" placeholder="เลขประจำตัวประชาชน" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ที่อยู่ปัจจุบัน :</label>
                        <input type="text" class="form-control" name="address" value="<?= $assessment[0]['as_address'] ?>" placeholder="ที่อยู่ปัจจุบัน" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">เบอร์โทร :</label>
                        <input type="tel" class="form-control" pattern="[0-9]{10}" name="phone" maxlength="10" value="<?= $assessment[0]['as_phone'] ?>" placeholder="เบอร์โทร" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ชื่อบิดา :</label>
                        <input type="text" class="form-control" name="fatherName" value="<?= $assessment[0]['as_fatherName'] ?>" placeholder="ชื่อบิดา" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ชื่อมารดา :</label>
                        <input type="text" class="form-control" name="matherName" value="<?= $assessment[0]['as_matherName'] ?>" placeholder="ชื่อมารดา" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ชื่อผู้ติดต่อได้ :</label>
                        <input type="text" class="form-control" name="relateName" value="<?= $assessment[0]['as_relateName'] ?>" placeholder="ชื่อผู้ติดต่อได้" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">เกี่ยวข้องเป็น :</label>
                        <input type="text" class="form-control" name="isrelate" value="<?= $assessment[0]['as_isrelate'] ?>" placeholder="เกี่ยวข้องเป็น" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">เบอร์โทร :</label>
                        <input type="tel" class="form-control" pattern="[0-9]{10}" maxlength="10" name="relatePhone" value="<?= $assessment[0]['as_relatePhone'] ?>" placeholder="เบอร์โทร" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ผู้แนะนำ :</label>
                        <select name="recommend" class="form-select">
                            <option value="" disabled>-ผู้แนะนำ-</option>
                            <option value="-" <?= ($assessment[0]['as_recommend'] == '-') ? 'selected' : '' ?>>ไม่มี</option>
                            <option value="1" <?= ($assessment[0]['as_recommend'] == '1') ? 'selected' : '' ?>>แพทย์</option>
                            <option value="2" <?= ($assessment[0]['as_recommend'] == '2') ? 'selected' : '' ?>>คนใกล้ชิด ครอบครัว เพื่อน</option>
                            <option value="3" <?= ($assessment[0]['as_recommend'] == '3') ? 'selected' : '' ?>>ข่าวจากโซเชียล</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ผู้แนะนำหากเป็นแพทย์ (โปรดระบุ) :</label>
                        <input type="text" class="form-control" name="recomendother" value="<?= $assessment[0]['as_recomendother'] ?>" placeholder="ผู้แนะนำหากเป็นแพทย์ (โปรดระบุ)">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">วันทำประวัติ :</label>
                        <input type="text" maxlength="10" name="do_date" value="<?= convertDate($assessment[0]['as_do_date']) ?>" placeholder="วันทำประวัติ" class="form-control datepicker-th" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="box-bottom">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="me-2 mb-2 d-flex align-items-center">Painscore
                                        <div class="row ms-2">
                                            <div class="col-md-12 d-flex align-items-center justify-content-center">
                                                <div class="me-2" style="border: 1px solid #2E568C; padding: 2px; border-radius: 5px; height: fit-content; white-space: nowrap;">ไม่ปวดเลย</div>
                                                <div class="box-choice" style="white-space: nowrap;">
                                                    <?php for ($i = 0; $i < 10; $i++) { ?>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="painscore<?= ($i + 1) ?>" name="painscore" value="<?= ($i + 1) ?>" <?= ($assessment[0]['pc_painscore'] == ($i + 1)) ? 'checked' : '' ?>>
                                                            <label for="painscore<?= ($i + 1) ?>"><?= ($i + 1) ?></label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="me-2" style="border: 1px solid #2E568C; padding: 2px; border-radius: 5px; height: fit-content; white-space: nowrap;">ปวดมากที่สุด</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="me-2 mb-2">Exercise vital sign</div>

                                    <div class=" mb-2 d-flex align-items-center">
                                        <div class="me-2">ความถี่ในการออกกำลังกาย</div>
                                        <div class="box-choice" style="white-space: nowrap;">
                                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                                <div class="custom-radio">
                                                    <input type="radio" id="frequency<?= ($i + 1) ?>" name="frequency" value="<?= ($i + 1) ?>" <?= ($assessment[0]['pc_frequency'] == ($i + 1)) ? 'checked' : '' ?>>
                                                    <label for="frequency<?= ($i + 1) ?>"></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <input type="text" class="form-control" name="type_sport" placeholder="ประเภทกีฬา" value="<?= $assessment[0]['pc_type_sport'] ?>" style="width: 250px;">
                                    </div>
                                    <div class="mb-2 d-flex align-items-center">
                                        <div class="me-2">ระยะเวลาในการออกกำลังกาย(นาที)</div>
                                        <div class="box-choice" style="white-space: nowrap;">
                                            <?php
                                            $time_exercise = ['10', '20', '30', '40', '50', '60', '90', '120', 'มากกว่า 120 นาที'];
                                            ?>
                                            <?php for ($i = 0; $i < count($time_exercise); $i++) { ?>
                                                <div class="custom-radio">
                                                    <input type="radio" id="timeexercise<?= ($i + 1) ?>" name="timeexercise" value="<?= $time_exercise[$i] ?>" <?= ($assessment[0]['pc_timeexercise'] == $time_exercise[$i]) ? 'checked' : '' ?>>
                                                    <label for="timeexercise<?= ($i + 1) ?>"><?= $time_exercise[$i] ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="mb-2 d-flex align-items-center">
                                        <div class="me-2">ประวัติการบาดเจ็บ/เจ็บป่วย</div>
                                        <div class="box-choice" style="white-space: nowrap;">
                                            <?php
                                            $history = ['มี', 'ไม่มี'];
                                            ?>
                                            <?php for ($i = 0; $i < count($history); $i++) { ?>
                                                <div class="custom-radio">
                                                    <input type="radio" id="history<?= ($i + 1) ?>" name="history" value="<?= $history[$i] ?>" <?= ($assessment[0]['pc_history'] == $history[$i]) ? 'checked' : '' ?>>
                                                    <label for="history<?= ($i + 1) ?>"><?= $history[$i] ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <input type="text" class="form-control" name="history_other" value="<?= $assessment[0]['pc_history_other'] ?>" placeholder="โปรดระบุ" style="width: 250px;">
                                    </div>
                                    <div class="mb-2 d-flex align-items-center">
                                        <div class="me-2">ความมุ่งหวังในการรับการรักษา</div>
                                        <div class="box-choice" style="white-space: nowrap;">
                                            <?php
                                            $hope = ['ดำเนินชีวิตได้ปกติ', 'กลับมาเล่นกีฬาได้เหมือนเดิม'];
                                            ?>
                                            <?php for ($i = 0; $i < count($hope); $i++) { ?>
                                                <div class="custom-radio">
                                                    <input type="radio" id="hope<?= ($i + 1) ?>" name="hope" value="<?= $hope[$i] ?>" <?= ($assessment[0]['pc_hope'] == $hope[$i]) ? 'checked' : '' ?>>
                                                    <label for="hope<?= ($i + 1) ?>"><?= $hope[$i] ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <input type="text" class="form-control" name="hope_other" value="<?= $assessment[0]['pc_hope_other'] ?>" placeholder="อื่น ๆ" style="width: 250px;">
                                    </div>
                                    <div class="mb-2 d-flex align-items-center">
                                        <div class="me-2">ประวัติแพ้ยา</div>
                                        <div class="box-choice" style="white-space: nowrap;">
                                            <?php
                                            $defeat_med = ['ไม่มี', 'มี'];
                                            ?>
                                            <?php for ($i = 0; $i < count($defeat_med); $i++) { ?>
                                                <div class="custom-radio">
                                                    <input type="radio" id="defeat_med<?= ($i + 1) ?>" name="defeat_med" value="<?= $defeat_med[$i] ?>" <?= ($assessment[0]['pc_defeat_med'] == $defeat_med[$i]) ? 'checked' : '' ?>>
                                                    <label for="defeat_med<?= ($i + 1) ?>"><?= $defeat_med[$i] ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <input type="text" class="form-control" name="defeat_med_other" value="<?= $assessment[0]['pc_defeat_med_other'] ?>" placeholder="โปรดระบุ" style="width: 250px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 mb-4">
                    <div class="col-md-12 d-flex justify-content-center">
                        <button type="submit" class="btn" style="color: #ffffff; background-color: #2E568C; width: 120px;">บันทึกข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.datepicker-th-current').datepicker({
            language: 'th', // ตั้งค่าให้ใช้ภาษาไทย
            format: 'dd/mm/yyyy', // กำหนดรูปแบบวันที่
            autoclose: true, // ปิด datepicker เมื่อเลือกวันที่
            setDate: new Date(), // ตั้งค่าวันที่ปัจจุบัน
        }).datepicker('update', new Date()); // อัปเดตค่าเริ่มต้นให้เป็นวันที่ปัจจุบัน
    });
</script>