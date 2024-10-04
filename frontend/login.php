<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<style>
    body {
        background-color: #2E568C;
    }

    /* .page-content {
        height: 80vh;
    } */

    .box-card {
        margin: 0 auto;
        height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        width: 420px;
        border-radius: 25px;
        padding: 20px;
    }
</style>

<?php if (!empty($_SESSION['error'])) : ?>
    <script>
        Swal.fire({
            icon: '<?php echo $_SESSION['swal_type']; ?>',
            title: '<?php echo $_SESSION['swal_title']; ?>',
            text: '<?php echo $_SESSION['swal_text']; ?>',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500
        });
    </script>
<?php endif; ?>

<?php if (!empty($_SESSION['login_message'])) : ?>
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'กรุณาเข้าสู่ระบบก่อนใช้งาน',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });
    </script>
<?php endif; ?>

<?php

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

?>

<div class="content-wrapper container">
    <div class="page-content">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="box-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url() ?>Auth_login/login/<?= $type ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <h4>เข้าสู่ระบบ</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="email">อีเมล</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="อีเมล" required>
                                        <div class="mt-3"></div>
                                        <label for="password">รหัสผ่าน</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="รหัสผ่าน" required>
                                    </div>
                                    <div class="col-md-12 mt-3 d-flex justify-content-center">
                                        <button type="submit" class="btn" style="background-color: #2E568C; color: #fff;">เข้าสู่ระบบ</button>
                                    </div>
                                    <div class="col-md-12 mt-3 d-flex justify-content-center">
                                        <?php if ($type == 'general') { ?>
                                            <span>หากคุณยังไม่มีบัญชีผู้ใช้ <a href="<?= base_url() ?>Auth/register/<?= $type ?>">สมัครสมาชิก</a></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>