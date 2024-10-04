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

<div class="height-100" style="background-color: #ffffff; color: #2E568C;">
    <div class="d-flex justify-content-between">
        <h3 style="font-weight: bold;">ตรวจประเมิน</h3>
        <a href="<?= base_url() ?>assessment" class="btn custom-btn-add">กลับ &nbsp;<i class="fa-solid fa-circle-chevron-left"></i></a>
    </div>
    <hr>
    <?php
    // echo "<pre>";
    // print_r($data_session);
    // echo "</pre>";
    ?>
    <form action="<?= base_url() ?>assessment/save" id="form_as" method="post">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <?php if ($_SESSION['user_role_id'] == '2') { ?>
                        <input type="hidden" class="form-control" name="HN_Number" style="background-color: #90ee908c;" value="<?= $_SESSION['user_hn'] ?>" readonly required>
                    <?php } else { ?>
                        <div class="col-md-2 mb-2">
                            <label style="font-weight: bold;">HN :</label>
                            <input type="text" class="form-control" name="HN_Number" placeholder="HN_Number" required>
                        </div>

                    <?php } ?>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">คำนำหน้า :</label>
                        <select name="iName" class="form-select" required>
                            <option value="" disabled selected>-คำนำหน้า-</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="ด.ช.">ด.ช.</option>
                            <option value="ด.ญ.">ด.ญ.</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Miss.">Miss.</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">ชื่อ :</label>
                        <input type="text" class="form-control" name="fName" placeholder="ชื่อ" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">นามสกุล :</label>
                        <input type="text" class="form-control" name="sName" placeholder="นามสกุล" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">อายุ :</label>
                        <input type="number" min="1" name="age" class="form-control" placeholder="อายุ" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">เพศ :</label>
                        <select name="gender" class="form-select" required>
                            <option value="" disabled selected>-เพศ-</option>
                            <option value="male">ชาย</option>
                            <option value="female">หญิง</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">น้ำหนัก :</label>
                        <input type="text" class="form-control" placeholder="น้ำหนัก" name="weight" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">ส่วนสูง :</label>
                        <input type="text" class="form-control" placeholder="ส่วนสูง" name="height" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">กรุ๊ปเลือด :</label>
                        <input type="text" class="form-control" placeholder="กรุ๊ปเลือด" name="blood_group" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">วัน/เดือน/ปีเกิด :</label>
                        <input type="text" class="form-control datepicker-th" placeholder="วัน/เดือน/ปีเกิด" maxlength="10" name="birthday" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">สถานภาพ :</label>
                        <input type="text" class="form-control" placeholder="สถานภาพ" name="state_marital" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">รหัสนักศึกษา :</label>
                        <input type="text" class="form-control" placeholder="รหัสนักศึกษา" name="as_studentID" >
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">คณะ/สาขา :</label>
                        <input type="text" class="form-control" placeholder="คณะ/สาขา" name="as_faculty" >
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">สังกัด :</label>
                        <input type="text" class="form-control" placeholder="สังกัด" name="as_Affiliation" >
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">อาชีพ :</label>
                        <input type="text" class="form-control" placeholder="อาชีพ" name="occupation" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">วุฒิการศึกษา :</label>
                        <select name="educate" class="form-select" required>
                            <option value="" disabled selected>-วุฒิการศึกษา-</option>
                            <option value="1">ต่ำกว่า ป.ตรี</option>
                            <option value="2">ป.ตรี</option>
                            <option value="3">ป.โท</option>
                            <option value="4">ป.เอก</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label style="font-weight: bold;">เลขประจำตัวประชาชน :</label>
                        <input type="text" class="form-control" value="<?= ($_SESSION['user_role_id'] == '2') ? $data_session[0]['cardID'] : '' ?>" maxlength="13" style="<?= ($_SESSION['user_role_id'] == '2') ? 'background-color: #90ee908c;' : '' ?>" name="cardID" placeholder="เลขประจำตัวประชาชน" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ที่อยู่ปัจจุบัน :</label>
                        <input type="text" class="form-control" name="address" placeholder="ที่อยู่ปัจจุบัน" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">เบอร์โทร :</label>
                        <input type="text" class="form-control" value="<?= ($_SESSION['user_role_id'] == '2') ? $data_session[0]['phone'] : '' ?>" name="phone" style="<?= ($_SESSION['user_role_id'] == '2') ? 'background-color: #90ee908c;' : '' ?>" pattern="[0-9]{10}" maxlength="10" placeholder="เบอร์โทร" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ชื่อบิดา :</label>
                        <input type="text" class="form-control" name="fatherName" placeholder="ชื่อบิดา" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ชื่อมารดา :</label>
                        <input type="text" class="form-control" name="matherName" placeholder="ชื่อมารดา" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ชื่อผู้ติดต่อได้ :</label>
                        <input type="text" class="form-control" name="relateName" placeholder="ชื่อผู้ติดต่อได้" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">เกี่ยวข้องเป็น :</label>
                        <input type="text" class="form-control" name="isrelate" placeholder="เกี่ยวข้องเป็น" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">เบอร์โทร :</label>
                        <input type="tel" class="form-control" pattern="[0-9]{10}" maxlength="10" name="relatePhone" placeholder="เบอร์โทร" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ผู้แนะนำ :</label>
                        <select name="recommend" class="form-select">
                            <option value="" disabled selected>-ผู้แนะนำ-</option>
                            <option value="-">ไม่มี</option>
                            <option value="1">แพทย์</option>
                            <option value="2">คนใกล้ชิด ครอบครัว เพื่อน</option>
                            <option value="3">ข่าวจากโซเชียล</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">ผู้แนะนำหากเป็นแพทย์ (โปรดระบุ) :</label>
                        <input type="text" class="form-control" name="recomendother" placeholder="ผู้แนะนำหากเป็นแพทย์ (โปรดระบุ)">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label style="font-weight: bold;">วันทำประวัติ :</label>
                        <input type="text" maxlength="10" name="do_date" placeholder="วันทำประวัติ" class="form-control datepicker-th-current" required>
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
                                                            <input type="radio" id="painscore<?= ($i + 1) ?>" name="painscore" value="<?= ($i + 1) ?>">
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
                                                    <input type="radio" id="frequency<?= ($i + 1) ?>" name="frequency" value="<?= ($i + 1) ?>">
                                                    <label for="frequency<?= ($i + 1) ?>"></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <input type="text" class="form-control" name="type_sport" placeholder="ประเภทกีฬา" style="width: 250px;">
                                    </div>
                                    <div class="mb-2 d-flex align-items-center">
                                        <div class="me-2">ระยะเวลาในการออกกำลังกาย(นาที)</div>
                                        <div class="box-choice" style="white-space: nowrap;">
                                            <?php
                                            $time_exercise = ['10', '20', '30', '40', '50', '60', '90', '120', 'มากกว่า 120 นาที'];
                                            ?>
                                            <?php for ($i = 0; $i < count($time_exercise); $i++) { ?>
                                                <div class="custom-radio">
                                                    <input type="radio" id="timeexercise<?= ($i + 1) ?>" name="timeexercise" value="<?= $time_exercise[$i] ?>">
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
                                                    <input type="radio" id="history<?= ($i + 1) ?>" name="history" value="<?= $history[$i] ?>">
                                                    <label for="history<?= ($i + 1) ?>"><?= $history[$i] ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <input type="text" class="form-control" name="history_other" placeholder="โปรดระบุ" style="width: 250px;">
                                    </div>
                                    <div class="mb-2 d-flex align-items-center">
                                        <div class="me-2">ความมุ่งหวังในการรับการรักษา</div>
                                        <div class="box-choice" style="white-space: nowrap;">
                                            <?php
                                            $hope = ['ดำเนินชีวิตได้ปกติ', 'กลับมาเล่นกีฬาได้เหมือนเดิม'];
                                            ?>
                                            <?php for ($i = 0; $i < count($hope); $i++) { ?>
                                                <div class="custom-radio">
                                                    <input type="radio" id="hope<?= ($i + 1) ?>" name="hope" value="<?= $hope[$i] ?>">
                                                    <label for="hope<?= ($i + 1) ?>"><?= $hope[$i] ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <input type="text" class="form-control" name="hope_other" placeholder="อื่น ๆ" style="width: 250px;">
                                    </div>
                                    <div class="mb-2 d-flex align-items-center">
                                        <div class="me-2">ประวัติแพ้ยา</div>
                                        <div class="box-choice" style="white-space: nowrap;">
                                            <?php
                                            $defeat_med = ['ไม่มี', 'มี'];
                                            ?>
                                            <?php for ($i = 0; $i < count($defeat_med); $i++) { ?>
                                                <div class="custom-radio">
                                                    <input type="radio" id="defeat_med<?= ($i + 1) ?>" name="defeat_med" value="<?= $defeat_med[$i] ?>">
                                                    <label for="defeat_med<?= ($i + 1) ?>"><?= $defeat_med[$i] ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <input type="text" class="form-control" name="defeat_med_other" placeholder="โปรดระบุ" style="width: 250px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 mb-4">
                    <div class="col-md-12 d-flex justify-content-center">
                        <button type="button" onclick="getAgree()" class="btn" style="color: #ffffff; background-color: #2E568C; width: 120px;">บันทึกข้อมูล</button>


                        <!-- Modal ฟอร์มยินยอมข้อมูล -->
                        <!-- Modal ฟอร์มยินยอมข้อมูล -->
                        <div class="modal fade" id="modalAgree" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">แสดงความยินยอมการรักษาโดยวิธีหัตถการ/ใช้รูปประกอบการรักษาและวิจัย/การเก็บข้อมูล</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <p>ผู้เข้ารับการรักษาแสดงความยินยอมการรักษาโดยวิธีหัตถการและของใช้รูปภาพประกอบการรักษาและวิจัย/การเก็บข้อมูลโดยมีรายละเอียดดังนี้:</p>
                                            </div>

                                            <div class="col-md-12 mb-2">


                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="procedure" name="procedure" value="1">
                                                    <label class="form-check-label" for="procedure">หัตถการ</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="recording" name="recording" value="1">
                                                    <label class="form-check-label" for="recording">บันทึกภาพ</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="data_collection" name="data_collection" value="1">
                                                    <label class="form-check-label" for="data_collection">เก็บข้อมูลทำประวัติ</label>
                                                </div>



                                            </div>

                                            <div class="col-md-12 d-flex justify-content-center" style="position: relative;">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="allow" name="allow" value="1" required>
                                                    <label class="form-check-label" for="allow">ยินยอม</label>
                                                </div>
                                                <div class="form-check ms-3">
                                                    <input type="radio" class="form-check-input" id="disallow" name="allow" value="0">
                                                    <label class="form-check-label" for="disallow">ไม่ยินยอม</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-2">
                                                <h7><u>คำอธิบาย</u></h7><br>
                                                <span>1. หนังสือฉบับนี้มีไว้เพื่อให้ผู้ป่วยแสดงเจตนายินยอมหรือไม่ยินยอมการวินิจฉัย/ทำหัตถการหลังจากได้รับการอธิบายจากแพทย์หรือเจ้าหน้าที่ของวิทยาลัยวิทยาศาสตร์ และเทคโนโลยีการกีฬา มหาวิทยาลัยมหิดล เกี่ยวกับการตรวจรักษาหรือทำการหัตถการที่กระทำต่อผู้ป่วย</span><br>
                                                <span>2. ขอแสดงเจตนาต้องเป็นผู้ป่วยเว้นแต่กรณีที่ไม่สามารถให้ความยินยอมได้ เช่น กรณีผู้เยาว์ที่มีอายุต่ำกว่า 18 ปี ผู้พิกลจริต ผู้ปกครองทางจิต ให้บุพการี ญาติ ผู้อนุบาล หรือผู้ดูแลเป็นผู้ให้ความยินยอมแทน (ตามประกาศสิทธิผู้ป่วยข้อ 9)</span><br>
                                                <span>3. หนังสือฉบับนี้มีอายุใช้งาน 6 เดือนนับตั้งแต่วันที่ระบุไว้ข้างต้น</span>
                                                <hr>
                                            </div>

                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <a onclick="checkAllow()" style="cursor: pointer;"><u>ดำเนินการต่อ >>></u></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    $(document).ready(function() {
        $('.datepicker-th-current').datepicker({
            language: 'th',
            format: 'dd/mm/yyyy',
            autoclose: true,
            setDate: new Date(),
        }).datepicker('update', new Date());
    });

    function getAgree() {
        $("#modalAgree").modal('show');
    }

    function checkAllow() {
        const allowSelected = document.querySelector('input[name="allow"]:checked');
        const procedureChecked = document.getElementById('procedure').checked;
        const recordingChecked = document.getElementById('recording').checked;
        const dataCollectionChecked = document.getElementById('data_collection').checked;

        if (!procedureChecked || !recordingChecked || !dataCollectionChecked) {
            alert('กรุณาเลือก "หัตถการ", "บันทึกภาพ", และ "เก็บข้อมูลทำประวัติ" ก่อนดำเนินการต่อ');
            return;
        }

        if (allowSelected) {
            var isValid = true;

            // ตรวจสอบว่า input ที่มี attribute required ถูกกรอกครบหรือไม่
            $('#form_as input[required], #form_as select[required], #form_as textarea[required]').each(function() {
                if ($(this).val() === "") {
                    isValid = false; // ถ้าเจอ input ที่ยังไม่ได้กรอก
                    return false; // หยุด loop
                }
            });

            if (isValid) {
                $('#modalAgree').modal('hide');
                $("#form_as").submit();
            } else {
                alert('กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน');
            }
        } else {
            alert('กรุณาเลือก "ยินยอม" หรือ "ไม่ยินยอม" ก่อนดำเนินการต่อ');
        }

    }
</script>