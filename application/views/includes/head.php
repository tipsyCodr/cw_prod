<div class="p-1 flex flex-row justify-between items-center bg-blue-500">
    <div class=" flex img-wrapper items-center">
        <a href="#"><img class='m-0' src="<?= base_url() . 'assets/images/logo.png' ?>" alt="menu" width="50px"></a>
        <p class="px-1 font-black text-white text-2xl uppercase text-nowrap">
            Patel Samaaj
        </p>
    </div>
    <div class="user p-14 flex flex-row justify-evenly">
        <a href="#" class="p-1 m-1  bg-white rounded-full"><img src="<?= base_url() . 'assets/images/icons/chat.png' ?>"
                width="30px" alt=""></a>
        <?php if ($this->session->userdata('login')): ?>
            <a href="<?= base_url('logout') ?>" class="p-1 m-1 bg-white rounded-full "> <i
                    class="fa-solid fa-right-from-bracket fa-2x"></i></a>
        <?php else: ?>
            <a href="<?= base_url('login') ?>" class="p-1 m-1 bg-white rounded-full"><img
                    src="<?= base_url() . 'assets/images/icons/user.png' ?>" width="30px" alt="Logo"></a>
        <?php endif; ?>
    </div>
</div>