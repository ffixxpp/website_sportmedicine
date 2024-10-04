<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Google Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- เชื่อมต่อ SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

<!-- select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- slick -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

<!-- Bootstrap Datepicker CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

<style>
    body {
        font-family: "Kanit", sans-serif;
        font-style: normal;
    }


    .navbar-brand img {
        width: 200px;
    }


    .navbar-nav {
        align-items: center;
    }

    .navbar .navbar-nav .nav-link {
        color: #000;
        font-size: 1.1em;
        padding: 0.5em 1em;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }


    /* hamberger */
    .navbar-toggler span {
        display: block;
        background-color: #4f4f4f;
        height: 3px;
        width: 25px;
        margin-top: 5px;
        margin-bottom: 5px;
        position: relative;
        left: 0;
        opacity: 1;
        transition: all 0.35s ease-out;
        transform-origin: center left;
    }



    .navbar-toggler span:nth-child(1) {
        transform: translate(0%, 0%) rotate(0deg);
    }

    .navbar-toggler span:nth-child(2) {
        opacity: 1;
    }

    .navbar-toggler span:nth-child(3) {
        transform: translate(0%, 0%) rotate(0deg);
    }

    .navbar-toggler span:nth-child(1) {
        margin-top: 0.3em;
    }

    .navbar-toggler:not(.collapsed) span:nth-child(1) {
        transform: translate(15%, -33%) rotate(45deg);
    }

    .navbar-toggler:not(.collapsed) span:nth-child(2) {
        opacity: 0;
    }

    .navbar-toggler:not(.collapsed) span:nth-child(3) {
        transform: translate(15%, 33%) rotate(-45deg);
    }


    .slide-show {
        max-width: 1366px;
        max-height: 300px;
        margin: 10px auto;
        position: relative;
    }

    .slide-show .slick-prev {
        position: absolute;
        top: 136px;
        left: 20px;
        z-index: 10;
    }

    .slide-show .slick-next {
        position: absolute;
        top: 136px;
        right: 20px;
        z-index: 10;
    }

    .items {
        max-width: 1366px;
        max-height: 300px;
        border-radius: 10px;
        overflow: hidden;
    }


    .items img {
        width: 1366px;
        height: 300px;
        /* object-fit: cover; */
    }

    .slide-show .slick-arrow {
        z-index: 10;
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        border: none;
        outline: none;
    }

    .slide-show .slick-dots {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        position: absolute;
        bottom: 5px;
        padding: 0px;
    }

    .slide-show .slick-dots li {
        margin: 0 2px;
        width: 10px;
        height: 10px;
        list-style: none;
        background: #fff;
        border-radius: 50%;

    }

    .slide-show .slick-active {
        background: #000 !important;
    }

    .select2 {
        width: 100%;
    }

    .select2-container .select2-selection--single {
        height: calc(1.5em + 0.75rem + 2px);
        /* ใช้คำสั่ง calc เพื่อคำนวณความสูงของ Select2 */
    }

    .dataTables_length,
    .dataTables_info {
        text-align: left;
    }


    @media screen and (min-width: 768px) {
        .navbar-brand img {
            width: 100px;
        }

        .navbar-brand {
            margin-right: 0;
            padding: 0 1em;
        }
    }
</style>