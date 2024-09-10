<div class="p-1 flex flex-row justify-between items-center bg-blue-500">
    <div class=" flex img-wrapper items-center">
        <a href="#"><img class='m-2' src="<?= base_url() . 'assets/images/logo.png' ?>" alt="menu" width="80px"></a>
        <p class="font-black text-white text-3xl uppercase">
            Patel Samaaj
        </p>
    </div>
    <div class="user p-4 flex flex-row">
        <a href="#" class="p-2 m-2  bg-white rounded-full"><img src="<?= base_url() . 'assets/images/icons/chat.png' ?>"
                width="30px" alt=""></a>
        <?php if ($this->session->userdata('login')): ?>
            <a href="<?= base_url('logout') ?>" class="p-2 m-2 bg-white rounded-full "> <i
                    class="fa-solid fa-right-from-bracket fa-2x"></i></a>
        <?php else: ?>
            <a href="<?= base_url('login') ?>" class="p-2 m-2 bg-white rounded-full"><img
                    src="<?= base_url() . 'assets/images/icons/user.png' ?>" width="30px" alt="Logo"></a>
        <?php endif; ?>
    </div>
</div>