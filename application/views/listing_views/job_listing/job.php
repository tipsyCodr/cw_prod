
<!-- Job Start -->
<div class="container-fluid blog pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">JOBS</h4>
            <h1 class="display-5 mb-4">Latest Jobs</h1>
            <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint
                dolorem autem obcaecati, ipsam mollitia hic.
            </p>
        </div>

        <div class="row g-4">

            <?php foreach ($job_list as $job) { ?>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <a href="#">
                                <img src="uploads/job_listing/<?= $job['job_image'] ?>" class="img-fluid w-100 rounded-top"
                                    alt="<?= $job['job_title'] ?>">
                            </a>
                            <div class="blog-category py-2 px-4"><?= $job['job_category'] ?></div>
                            <div class="job-content blog-date"><span> Salary:</span> <?= $job['job_minimum_salary'] ?> -
                                <?= $job['job_maximum_salary'] ?>
                            </div>
                        </div>
                        <div class="blog-content job-content p-4">
                            <a href="#" class="h4 d-inline-block mb-4"><?= $job['job_type'] ?></a>
                            <p class="mb-1"><span><?= $job['job_city'] ?>, <?= $job['job_country'] ?></span></p>
                            <p class="mb-1"><span>Education:</span> <?= $job['job_education_level'] ?></p>
                            <p class="mb-1"><span>Experience:</span> <?= $job['job_experience'] ?></p>
                            <p class="mb-1"><span>Email:</span> <?= $job['job_email'] ?></p>
                            <p class="mb-1"><span>Contact:</span> <?= $job['job_number'] ?></p>
                            <p class="mb-1"><span>Shift:</span> <?= $job['job_shift'] ?></p>
                            <a href="<?= $job['job_website'] ?>" class="mb-1"><span>Website</span></a>
                            <!-- <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Read More <i
                                    class="fas fa-arrow-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>


            <?php } ?>
        </div>
    </div>
</div>

<!-- Job End -->