<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
        --header-height: 3rem;
        --nav-width: 68px;
        --first-color: #2E568C;
        --first-color-light: #AFA5D9;
        --white-color: #F7F6FB;
        --normal-font-size: 1rem;
        --z-fixed: 100
    }

    *,
    ::before,
    ::after {
        box-sizing: border-box
    }

    body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-size: var(--normal-font-size);
        /* transition: .5s */
    }

    a {
        text-decoration: none
    }

    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: #ffffff;
        z-index: var(--z-fixed);
        transition: .5s
    }

    .header_toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer
    }

    .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden
    }

    .header_img img {
        width: 40px
    }

    .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color: var(--first-color);
        padding: .5rem 1rem 0 0;
        transition: .5s;
        z-index: var(--z-fixed)
    }

    .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden
    }

    .nav_logo,
    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: .5rem 0 .5rem 1.5rem
    }

    .nav_logo {
        margin-bottom: 2rem
    }

    .nav_logo-icon {
        font-size: 1.25rem;
        color: var(--white-color)
    }

    .nav_logo-name {
        color: var(--white-color);
        font-weight: 700
    }

    .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 0.2rem;
        transition: .3s
    }

    .nav_link:hover {
        color: var(--white-color)
    }

    .nav_icon {
        font-size: 1.25rem
    }

    .show-navber {
        left: 0
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 1rem)
    }

    .active {
        color: var(--white-color)
    }

    .active::before {
        content: '';
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--white-color)
    }

    .height-100 {
        height: 100vh
    }

    @media screen and (min-width: 768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem)
        }


        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
        }

        .header_img {
            width: 40px;
            height: 40px
        }

        .header_img img {
            width: 45px
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0
        }

        .show-navber {
            width: calc(var(--nav-width) + 156px)
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 188px)
        }


    }

    .box-img-profile {
        margin: 0 auto;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background-color: #F7F6FB;
        overflow: hidden;
    }
</style>

<?php
$current_url = $_SERVER['REQUEST_URI']; // ดึง URL ปัจจุบัน

function isActive($pattern, $current_url)
{
    return strpos($current_url, $pattern) !== false ? 'active' : '';
}
?>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <!-- <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div> -->
    </header>
    <div class="l-navbar show-navber" id="nav-bar">
        <nav class="nav">
            <div>
                <div class="nav_logo">
                    <div class="d-flex" style="flex-direction: column; align-items: center;">
                        <div class="box-img-profile">
                            <img src="<?= base_url() ?>assets/img/icon-man.png" class="w-100">
                        </div>
                        <div class="mt-3 text-center">
                            <h5 class="text-white"><?= $_SESSION['user_username'] ?></h5>
                            <?php if ($_SESSION['user_role_id'] == '2') { ?>
                                <span class="text-white">(<?= $_SESSION['user_hn'] ?>)</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="nav_list">
                    <a href="<?= base_url() ?>assessment" class="nav_link <?= isActive('assessment', $current_url); ?>">
                        <i class="fa-solid fa-file-lines nav_icon"></i>
                        <span class="nav_name">ตรวจประเมิน</span>
                    </a>
                    <!-- <a href="<?= base_url() ?>saving_form" class="nav_link <?= isActive('saving_form', $current_url); ?>">
                        <i class="fa-solid fa-file-medical nav_icon"></i>
                        <span class="nav_name">การบันทึกฟอร์ม</span>
                    </a> -->
                    <a href="<?= base_url() ?>diagnosis" class="nav_link <?= isActive('diagnosis', $current_url); ?>">
                        <i class="fa-solid fa-file-waveform nav_icon"></i>
                        <span class="nav_name">วินิจฉัย</span>
                    </a>
                    <a href="<?= base_url() ?>treatment" class="nav_link <?= isActive('treatment', $current_url); ?>">
                        <i class="fa-solid fa-shield nav_icon"></i>
                        <span class="nav_name">การรักษา</span>
                    </a>
                    <a href="<?= base_url() ?>follow_up" class="nav_link <?= isActive('follow_up', $current_url); ?>">
                        <i class="fa-solid fa-stopwatch nav_icon"></i>
                        <span class="nav_name">ติดตาม</span>
                    </a>
                    <a href="<?= base_url() ?>report" class="nav_link <?= isActive('report', $current_url); ?>">
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">รายงานผลลัพธ์</span>
                    </a>
                </div>
            </div> <a href="<?= base_url() ?>Auth_login/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">ออกจากระบบ</span> </a>
        </nav>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    // Add initial 'show' state for the icon and padding
                    nav.classList.add('show-navber')
                    toggle.classList.add('bx-x')
                    bodypd.classList.add('body-pd')
                    headerpd.classList.add('body-pd')

                    toggle.addEventListener('click', () => {
                        // toggle navbar visibility
                        nav.classList.toggle('show-navber')
                        // toggle icon
                        toggle.classList.toggle('bx-x')
                        // toggle padding on body and header
                        bodypd.classList.toggle('body-pd')
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')
            console.log(linkColor)

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))
        });
    </script>