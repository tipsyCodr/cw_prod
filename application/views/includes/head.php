<div class="fixed-top flex flex-row py-1.5 justify-between items-center bg-accent">
    <div class=" flex img-wrapper items-center px-1">
        <a href="#"><img class='m-0' src="<?= base_url() . 'assets/images/logo.png' ?>" alt="menu" width="40px"></a>
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
<style>
    .fixed-top {
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        right: 0;
        z-index: 15;

    }
</style>