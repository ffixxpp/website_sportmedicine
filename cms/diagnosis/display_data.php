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

    .alert-success {
        color: #ffffff !important;
        background-color: #4CAF50 !important;
        border-color: #4CAF50 !important;
        font-weight: bold;
        border-radius: 12px;
        text-align: center;
        padding: 15px 30px;
        margin-bottom: 30px;
        letter-spacing: 1px;
        font-family: 'Kanit', sans-serif;
        font-size: 18px;
        max-width: 300px;
        margin: 20px auto;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1s ease-out;
        position: relative;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success:before {
        content: "\f058";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #ffffff;
        margin-right: 10px;
        font-size: 24px;
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

<div class="height-100" style="background-color: #ffffff; color: #2E568C; position: relative;">
    <div class="d-flex justify-content-between">
        <h3 style="font-weight: bold;">แสดงข้อมูล OPD RECORD</h3>
        <div class="">
            <?php if ($_SESSION['user_role_id'] == '1') { ?>
                <a href="<?= base_url() ?>diagnosis/opd" class="btn add-btn">เพิ่ม &nbsp;<i class="fa-solid fa-circle-plus"></i></a>
            <?php } ?>
            <a href="<?= base_url('index.php/saving_form/index') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> กลับ </a>
        </div>
    </div>
    <hr>

    <div class="table-container">
        <table class="table table-bordered teble-striped table-hover"></table>
        <?php if ($this->session->flashdata('success')):
        ?>
            <div class="box-alert" style="position: absolute; top: 0; left: 50%; transform: translate(-50%, 10px); z-index: 1001;">
                <div class="alert alert-success" id="success-alert">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            </div>
        <?php endif;
        ?>

        <table class="table table-bordered table-striped table-hover table-sm dataTable">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>HN</th>
                    <th class="name-column">ชื่อ-นามสกุล</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($records); $i++) { ?>
                    <!-- กำหนดสิทธิ์หากเป็นบุคคลทั่วไปเห็นของตัวเอง -->
                    <?php if ($_SESSION['user_role_id'] == '2') { ?>
                        <?php if ($_SESSION['user_hn'] == $records[$i]['hn']) { ?>
                            <tr>
                                <td>1</td>
                                <td><?= $records[$i]['hn']; ?></td>
                                <td class="name-column"><?= $records[$i]['name']; ?></td>
                                <td>
                                    <button class="btn btn-info" onclick="editRecord(<?= $records[$i]['id']; ?>)"><i class="fa-solid fa-eye"></i></button>
                                    <!-- <button class="btn btn-danger" onclick="confirmDelete(event, <?= $records[$i]['id']; ?>, '<?= $records[$i]['hn']; ?>')"><i class="fas fa-trash"></i></button> -->
                                </td>
                            </tr>
                        <?php } ?>
                        <!-- กรณีเป็นของทีมดูแลเห็นทั้งหมด -->
                    <?php } else { ?>
                        <tr>
                            <td><?= ($i + 1) ?></td>
                            <td><?= $records[$i]['hn']; ?></td>
                            <td class="name-column"><?= $records[$i]['name']; ?></td>
                            <td>
                                <button class="btn btn-warning" onclick="editRecord(<?= $records[$i]['id']; ?>)"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger" onclick="confirmDelete(event, <?= $records[$i]['id']; ?>, '<?= $records[$i]['hn']; ?>')"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Check if there is an alert
        var $alert = $('#success-alert');
        if ($alert.length) {
            setTimeout(function() {
                $alert.fadeOut('slow');
            }, 1800);
        }
    });

    function editRecord(id) {
        window.location.href = '<?= base_url() ?>diagnosis/edit/' + id;
    }

    function confirmDelete(event, id, hn) {
        event.preventDefault(); // หยุดการทำงานของลิงก์ปกติ

        Swal.fire({
            title: 'ยืนยันการลบ?',
            text: 'คุณต้องการลบข้อมูล ' + hn + ' ใช่หรือไม่?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ลบ!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url() ?>diagnosis/delete/' + id + '/' + hn;
            }
        });
    }
</script>