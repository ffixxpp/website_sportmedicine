<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<style>
    .card__img {
        display: flex;
        justify-content: center;
    }

    .box-img {
        width: 95%;
        height: 70vh;
        /* border: 1px solid #000; */
        margin: 0 auto;
        overflow: hidden;
    }

    .box-content {
        width: 95%;
        margin: 15px auto;
        position: relative;
    }

    .btn-custom {
        background-color: #d9d9d9;
        color: #2E568C;
    }

    .btn-custom:hover {
        border: 2px solid #2E568C;
    }

    .imgspmc {
        position: absolute;
        left: -35px;
        top: -12px;
    }

    @media (max-width: 992px) {
        .box-img {
            width: 95%;
            height: fit-content;
            /* border: 1px solid #000; */
            margin: 0 auto;
            overflow: hidden;
        }
    }
</style>



<main class="main bd-grid">
    <?php
    // print_r($_SESSION);
    ?>

    <div class="box-img">
        <img src="<?= base_url(); ?>/assets/img/cover_welcome.png" class="w-100" alt="cover">
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <h3 style="color: #2E568C;">ยินดีต้อนรับ</h3>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <a href="<?= base_url() ?>assessment" class="btn btn-custom">เริ่มต้นใช้งาน</a>
            </div>
        </div>
        <div class="imgspmc">
            <img src="<?= base_url(); ?>/assets/img/smpc.png" style="width: 250px;" alt="spmc">
        </div>
    </div>




    <!-- <article class="card">
		<div class="card__img">
			<img src="<?= base_url(); ?>assets/img/part1.png" alt="">
		</div>
		<div class="card__name">
			<p>เมนูสำหรับคลินิก</p>
		</div>
		<div class="card__precis">
			<a href="" class="card__icon"><ion-icon name="heart-outline"></ion-icon></a>
			<div>
				<?php if (!empty($_SESSION['user_id'])) { ?>
					<a href="<?= base_url() ?>clinic/home" class="btn btn-danger">คลินิก</a>
				<?php } else { ?>
					<a href="<?= base_url() ?>clinic" class="btn btn-danger">คลินิก</a>
				<?php } ?>
			</div>
			<a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a>
		</div>
	</article> -->
</main>