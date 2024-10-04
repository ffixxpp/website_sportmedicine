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
        <h3 style="font-weight: bold;">ตรวจประเมิน</h3>
        <?php if ($_SESSION['user_role_id'] == '2') { ?>
            <?php if (empty($assessment)) { ?>
                <a href="<?= base_url() ?>assessment/add_form" class="btn custom-btn-add">เพิ่ม &nbsp;<i class="fa-solid fa-circle-plus"></i></a>
            <?php } ?>
        <?php } else { ?>
            <a href="<?= base_url() ?>assessment/add_form" class="btn custom-btn-add">เพิ่ม &nbsp;<i class="fa-solid fa-circle-plus"></i></a>
        <?php } ?>
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
                        <th class="custom-table">ฟอร์ม</th>
                        <th class="custom-table"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($assessment); $i++) { ?>
                        <!-- กำหนดสิทธิ์ ถ้าเป็นบุคคลทั่วไปเห็นเฉพาะของตัวเอง -->
                        <?php if ($_SESSION['user_role_id'] == '2') { ?>
                            <?php if ($_SESSION['user_hn'] ==  $assessment[$i]['as_hn']) { ?>
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;"><?= ($i + 1) ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_hn'] ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_cardID'] ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_fName'] . ' ' . $assessment[$i]['as_sName'] ?></td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="<?= base_url() ?>saving_form"><i class="fa-solid fa-file-medical" style="color: #4FB960; font-size: 26px;"></i></a>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="<?= base_url() ?>assessment/edit/<?= $assessment[$i]['as_id'] ?>" class="btn btn-warning" title="แก้ไข"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <!-- <a href="#" onclick="confirmDelete(event, '<?= $assessment[$i]['as_id'] ?>', '<?= $assessment[$i]['as_hn'] ?>')" class="btn btn-danger" title="ลบ"><i class="fa-solid fa-trash"></i></a> -->
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <!-- กำหนดสิทธิ์ ถ้าเป็นทีมดูแลหรือเจ้าหน้าที่เห็นทั้งหมด -->
                            <tr>
                                <td class="text-center" style="vertical-align: middle;"><?= ($i + 1) ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_hn'] ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_cardID'] ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?= $assessment[$i]['as_fName'] . ' ' . $assessment[$i]['as_sName'] ?></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    <a href="<?= base_url() ?>saving_form"><i class="fa-solid fa-file-medical" style="color: #4FB960; font-size: 26px;"></i></a>
                                </td>
                                <td class="text-center" style="vertical-align: middle;">
                                    <a href="<?= base_url() ?>assessment/edit/<?= $assessment[$i]['as_id'] ?>" class="btn btn-warning" title="แก้ไข"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="#" onclick="confirmDelete(event, '<?= $assessment[$i]['as_id'] ?>', '<?= $assessment[$i]['as_hn'] ?>')" class="btn btn-danger" title="ลบ"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(event, id, hn) {
        event.preventDefault(); // หยุดการทำงานของลิงก์ปกติ

        Swal.fire({
            title: 'ยืนยันการลบ',
            text: `คุณต้องการลบข้อมูล ${hn} ใช่หรือไม่?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ลบ!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                // ถ้าผู้ใช้กดยืนยัน ให้ทำการลบ
                window.location.href = `<?= base_url() ?>assessment/delete/${id}`;
            }
        });
    }
</script>