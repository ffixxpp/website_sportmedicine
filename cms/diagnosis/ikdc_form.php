<style>
    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    h3 {
        color: #03346E;
        text-align: center;
        margin-bottom: 30px;
        font-weight: 600;
    }

    .form-group label {
        font-weight: 600;
        color: #343a40;
    }

    .form-control {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .form-control:focus {
        border-color: #0056b3;
        box-shadow: none;
    }

    .question {
        margin-bottom: 30px;
        padding: 20px;
        background-color: #f1f1f1;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .question label {
        font-weight: 500;
        color: #1D3557;
        margin-bottom: 10px;
    }

    .radio-group-column,
    .radio-group-column,
    .scale-group-column {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
    }

    .radio-group-row,
    .radio-group-row,
    .scale-group-row {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        margin-left: -10px;
    }

    .radio-group-row label,
    .radio-group-row label,
    .scale-group-row label {
        margin-right: 15px;
        margin-bottom: 10px;
        font-weight: normal;
        color: #457B9D;
    }

    .table-responsive {
        margin-bottom: 20px;
    }

    table th,
    table td {
        padding: 9px;
        border: 1px solid #dee2e6;
        text-align: center;
    }

    table th {
        background-color: #0056b3;
        color: #ffffff;
        font-weight: 600;
    }

    table td {
        background-color: #f8f9fa;
    }

    .form-group button[type="submit"] {
        background-color: #0056b3;
        color: #ffffff;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        display: block;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .form-group button[type="submit"]:hover {
        background-color: #004494;
    }

    /* Back button styling */
    .back-button {
        position: absolute;
        top: 10px;
        right: 10px;
        border: 1px solid #03346E;
        border-radius: 50px;
        padding: 8px 16px;
        font-size: 16px;
        font-weight: 600;
        color: #03346E;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #D6D8DB;
    }

    @media (max-width: 768px) {

        .form-group input[type="text"],
        .form-group input[type="date"],
        .question {
            width: 100%;
        }

        .question {
            padding: 15px;
        }

        table th,
        table td {
            padding: 10px;
        }
    }

    /* Custom placeholder styling for date inputs */
    input::placeholder {
        color: #2E568C !important;
        opacity: 1;
    }
</style>

<div class="container">
    <a href="<?= base_url() ?>ikdc_form/show" class="btn custom-btn-add back-button">
        กลับ &nbsp;<i class="fa-solid fa-circle-chevron-left"></i>
    </a>
    <h3>แบบฟอร์ม IKDC</h3>
    <h5> * แบบสอบถาม International Knee Documentation Committee (IKDC)</h5>
    <form action="<?= base_url('Ikdc_form/submit') ?>" method="POST">
        <div class="form-group">
            <label for="as_hospital">เลข HN</label>
            <?php if ($_SESSION['user_role_id'] == '2') { ?>
                <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                    <input type="text" class="form-control" value="<?= $ikdc_data[0]['as_hn'] ?>" id="as_hn" name="as_hn" readonly placeholder="กรอกเลข HN" required>
                <?php } else { ?>
                    <input type="text" class="form-control" value="<?= $_SESSION['user_hn'] ?>" id="as_hn" name="as_hn" readonly placeholder="กรอกเลข HN" required>
                <?php } ?>
            <?php } else { ?>
                <input type="text" class="form-control" id="as_hn" name="as_hn" placeholder="กรอกเลข HN" required>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="as_cardID">เลขประจำตัวประชาชน</label>
            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                <input type="text" class="form-control" value="<?= $ikdc_data[0]['as_cardID'] ?>" id="as_cardID" name="as_cardID" readonly placeholder="กรอกเลขประจำตัวประชาชน" required>
            <?php } else { ?>
                <input type="text" class="form-control" id="as_cardID" maxlength="13" name="as_cardID" placeholder="กรอกเลขประจำตัวประชาชน" required>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="as_fName">ชื่อ-นามสกุล:</label>
            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                <input type="text" class="form-control" value="<?= $ikdc_data[0]['as_fName'] ?>" id="as_fName" name="as_fName" readonly placeholder="กรอกชื่อ-นามสกุล" required>
            <?php } else { ?>
                <input type="text" class="form-control" id="as_fName" name="as_fName" placeholder="กรอกชื่อ-นามสกุล" required>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="doc_date">วันที่บันทึกข้อมูล:</label>
            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                <input type="text" class="form-control" value="<?= $ikdc_data[0]['doc_date'] ?>" id="doc_date" name="doc_date" readonly placeholder="กรุณาเลือกวันที่" required>
            <?php } else { ?>
                <input type="text" class="form-control datepicker-th-current" id="doc_date" name="doc_date" placeholder="กรุณาเลือกวันที่" required>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="injury_date">วันที่ได้รับบาดเจ็บ:</label>
            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                <input type="text" class="form-control" value="<?= $ikdc_data[0]['injury_date'] ?>" id="injury_date" name="injury_date" readonly placeholder="กรุณาเลือกวันที่" required>
            <?php } else { ?>
                <input type="text" class="form-control datepicker-th-current" id="injury_date" name="injury_date" placeholder="กรุณาเลือกวันที่" required>
            <?php } ?>
        </div>
        <!-- Question 1 -->
        <div class="question">
            <label>1. ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการชัดเจน?</label>
            <div class="radio-group-column">
                <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                    <label><input type="radio" name="question_1[]" value="กิจกรรมหนักมาก จำพวกกระโดด" <?= (strpos($ikdc_data[0]['answer_value'], 'กิจกรรมหนักมาก จำพวกกระโดด') !== false) ? 'checked' : ''; ?>> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                    <label><input type="radio" name="question_1[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก" <?= (strpos($ikdc_data[0]['answer_value'], 'กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก') !== false) ? 'checked' : ''; ?>> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                    <label><input type="radio" name="question_1[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง" <?= (strpos($ikdc_data[0]['answer_value'], 'กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง') !== false) ? 'checked' : ''; ?>> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                    <label><input type="radio" name="question_1[]" value="กิจกรรมเบา จำพวกการเดิน" <?= (strpos($ikdc_data[0]['answer_value'], 'กิจกรรมเบา จำพวกการเดิน') !== false) ? 'checked' : ''; ?>> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                    <label><input type="radio" name="question_1[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย" <?= (strpos($ikdc_data[0]['answer_value'], 'ไม่สามารถทำกิจกรรมข้างต้นได้เลย') !== false) ? 'checked' : ''; ?>> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากปวดเข่า</label>
                <?php } else { ?>
                    <label><input type="radio" name="question_1[]" value="กิจกรรมหนักมาก จำพวกกระโดด"> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                    <label><input type="radio" name="question_1[]" value="กิจกรรมหนัก จำพวกการออกกำลังอย่างหนัก"> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                    <label><input type="radio" name="question_1[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง"> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                    <label><input type="radio" name="question_1[]" value="กิจกรรมเบา จำพวกการเดิน"> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                    <label><input type="radio" name="question_1[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย"> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากปวดเข่า</label>
                <?php } ?>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="question">
            <label>2. ในช่วง 4 สัปดาห์ที่ผ่านมา ท่านรู้สึกปวดบ่อยเพียงใด?</label>
            <div class="scale-group-row">
                <?php for ($i = 0; $i <= 10; $i++): ?>
                    <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                        <label><input type="radio" name="question_2" value="<?= $i; ?>" <?= ($ikdc_data[1]['answer_value'] == $i) ? 'checked' : ''; ?>> <?= $i; ?></label>
                    <?php } else { ?>
                        <label><input type="radio" name="question_2" value="<?= $i; ?>"> <?= $i; ?></label>
                    <?php } ?>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="question">
            <label>3. หากท่านรู้สึกปวด อาการปวดนั้นมีความรุนแรงเท่าใด?</label>
            <div class="radio-group-row">
                <?php for ($i = 0; $i <= 10; $i++): ?>
                    <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                        <label><input type="radio" name="question_3" value="<?= $i; ?>" <?= ($ikdc_data[2]['answer_value'] == $i) ? 'checked' : ''; ?>> <?= $i; ?></label>
                    <?php } else { ?>
                        <label><input type="radio" name="question_3" value="<?= $i; ?>"> <?= $i; ?></label>
                    <?php } ?>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="question">
            <label>4. ในช่วง 4 สัปดาห์ที่ผ่านมา เข่าของท่านมีอาการข้อฝืดแข็งหรือบวมแค่ไหน?</label>
            <div class="radio-group-column">
                <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                    <label><input type="radio" name="question_4[]" value="ไม่เลย" <?= (strpos($ikdc_data[3]['answer_value'], 'ไม่เลย') !== false) ? 'checked' : ''; ?>> ไม่เลย</label>
                    <label><input type="radio" name="question_4[]" value="น้อย" <?= (strpos($ikdc_data[3]['answer_value'], 'น้อย') !== false) ? 'checked' : ''; ?>> น้อย</label>
                    <label><input type="radio" name="question_4[]" value="ปานกลาง" <?= (strpos($ikdc_data[3]['answer_value'], 'ปานกลาง') !== false) ? 'checked' : ''; ?>> ปานกลาง</label>
                    <label><input type="radio" name="question_4[]" value="มาก" <?= (strpos($ikdc_data[3]['answer_value'], 'มาก') !== false) ? 'checked' : ''; ?>> มาก</label>
                    <label><input type="radio" name="question_4[]" value="มากที่สุด" <?= (strpos($ikdc_data[3]['answer_value'], 'มากที่สุด') !== false) ? 'checked' : ''; ?>> มากที่สุด</label>
                <?php } else { ?>
                    <label><input type="radio" name="question_4[]" value="ไม่เลย"> ไม่เลย</label>
                    <label><input type="radio" name="question_4[]" value="น้อย"> น้อย</label>
                    <label><input type="radio" name="question_4[]" value="ปานกลาง"> ปานกลาง</label>
                    <label><input type="radio" name="question_4[]" value="มาก"> มาก</label>
                    <label><input type="radio" name="question_4[]" value="มากที่สุด"> มากที่สุด</label>
                <?php } ?>
            </div>
        </div>

        <!-- Question 5 -->
        <div class="question">
            <label>5. ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการเข่าบวมชัดเจน?</label>
            <div class="radio-group-column">
                <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                    <label><input type="radio" name="question_5[]" value="กิจกรรมหนักมาก จำพวกกระโดด" <?= (strpos($ikdc_data[4]['answer_value'], 'กิจกรรมหนักมาก จำพวกกระโดด') !== false) ? 'checked' : ''; ?>> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                    <label><input type="radio" name="question_5[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก" <?= (strpos($ikdc_data[4]['answer_value'], 'กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก') !== false) ? 'checked' : ''; ?>> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                    <label><input type="radio" name="question_5[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง" <?= (strpos($ikdc_data[4]['answer_value'], 'กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง') !== false) ? 'checked' : ''; ?>> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                    <label><input type="radio" name="question_5[]" value="กิจกรรมเบา จำพวกการเดิน" <?= (strpos($ikdc_data[4]['answer_value'], 'กิจกรรมเบา จำพวกการเดิน') !== false) ? 'checked' : ''; ?>> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                    <label><input type="radio" name="question_5[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย" <?= (strpos($ikdc_data[4]['answer_value'], 'ไม่สามารถทำกิจกรรมข้างต้นได้เลย') !== false) ? 'checked' : ''; ?>> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากเข่าบวม</label>
                <?php } else { ?>
                    <label><input type="radio" name="question_5[]" value="กิจกรรมหนักมาก จำพวกกระโดด"> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                    <label><input type="radio" name="question_5[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก"> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                    <label><input type="radio" name="question_5[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง"> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                    <label><input type="radio" name="question_5[]" value="กิจกรรมเบา จำพวกการเดิน"> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                    <label><input type="radio" name="question_5[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย"> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากเข่าบวม</label>
                <?php } ?>
            </div>
        </div>
        <!-- Question 6 -->
        <div class="question">
            <label>6. ในช่วง 4 สัปดาห์ที่ผ่านมา หรือตั้งแต่ท่านได้รับบาดเจ็บ เข่าของท่านมีอาการข้อติดหรือข้อขัดหรือไม่?</label>
            <div class="scale-group-column">
                <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                    <label><input type="radio" name="question_6" value="มี" <?= ($ikdc_data[5]['answer_value'] == 'มี') ? 'checked' : ''; ?>> มี</label>
                    <label><input type="radio" name="question_6" value="ไม่มี" <?= ($ikdc_data[5]['answer_value'] == 'ไม่มี') ? 'checked' : ''; ?>> ไม่มี</label>
                <?php } else { ?>
                    <label><input type="radio" name="question_6" value="มี"> มี</label>
                    <label><input type="radio" name="question_6" value="ไม่มี"> ไม่มี</label>
                <?php } ?>
            </div>
        </div>

        <!-- Question 7 -->
        <div class="question">
            <label>7. ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการข้อเข่าทรุดอย่างชัดเจน?</label>
            <div class="radio-group-column">
                <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                    <label><input type="radio" name="question_7[]" value="กิจกรรมหนักมาก จำพวกกระโดด" <?= (strpos($ikdc_data[6]['answer_value'], 'กิจกรรมหนักมาก จำพวกกระโดด') !== false) ? 'checked' : ''; ?>> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                    <label><input type="radio" name="question_7[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก" <?= (strpos($ikdc_data[6]['answer_value'], 'กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก') !== false) ? 'checked' : ''; ?>> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                    <label><input type="radio" name="question_7[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง" <?= (strpos($ikdc_data[6]['answer_value'], 'กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง') !== false) ? 'checked' : ''; ?>> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                    <label><input type="radio" name="question_7[]" value="กิจกรรมเบา จำพวกการเดิน" <?= (strpos($ikdc_data[6]['answer_value'], 'กิจกรรมเบา จำพวกการเดิน') !== false) ? 'checked' : ''; ?>> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                    <label><input type="radio" name="question_7[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย" <?= (strpos($ikdc_data[6]['answer_value'], 'ไม่สามารถทำกิจกรรมข้างต้นได้เลย') !== false) ? 'checked' : ''; ?>> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากข้อเข่าทรุด</label>
                <?php } else { ?>
                    <label><input type="radio" name="question_7[]" value="กิจกรรมหนักมาก จำพวกกระโดด"> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                    <label><input type="radio" name="question_7[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก"> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                    <label><input type="radio" name="question_7[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง"> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                    <label><input type="radio" name="question_7[]" value="กิจกรรมเบา จำพวกการเดิน"> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                    <label><input type="radio" name="question_7[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย"> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากข้อเข่าทรุด</label>
                <?php } ?>
            </div>
        </div>

        <!-- Question 8 -->
        <div class="question">
            <label>8. ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้เป็นกิจวัตรปกติ?</label>
            <div class="radio-group-column">
                <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                    <label><input type="radio" name="question_8[]" value="กิจกรรมหนักมาก จำพวกกระโดด" <?= (strpos($ikdc_data[7]['answer_value'], 'กิจกรรมหนักมาก จำพวกกระโดด') !== false) ? 'checked' : ''; ?>> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                    <label><input type="radio" name="question_8[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก" <?= (strpos($ikdc_data[7]['answer_value'], 'กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก') !== false) ? 'checked' : ''; ?>> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                    <label><input type="radio" name="question_8[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง" <?= (strpos($ikdc_data[7]['answer_value'], 'กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง') !== false) ? 'checked' : ''; ?>> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                    <label><input type="radio" name="question_8[]" value="กิจกรรมเบา จำพวกการเดิน" <?= (strpos($ikdc_data[7]['answer_value'], 'กิจกรรมเบา จำพวกการเดิน') !== false) ? 'checked' : ''; ?>> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                    <label><input type="radio" name="question_8[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย" <?= (strpos($ikdc_data[7]['answer_value'], 'ไม่สามารถทำกิจกรรมข้างต้นได้เลย') !== false) ? 'checked' : ''; ?>> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากเข่า</label>
                <?php } else { ?>
                    <label><input type="radio" name="question_8[]" value="กิจกรรมหนักมาก จำพวกกระโดด"> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                    <label><input type="radio" name="question_8[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก"> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                    <label><input type="radio" name="question_8[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง"> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                    <label><input type="radio" name="question_8[]" value="กิจกรรมเบา จำพวกการเดิน"> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                    <label><input type="radio" name="question_8[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย"> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากเข่า</label>
                <?php } ?>
            </div>
        </div>

        <!-- Question 9 -->
        <div class="question">
            <label>9. เข่าของท่านมีผลต่อความสามารถในการทำกิจกรรมเหล่านี้อย่างไร</label>
            <div class="question">
                <table>
                    <thead>
                        <tr>
                            <th>กิจกรรม</th>
                            <th>ทำได้ไม่ลำบากเลย</th>
                            <th>ลำบากเล็กน้อย</th>
                            <th>ลำบากปานกลาง</th>
                            <th>ลำบากมาก</th>
                            <th>ไม่สามารถทำได้</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ก. ขึ้นบันได</td>
                            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                                <td><input type="radio" name="question_9_1" value="ทำได้ไม่ลำบากเลย" <?= ($ikdc_data[8]['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_1" value="ลำบากเล็กน้อย" <?= ($ikdc_data[8]['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_1" value="ลำบากปานกลาง" <?= ($ikdc_data[8]['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_1" value="ลำบากมาก" <?= ($ikdc_data[8]['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_1" value="ไม่สามารถทำได้" <?= ($ikdc_data[8]['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                            <?php } else { ?>
                                <td><input type="radio" name="question_9_1" value="ทำได้ไม่ลำบากเลย"></td>
                                <td><input type="radio" name="question_9_1" value="ลำบากเล็กน้อย"></td>
                                <td><input type="radio" name="question_9_1" value="ลำบากปานกลาง"></td>
                                <td><input type="radio" name="question_9_1" value="ลำบากมาก"></td>
                                <td><input type="radio" name="question_9_1" value="ไม่สามารถทำได้"></td>
                            <?php } ?>
                        </tr>

                        <td>ข. ลงบันได</td>
                        <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                            <td><input type="radio" name="question_9_2" value="ทำได้ไม่ลำบากเลย" <?= ($ikdc_data[9]['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_2" value="ลำบากเล็กน้อย" <?= ($ikdc_data[9]['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_2" value="ลำบากปานกลาง" <?= ($ikdc_data[9]['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_2" value="ลำบากมาก" <?= ($ikdc_data[9]['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_2" value="ไม่สามารถทำได้" <?= ($ikdc_data[9]['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        <?php } else { ?>
                            <td><input type="radio" name="question_9_2" value="ทำได้ไม่ลำบากเลย"></td>
                            <td><input type="radio" name="question_9_2" value="ลำบากเล็กน้อย"></td>
                            <td><input type="radio" name="question_9_2" value="ลำบากปานกลาง"></td>
                            <td><input type="radio" name="question_9_2" value="ลำบากมาก"></td>
                            <td><input type="radio" name="question_9_2" value="ไม่สามารถทำได้"></td>
                        <?php } ?>
                        </tr>

                        <td>ค. คุกเข่า</td>
                        <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                            <td><input type="radio" name="question_9_3" value="ทำได้ไม่ลำบากเลย" <?= ($ikdc_data[10]['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_3" value="ลำบากเล็กน้อย" <?= ($ikdc_data[10]['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_3" value="ลำบากปานกลาง" <?= ($ikdc_data[10]['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_3" value="ลำบากมาก" <?= ($ikdc_data[10]['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_3" value="ไม่สามารถทำได้" <?= ($ikdc_data[10]['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        <?php } else { ?>
                            <td><input type="radio" name="question_9_3" value="ทำได้ไม่ลำบากเลย"></td>
                            <td><input type="radio" name="question_9_3" value="ลำบากเล็กน้อย"></td>
                            <td><input type="radio" name="question_9_3" value="ลำบากปานกลาง"></td>
                            <td><input type="radio" name="question_9_3" value="ลำบากมาก"></td>
                            <td><input type="radio" name="question_9_3" value="ไม่สามารถทำได้"></td>
                        <?php } ?>
                        </tr>

                        <tr>
                            <td>ง. นั่งยองๆ</td>
                            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                                <td><input type="radio" name="question_9_4" value="ทำได้ไม่ลำบากเลย" <?= ($ikdc_data[11]['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_4" value="ลำบากเล็กน้อย" <?= ($ikdc_data[11]['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_4" value="ลำบากปานกลาง" <?= ($ikdc_data[11]['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_4" value="ลำบากมาก" <?= ($ikdc_data[11]['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_4" value="ไม่สามารถทำได้" <?= ($ikdc_data[11]['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                            <?php } else { ?>
                                <td><input type="radio" name="question_9_4" value="ทำได้ไม่ลำบากเลย"></td>
                                <td><input type="radio" name="question_9_4" value="ลำบากเล็กน้อย"></td>
                                <td><input type="radio" name="question_9_4" value="ลำบากปานกลาง"></td>
                                <td><input type="radio" name="question_9_4" value="ลำบากมาก"></td>
                                <td><input type="radio" name="question_9_4" value="ไม่สามารถทำได้"></td>
                            <?php } ?>
                        </tr>

                        <tr>
                            <td>จ. นั่งงอเข่า</td>
                            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                                <td><input type="radio" name="question_9_5" value="ทำได้ไม่ลำบากเลย" <?= ($ikdc_data[12]['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_5" value="ลำบากเล็กน้อย" <?= ($ikdc_data[12]['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_5" value="ลำบากปานกลาง" <?= ($ikdc_data[12]['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_5" value="ลำบากมาก" <?= ($ikdc_data[12]['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_5" value="ไม่สามารถทำได้" <?= ($ikdc_data[12]['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                            <?php } else { ?>
                                <td><input type="radio" name="question_9_5" value="ทำได้ไม่ลำบากเลย"></td>
                                <td><input type="radio" name="question_9_5" value="ลำบากเล็กน้อย"></td>
                                <td><input type="radio" name="question_9_5" value="ลำบากปานกลาง"></td>
                                <td><input type="radio" name="question_9_5" value="ลำบากมาก"></td>
                                <td><input type="radio" name="question_9_5" value="ไม่สามารถทำได้"></td>
                            <?php } ?>
                        </tr>

                        <tr>
                            <td>ฉ. ลุกจากเก้าอี้</td>
                            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                                <td><input type="radio" name="question_9_6" value="ทำได้ไม่ลำบากเลย" <?= ($ikdc_data[13]['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_6" value="ลำบากเล็กน้อย" <?= ($ikdc_data[13]['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_6" value="ลำบากปานกลาง" <?= ($ikdc_data[13]['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_6" value="ลำบากมาก" <?= ($ikdc_data[13]['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_6" value="ไม่สามารถทำได้" <?= ($ikdc_data[13]['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                            <?php } else { ?>
                                <td><input type="radio" name="question_9_6" value="ทำได้ไม่ลำบากเลย"></td>
                                <td><input type="radio" name="question_9_6" value="ลำบากเล็กน้อย"></td>
                                <td><input type="radio" name="question_9_6" value="ลำบากปานกลาง"></td>
                                <td><input type="radio" name="question_9_6" value="ลำบากมาก"></td>
                                <td><input type="radio" name="question_9_6" value="ไม่สามารถทำได้"></td>
                            <?php } ?>
                        </tr>

                        <tr>
                            <td>ช. วิ่งตรงไปข้างหน้า</td>
                            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                                <td><input type="radio" name="question_9_7" value="ทำได้ไม่ลำบากเลย" <?= ($ikdc_data[14]['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_7" value="ลำบากเล็กน้อย" <?= ($ikdc_data[14]['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_7" value="ลำบากปานกลาง" <?= ($ikdc_data[14]['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_7" value="ลำบากมาก" <?= ($ikdc_data[14]['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_7" value="ไม่สามารถทำได้" <?= ($ikdc_data[14]['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                            <?php } else { ?>
                                <td><input type="radio" name="question_9_7" value="ทำได้ไม่ลำบากเลย"></td>
                                <td><input type="radio" name="question_9_7" value="ลำบากเล็กน้อย"></td>
                                <td><input type="radio" name="question_9_7" value="ลำบากปานกลาง"></td>
                                <td><input type="radio" name="question_9_7" value="ลำบากมาก"></td>
                                <td><input type="radio" name="question_9_7" value="ไม่สามารถทำได้"></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>ซ. กระโดดและลงพื้น</td>
                            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                                <td><input type="radio" name="question_9_8" value="ทำได้ไม่ลำบากเลย" <?= ($ikdc_data[15]['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_8" value="ลำบากเล็กน้อย" <?= ($ikdc_data[15]['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_8" value="ลำบากปานกลาง" <?= ($ikdc_data[15]['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_8" value="ลำบากมาก" <?= ($ikdc_data[15]['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_8" value="ไม่สามารถทำได้" <?= ($ikdc_data[15]['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                            <?php } else { ?>
                                <td><input type="radio" name="question_9_8" value="ทำได้ไม่ลำบากเลย"></td>
                                <td><input type="radio" name="question_9_8" value="ลำบากเล็กน้อย"></td>
                                <td><input type="radio" name="question_9_8" value="ลำบากปานกลาง"></td>
                                <td><input type="radio" name="question_9_8" value="ลำบากมาก"></td>
                                <td><input type="radio" name="question_9_8" value="ไม่สามารถทำได้"></td>
                            <?php } ?>
                        </tr>

                        <tr>
                            <td>ฌ. หยุดและออกตัวอย่างรวดเร็ว</td>
                            <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                                <td><input type="radio" name="question_9_9" value="ทำได้ไม่ลำบากเลย" <?= ($ikdc_data[16]['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_9" value="ลำบากเล็กน้อย" <?= ($ikdc_data[16]['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_9" value="ลำบากปานกลาง" <?= ($ikdc_data[16]['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_9" value="ลำบากมาก" <?= ($ikdc_data[16]['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                                <td><input type="radio" name="question_9_9" value="ไม่สามารถทำได้" <?= ($ikdc_data[16]['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                            <?php } else { ?>
                                <td><input type="radio" name="question_9_9" value="ทำได้ไม่ลำบากเลย"></td>
                                <td><input type="radio" name="question_9_9" value="ลำบากเล็กน้อย"></td>
                                <td><input type="radio" name="question_9_9" value="ลำบากปานกลาง"></td>
                                <td><input type="radio" name="question_9_9" value="ลำบากมาก"></td>
                                <td><input type="radio" name="question_9_9" value="ไม่สามารถทำได้"></td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!-- Question 10 -->
            <div class="question">
                <label>10. ท่านจะประเมินการใช้งานของเข่าท่านอย่างไร โดยให้คะแนนตั้งแต่ 0 ถึง 10</label>

                <h6>การใช้งานก่อนบาดเจ็บของเข่าท่าน</h6>
                <div class="scale-group-row">
                    <?php for ($i = 0; $i <= 10; $i++): ?>
                        <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                            <label><input type="radio" name="question_10_1" value="<?= $i; ?>" <?= ($ikdc_data[17]['answer_value'] == $i) ? 'checked' : ''; ?>> <?= $i; ?></label>
                        <?php } else { ?>
                            <label><input type="radio" name="question_10_1" value="<?= $i; ?>"> <?= $i; ?></label>
                        <?php } ?>
                    <?php endfor; ?>
                </div>

                <h6>การใช้งานของเข่าท่านในปัจจุบัน</h6>
                <div class="scale-group-row">
                    <?php for ($i = 0; $i <= 10; $i++): ?>
                        <?php if (isset($ikdc_data) && $ikdc_data) { ?>
                            <label><input type="radio" name="question_10_2" value="<?= $i; ?>" <?= ($ikdc_data[18]['answer_value'] == $i) ? 'checked' : ''; ?>> <?= $i; ?></label>
                        <?php } else { ?>
                            <label><input type="radio" name="question_10_2" value="<?= $i; ?>"> <?= $i; ?></label>
                        <?php } ?>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="form-group">
                <button type="submit">ส่งข้อมูล</button>
            </div>
    </form>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap Datepicker Thai Localization -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"></script>

<script>
    $(document).ready(function() {
        $('.datepicker-th-current').datepicker({
            language: 'th', // ตั้งค่าให้ใช้ภาษาไทย
            format: 'dd/mm/yyyy', // กำหนดรูปแบบวันที่
            autoclose: true, // ปิด datepicker เมื่อเลือกวันที่
            setDate: new Date(), // ตั้งค่าวันที่ปัจจุบัน
        }).datepicker('update', new Date()); // อัปเดตค่าเริ่มต้นให้เป็นวันที่ปัจจุบัน

        $("#as_cardID").change(function() {
            var idInput = $('#as_cardID').val(); // ดึงค่าจาก input
            if (idInput.length !== 13) {
                alert('กรุณากรอกเลขบัตรประจำตัวประชาชนให้ครบ 13 หลัก');
                $('#as_cardID').focus();
            }
        });

    });
</script>