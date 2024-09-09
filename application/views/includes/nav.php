<style>
    .nav-bar {
        z-index: 100;
    }

    .nav-item {
        color: rgb(100, 100, 100);
    }

    .nav-item.active {
        border-top: 4px solid #5c6ac4;
    }

    /* .nav-item.active {
        filter: invert(0.5) sepia(46) saturate(61) hue-rotate(190deg);
    } */
</style>
<div class="navigation-bar bg-gray-100 fixed bottom-0 left-0 w-full shadow-lg">
    <div class="wrapper ">
        <ul class="flex text-center p-2 justify-evenly items-center pb-4">
            <li class="p-2 nav-item <?= (current_url() === base_url('/')) ? ' active' : '' ?>"><a
                    href="<?= base_url('/') ?>" class=" nav-item w-full text-decoration-none  ">
                    <img src="<?= base_url('assets/images/icons/home.png') ?>" alt="home icon" width="30em"
                        height="30em" />
                    <!-- <i
                        class="fas fa-2x fa-home "></i> -->
                </a></li>
            <li class="p-2 nav-item <?= (current_url() === base_url('services')) ? 'text-activeItem active' : '' ?>"><a
                    href="<?= base_url('services') ?>" class=" nav-item w-full text-decoration-none ">
                    <img src="<?= base_url('assets/images/icons/services.png') ?>" alt="services icon" width="33em"
                        height="31em" />
                    <!-- <i
                        class="fa fa-2x fa-suitcase ">
                    </i> -->

                </a></li>
            <li class="p-2 nav-item <?= (current_url() === base_url('social')) ? 'text-activeItem active' : '' ?>"><a
                    href="<?= base_url('social') ?>" class=" nav-item w-full text-decoration-none">
                    <img src="<?= base_url('assets/images/icons/social.png') ?>" alt="post icon" width="35em"
                        height="55em" />

                    <!-- <i
                        class="fa-solid fa-3x fa-square-plus ">
                    </i> -->
                </a>
            </li>
            <li class="p-2 nav-item <?= (current_url() === base_url('matrimonial')) ? 'text-activeItem active' : '' ?>">
                <a href="<?= base_url('matrimonial') ?>" class=" nav-item w-full text-decoration-none">
                    <img src="<?= base_url('assets/images/icons/matrimonial.png') ?>" alt="matrimony icon" width="38em"
                        height="38em" />
                    <!-- <i
                        class="fa-brands fa-2x fa-gratipay ">
                    </i> -->

                </a>
            </li>
            <li class="p-2 nav-item <?= (current_url() === base_url('profile')) ? 'text-activeItem active' : '' ?>">
                <a href="<?php if (!$this->session->userdata('login')) {
                    echo base_url('login');
                } else {
                    echo base_url('profile');
                } ?>" class="nav-item w-full text-decoration-none">
                    <img src="<?= base_url('assets/images/icons/user-line.png') ?>" alt="profile icon" width="37em"
                        height="37em" />
                    <!-- <i
                        class="fa fa-2x fa-user ">
                    </i> -->
                </a>
            </li>
        </ul>
    </div>
</div>