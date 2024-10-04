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
</style>

<div class="height-100" style="background-color: #ffffff; color: #2E568C;">
    <div class="d-flex justify-content-between">
        <h3 style="font-weight: bold;">การรักษา</h3>
        <!-- <a href="<?= base_url() ?>treatment/treatment_view" class="btn custom-btn-add">เพิ่ม &nbsp;<i class="fa-solid fa-circle-plus"></i></a> -->
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th class="custom-table">ลำดับ</th>
                        <th class="custom-table">HN</th>
                        <th class="custom-table">รหัสประจำตัวประชาชน</th>
                        <th class="custom-table">ชื่อ</th>
                        <th class="custom-table">บันทึกการรักษา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($assessment) && is_array($assessment) && count($assessment) > 0): ?>
                        <?php for ($i = 0; $i < count($assessment); $i++) { ?>
                            <?php if ($_SESSION['user_role_id'] != '2') { ?>
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;"><?= ($i + 1) ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_hn'] ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_cardID'] ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_fName'] . ' ' . $assessment[$i]['as_sName'] ?></td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="<?= base_url() ?>treatment/treatment_view/<?= $assessment[$i]['as_id'] ?>" class="btn" title="แก้ไข"><i class="fa-solid fa-file-medical" style="color: #4FB960; font-size: 30px;"></i></a>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <?php if ($_SESSION['user_hn'] == $assessment[$i]['as_hn']) { ?>
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;">1</td>
                                        <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_hn'] ?></td>
                                        <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_cardID'] ?></td>
                                        <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_fName'] . ' ' . $assessment[$i]['as_sName'] ?></td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a href="<?= base_url() ?>treatment/treatment_view/<?= $assessment[$i]['as_id'] ?>" class="btn" title="แก้ไข"><i class="fa-solid fa-file-medical" style="color: #4FB960; font-size: 30px;"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">ไม่พบข้อมูล</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>