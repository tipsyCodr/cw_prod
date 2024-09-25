<style>
    .matrimonial-card>.img-wrapper>img {
        min-width: 138px;
        width: 100vw;
        height: calc(100vw * 1.5);
        max-width: 207px;
        max-height: 310px;
    }

    .img-wrapper.bg-white {
        width: 170px;
        height: 170px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="">

    <!-- main Carousel -->
    <div class="swiper main-carousel ">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php
            $banner_images = glob(FCPATH . 'assets/images/banner/*');
            $banner_images = array_map(function ($image) {
                return str_replace(FCPATH, '', $image);
            }, $banner_images);


            shuffle($banner_images);
            foreach ($banner_images as $image):
                ?>
                <div class="swiper-slide">
                    <img class="img-fluid w-full" src="<?= base_url($image) ?>" />
                </div>
                <?php
            endforeach;
            ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Community Hub -->
    <div class="px-4">
        <div class="px-2 ">
            <a class=" flex justify-between items-center " href="<?= site_url('blog') ?>">
                <h5 class="mt-2 text-xl font-bold">Community Wall </h5>
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <style>
            .dark-gradient {

                background: rgb(0, 0, 0);
                background: linear-gradient(0deg, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.9540148823201156) 23%, rgba(0, 0, 0, 0.03524737531731448) 87%);
            }
        </style>


        <div class="swiper comm-carousel ">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->

                <?php if (!empty($blogs)): ?>
                    <?php foreach ($blogs as $blog): ?>
                        <!-- new design -->
                        <div class="swiper-slide rounded-[30px] relative overflow-hidden my-2 cursor-pointer hover:scale-95 transition-all"
                            onclick="window.location.href='<?= site_url() . 'social/post/' . $blog['post_id'] ?>'"
                            style="width: 224px; height:224px; background-image:url('<?= base_url() . 'uploads/blog_images/' . $blog['image_url']; ?>'); background-size: cover;">
                            <div class="absolute top-0 -left-3 ">
                                <span
                                    class="scale-75 bg-gray-400 flex rounded-full p-1.5 filter bg-opacity-30 backdrop-blur-sm">
                                    <?php if (!empty($blog['user_profile_pic'])): ?>
                                        <img class=" object-cover rounded-full w-10 h-10 mr-2"
                                            src="<?= base_url() . 'uploads/user_profiles/' . $blog['user_profile_pic'] ?>" alt="" />
                                    <?php else: ?>
                                        <i class="py-1 fa fa-user-circle w-10 h-10  text-4xl text-accent-dark"></i>
                                    <?php endif; ?>

                                    <img class="hidden w-10 h-10 object-cover rounded-full "
                                        src="<?= base_url('uploads/blog_images/1.jpg') ?>" alt="">
                                    <p class=" flex flex-col justify-start items-start my-auto text-white ">
                                        <span class="my-auto flex flex-row items-start"><?= $blog['user_name'] ?>
                                            <?php if ($blog['user_verified_status'] == 1) { ?>
                                                <i class="my-auto i-[mage--verified-check-fill] text-badgeColor m-1"></i>
                                            <?php } ?>
                                        </span>
                                        <span class="text-xs">@Member</span>


                                    </p>

                                </span>
                            </div>
                            <div class="absolute bottom-0 w-full dark-gradient  content text-white px-2 pt-6">
                                <p class="text-xs"> <span class="px-1"><i class="i-[teenyicons--heart-outline]"></i>
                                        <?= $blog['post_likes'] == null ? 0 : $blog['post_likes']; ?>
                                    </span>
                                    <span class="px-1"><i class="text-sm i-[uil--comment]"></i>
                                        <?= $data['comment_count'][$blog['post_id']] ?? 0 ?> </span>
                                    <span class="px-1"><i class="text-sm fab fa-whatsapp"></i> </span>
                                </p>
                                <p class="text-sm h-10 overflow-hidden text-ellipsis mt-3"
                                    style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    <?= $blog['content']; ?>
                                </p>
                            </div>
                        </div>
                        <!-- new design -->

                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No blogs available.</p>
                <?php endif; ?>
            </div>


            <!-- If we need navigation buttons -->
            <div class="comm-swiper-button-prev"></div>
            <div class="comm-swiper-button-next"></div>

        </div>
    </div>
    <!-- Community Hub -->


    <div class="">
        <div class=" content">
            <div class="px-2 flex justify-between items-center">
                <h5 class="m-0 text-xl font-bold">Matrimonial</h5><i class="fa fa-arrow-right"></i>
            </div>
            <p class="px-2">I am searching for..</p>

            <div
                class="matrimonial-wrapper flex flex-row  py-2  flex flex-row overflow-x-auto flex-nowrap text-nowrap snap-x">
                <div class="p-2">
                    <a href="<?= base_url('matrimonial') ?>" class="">
                        <div class=" relative img-wrapper rounded-[30px] hover:scale-95 transition-all overflow-hidden"
                            style="width: 224px; height:224px;background-image: url(<?= base_url('assets/images/bride.jpg') ?>); background-size: cover; overflow:hidden;">
                            <div class="absolute bottom-0 left-0 w-full dark-gradient  content text-white px-2 pt-6">
                                <p class="font-bold text-xl p-3">Bride</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="p-2">
                    <a href="<?= base_url('matrimonial') ?>">
                        <div class=" relative img-wrapper rounded-[30px] hover:scale-95 transition-all overflow-hidden"
                            style="width: 224px; height:224px;background-image: url(<?= base_url('assets/images/groom.jpg') ?>); background-size: cover; overflow:hidden;">
                            <div class="absolute bottom-0 left-0 w-full dark-gradient  content text-white px-2 pt-6">
                                <p class="font-bold text-xl p-3">Groom</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="p-2">
                    <a href="<?= base_url('matrimonial_form') ?>">
                        <div class=" relative img-wrapper rounded-[30px] hover:scale-95 transition-all overflow-hidden"
                            style="width: 224px; height:224px;background-image: url(<?= base_url('assets/images/couple.jpg') ?>); background-size: cover; overflow:hidden;">
                            <div class="absolute bottom-0 left-0 w-full dark-gradient  content text-white px-2 pt-6">
                                <p class="font-bold text-xl p-3">Register</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="">
        <div class="content">
            <div class=" px-2 flex  w-full">
                <a class='block flex justify-between items-center w-full' href="<?= base_url('services/#business') ?>">
                    <h5 class="text-xl font-bold">Bussiness</h5><i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="py-2 bussiness-item-wrapper  flex flex-row overflow-x-auto flex-nowrap text-nowrap snap-x">
            <?php foreach ($business_list as $business) { ?>

                <div class="p-2 mx-2 bg-gray-50 rounded-lg transition-all hover:bg-gray-400 w-[320px] h-[300px]">
                    <div class="cube-head flex justify-center items-center">
                        <div class=" img-wrapper overflow-hidden bg-white w-[200px] h-[150px]">
                            <img class="m-auto w-full h-full object-contain "
                                src="uploads/business_listing/<?= $business['business_image'] ?>" alt="">
                        </div>
                    </div>
                    <div class="cube-body">
                        <div class="bussiness-details">
                            <p class="font-bold "><?= $business['company_name'] ?></p>
                            <small><i class="fa-solid fa-location-dot"></i> <span
                                    class="text-gray-700"><?= $business['city'] ?></span></small>
                            <p><small class="text-sm"><?= $business['business_category'] ?></small></p>
                        </div>
                        <div class="interaction flex justify-evenly items-center pt-2">
                            <!-- <p class="font-bold">Contact:</p> -->
                            <a class="px-4 py-2 flex items-center mx-2 bg-brightBlue text-white rounded-full"
                                href="tel:<?= $business['phone_number'] ?>">
                                <i class="fa-solid fa-phone px-2"></i> Call
                            </a>
                            <a class="px-4 py-2 mx-2 flex items-center bg-brightGreen text-white rounded-full"
                                href="https://wa.me/91<?= $business['phone_number'] ?>/?text=I'm%20inquiring%20about%20your%20listings"
                                target="_blank">
                                <i class="fa-brands fa-whatsapp text-xl px-2"></i> Chat
                            </a>

                            <!-- Website -->
                            <!-- <a class="px-3 py-2 m-2  bg-secondary text-white rounded-full"
                            href="<?= $business['website'] ?>" target="_blank">
                            <i class="fa-solid fa-globe"></i>
                        </a> -->
                            <!-- Website -->
                        </div>
                    </div>
                </div>

            <?php } ?>


        </div>
    </div>


    <div class=" pb-10">
        <div class="content">
            <div class=" px-2 flex  w-full">
                <a class='block flex justify-between items-center w-full' href="<?= base_url('services/#jobs') ?>">
                    <h5 class="text-xl font-bold">Jobs</h5><i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="py-2 job-item-wrapper  flex flex-row overflow-x-auto flex-nowrap text-nowrap snap-x">
                <?php foreach ($job_list as $job) { ?>

                    <div class="p-2 mx-2 bg-gray-50 rounded-lg transition-all hover:bg-gray-400">
                        <div class="cube-head overflow-hidden">
                            <div class="img-wrapper overflow-hidden bg-white">
                                <img class="object-cover" src="uploads/job_listing/<?= $job['job_image'] ?>" width="160px"
                                    alt="<?= $job['job_title'] ?>">
                            </div>
                        </div>
                        <div class="cube-body">
                            <div class="bussiness-details">
                                <p class="font-bold "><?= $job['job_title'] ?></p>
                                <small><i class="fa-solid fa-location-dot"></i>
                                    <span class="text-gray-700">
                                        <?= $job['job_city'] ?>
                                    </span>
                                </small>
                                <p><small class="text-sm"><?= $job['job_category'] ?></small></p>
                            </div>
                            <div class="interaction flex justify-end items-center pt-2">
                                <!-- <p class="font-bold">Interested?</p> -->
                                <a class="w-full px-3 py-2 m-2 bg-brightBlue text-white text-center rounded-full"
                                    href="tel:<?= $job['job_number'] ?>">
                                    <i class="fa fa-phone"> </i> Call
                                </a>

                            </div>
                        </div>
                    </div>
                <?php } ?>



            </div>
        </div>
    </div>