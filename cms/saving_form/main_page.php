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

    .form-container {
        display: grid;
        grid-template-columns: auto auto auto;
        justify-content: center;
        align-items: center;
        height: 80%;
    }

    .form-box {
        background-color: #2E568C;
        padding: 20px;
        border-radius: 10px;
        width: 150px;
        height: fit-content;
        margin: 0 20px;
        color: white;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .form-box:hover {
        background-color: #1A3D69;
    }

    .form-box i {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .form-title {
        margin-top: 10px;
        font-size: 18px;
    }

    .form-box:nth-child(2) {
        background-color: #4E7496;
    }

    .form-box:nth-child(3) {
        background-color: #B3BDC5;
    }

    .form-box:nth-child(2):hover {
        background-color: #3D5D7A;
    }

    .form-box:nth-child(3):hover {
        background-color: #929CA3;
    }
</style>

<div class="height-100" style="background-color: #ffffff; color: #2E568C;">
    <div class="d-flex justify-content-between">
        <h3 style="font-weight: bold;">วินิจฉัย</h3>
        <!-- <a href="<?= base_url() ?>assessment/add_form" class="btn custom-btn-add">เพิ่ม &nbsp;<i class="fa-solid fa-circle-plus"></i></a> -->
    </div>

    <!-- เขียนโค้ดเพิ่ม ต่อตรงนี้เลย -->

    <!-- เนื้อหาใหม่ที่เพิ่มเข้ามา -->
    <div class="form-container">
        <a href="<?= base_url('ikdc_form/show') ?>" class="form-box">
            <i class="fa fa-clipboard"></i>
            <div class="form-title">
                <span>แบบฟอร์ม 1</span><br>
                <span style="font-size: 14px; font-weight: normal;">(แสดงข้อมูล IKDC)</span>
            </div>
        </a>
        <a href="<?= base_url('injury_form') ?>" class="form-box">
            <i class="fa fa-check-square"></i>
            <div class="form-title">
                <span>แบบฟอร์ม 2</span><br>
                <span style="font-size: 14px; font-weight: normal;">(Injuries,Illnesses)</span>
            </div>
        </a>
        <a href="<?= base_url('/diagnosis/display_data') ?>" class="form-box">
            <i class="fa fa-file-alt"></i>
            <div class="form-title">
                <span>แบบฟอร์ม 3</span><br>
                <span style="font-size: 14px; font-weight: normal;">(OPD RECODE)</span>
            </div>
        </a>
    </div>
</div>