<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Injury and Illness Form</title>
    <style>
        .container {
            max-width: 1500px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #ced4da;
        }

        h1 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ced4da;
            text-align: center;
            padding: 5px;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        input[type="text"], input[type="date"], input[type="number"], select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

    </style>
</head>
<body>

<div class="container">
    <h1>Daily Medical Report on Injury and Illness</h1>
    <form action="injury_form/save" method="POST">
        <!-- เพิ่มการเก็บ Country, Date of report, Form completed by: Name, Contact details: -->
        <div class="row">
            <div class="col-md-2 mb-2">
                <label style="font-weight: bold;">country :</label>
                <input type="text" name="country" id="country" class="form-control" placeholder="country" style="background-color: #FFFFFF;" required>
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: bold;">date of report :</label>
                <input type="date" name="date_of_report" id="date_of_report" class="form-control" style="background-color: #FFFFFF;" required>
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: bold;">form completed by :</label>
                <input type="text" name="form_completed_by" id="form_completed_by" class="form-control" style="background-color: #FFFFFF;" required>
            </div>
            <div class="col-md-2 mb-2">
                <label style="font-weight: bold;">contact details :</label>
                <input type="text" name="contact_details" id="contact_details" class="form-control" style="background-color: #FFFFFF;" required>
            </div>
        </div>
        
        <h1>Injury </h1>
        <!-- ข้อมูลทั่วไป -->
        <table>
            <tr>
                <th colspan="2">age</th>
                <th>gender</th>
                <th>sport and Event</th>
                <th>date of injury</th>
                <th>competition/training</th>
                <th>code</th>
                <th>onset code</th>
                <th>new code
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="age"></td>
                <td><input type="text" name="gender"></td>
                <td><input type="text" name="sport_event"></td>
                <td><input type="date" name="date_injury"></td>
                <td><input type="text" name="com_training"></td>
                <td><input type="text" name="code"></td>
                <td><input type="text" name="onset_code"></td>
                <td><input type="text" name="new_code"></td>
            </tr>
        </table>

        <!-- รายละเอียดการบาดเจ็บ -->
        <table>
            <tr>
                <th colspan="2">injury mechanism</th>
                <th>code</th>
                <th>injury body region</th>
                <th>code</th>
                <th>injury type</th>
                <th>code</th>
                <th>time-loss</th>
                <th>duration (days)</th>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="i_mechanism"></td>
                <td><input type="text" name="code"></td>
                <td><input type="text" name="i_body"></td>
                <td><input type="text" name="code"></td>
                <td><input type="text" name="i_type"></td>
                <td><input type="text" name="code"></td>
                <td>
                    <select name="time_loss">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </td>
                <td><input type="number" name="duration"></td>
            </tr>
        </table>
        <!-- ข้อมูลเพิ่มเติม -->
        <h1>Illnesses</h1>

        <table>
            <tr>
                <th colspan="2">age</th>
                <th>gender</th>
                <th>sport and event</th>
                <th>date of onset</th>
                <th>organ system/region</th>
                <th>code</th>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="age"></td>
                <td><input type="text" name="gender"></td>
                <td><input type="text" name="sport_event"></td>
                <td><input type="date" name="date_onset"></td>
                <td><input type="text" name="organ_system"></td>
                <td><input type="text" name="code"></td>

            </tr>
        </table>

        <table>
        <tr>
            <th>aetiology</th>
            <th>code</th> 
            <th>new, recurrent or exacerbation code</th>
            <th>time-loss</th>
            <th>duration (days)</th>
        </tr>
        <tr>
            <td><input type="text" name="aetiology"></td>
            <td><input type="text" name="code"></td>
            <td><input type="text" name="new_recurrent"></td>
            <td>
                <select name="time_loss">
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                </select>
            </td>
            <td><input type="number" name="duration_additional"></td>
        </tr>
        </table>

        <!-- ปุ่มบันทึก -->
        <div class="row">
            <div class="col-md-2 mb-2">
                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">บันทึกข้อมูล</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>