<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การติดตามการรักษา</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            min-height: 100vh;
            align-items: flex-start;
        }

        /* container หลัก */
        .container {
            max-width: 1200px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            width: 100%;
            position: relative;
        }

        /* ย้ายหัวข้อ "ติดตามสถานะการรักษา" ไปด้านซ้าย */
        h3 {
            text-align: left;
            color: #2E568C;
            font-weight: bold;
            margin-bottom: 10px;
            position: relative;
        }

        /* ขีดเส้นสีแดงและสีน้ำเงิน */
        h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            height: 4px;
            width: 200px; /* ขยายความยาวของเส้นอีกนิด */
            background: linear-gradient(to right, red 60%, #2E568C 40%);
        }

        /* ปรับกล่องข้อมูลผู้ป่วยให้ยาวขึ้นและอยู่ด้านขวา */
        .patient-info {
            background-color: #2E568C; /* สีพื้นหลัง */
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            position: absolute;
            right: 0;
            top: 20px;
            width: 500px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            text-align: left;
        }

        .patient-info .detail {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }

        .patient-info .detail span {
            margin-bottom: 5px; /* เพิ่มระยะห่างระหว่างบรรทัด */
        }

        .patient-info .hn {
            font-weight: bold;
            background-color: #1F447F;
            padding: 10px 15px;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }

        .section {
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            margin-top: 100px; /* เว้นระยะให้กล่องข้อมูลผู้ป่วย */
            background-color: #f9fafb;
        }

        .section-header {
            font-weight: bold;
            color: #2E568C;
            font-size: 18px;
            margin-bottom: 15px;
            border-bottom: 2px solid #2E568C;
            padding-bottom: 10px;
        }

        .form-group label {
            display: inline-block;
            font-weight: 600;
            margin-right: 10px;
            color: #555;
        }

        .form-group input, .form-group textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            background-color: #fff;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: border 0.3s ease;
        }

        .form-group input:focus, .form-group textarea:focus {
            border-color: #2E568C;
            outline: none;
        }

        .radio-group, .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .button-group {
            text-align: right;
        }

        .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
            }

            .patient-info {
                position: relative;
                width: 100%;
                right: 0;
                top: 0;
            }
        }
    </style>
</head>
<body>

    <!-- container หลัก -->
    <div class="container">
        <!-- เปลี่ยนจากชิดกลางเป็นชิดซ้าย -->
        <h3>ติดตามสถานะการรักษา</h3>

        <!-- กล่องข้อมูลผู้ป่วยที่ยาวขึ้นและอยู่ด้านขวา -->
        <div class="patient-info">
            <div class="detail">
                <span>เลขบัตรประจำตัวประชาชน: 1917700800721</span>
                <span>ชื่อ-นามสกุล: นัสิตา อาจเจริญ</span>
                <span>แพทย์: อัศนนันต์ นิยมเดช</span>
            </div>
            <div class="hn">HN-001</div>
        </div>

        <div class="section">
            <div class="section-header">บันทึกข้อมูลใหม่</div>

            <div class="form-group">
                <label>Pain score:</label>
                <div class="radio-group">
                    <span>5</span>
                </div>
            </div>

            <div class="form-group">
                <label>Exercise vital sign:</label>
                <div class="checkbox-group">
                    <span>ข้อมูล Vital Sign บันทึกแล้ว</span>
                </div>
            </div>

            <div class="form-group">
                <label>ความถี่ในการออกกำลังกาย:</label>
                <span>ปกติ</span>
            </div>

            <div class="form-group">
                <label>ระยะเวลาในการออกกำลังกาย (นาที):</label>
                <span>60 นาที</span>
            </div>

            <div class="form-group">
                <label>ประวัติความบาดเจ็บ/เจ็บป่วย:</label>
                <span>ไม่มี</span>
            </div>

            <div class="form-group">
                <label>ความหวังในการรักษา:</label>
                <span>กลับมาเล่นกีฬาได้เหมือนเดิม</span>
            </div>

            <div class="form-group">
                <label>ประวัติแพ้ยา:</label>
                <span>ไม่มี</span>
            </div>

            <div class="form-group">
                <label>รายละเอียดเพิ่มเติม:</label>
                <textarea disabled class="input-large">ไม่มีรายละเอียดเพิ่มเติม</textarea>
            </div>
        </div>

        <div class="button-group">
            <button class="btn-submit">บันทึก</button>
        </div>
    </div>

</body>
</html>
