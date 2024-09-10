<div class="sticky-header">
    <div class="p-1 flex flex-row justify-between items-center bg-accent">
        <div class=" flex img-wrapper items-center">
            <a href="#"><img class='m-0' src="<?= base_url() . 'assets/images/logo.png' ?>" alt="menu" width="50px"></a>
            <p class="px-1 font-light text-white text-xl uppercase text-nowrap">
                Patel Samaj
            </p>
        </div>
        <div class="user p-0 flex flex-row justify-evenly">
            <a href="#" class="p-1 px-1.5 m-1  bg-white rounded-full"><img
                    src="<?= base_url() . 'assets/images/icons/chat.png' ?>" width="27px" alt=""></a>
            <?php if ($this->session->userdata('login')): ?>
                <a href="<?= base_url('logout') ?>" class="p-1 m-1 bg-white rounded-full "> <i
                        class="fa-solid fa-right-from-bracket fa-2x"></i></a>
            <?php else: ?>
                <a href="<?= base_url('login') ?>" class="p-1 m-1 bg-white rounded-full"><img
                        src="<?= base_url() . 'assets/images/icons/user.png' ?>" width="30px" alt="Logo"></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    window.onscroll = function () { myFunction() };

    var header = document.querySelector(".sticky-header");
    var sticky = header.offsetTop + 150;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
            header.style.transition = "top 0.5s cubic-bezier(0.4, 0, 0.2, 1)";
            header.style.top = "0px";
        } else {
            header.classList.remove("sticky");
            header.style.transition = "top 0.5s cubic-bezier(0.4, 0, 0.2, 1)";
            header.style.top = "";
        }
    }
</script>

<style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 10;
    }
</style>