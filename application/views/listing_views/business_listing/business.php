
<!-- Business Start -->
<div class="container-fluid blog pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Business</h4>
            <h1 class="display-5 mb-4">Latest Businesses</h1>
            <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint
                dolorem autem obcaecati, ipsam mollitia hic.
            </p>
        </div>

        <div class="row g-4">

            <?php foreach ($business_list as $business) { ?>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <a href="#">
                                <img src="uploads/business_listing/<?= $business['business_image'] ?>" class="img-fluid w-100 rounded-top"
                                    alt="<?= $business['company_name'] ?>">
                            </a>
                            <div class="blog-category py-2 px-4"><?= $business['business_category'] ?></div>
                            <div class="blog-date job-content"><span>Time :</span> <?= $business['opening_time'] ?> -
                                <?= $business['closing_time'] ?>
                            </div>
                        </div>
                        <div class="blog-content job-content p-4">
                            <a href="#" class="h4 d-inline-block mb-4"><span><?= $business['company_name'] ?></span></a>
                            <p class="mb-1"><span><?= $business['city'] ?> <?= $business['pin_code'] ?>, <?= $business['country'] ?></span></p>
                            <p class="mb-1"><span>Address 1</span>: <?= $business['address_1'] ?></p>
                            <p class="mb-1"><span>Address 2</span>: <?= $business['address_2'] ?></p>
                            <p class="mb-1"><span>Email:</span> <?= $business['email_address'] ?></p>
                            <p class="mb-1"><span>Contact:</span> <?= $business['phone_number'] ?></p>
                            <p class="mb-1"><span>fax:</span> <?= $business['fax'] ?></p>
                            <a href="<?= $business['website'] ?>" class="mb-1"><span>Website</span></a>
                            <!-- <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Read More <i
                                    class="fas fa-arrow-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>


            <?php } ?>
        </div>
    </div>
</div>

<!-- Business End -->
