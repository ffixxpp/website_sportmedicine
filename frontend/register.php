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
        width: 500px;
        border-radius: 25px;
        padding: 20px;
    }

    .form-select option {
        text-align: center;
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
                            <!-- form ของ เจ้าหน้าที่ -->
                            <?php if ($type == 'officer') { ?>
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <h4>สมัครสมาชิกสำหรับเจ้าหน้าที่</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <label>ชื่อผู้ใช้งาน :</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="ชื่อผู้ใช้งาน" required>
                                            <div class="mt-2"></div>
                                            <label>เบอร์โทร :</label>
                                            <input type="tel" name="phone" id="phone" class="form-control" maxlength="10" pattern="[0-9]{10}" placeholder="เบอร์โทร" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            <div class="mt-2"></div>
                                            <label>เลขบัตรประจำตัวประชาชน :</label>
                                            <input type="tel" name="cardID" id="cardID" class="form-control" maxlength="13" pattern="[0-9]{13}" placeholder="เลขบัตรประจำตัวประชาชน" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            <div class="mt-2"></div>
                                            <label>อีเมล :</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="อีเมล" required>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label>รหัสผ่าน :</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน" required>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label>ยืนยันรหัสผ่าน :</label>
                                            <input type="password" name="c_password" id="c_password" class="form-control" placeholder="ยืนยันรหัสผ่าน" required>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <select name="role" id="role" class="form-select">
                                                <?php for ($i = 0; $i < count($roles); $i++) { ?>
                                                    <?php if ($roles[$i]['role_name'] == 'ทีมผู้ดูแล') { ?>
                                                        <option value="<?= $roles[$i]['role_id'] ?>"><?= $roles[$i]['role_name'] ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mt-3 d-flex justify-content-center">
                                            <button type="button" onclick="register()" class="btn" style="background-color: #2E568C; color: #fff;">สมัครสมาชิก</button>
                                        </div>
                                        <div class="col-md-12 mt-3 d-flex justify-content-center">
                                            <span>หากคุณมีบัญชีผู้ใช้แล้ว <a href="<?= base_url() ?>Auth/officer">เข้าสู่ระบบ</a></span>
                                        </div>
                                    </div>
                                </form>
                            <?php } else { ?>
                                <!-- สำหรับผู้ใช้งาน -->
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <h4>สมัครสมาชิก</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <label>ชื่อผู้ใช้งาน :</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="ชื่อผู้ใช้งาน" required>
                                            <div class="mt-2"></div>
                                            <label>เบอร์โทร :</label>
                                            <input type="tel" name="phone" id="phone" class="form-control" maxlength="10" pattern="[0-9]{10}" placeholder="เบอร์โทร" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            <div class="mt-2"></div>
                                            <label>เลขบัตรประจำตัวประชาชน :</label>
                                            <input type="tel" name="cardID" id="cardID" class="form-control" maxlength="13" pattern="[0-9]{13}" placeholder="เลขบัตรประจำตัวประชาชน" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            <div class="mt-2"></div>
                                            <label>อีเมล :</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="อีเมล" required>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label>รหัสผ่าน :</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน" required>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label>ยืนยันรหัสผ่าน :</label>
                                            <input type="password" name="c_password" id="c_password" class="form-control" placeholder="ยืนยันรหัสผ่าน" required>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <input type="hidden" name="role" id="role" value="2">
                                        </div>
                                        <div class="col-md-12 mt-3 d-flex justify-content-center">
                                            <button type="button" onclick="register()" class="btn" style="background-color: #2E568C; color: #fff;">สมัครสมาชิก</button>
                                        </div>
                                        <div class="col-md-12 mt-3 d-flex justify-content-center">
                                            <span>หากคุณมีบัญชีผู้ใช้แล้ว <a href="<?= base_url() ?>Auth/general">เข้าสู่ระบบ</a></span>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //เช็ค email ในระบบว่ามีการใช้แล้วรึยัง
        $('#email').change(function() {
            var email = $(this).val();

            $.ajax({
                url: '<?= base_url() ?>auth/checkemail',
                method: "POST",
                data: {
                    email: email
                },
                success: function(data) {
                    if (data == 'false') {
                        $('#email').val('');
                        Swal.fire({
                            icon: 'error',
                            title: 'อีเมลนี้ได้ทำการสมัครสมาชิกแล้ว!',
                            text: 'กรุณาใช้อีเมลอื่น',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#email').focus();
                    } else {
                        $('#email_error').html('');
                        $('#email').removeClass('has-error');
                        $('#register').attr('disabled', false);
                    }
                }
            })
        });
        // $('#password').blur(function() {
        //     var password_count = $(this).val();
        //     if (password_count.length < 8) {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัว',
        //             toast: true,
        //             position: 'top-end',
        //             showConfirmButton: false,
        //             timer: 3000
        //         });
        //         $('#password').val('');
        //     }
        // });

    });




    function register() {
        var username = document.getElementById("username").value;
        var phone = document.getElementById("phone").value;
        var cardID = document.getElementById("cardID").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("c_password").value;
        var role = document.getElementById("role").value;

        if (username === '' || phone === '' || cardID === '' || email === '' || password === '' || confirm_password === '') {
            // กรอกไม่ครบ
            Swal.fire({
                icon: 'error',
                title: 'กรุณากรอกข้อมูลให้ครบทุกช่อง',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            return;
        }
        if (password != confirm_password) {
            Swal.fire({
                icon: 'error',
                title: 'รหัสผ่านไม่ตรงกัน',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('#confirm_password').val('');
            return false;
        } else {
            $.ajax({
                url: "<?= base_url() ?>Auth_login/auth_regis",
                method: "POST",
                data: {
                    username: username,
                    phone: phone,
                    cardID: cardID,
                    email: email,
                    password: password,
                    role: role
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'สมัครสมาชิกสำเร็จแล้ว',
                        text: 'กำลังไปยังหน้าเข้าสู่ระบบ',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        // Redirect ไปยังหน้า login
                        if (role == '1') {
                            window.location.href = "<?= base_url('Auth/officer') ?>";
                        } else {
                            window.location.href = "<?= base_url('Auth/general') ?>";
                        }

                    });
                },
                error: function(xhr, status, error) {
                    // การจัดการเมื่อเกิดข้อผิดพลาดในการโหลดข้อมูล
                    console.log(xhr.responseText);
                }
            });
        }
    }
</script>