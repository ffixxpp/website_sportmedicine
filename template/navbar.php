</head>

<body>

    <nav class="navbar navbar-expand-md ">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?php echo base_url(); ?>/assets/img/logo_mahidol.png" style="width: 200px;" alt="logo">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if ($this->session->userdata('user_id')) { ?>
                        <!-- เมื่อเข้าสู่ระบบสำเร็จ -->

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>Auth_login/logout">ออกจากระบบ</a>
                        </li>


                    <?php } else { ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('Ikdc_form'); ?>">แบบฟอร์ม ikdc</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>Auth/general">สำหรับบุคคลทั่วไป</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>Auth/officer">สำหรับเจ้าหน้าที่</a>
                        </li>

                    <?php  } ?>
                </ul>
            </div>
        </div>
    </nav>