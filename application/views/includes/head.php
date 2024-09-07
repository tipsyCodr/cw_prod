<div class="p-1 flex flex-row justify-between items-center">
    <div class=" flex img-wrapper items-center">
        <a href="#"><img src="<?= base_url() . 'assets/images/icons/menu.png' ?>" alt="menu" width="50px"></a>
        <p class="font-extralight text-2xl uppercase">
            Sahu Samaj
        </p>
    </div>
    <div class="user p-4 flex flex-row">
        <a href="#" class="p-2"><img src="<?= base_url() . 'assets/images/icons/chat.png' ?>" width="30px" alt=""></a>
        <?php if ($this->session->userdata('login')): ?>
            <a href="<?= base_url('logout') ?>" class="p-2"> <i class="fa-solid fa-right-from-bracket fa-2x"></i></a>
        <?php else: ?>
            <a href="<?= base_url('login') ?>" class="p-2"><img src="<?= base_url() . 'assets/images/icons/user.png' ?>"
                    width="30px" alt="Logo"></a>
        <?php endif; ?>
    </div>
</div>