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


<div class="content-wrapper container">
    <div class="page-content">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="box-card">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?= base_url() ?>Auth_login/gen_account" method="post">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <h4>สำหรับสร้าง Account เจ้าหน้าที่</h4>
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
                                    <div class="col-md-12 mt-2">
                                        <label>รหัสผ่าน :</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน" required>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <select name="role" id="role" class="form-select" required>
                                            <option value="" selected disabled>-กรุณาเลือก-</option>
                                            <?php for ($i = 0; $i < count($roles); $i++) { ?>
                                                <option value="<?= $roles[$i]['role_id'] ?>"><?= $roles[$i]['role_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3 d-flex justify-content-center">
                                        <button type="submit" class="btn" style="background-color: #2E568C; color: #fff;">สมัครสมาชิก</button>
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