<?php
// echo "<pre>";
// print_r($ikdc_answer);
// echo "</pre>";
?>

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
        <h3 style="font-weight: bold;">แสดงข้อมูล IKDC</h3>
        <!-- ปุ่มย้อนกลับ -->
        <div>
            <a href="<?= base_url('index.php/ikdc_form/show') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> กลับ</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <?php
                            $create_date = explode(" ", $ikdc_data[0]['created_at']);
                            ?>
                            <div class="d-flex me-3"><b>วันที่บันทึกข้อมูล :</b>&nbsp; <?= convertDate($create_date[0]) ?></div>
                            <div class="d-flex"><b>วันที่ได้รับบาดเจ็บ :</b>&nbsp; <?= convertDate($ikdc_data[0]['injury_date']) ?></div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background-color: #2E568C; color: #ffffff;">คำถาม</th>
                                        <th style="background-color: #2E568C; color: #ffffff;">คำตอบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($ikdc_answer); $i++) { ?>
                                        <tr>
                                            <td><?= $ikdc_answer[$i]['ques_desc'] ?></td>
                                            <td><?= $ikdc_answer[$i]['answer_value'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>