<!-- Job Start -->
<div class=" blog pb-5">
    <div class=" pb-5">
        <!-- <div class=" pb-5 ">
            <h4 class="font-bold text-3xl p-4 ">Services</h4>
            <h1 class="text-md px-4 "><a class="text-accent" href="<?= base_url() ?>">Home </a> > <a class="text-accent"
                    href="<?= base_url('services') ?>">Services</a></h1>
            <p class="mb-0">
            </p>
        </div> -->


        <nav class="sticky top-0 z-10 flex justify-center text-center pt-4 bg-white shadow-md"
            aria-label="Jobs or Business">

            <a class=" py-2 px-4 tab-bar flex-1 text-gray-300 cursor-pointer " id="jobs-tab" data-bs-toggle="tab"
                data-bs-target="#jobs" type="button" role="tab" aria-controls="jobs" aria-selected="true"> <i
                    class="fa-solid fa-person-digging"></i>
                Jobs</a>

            <a class=" py-2 px-4 tab-bar flex-1 text-gray-300 cursor-pointer" id="business-tab" data-bs-toggle="tab"
                data-bs-target="#business" type="button" role="tab" aria-controls="business" aria-selected="false"> <i
                    class="fa-regular fa-building"></i> Business</a>
        </nav>
        <div class="tab-content">
            <div class=" flex flex-col tab-panel fade show active" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">


                <a href="<?= base_url('services/post/job') ?>"
                    class=" bg-secondary text-white px-4 py-4 hover:bg-accent-dark"> <i class="fa fa-plus"></i> Post a
                    Job Requirement</a>

                <p class="text-gray-500 text-md px-4 pt-6 pb-2">All Posts</p>

                <?php foreach ($job_list as $job) { ?>


                    <div
                        class="p-4 shadow mx-2 mb-2 flex flex-col justify-start hover:bg-gray-100 rounded-lg transition-colors  ">
                        <div class="top flex flex-row ">
                            <img class='rounded self-start' src="uploads/job_listing/<?= $job['job_image'] ?? '' ?>" alt=""
                                style="width: 50px;">

                            <div class="flex flex-col overflow-hidden px-2">
                                <p class="block text-lg"
                                    style="width: 100%; font-weight: bold; margin: 0; padding: 0; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                    <?= $job['job_title'] ?? '' ?> -
                                    <?= array_key_exists('company_name', $job) ? $job['company_name'] : 'N/A' ?>
                                </p>
                                <small
                                    class="text-gray-500"><?= array_key_exists('company_name', $job) ? $job['company_name'] : 'N/A' ?></small>
                            </div>

                        </div>
                        <div class="bottom py-4">
                            <p class="text-sm text-gray-500"><i class=" px-2 fa fa-location-dot"></i>
                                <?= $job['job_city'] ?? '' ?>,
                                <?= $job['job_country'] ?? '' ?>
                            </p>
                            <p class="text-sm text-gray-500"><i class="px-2 fa-solid fa-indian-rupee-sign"></i>
                                <?= (isset($job['job_minimum_salary']) && is_numeric($job['job_minimum_salary']) ? number_format($job['job_minimum_salary'], 0, ',', ',') : 'N/A') ?>
                                -
                                <?= (isset($job['job_maximum_salary']) && is_numeric($job['job_maximum_salary']) ? number_format($job['job_maximum_salary'], 0, ',', ',') : 'N/A') ?>
                            </p>
                        </div>
                        <div class="overflow-x-auto flex flex-nowrap py-2">
                            <p class="bg-gray-200 text-black rounded px-2 py-0 mx-1 text-xs text-nowrap ">
                                Type: <?= $job['job_type'] ?? '' ?>
                            </p>
                            <p class="bg-gray-200 text-black rounded px-2 py-0 mx-1 text-xs text-nowrap ">
                                Education: <?= $job['job_education_level'] ?? '' ?>
                            </p>

                            <p class="bg-gray-200 text-black rounded px-2 py-0 mx-1 text-xs text-nowrap ">
                                Experience: <?= $job['job_experience'] ?? '' ?> Years
                            </p>
                            <p class="bg-gray-200 text-black rounded px-2 py-0 mx-1 text-xs text-nowrap capitalize">
                                Shift: <?= $job['job_shift'] ?? '' ?>
                            </p>


                        </div>
                        <div class="flex items-center justify-end">

                            <div class="p-2 flex justify-evenly items-center text-nowrap">
                                <a class='px-2 py-1 mx-1 text-xl block bg-accent rounded-full text-white text-nowrap'
                                    target="_blank" style="" href="mailto:<?= $job['job_number'] ?? '' ?>"><i
                                        class="fa  fa-phone"></i><b class="hidden md:inline-block px-2">Call</b>
                                </a>
                                <a class='px-2 py-1 mx-1 text-xl block bg-green-500 rounded-full text-white text-nowrap'
                                    style=""
                                    href="https://api.whatsapp.com/send?phone=<?= $job['job_number'] ?? '' ?>&text=Hi%20I%20am%20interested%20in%20<?= $job['job_title'] ?? '' ?>"
                                    target="_blank"><i class="fab   fa-whatsapp"></i><b
                                        class="hidden md:inline-block px-2">Whatsapp</b>
                                </a>
                                <a class='px-2 py-1 mx-1 text-xl block bg-secondary rounded-full text-white text-nowrap'
                                    target="_blank" href="<?= $job['job_website'] ?? '' ?>"><i class="fa fa-globe"></i><b
                                        class="hidden md:inline-block px-2">Website</b>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>


            <div class="tab-pane fade show" id="business" role="tabpanel" aria-labelledby="bussiness-tab"
                style="display:none">
                <div class="flex flex-col">

                    <a href="<?= base_url('services/post/business') ?>"
                        class=" bg-secondary text-white px-4 py-4 hover:bg-accent-dark"> <i class="fa fa-plus"></i> List
                        Your Business</a>

                    <p class="text-gray-500 text-md px-4 pt-6 pb-2">All Business</p>
                    <?php foreach ($business_list as $business) { ?>

                        <div class="p-4 mx-2 mb-6 shadow rounded hover:bg-gray-200">
                            <div class="flex flex-row justify-start items-center">
                                <div class="" style="min-width: 100px">
                                    <img class='rounded img-fluid'
                                        src="uploads/business_listing/<?= $business['business_image'] ?>"
                                        style="max-width: 100px;" />
                                </div>
                                <div class="body flex-1">
                                    <div class="p-4">
                                        <h4 class="font-bold text-3xl"><?= $business['company_name'] ?></h4>

                                        <span class="text-gray-500 text-sm px-2"><i class="fa-solid fa-building"></i>
                                            <?= $business['business_category'] ?></span> <span class=""><i
                                                class="fa-solid fa-location-dot"></i> <?= $business['city'] ?>,
                                            <?= $business['pin_code'] ?></span>
                                        <p> <b>Address: </b><?= $business['address_1'] . ", " . $business['address_2'] ?>
                                        </p>
                                        <div class="text-gray-400 text-sm mb-1"><span>Timing:
                                                <?= $business['opening_time'] ?></span>
                                            <span> - <?= $business['closing_time'] ?></span>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <a class="text-white px-5 py-3 bg-green-500  rounded-full"
                                            href="tel:<?= $business['phone_number'] ?>"> <i class="fa fa-phone"></i></a>
                                        <a class="text-white  px-5 py-3  bg-secondary rounded-full" target="_blank"
                                            href="<?= $business['website'] ?>"> <i class="fa fa-globe"></i></a>
                                        <a class="text-white  px-5 py-3  bg-accent rounded-full"
                                            href="mailto:<?= $business['email_address'] ?>"> <i
                                                class="fa fa-envelope"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                $('#jobs-tab').addClass('active');

                $('#jobs-tab').click(function (e) {
                    e.preventDefault();
                    $('#business-tab').removeClass('active')
                    $(this).addClass('active');
                    $('#business').hide();
                    $('#jobs').show();
                })

                $('#business-tab').click(function (e) {
                    e.preventDefault();
                    $('#jobs-tab').removeClass('active');
                    $(this).addClass('active');
                    $('#jobs').hide();
                    $('#business').show();
                })
            })
        </script>
        <div class="row g-4">



        </div>
    </div>
</div>

<!-- Job End -->