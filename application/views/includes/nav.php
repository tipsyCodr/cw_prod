<style>
    .nav-bar {
        z-index: 1000;
    }

    .nav-item {
        color: rgb(100, 100, 100);
    }

    .nav-item.active {
        /* border-top: 4px solid #5c6ac4; */
        background-color: white;
        /* background-color: rgb(92 106 196 / 15%); */
    }

    /* .nav-item.active {
        filter: invert(0.5) sepia(46) saturate(61) hue-rotate(190deg);
    } */
</style>
<div class="  nav-bar navigation-bar flex justify-center w-full  fixed bottom-5 left-0 mx-auto  shadow-lg ">
    <div class="scale-90 wrapper p-1 max-w-[410px] bg-black filter bg-opacity-70 rounded-full">
        <ul class="flex text-center  justify-evenly items-center ">
            <li
                class="p-2 nav-item <?= (current_url() === base_url('/') || current_url() === base_url('home')) ? ' active' : '' ?> rounded-full w-[76.86px] h-[76.86px] flex items-center justify-center">
                <a href="<?= base_url('home') ?>" class=" nav-item text-decoration-none ">
                    <!-- <img src="<?= base_url('assets/images/icons/home.png') ?>" class="mx-auto" alt="home icon"
                        width="24.30px" height="24.30px" /> -->

                    <span
                        class=" <?= (current_url() === base_url('/') || current_url() === base_url('services')) ? 'i-[teenyicons--home-solid]  text-accent' : 'i-[teenyicons--home-outline] text-white' ?>  w-[24.30px] h-[24.30px]"></span>

                </a>
            </li>
            <li
                class="p-2 nav-item <?= (current_url() === base_url('services')) ? 'text-activeItem active' : '' ?> rounded-full w-[76.86px] h-[76.86px] flex items-center justify-center">
                <a href="<?= base_url('services') ?>" class=" nav-item w-full text-decoration-none ">
                    <!-- <img src="<?= base_url('assets/images/icons/services.png') ?>" class="mx-auto" alt="services icon"
                        width="24.30px" height="24.30px" /> -->
                    <span
                        class=" <?= (current_url() === base_url('/') || current_url() === base_url('services')) ? 'i-[basil--bag-solid]  text-accent' : 'i-[basil--bag-outline] text-white' ?>  w-[24.30px] h-[24.30px]"></span>

                    <!-- <i
                        class="fa fa-2x fa-suitcase ">
                    </i> -->
                </a>
            </li>
            <li
                class="p-2 nav-item <?= (current_url() === base_url('social')) ? 'text-activeItem active' : '' ?> rounded-full w-[76.86px] h-[76.86px] flex items-center justify-center">
                <a href="<?= base_url('social') ?>" class=" nav-item w-full text-decoration-none">
                    <!-- <img src="<?= base_url('assets/images/icons/social.png') ?>" class="mx-auto" alt="post icon"
                        width="24.30px" height="24.30px" /> -->
                    <span
                        class=" <?= (current_url() === base_url('/') || current_url() === base_url('social')) ? 'i-[iconamoon--discover-fill]  text-accent' : 'i-[iconamoon--discover-thin] text-white' ?>  w-[24.30px] h-[24.30px]"></span>
                    <!-- <i
                        class="fa-solid fa-3x fa-square-plus ">
                    </i> -->
                </a>
            </li>
            <li
                class="p-2 nav-item <?= (current_url() === base_url('matrimonial')) ? 'text-activeItem active' : '' ?> rounded-full w-[76.86px] h-[76.86px] flex items-center justify-center">
                <a href="<?= base_url('matrimonial') ?>" class=" nav-item w-full text-decoration-none">
                    <!-- <img src="<?= base_url('assets/images/icons/matrimonial.png') ?>" class="mx-auto"
                        alt="matrimony icon" width="24.30px" height="24.30px" /> -->
                    <!-- <span class="i-[mingcute--love-fill] text-white w-[24.30px] h-[24.30px]"></span> -->
                    <span
                        class=" <?= (current_url() === base_url('/') || current_url() === base_url('matrimonial')) ? 'i-[teenyicons--heart-circle-solid]  text-accent' : 'i-[teenyicons--heart-circle-outline] text-white' ?>  w-[24.30px] h-[24.30px]"></span>

                    <!-- <i
                        class="fa-brands fa-2x fa-gratipay ">
                    </i> -->
                </a>
            </li>
            <li
                class="p-2 nav-item <?= (current_url() === base_url('profile')) ? 'text-activeItem active' : '' ?> rounded-full w-[76.86px] h-[76.86px] flex items-center justify-center">
                <a href="<?php if (!$this->session->userdata('logged_in')) {
                    echo base_url('login');
                } else {
                    echo base_url('profile');
                } ?>" class="nav-item w-full text-decoration-none">
                    <span
                        class=" <?= (current_url() === base_url('/') || current_url() === base_url('profile')) ? 'i-[teenyicons--user-circle-solid]  text-accent' : 'i-[teenyicons--user-circle-outline] text-white' ?>  w-[24.30px] h-[24.30px]"></span>


                    <!-- <i
                        class="fa fa-2x fa-user ">
                    </i> -->
                </a>
            </li>
        </ul>
    </div>
</div>