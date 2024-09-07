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

<div class="my-2">
    <div class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="border border-gray-200 rounded">
                <form action="<?php echo site_url('matrimonial/search'); ?>" method="GET" class="flex items-center m-0">
                    <i class="p-2 fa fa-search text-gray-400"></i>
                    <input class="p-2 w-full" type="text" name="search" placeholder="Search Jobs, Bussiness, Matrimony">
                    <button type="submit" class="p-2">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
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
    <!-- main Carousel -->



    <div class="section">
        <div class=" content">
            <div class="px-2 ">
                <a class=" flex justify-between items-center " href="<?= site_url('blog') ?>">
                    <h5 class="m-0 text-2xl font-bold">Community Wall </h5>
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class=" ">
                <div
                    class=" posts-wrapper  community-item-wrapper py-6  flex flex-row overflow-x-auto flex-nowrap text-nowrap snap-x">

                    <?php if (!empty($blogs)): ?>
                        <?php foreach ($blogs as $blog): ?>
                            <h2></h2>
                            <p></p>

                            <div class="cube ">
                                <div class="card-head">

                                    <div class="img-wrapper ">
                                        <!-- <img class='img-fluid' src='uploads/matrimonial_img/banner/wedding_image.webp' alt=""> -->
                                        <a href="<?= site_url() . 'blog_details/' . $blog['post_id'] ?>">
                                            <img class='img-fluid'
                                                src='<?= base_url() . 'uploads/blog_images/' . $blog['image_url']; ?>' alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="interaction flex justify-evenly items-center pt-2 border-bottom "
                                    style="border-top:1px solid #dfdfdf">
                                    <a class="flex justify-evenly items-center like-btn" href="#"><i
                                            class="p-2 fa-regular fa-heart "
                                            style="font-size:1.5rem"></i><?= $blog['post_likes'] == null ? 0 : $blog['post_likes']; ?>
                                    </a>
                                    <a class="flex justify-evenly items-center" href="#"><i class="p-2 fa-solid fa-message "
                                            style="font-size:1.5rem"></i>
                                        <?= $data['comment_count'][$blog['post_id']] ?? 0 ?> </a>
                                    <a class="flex justify-evenly items-center" href="#"><i class="p-2 fa-solid fa-share "
                                            style="font-size:1.5rem"></i></a>
                                </div>
                                <div class=" cube-body">

                                    <div class="post-text pb-4 overflow-hidden" style="max-height: 6rem;">
                                        <a href="<?= site_url() . 'blog_details/' . $blog['post_id'] ?>">
                                            <p style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                <?= $blog['content']; ?>
                                            </p>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No blogs available.</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class=" content">
            <div class="flex justify-between items-center">
                <h5 class="m-0 text-2xl font-bold">Matrimonial</h5><i class="fa fa-arrow-right"></i>
            </div>
            <p>I am searching for..</p>
            <div
                class="matrimonial-wrapper flex flex-row  py-6  flex flex-row overflow-x-auto flex-nowrap text-nowrap snap-x">
                <div class="p-2">
                    <a href="<?= base_url('matrimonial') ?>">
                        <div class="matrimonial-card">
                            <div class="img-wrapper  overflow-hidden">
                                <img class="img-fluid rounded-lg transition-all hover:scale-90"
                                    src="<?= base_url('assets/images/bride.jpg') ?>" alt="" width="138px">
                            </div>
                            <div class="matrimonial-card-body">
                                <p class="font-bold text-xl ">Bride</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="p-2">
                    <a href="<?= base_url('matrimonial') ?>">
                        <div class="matrimonial-card">
                            <div class="img-wrapper  overflow-hidden">
                                <img class="img-fluid rounded-lg transition-all hover:scale-90"
                                    src="<?= base_url('assets/images/groom.jpg') ?>" alt="">
                            </div>
                            <div class="matrimonial-card-body">
                                <p class="font-bold text-xl ">Groom</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="p-2">
                    <a href="<?= base_url('matrimonial_form') ?>">
                        <div class="matrimonial-card">
                            <div class="img-wrapper  overflow-hidden">
                                <img class="img-fluid rounded-lg transition-all hover:scale-90"
                                    src="<?= base_url('assets/images/couple.jpg') ?>" alt="">
                            </div>
                            <div class="matrimonial-card-body">
                                <p class="font-bold text-xl ">Register</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <div class="section">
        <div class="content">
            <div class=" px-2 flex justify-between items-center">
                <h5 class="text-2xl font-bold">Bussiness</h5><i class="fa fa-arrow-right"></i>
            </div>
        </div>
        <div class="py-6 bussiness-item-wrapper  flex flex-row overflow-x-auto flex-nowrap text-nowrap snap-x">
            <?php foreach ($business_list as $business) { ?>

                <div class="p-2 mx-2 bg-gray-50 rounded-lg transition-all hover:bg-gray-400">
                    <div class="cube-head">
                        <div class="img-wrapper bg-white">
                            <img src="uploads/business_listing/<?= $business['business_image'] ?>" width="160px" alt="">
                        </div>
                    </div>
                    <div class="cube-body">
                        <div class="bussiness-details">
                            <p class="font-bold "><?= $business['company_name'] ?></p>
                            <small><i class="fa-solid fa-location-dot"></i> <span
                                    class="text-gray-700"><?= $business['city'] ?></span></small>
                            <p><small class="text-sm"><?= $business['business_category'] ?></small></p>
                        </div>
                        <div class="interaction flex justify-end items-center pt-2">
                            <!-- <p class="font-bold">Contact:</p> -->
                            <a class="px-3 py-2 m-2 bg-accent text-white rounded-full"
                                href="tel:<?= $business['phone_number'] ?>">
                                <i class="fa-solid fa-phone"></i>
                            </a>
                            <a class="px-3 py-2 m-2  bg-green-500 text-white rounded-full"
                                href="https://wa.me/91<?= $business['phone_number'] ?>/?text=I'm%20inquiring%20about%20your%20listings"
                                target="_blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a class="px-3 py-2 m-2  bg-secondary text-white rounded-full"
                                href="<?= $business['website'] ?>" target="_blank">
                                <i class="fa-solid fa-globe"></i>
                            </a>
                        </div>
                    </div>
                </div>

            <?php } ?>


        </div>
    </div>


    <div class="section">
        <div class="content">
            <div class="flex justify-between items-center">
                <h5 class="m-0 text-2xl font-bold">Jobs </h5><i class="fa fa-arrow-right"></i>
            </div>
            <div class="py-6 job-item-wrapper  flex flex-row overflow-x-auto flex-nowrap text-nowrap snap-x">
                <?php foreach ($job_list as $job) { ?>

                    <div class="p-2 mx-2 bg-gray-50 rounded-lg transition-all hover:bg-gray-400">
                        <div class="cube-head">
                            <div class="img-wrapper bg-white">
                                <img src="uploads/job_listing/<?= $job['job_image'] ?>" width="160px"
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
                                <a class="px-3 py-2 m-2 bg-accent text-white rounded-full"
                                    href="tel:<?= $job['job_number'] ?>">
                                    <i class="fa fa-phone"> </i>
                                </a>
                                <a class="px-3 py-2 m-2 bg-secondary text-white rounded-full"
                                    href="mailto:<?= $job['job_email'] ?>">
                                    <i class="fa fa-envelope"> </i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>



            </div>
        </div>
    </div>