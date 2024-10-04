<style>
    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: #f9fafc;
        border-radius: 8px;
        overflow: hidden;
    }

    .table th,
    .table td {
        vertical-align: middle !important;
        /* font-size: 18px;
            padding: 15px; */
    }

    .table th {
        background-color: #2E568C;
        color: #ffffff;
        text-align: center;
        border-top: none;
    }

    .table td {
        background-color: #ffffff;
        color: #2E568C;
        text-align: center;
        border-top: none;
        border-bottom: 1px solid #e9ecef;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f4f7f6;
    }

    .table-hover tbody tr:hover {
        background-color: #dfe6ed;
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

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 0 15px;
    }

    .edit-btn {
        background-color: #ffcc00;
        color: #2E568C;
        border: 2px solid #ffcc00;
        /* padding: 8px 16px; */
        text-align: center;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease, transform 0.3s ease, color 0.3s ease;
        border-radius: 4px;
        /* Square shape */
    }

    .edit-btn:hover {
        background-color: #e6b800;
        transform: translateY(-3px);
        color: #ffffff;
    }

    .delete-btn {
        background-color: #ffffff;
        color: #dc3545;
        border: 2px solid #dc3545;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease, transform 0.3s ease, color 0.3s ease;
        border-radius: 4px;
        /* Square shape */
    }

    .delete-btn:hover {
        background-color: #dc3545;
        color: #ffffff;
        transform: translateY(-3px);
    }

    .add-btn {
        color: #1A3D69;
        background-color: transparent;
        border: 2px solid #1A3D69;
        border-radius: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease, transform 0.3s ease, color 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .add-btn:hover {
        background-color: #1A3D69;
        color: #ffffff;
    }

    .add-btn i {
        margin-right: 5px;
    }

    .btn-secondary {
        border-radius: 20px;
    }
</style>
<?php
function convertDate($date)
{
    $newDate = '-';
    if ($date != '0000-00-00') {
        // แปลงวันที่จากรูปแบบ Y/m/d เป็น d/m/Y
        $newDate = date("d/m/Y", strtotime($date));
    }
    return $newDate;
}
?>


<div class="height-100" style="background-color: #ffffff; color: #2E568C;">
    <div class="d-flex justify-content-between">
        <h3 style="font-weight: bold;">แสดงข้อมูล IKDC</h3>
        <!-- ปุ่มย้อนกลับ -->
        <div>
            
                <a href="<?= base_url() ?>Ikdc_form" class="btn add-btn">เพิ่ม &nbsp;<i class="fa-solid fa-circle-plus"></i></a>
            <a href="<?= base_url('index.php/saving_form/index') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> กลับ</a>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table  table-bordered table-striped table-hover dataTable">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>HN</th>
                    <th>รหัสประจำตัวประชาชน</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่บันทึกข้อมูล</th>
                    <th>วันที่ได้รับบาดเจ็บ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($ikdc_data); $i++) { ?>
                    <!-- บุคคลทั่วไปเห็นเฉพาะของตัวเอง -->
                    <?php if ($_SESSION['user_role_id'] == '2') { ?>
                        <?php if ($_SESSION['user_hn'] == $ikdc_data[$i]['as_hn']) { ?>
                            <tr>
                                <td><?= ($i + 1) ?></td>
                                <td><?= $ikdc_data[$i]['as_hn']; ?></td>
                                <td><?= $ikdc_data[$i]['as_cardID']; ?></td>
                                <td class="name-column"><?= $ikdc_data[$i]['as_fName']; ?></td>
                                <td><?= convertDate($ikdc_data[$i]['doc_date']); ?></td>
                                <td><?= convertDate($ikdc_data[$i]['injury_date']); ?></td>
                                <td>
                                    <a href="<?= base_url() ?>ikdc_form/view/<?= $ikdc_data[$i]['id'] ?>" class="btn btn-info" ><i class="fa-solid fa-file-lines"></i></a>
                                    <!-- <button class="btn btn-info" onclick="viewRecord('<?= htmlspecialchars($ikdc_data[$i]['as_hn'], ENT_QUOTES, 'UTF-8'); ?>')"><i class="fa-solid fa-file-lines"></i></button> -->
                                    <!-- <button class="btn btn-danger" onclick="confirmDelete(event, <?= $ikdc_data[$i]['id']; ?>, '<?= $ikdc_data[$i]['as_cardID']; ?>')"><i class="fas fa-trash"></i></button> -->
                                </td>
                            </tr>
                        <?php } ?>
                        <!-- ทีมดูแลเห็นทั้งหมด -->
                    <?php } else { ?>
                        <tr>
                            <td><?= ($i + 1) ?></td>
                            <td><?= $ikdc_data[$i]['as_hn']; ?></td>
                            <td><?= $ikdc_data[$i]['as_cardID']; ?></td>
                            <td class="name-column"><?= $ikdc_data[$i]['as_fName']; ?></td>
                            <td><?= convertDate($ikdc_data[$i]['doc_date']); ?></td>
                            <td><?= convertDate($ikdc_data[$i]['injury_date']); ?></td>
                            <td>
                                <button class="btn btn-warning" onclick="editRecord(<?= $ikdc_data[$i]['id']; ?>)"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger" onclick="confirmDelete(event, <?= $ikdc_data[$i]['id']; ?>, '<?= $ikdc_data[$i]['as_cardID']; ?>')"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php  } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete(event, id, cardID) {
    event.preventDefault();
    Swal.fire({
        title: 'ยืนยันการลบ',
        text: `คุณต้องการลบข้อมูล ${cardID} ใช่หรือไม่?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ลบ!',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            // Ensure this URL is correct
            window.location.href = `<?= base_url() ?>Ikdc_form/delete/${id}`;
        }
    });
}


    function viewRecord(as_hn) {
        window.location.href = `<?= base_url() ?>ikdc_form/view?as_hn=${as_hn}`;
    }

    function editRecord(id) {
        // นำผู้ใช้ไปที่หน้าแก้ไข โดยใช้ ID ที่ส่งมา
        window.location.href = `<?= base_url() ?>Ikdc_form/edit/${id}`;
    }
</script>

</script>