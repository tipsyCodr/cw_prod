<!-- Job Start -->
<div class="container-fluid blog pb-5">
    <div class="container pb-5">
        <div class="mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="font-bold text-3xl p-4 ">Services</h4>
            <h1 class="text-md px-4 "><a class="text-accent" href="<?= base_url() ?>">Home </a> > <a class="text-accent"
                    href="#">Services</a></h1>
            <p class="mb-0">
            </p>
        </div>
        <nav class="flex justify-center space-x-4" aria-label="Jobs or Business">
            <button
                class="bg-white py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-white"
                id="jobs-tab" data-bs-toggle="tab" data-bs-target="#jobs" type="button" role="tab" aria-controls="jobs"
                aria-selected="true">Jobs</button>
            <button
                class="bg-white py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-white"
                id="business-tab" data-bs-toggle="tab" data-bs-target="#business" type="button" role="tab"
                aria-controls="business" aria-selected="false">Business</button>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
            </div>
            <div class="tab-pane fade show active" id="bussiness" role="tabpanel" aria-labelledby="bussiness-tab">
            </div>
        </div>

        <div class="row g-4">


            <?php foreach ($job_list as $job) { ?>



                <div class="p-2 shadow m-4  flex flex-col justify-start   ">
                    <div class="top flex flex-row ">
                        <img class='rounded self-start' src="uploads/job_listing/<?= $job['job_image'] ?>" alt=""
                            style="width: 50px;">

                        <div class="flex flex-col overflow-hidden">
                            <p class="block"
                                style="width: 100%; font-size: 1.5rem; font-weight: bold; margin: 0; padding: 0; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                <?= $job['job_title'] ?> -
                                <?= array_key_exists('job_company', $job) ? $job['job_company'] : 'N/A' ?>
                            </p>
                            <small
                                class="text-gray-500"><?= array_key_exists('job_company', $job) ? $job['job_company'] : 'N/A' ?></small>
                        </div>

                    </div>
                    <div class="bottom py-4">
                        <p class="text-sm text-gray-500"><i class=" px-2 fa fa-location-dot"></i> <?= $job['job_city'] ?>,
                            <?= $job['job_country'] ?>
                        </p>
                        <p class="text-sm text-gray-500"><i class="px-2 fa-solid fa-indian-rupee-sign"></i>
                            <?= number_format($job['job_minimum_salary'], 0, ',', ',') ?> -
                            <?= number_format($job['job_maximum_salary'], 0, ',', ',') ?>
                        </p>
                    </div>
                    <div class="tags flex flex-row justify-between items-center">
                        <div class="overflow-x-auto flex flex-nowrap gap-2">
                            <p class="bg-accent text-white rounded-full px-3 py-1 text-sm text-nowrap ">
                                Type <?= $job['job_type'] ?>
                            </p>
                            <p class="bg-accent text-white rounded-full px-3 py-1 text-sm text-nowrap ">
                                Education <?= $job['job_education_level'] ?>
                            </p>

                            <p class="bg-accent text-white rounded-full px-3 py-1 text-sm text-nowrap ">
                                Shift <?= $job['job_shift'] ?>
                            </p>


                        </div>
                        <div class="p-2  text-nowrap hidden">
                            <a class='p-2 mx-1 bg-accent rounded-full text-white' href="mailto:<?= $job['job_number'] ?>"><i
                                    class="fa fa-phone"></i> Call </a>
                            <a class='p-2 mx-1 bg-secondary rounded-full text-white'
                                href="mailto:<?= $job['job_email'] ?>"><i class="fa fa-envelope"></i> Email </a>
                            <a class='p-2 mx-1 bg-green-500 rounded-full text-white'
                                href="mailto:<?= $job['job_website'] ?>"><i class="fa fa-globe"></i> Website </a>
                        </div>
                    </div>
                </div>




            <?php } ?>
        </div>
    </div>
</div>

<!-- Job End -->