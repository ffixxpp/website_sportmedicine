<style>
    /* Custom styles */
    .custom-btn-add {
        border: 2px solid #9B9797;
        border-radius: 25px;
        color: #2E568C;
        font-weight: bold;
        width: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ffffff;
        padding: 10px 20px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .custom-btn-add:hover {
        background-color: #f0f0f0;
        border-color: #2E568C;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .form-label {
        font-weight: bold;
        margin-top: 10px;
        color: #2E568C;
        font-size: 16px;
    }

    .form-control {
        width: 100%;
        border: 1px solid #ccc;
        font-size: 14px;
        background-color: #f9f9f9;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #2E568C;
        box-shadow: 0 0 8px rgba(46, 86, 140, 0.3);
    }

    input::placeholder {
        color: #2E568C !important;
        opacity: 0.8;
    }

    .form-check {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .form-check input {
        margin-right: 10px;
        margin-left: 15px;
        transform: scale(1.2);
    }

    .image-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
        padding: 0;
        border: none;
        border-radius: 0;
        background-color: transparent;
        box-shadow: none;
    }

    .image-container img {
        max-width: 100%;
        margin-bottom: 10px;
        border-radius: 0;
    }

    .btn-primary {
        background-color: #2E568C;
        border-color: #2E568C;
        border-radius: 5px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .btn-primary:hover {
        background-color: #1c3d73;
        border-color: #1c3d73;
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    h3 {
        font-weight: bold;
        margin-bottom: 20px;
        text-transform: uppercase;
        color: #2E568C;
        font-size: 24px;
    }

    hr {
        border: 1px solid #D9D9D9;
    }

    textarea::placeholder {
        color: #2E568C !important;
        opacity: 1;
    }

    .back-btn {
        color: #1A3D69;
        background-color: transparent;
        border: 2px solid #1A3D69;
        border-radius: 25px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease, transform 0.3s ease, color 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .back-btn:hover {
        background-color: #1A3D69;
        color: #ffffff;
        transform: translateY(-3px);
    }

    .back-btn i {
        margin-right: 5px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px;
    }

    .select2-container .select2-selection--single {
        height: 35px;
    }
</style>

<div class="height-100" style="position: relative;">
    <!-- Overlay -->
    <div id="background-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 4; display: none;"></div>

    <!-- Alert Box -->
    <div class="box-alert" style="display: none; position: absolute; top: 0; left: 50%; transform: translate(-50%, 10px); z-index: 1001;">
        <div class="alert alert-warning d-flex align-items-center" role="alert" style="height: fit-content;">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <h5 class="text-danger">ชื่อนี้มีการเพิ่มข้อมูลใน OPD RECORD แล้ว โปรดเลือกเพื่อดำเนินการต่อ..</h5>
                    <hr>
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="button" id="selectNameother" class="btn btn-secondary me-2">เลือกชื่ออื่น</button>
                    <a href="<?= base_url('diagnosis/display_data') ?>" class="btn btn-primary">กลับไปหน้าแก้ไข</a>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <h3>OPD RECODE</h3>
        <a href="<?= base_url('diagnosis/display_data') ?>" class="btn back-btn"><i class="fas fa-arrow-left"></i> กลับ </a>
    </div>
    <hr>

    <form id="opdForm" action="<?= base_url('index.php/diagnosis/save_form') ?>" method="post">
        <div class="row">
            <div class="col-md-2 mb-2">
                <label style="font-weight: bold;">HN :</label>
                <input type="text" name="hn" id="hn" class="form-control" placeholder="HN" style="background-color: #D9D9D9;" required readonly>
            </div>
            <div class="col-md-4 mb-2">
                <label style="font-weight: bold;">ชื่อ :</label>
                <select name="name" class="select2" id="selectName" style="width: 100%;" required>
                    <option value="" selected disabled>-เลือกชื่อ-</option>
                    <?php for ($i = 0; $i < count($assessment); $i++) {
                        $setName = $assessment[$i]['as_fName'] . ' ' . $assessment[$i]['as_sName'];
                    ?>
                        <option value="<?= $assessment[$i]['as_id'] . '@' . $setName ?>"><?= $assessment[$i]['as_fName'] . ' ' . $assessment[$i]['as_sName'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: bold;">อายุ :</label>
                <input type="number" name="age" id="age" class="form-control" min="1" placeholder="อายุ" style="background-color: #D9D9D9;" required readonly>
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: bold;">วันเกิด :</label>
                <input type="text" class="form-control" id="birthday" placeholder="วันเกิด" maxlength="10" name="date_of_birth" style="background-color: #D9D9D9;" required readonly>
            </div>

            <div class="col-md-2 mb-2">
                <div class="d-flex align-items-center" style="border: 1px solid #e6e6e6; padding: 5px; border-radius: 5px;">
                    <label style="color: #2E568C; font-weight: bold;">เพศ</label>
                    <div class="form-check" style="margin: 0px;padding: 0px;">
                        <input type="radio" name="gender" id="male" value="Male" required> ชาย
                        <input type="radio" name="gender" id="female" value="Female" required> หญิง
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label style="font-weight: bold;">อาการสำคัญ (Chief Complain CC) :</label>
                <textarea name="chief_complain" class="form-control" rows="3" placeholder="อาการสำคัญ (Chief Complain)" required></textarea>
            </div>
            <div class="col-md-4 mb-2">
                <label style="font-weight: bold;">ประวัติการบาดเจ็บ (Previous injuries):</label>
                <textarea name="previous_injuries" class="form-control" placeholder="ประวัติการบาดเจ็บ" rows="3"></textarea>
            </div>
            <div class="col-md-4 mb-2">
                <label style="font-weight: bold;">โรคประจำตัว / ภูมิแพ้ (Underlying/allergy) :</label>
                <textarea name="underlying_allergy" class="form-control" placeholder="โรคประจำตัว / ภูมิแพ้" rows="3"></textarea>
            </div>
            <div class="col-md-4 mb-2">
                <label style="font-weight: bold;">การตรวจร่างกาย (Subjective examination) :</label>
                <textarea name="subjective_examination" class="form-control" placeholder="การตรวจร่างกาย (Subjective)" rows="10"></textarea>
            </div>

            <div class="col-md-4 mb-2">
                <label style="font-weight: bold;">การตรวจร่างกาย (Objective examination) :</label>
                <textarea name="objective_examination" class="form-control" placeholder="การตรวจร่างกาย (Objective)" rows="10"></textarea>
            </div>
            <div class="col-md-4 image-container">
                <img src="https://physiojoes.wordpress.com/wp-content/uploads/2017/10/bodychartcopy.gif" class="w-75" alt="Body Image">
            </div>
            <div class="col-md-4 mb-2">
                <label style="font-weight: bold;">การวินิจฉัย (Diagnosis):</label>
                <textarea name="diagnosis" class="form-control" placeholder="การวินิจฉัย" rows="3"></textarea>
            </div>
            <div class="col-md-4 mb-2">
                <label style="font-weight: bold;">แผนการรักษา (Goal/Plan of treatment):</label>
                <textarea name="goal_plan_of_treatment" class="form-control" placeholder="แผนการรักษา" rows="3"></textarea>
            </div>
            <div class="col-md-4 mb-2">
                <label style="font-weight: bold;">คะแนนการทำงาน (Functional Score):</label>
                <input type="text" name="functional_score" placeholder="คะแนนการทำงาน" class="form-control">
            </div>

            <!-- ช่องที่เพิ่มใหม่ -->
            <div class="col-md-4 mb-2">
                <label style="font-weight: bold;">วันที่รักษา (Data of treatment) :</label>
                <input type="date" name="data_of_treatment" placeholder="Data of treatment" class="form-control">
            </div>
            <div class="col-md-12 mb-2">
                <label style="font-weight: bold;">Progression note :</label>
                <textarea name="progression_note" class="form-control" placeholder="Progression note" rows="5"></textarea>
            </div>
            <!-- สิ้นสุดการเพิ่ม -->

            <div class="col-md-12 mb-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#selectName").change(function() {
            var id_as = $(this).val();

            // ส่งค่าไปยังเซิร์ฟเวอร์ด้วย AJAX
            $.ajax({
                url: '<?= base_url() ?>diagnosis/ajax_assessment', // URL ที่จะส่งข้อมูลไป
                type: 'POST',
                data: {
                    id_as: id_as
                },
                success: function(response) {
                    var data = JSON.parse(response);

                    if (data[0]['as_status'] == '2') {
                        $(".box-alert").css('display', 'flex');
                        // แสดง alert พร้อมกับ overlay
                        $('#background-overlay').fadeIn(); // แสดง overlay
                    } else {
                        $("#hn").val(data[0]['as_hn']);
                        $("#age").val(data[0]['as_age']);
                        $("#birthday").val(formatDate(data[0]['as_birthday']));
                        if (data[0]['as_gender'] == 'male') {
                            $('#male').prop('checked', true);
                        } else {
                            $('#female').prop('checked', true);
                        }

                        //เปลี่ยน background
                        $("#hn").css('background-color', 'lightgreen');
                        $("#age").css('background-color', 'lightgreen');
                        $("#birthday").css('background-color', 'lightgreen');
                    }
                },
            });
        });

        $("#selectNameother").click(function() {
            $('#background-overlay').fadeOut(); // ซ่อน overlay
            $('.box-alert').fadeOut(); // ซ่อน alert

            $("#hn").val('');
            $("#age").val('');
            $("#birthday").val('');
            $('#male').prop('checked', false);
            $('#female').prop('checked', false);
            $('#selectName').val(null).trigger('change');
            //เปลี่ยน background
            $("#hn").css('background-color', '#D9D9D9');
            $("#age").css('background-color', '#D9D9D9');
            $("#birthday").css('background-color', '#D9D9D9');
        });
    });

    function formatDate(dateString) {
        // แยกปี, เดือน, วันจาก string
        const [year, month, day] = dateString.split('-');

        // แปลงเป็นรูปแบบวัน/เดือน/ปี
        return ${day}/${month}/${year};
    }                                
</script>

