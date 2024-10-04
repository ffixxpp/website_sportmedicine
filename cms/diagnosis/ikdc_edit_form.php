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
<body>
    <div class="container">
        <h2>แก้ไขข้อมูล IKDC</h2>
        <form action="<?= base_url('Ikdc_form/update') ?>" method="post">
            <input type="hidden" name="id" value="<?= $ikdc_data['id']; ?>">

            <div class="form-group">
                <label for="as_cardID">รหัสประจำตัวประชาชน:</label>
                <input type="text" class="form-control" id="as_cardID" name="as_cardID" value="<?= $ikdc_data['as_cardID']; ?>" required>
            </div>

            <div class="form-group">
                <label for="as_fName">ชื่อ-นามสกุล:</label>
                <input type="text" class="form-control" id="as_fName" name="as_fName" value="<?= $ikdc_data['as_fName']; ?>" required>
            </div>

            <div class="form-group">
                <label for="doc_date">วันที่บันทึกข้อมูล:</label>
                <input type="date" class="form-control" id="doc_date" name="doc_date" value="<?= $ikdc_data['doc_date']; ?>" required>
            </div>

            <div class="form-group">
                <label for="injury_date">วันที่ได้รับบาดเจ็บ:</label>
                <input type="date" class="form-control" id="injury_date" name="injury_date" value="<?= $ikdc_data['injury_date']; ?>" required>
            </div>
            <div class="container">

        <!-- Question 1 -->
        <div class="question">
            <label>1. ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการชัดเจน?</label>
            <div class="radio-group-column">
                <?php foreach($ikdc_answers as $answer) { ?>
                    <?php if ($answer['question_key'] == 'question_1') { ?>
                        <label><input type="radio" name="question_1[]" value="กิจกรรมหนักมาก จำพวกกระโดด" <?= (strpos($answer['answer_value'], 'กิจกรรมหนักมาก จำพวกกระโดด') !== false) ? 'checked' : ''; ?>> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                        <label><input type="radio" name="question_1[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก" <?= (strpos($answer['answer_value'], 'กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก') !== false) ? 'checked' : ''; ?>> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                        <label><input type="radio" name="question_1[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง" <?= (strpos($answer['answer_value'], 'กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง') !== false) ? 'checked' : ''; ?>> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                        <label><input type="radio" name="question_1[]" value="กิจกรรมเบา จำพวกการเดิน" <?= (strpos($answer['answer_value'], 'กิจกรรมเบา จำพวกการเดิน') !== false) ? 'checked' : ''; ?>> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                        <label><input type="radio" name="question_1[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย" <?= (strpos($answer['answer_value'], 'ไม่สามารถทำกิจกรรมข้างต้นได้เลย') !== false) ? 'checked' : ''; ?>> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากปวดเข่า</label>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
<!-- Question 2 -->
<div class="question">
            <label>2. ในช่วง 4 สัปดาห์ที่ผ่านมา ท่านรู้สึกปวดบ่อยเพียงใด?</label>
            <div class="scale-group-row">
                <?php foreach($ikdc_answers as $answer) { ?>
                    <?php if ($answer['question_key'] == 'question_2') { ?>
                        <?php for ($i = 0; $i <= 10; $i++): ?>
                            <label><input type="radio" name="question_2" value="<?= $i; ?>" <?= ($answer['answer_value'] == $i) ? 'checked' : ''; ?>> <?= $i; ?></label>
                        <?php endfor; ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="question">
            <label>3. หากท่านรู้สึกปวด อาการปวดนั้นมีความรุนแรงเท่าใด?</label>
            <div class="radio-group-row">
                <?php foreach($ikdc_answers as $answer) { ?>
                    <?php if ($answer['question_key'] == 'question_3') { ?>
                        <?php for ($i = 0; $i <= 10; $i++): ?>
                            <label><input type="radio" name="question_3" value="<?= $i; ?>" <?= ($answer['answer_value'] == $i) ? 'checked' : ''; ?>> <?= $i; ?></label>
                        <?php endfor; ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="question">
            <label>4. ในช่วง 4 สัปดาห์ที่ผ่านมา เข่าของท่านมีอาการข้อฝืดแข็งหรือบวมแค่ไหน?</label>
            <div class="radio-group-column">
                <?php foreach($ikdc_answers as $answer) { ?>
                    <?php if ($answer['question_key'] == 'question_4') { ?>
                        <label><input type="radio" name="question_4[]" value="ไม่เลย" <?= (strpos($answer['answer_value'], 'ไม่เลย') !== false) ? 'checked' : ''; ?>> ไม่เลย</label>
                        <label><input type="radio" name="question_4[]" value="น้อย" <?= (strpos($answer['answer_value'], 'น้อย') !== false) ? 'checked' : ''; ?>> น้อย</label>
                        <label><input type="radio" name="question_4[]" value="ปานกลาง" <?= (strpos($answer['answer_value'], 'ปานกลาง') !== false) ? 'checked' : ''; ?>> ปานกลาง</label>
                        <label><input type="radio" name="question_4[]" value="มาก" <?= (strpos($answer['answer_value'], 'มาก') !== false) ? 'checked' : ''; ?>> มาก</label>
                        <label><input type="radio" name="question_4[]" value="มากที่สุด" <?= (strpos($answer['answer_value'], 'มากที่สุด') !== false) ? 'checked' : ''; ?>> มากที่สุด</label>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <!-- Question 5 -->
        <div class="question">
            <label>5. ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการเข่าบวมชัดเจน?</label>
            <div class="radio-group-column">
                <?php foreach($ikdc_answers as $answer) { ?>
                    <?php if ($answer['question_key'] == 'question_5') { ?>
                        <label><input type="radio" name="question_5[]" value="กิจกรรมหนักมาก จำพวกกระโดด" <?= (strpos($answer['answer_value'], 'กิจกรรมหนักมาก จำพวกกระโดด') !== false) ? 'checked' : ''; ?>> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                        <label><input type="radio" name="question_5[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก" <?= (strpos($answer['answer_value'], 'กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก') !== false) ? 'checked' : ''; ?>> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                        <label><input type="radio" name="question_5[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง" <?= (strpos($answer['answer_value'], 'กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง') !== false) ? 'checked' : ''; ?>> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                        <label><input type="radio" name="question_5[]" value="กิจกรรมเบา จำพวกการเดิน" <?= (strpos($answer['answer_value'], 'กิจกรรมเบา จำพวกการเดิน') !== false) ? 'checked' : ''; ?>> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                        <label><input type="radio" name="question_5[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย" <?= (strpos($answer['answer_value'], 'ไม่สามารถทำกิจกรรมข้างต้นได้เลย') !== false) ? 'checked' : ''; ?>> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากเข่าบวม</label>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <!-- Question 6 -->
        <div class="question">
            <label>6. ในช่วง 4 สัปดาห์ที่ผ่านมา หรือตั้งแต่ท่านได้รับบาดเจ็บ เข่าของท่านมีอาการข้อติดหรือข้อขัดหรือไม่?</label>
            <div class="scale-group-column">
                <?php foreach($ikdc_answers as $answer) { ?>
                    <?php if ($answer['question_key'] == 'question_6') { ?>
                        <label><input type="radio" name="question_6" value="มี" <?= ($answer['answer_value'] == 'มี') ? 'checked' : ''; ?>> มี</label>
                        <label><input type="radio" name="question_6" value="ไม่มี" <?= ($answer['answer_value'] == 'ไม่มี') ? 'checked' : ''; ?>> ไม่มี</label>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <!-- Question 7 -->
        <div class="question">
            <label>7. ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้โดยไม่มีอาการข้อเข่าทรุดอย่างชัดเจน?</label>
            <div class="radio-group-column">
                <?php foreach($ikdc_answers as $answer) { ?>
                    <?php if ($answer['question_key'] == 'question_7') { ?>
                        <label><input type="radio" name="question_7[]" value="กิจกรรมหนักมาก จำพวกกระโดด" <?= (strpos($answer['answer_value'], 'กิจกรรมหนักมาก จำพวกกระโดด') !== false) ? 'checked' : ''; ?>> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                        <label><input type="radio" name="question_7[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก" <?= (strpos($answer['answer_value'], 'กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก') !== false) ? 'checked' : ''; ?>> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                        <label><input type="radio" name="question_7[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง" <?= (strpos($answer['answer_value'], 'กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง') !== false) ? 'checked' : ''; ?>> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                        <label><input type="radio" name="question_7[]" value="กิจกรรมเบา จำพวกการเดิน" <?= (strpos($answer['answer_value'], 'กิจกรรมเบา จำพวกการเดิน') !== false) ? 'checked' : ''; ?>> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                        <label><input type="radio" name="question_7[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย" <?= (strpos($answer['answer_value'], 'ไม่สามารถทำกิจกรรมข้างต้นได้เลย') !== false) ? 'checked' : ''; ?>> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากข้อเข่าทรุด</label>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <!-- Question 8 -->
        <div class="question">
            <label>8. ข้อใดเป็นระดับกิจกรรมสูงสุดที่ท่านสามารถทำได้เป็นกิจวัตรปกติ?</label>
            <div class="radio-group-column">
                <?php foreach($ikdc_answers as $answer) { ?>
                    <?php if ($answer['question_key'] == 'question_8') { ?>
                        <label><input type="radio" name="question_8[]" value="กิจกรรมหนักมาก จำพวกกระโดด" <?= (strpos($answer['answer_value'], 'กิจกรรมหนักมาก จำพวกกระโดด') !== false) ? 'checked' : ''; ?>> กิจกรรมหนักมาก จำพวกกระโดด หรือหมุนตัว ในการเล่นบาสเกตบอล หรือฟุตบอล</label>
                        <label><input type="radio" name="question_8[]" value="กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก" <?= (strpos($answer['answer_value'], 'กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก') !== false) ? 'checked' : ''; ?>> กิจกรรมหนัก จำพวกการออกกำลังกายอย่างหนัก การเล่นเทนนิส</label>
                        <label><input type="radio" name="question_8[]" value="กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง" <?= (strpos($answer['answer_value'], 'กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง') !== false) ? 'checked' : ''; ?>> กิจกรรมปานกลาง จำพวกการออกกำลังระดับปานกลาง การวิ่งหรือจ๊อกกิ้ง</label>
                        <label><input type="radio" name="question_8[]" value="กิจกรรมเบา จำพวกการเดิน" <?= (strpos($answer['answer_value'], 'กิจกรรมเบา จำพวกการเดิน') !== false) ? 'checked' : ''; ?>> กิจกรรมเบา จำพวกการเดิน ทำงานบ้าน รดน้ำต้นไม้</label>
                        <label><input type="radio" name="question_8[]" value="ไม่สามารถทำกิจกรรมข้างต้นได้เลย" <?= (strpos($answer['answer_value'], 'ไม่สามารถทำกิจกรรมข้างต้นได้เลย') !== false) ? 'checked' : ''; ?>> ไม่สามารถทำกิจกรรมข้างต้นได้เลยเนื่องจากเข่า</label>
                    <?php } ?>
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
                    <?php foreach($ikdc_answers as $answer) { ?>
                        <?php if ($answer['question_key'] == 'question_9_1') { ?>
                        <tr>
                            <td>ก. ขึ้นบันได</td>
                            <td><input type="radio" name="question_9_1" value="ทำได้ไม่ลำบากเลย" <?= ($answer['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_1" value="ลำบากเล็กน้อย" <?= ($answer['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_1" value="ลำบากปานกลาง" <?= ($answer['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_1" value="ลำบากมาก" <?= ($answer['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_1" value="ไม่สามารถทำได้" <?= ($answer['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        </tr>
                        <?php } ?>

                        <?php if ($answer['question_key'] == 'question_9_2') { ?>
                        <tr>
                            <td>ข. ลงบันได</td>
                            <td><input type="radio" name="question_9_2" value="ทำได้ไม่ลำบากเลย" <?= ($answer['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_2" value="ลำบากเล็กน้อย" <?= ($answer['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_2" value="ลำบากปานกลาง" <?= ($answer['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_2" value="ลำบากมาก" <?= ($answer['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_2" value="ไม่สามารถทำได้" <?= ($answer['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        </tr>
                        <?php } ?>
                        
                        <?php if ($answer['question_key'] == 'question_9_3') { ?>
                        <tr>
                        <td>ค. คุกเข่า</td>
                            <td><input type="radio" name="question_9_3" value="ทำได้ไม่ลำบากเลย" <?= ($answer['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_3" value="ลำบากเล็กน้อย" <?= ($answer['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_3" value="ลำบากปานกลาง" <?= ($answer['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_3" value="ลำบากมาก" <?= ($answer['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_3" value="ไม่สามารถทำได้" <?= ($answer['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        </tr>
                        <?php } ?>

                        <?php if ($answer['question_key'] == 'question_9_4') { ?>
                        <tr>
                            <td>ง. นั่งยองๆ</td>
                            <td><input type="radio" name="question_9_4" value="ทำได้ไม่ลำบากเลย" <?= ($answer['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_4" value="ลำบากเล็กน้อย" <?= ($answer['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_4" value="ลำบากปานกลาง" <?= ($answer['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_4" value="ลำบากมาก" <?= ($answer['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_4" value="ไม่สามารถทำได้" <?= ($answer['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        </tr>
                        <?php } ?>

                        <?php if ($answer['question_key'] == 'question_9_5') { ?>
                        <tr>
                            <td>จ. นั่งงอเข่า</td>
                            <td><input type="radio" name="question_9_5" value="ทำได้ไม่ลำบากเลย" <?= ($answer['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_5" value="ลำบากเล็กน้อย" <?= ($answer['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_5" value="ลำบากปานกลาง" <?= ($answer['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_5" value="ลำบากมาก" <?= ($answer['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_5" value="ไม่สามารถทำได้" <?= ($answer['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        </tr>
                        <?php } ?>

                        <?php if ($answer['question_key'] == 'question_9_6') { ?>
                        <tr>
                            <td>ฉ. ลุกจากเก้าอี้</td>
                            <td><input type="radio" name="question_9_6" value="ทำได้ไม่ลำบากเลย" <?= ($answer['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_6" value="ลำบากเล็กน้อย" <?= ($answer['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_6" value="ลำบากปานกลาง" <?= ($answer['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_6" value="ลำบากมาก" <?= ($answer['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_6" value="ไม่สามารถทำได้" <?= ($answer['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        </tr>
                        <?php } ?>

                        <?php if ($answer['question_key'] == 'question_9_7') { ?>
                        <tr>
                            <td>ช. วิ่งตรงไปข้างหน้า</td>
                            <td><input type="radio" name="question_9_7" value="ทำได้ไม่ลำบากเลย" <?= ($answer['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_7" value="ลำบากเล็กน้อย" <?= ($answer['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_7" value="ลำบากปานกลาง" <?= ($answer['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_7" value="ลำบากมาก" <?= ($answer['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_7" value="ไม่สามารถทำได้" <?= ($answer['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        </tr>
                        <?php } ?>

                        <?php if ($answer['question_key'] == 'question_9_8') { ?>
                        <tr>
                            <td>ซ. กระโดดและลงพื้น</td>
                            <td><input type="radio" name="question_9_8" value="ทำได้ไม่ลำบากเลย" <?= ($answer['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_8" value="ลำบากเล็กน้อย" <?= ($answer['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_8" value="ลำบากปานกลาง" <?= ($answer['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_8" value="ลำบากมาก" <?= ($answer['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_8" value="ไม่สามารถทำได้" <?= ($answer['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        </tr>
                        <?php } ?>

                        <?php if ($answer['question_key'] == 'question_9_9') { ?>
                        <tr>
                            <td>ฌ. หยุดและออกตัวอย่างรวดเร็ว</td>
                            <td><input type="radio" name="question_9_9" value="ทำได้ไม่ลำบากเลย" <?= ($answer['answer_value'] == 'ทำได้ไม่ลำบากเลย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_9" value="ลำบากเล็กน้อย" <?= ($answer['answer_value'] == 'ลำบากเล็กน้อย') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_9" value="ลำบากปานกลาง" <?= ($answer['answer_value'] == 'ลำบากปานกลาง') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_9" value="ลำบากมาก" <?= ($answer['answer_value'] == 'ลำบากมาก') ? 'checked' : ''; ?>></td>
                            <td><input type="radio" name="question_9_9" value="ไม่สามารถทำได้" <?= ($answer['answer_value'] == 'ไม่สามารถทำได้') ? 'checked' : ''; ?>></td>
                        </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <label>10. ท่านจะประเมินการใช้งานของเข่าท่านอย่างไร โดยให้คะแนนตั้งแต่ 0 ถึง 10</label>

                <h6>การใช้งานก่อนบาดเจ็บของเข่าท่าน</h6>
                <div class="scale-group-row">
                    <?php foreach($ikdc_answers as $answer) { ?>
                        <?php if ($answer['question_key'] == 'question_10_1') { ?>
                            <?php for ($i = 0; $i <= 10; $i++): ?>
                                <label><input type="radio" name="question_10_1" value="<?= $i; ?>" <?= ($answer['answer_value'] == $i) ? 'checked' : ''; ?>> <?= $i; ?></label>
                            <?php endfor; ?>
                        <?php } ?>
                    <?php } ?>
                </div>

                <h6>การใช้งานของเข่าท่านในปัจจุบัน</h6>
                <div class="scale-group-row">
                    <?php foreach($ikdc_answers as $answer) { ?>
                        <?php if ($answer['question_key'] == 'question_10_2') { ?>
                            <?php for ($i = 0; $i <= 10; $i++): ?>
                                <label><input type="radio" name="question_10_2" value="<?= $i; ?>" <?= ($answer['answer_value'] == $i) ? 'checked' : ''; ?>> <?= $i; ?></label>
                            <?php endfor; ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- ปุ่มส่งข้อมูล -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
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
</body>

</html>