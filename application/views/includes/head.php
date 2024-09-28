<div class=" flex flex-row py-1.5 justify-between items-center relative z-10">
    <div class=" flex img-wrapper items-center px-1">
        <a href="<?= base_url('about_us') ?>"><img class='m-0' src="<?= base_url() . 'assets/images/logo.png' ?>"
                alt="menu" width="40px"></a>
    </div>
    <p class="title font-monaSans font-bold text-lg text-center" style="margin-left:48px;">
        <?= $title ?>
    </p>
    <div class="user p-0 flex flex-row justify-evenly">
        <!-- If there is notification then show colored icon for attention -->
        <?php $noti = $this->session->userdata('notification');
        $noti = 1;
        ?>
        <a id="notify_btn" class="p-1 px-1.5 m-1  bg-white rounded-full cursor-pointer"><img
                src="<?= ($noti == 1) ? base_url() . 'assets/images/icons/notification.png' : base_url() . 'assets/images/icons/bell.png' ?>"
                width="27px" alt=""></a>
        <?php if ($this->session->userdata('logged_in')): ?>
            <a href="<?= base_url('logout') ?>"
                class="p-1 px-1.5 m-1 bg-white rounded-full flex items-center justify-center "
                style="width:37px;height:37px"> <i class="fa-solid fa-right-from-bracket fa-2x "
                    style="font-size: 20px"></i></a>
        <?php else: ?>
            <a href="<?= base_url('login') ?>" class="p-1  m-1 bg-white rounded-full" style="width:37px;height:37px"><img
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


<div class="notif-wrapper transition-all fixed top-14 shadow-xl px-2 py-1 rounded left-0 w-full h-screen z-50">
    <div class="bg-white ">
        <div class="flex justify-between top-bar p-1 border-b">
            <p class="text-sm font-bold text-gray-500">Notifications</p>

            <button type="button"
                class="text-gray-400 hover:text-gray-500 transition duration-150 ease-in-out focus:outline-none"
                onclick="closePopup()">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

        </div>
        <div class="content px-1 py-2">
            <div class="item flex flex-row justify-between items-center  px-1 py-2">
                <div class="flex justify-evenly items-center">
                    <div class="bg-accent-light px-2.5 py-1  mr-4 rounded-lg"><i
                            class="fa-solid fa-bell text-accent-dark "></i>
                    </div>
                    <div>
                        <p class="font-bold text-xs text-left">Your Request Has Been Approved!</p>
                    </div>
                </div>
                <div class="text-xs text-gray-300">
                    <p><?= date('d M, h:i A') ?></p>
                </div>
            </div>
            <div class="item flex flex-row justify-between items-center  px-1 py-2">
                <div class="flex justify-evenly items-center">
                    <div class="bg-accent-light px-2.5 py-1  mr-4 rounded-lg"><i
                            class="fa-solid fa-bell text-accent-dark "></i>
                    </div>
                    <div>
                        <p class="font-bold text-xs text-left">You Have a New Request!</p>
                    </div>
                </div>
                <div class="text-xs text-gray-300">
                    <p><?= date('d M, h:i A') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var noti = document.querySelector('.notif-wrapper')
        noti.classList.add('hidden')
        document.querySelector('#notify_btn').addEventListener('click', function (e) {
            e.preventDefault();
            noti.classList.toggle('hidden');
        })

    })
    function closePopup() {
        var noti = document.querySelector('.notif-wrapper')

        noti.classList.add('hidden')
    }
</script>