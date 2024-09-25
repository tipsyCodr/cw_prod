<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Community Site</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <base href="<?= base_url() ?>">
    <!-- <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=66e5a2dfbb2e4200191ddd8c&product=image-share-buttons&source=platform"
        async="async"></script> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=SUSE:wght@100..800&display=swap"
        rel="stylesheet">
    <link rel="preload" href="assets/fonts/mona-sans/Mona-Sans.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/solid.min.css"
        integrity="sha512-/r+0SvLvMMSIf41xiuy19aNkXxI+3zb/BN8K9lnDDWI09VM0dwgTMzK7Qi5vv5macJ3VH4XZXr60ip7v13QnmQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> -->

    <!-- Libraries Stylesheet -->
    <link href="assets/landing_assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/landing_assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- <link href="assets/landing_assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- sweet alert  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Using Tailwindcss -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->


    <!-- Template Stylesheet -->
    <link href="assets/landing_assets/css/style.css" rel="stylesheet">
    <link href="assets/root.css" rel="stylesheet">

    <!-- toastr  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">

    <!-- splide carousel -- used in homepage -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
        integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/themes/splide-default.min.css"
        integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">

    <link href="assets/landing_assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>node_modules/flowbite/dist/flowbite.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css" />



</head>
<style>
    .preloader {
        z-index: 1090;
        background-color: white;
        position: fixed;
        top: 0;
        bottom: 0;
        height: screen;
        width: 100%;
    }

    .spinner-img {

        animation: fadeinOut 1s linear infinite;
    }

    @keyframes fadeinOut {
        0% {
            transform: translateY(5px);
        }

        50% {
            transform: translateY(-5px);
        }

        100% {
            transform: translateY(5px);
        }

    }
</style>

<body
    style=" background: rgb(235,214,245);
background: linear-gradient(180deg, rgba(235,214,245,1) 0%, rgba(212,207,245,1) 23%, rgba(212,230,246,1) 70%, rgba(255,255,255,1) 95%);">
    <div class="preloader hidden">
        <div class="spinner flex flex-col h-full justify-center items-center">
            <img class="spinner-img " src="<?= base_url() ?>assets/images/logo.png" width="200" alt="">
            <p class="text-center font-bold py-4">Loading...</p>
        </div>

    </div>
    <main>
        <header>
            <nav>
                <?php include_once(APPPATH . "views/includes/head.php"); ?>
            </nav>
        </header>
        <section class="pb-16 main-content lucid-gradient">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold"><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold"><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php endif; ?>

            <?= $slot ?> <!-- placeholder for main content -->
        </section>
        <footer>
            <nav>
                <?php include_once(APPPATH . "views/includes/nav.php"); ?>
            </nav>
        </footer>
    </main>
</body>
<!-- <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="<?= base_url() ?>node_modules/flowbite/dist/flowbite.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var preloader = document.querySelector(".preloader");
        setTimeout(function () {
            preloader.style.display = "none";
        }, 10);
    });
</script>
<script type="module" src="<?= base_url() ?>assets/js/app.js" crossorigin="anonymous"></script>

</html>