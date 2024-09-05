<style>
    .nav-bar {
        z-index: 100;
    }

    .nav-item {
        color: rgb(100, 100, 100);
    }

    .nav-item.active {
        color: rgb(0, 0, 2550);
    }

    .nav-item.active {
        filter: invert(0.5) sepia(46) saturate(61) hue-rotate(190deg);
    }
</style>
<div class="navigation-bar bg-gray-100 fixed bottom-0 left-0 w-full shadow-lg">
    <div class="wrapper ">
        <ul class="flex text-center p-2 justify-evenly items-center pb-4">
            <li><a href="<?= base_url('home') ?>" class="active nav-item w-full text-decoration-none ">
                    <img src="<?= base_url('assets/images/icons/home.svg') ?>" alt="home icon" width="30em"
                        height="30em" />

                </a></li>
            <li><a href="<?= base_url('home') ?>" class=" nav-item w-full text-decoration-none"><img
                        src="<?= base_url('assets/images/icons/service.svg') ?>" alt="services icon" width="33em"
                        height="31em" />

                </a></li>
            <li><a href="<?= base_url('home') ?>" class=" nav-item w-full text-decoration-none"> <img
                        src="<?= base_url('assets/images/icons/post.svg') ?>" alt="post icon" width="55em"
                        height="55em" />

                </a>
            </li>
            <li><a href="<?= base_url('home') ?>" class=" nav-item w-full text-decoration-none"> <img
                        src="<?= base_url('assets/images/icons/matrimonial.svg') ?>" alt="matrimony icon" width="38em"
                        height="38em" />

                </a></li>
            <li><a href="<?= base_url('home') ?>" class="nav-item w-full text-decoration-none"> <img
                        src="<?= base_url('assets/images/icons/profile.svg') ?>" alt="profile icon" width="37em"
                        height="37em" />
                </a>
            </li>
        </ul>
    </div>
</div>