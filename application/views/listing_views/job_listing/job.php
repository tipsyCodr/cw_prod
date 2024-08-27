<!-- Job Start -->
<div class="container-fluid blog pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">JOBS</h4>
            <h1 class="display-5 mb-4">जॉब सूचि</h1>
            <p class="mb-0">नई नौकरियों के अवसर आपके लिए उपलब्ध हैं। यदि आप एक उत्साही और सक्षम पेशेवर हैं जो एक नए
                चैलेंज के लिए तैयार हैं, तो हमारे पास आपके लिए शानदार अवसर हैं। हमारी कंपनी विभिन्न क्षेत्रों में
                प्रतिभाशाली व्यक्तियों की तलाश कर रही है। जल्द ही आवेदन करें और अपने करियर को नई ऊँचाइयों पर ले जाएँ।
            </p>
        </div>

        <div class="row g-4">

            <?php foreach ($job_list as $job) { ?>
                <div class="container shadow-sm p-3 mb-5 bg-body-tertiary rounded z-100">
                    <div class="row mb-4">
                        <div class="col-12">
                            <!-- List Item -->
                            <div class="list-item d-flex flex-column flex-md-row align-items-start mb-4 border p-3 rounded">
                                <!-- Image Section -->
                                <a href="#" class="mb-3 mb-md-0 me-md-3 order-1 p-1">
                                    <img src="uploads/job_listing/<?= $job['job_image'] ?>" class="img-fluid rounded"
                                        alt="<?= $job['job_title'] ?>"
                                        style="width:200px; height: auto; object-fit: cover;">
                                </a>

                                <!-- Details Section -->
                                <div class="mb-3 mb-md-0 order-2 ps-3">
                                    <!-- <h4 class="mb-2"><?= $job['job_type'] ?></h4> -->
                                    <!-- <div class="text-muted mb-2"><span>Category:</span> <?= $job['job_category'] ?></div> -->
                                    <p class="mb-1"><span>Salary:</span> <?= $job['job_minimum_salary'] ?> -
                                        <?= $job['job_maximum_salary'] ?>
                                    </p>
                                    <p class="mb-1"><span>Location:</span> <?= $job['job_city'] ?>,
                                        <?= $job['job_country'] ?>
                                    </p>
                                    <p class="mb-1"><span>Education:</span> <?= $job['job_education_level'] ?></p>
                                    <p class="mb-1"><span>Experience:</span> <?= $job['job_experience'] ?></p>
                                    <p class="mb-1"><span>Shift:</span> <?= $job['job_shift'] ?></p>
                                </div>

                                <!-- Action Section -->
                                <div class="order-3 mx-auto">
                                    <div class="mb-md-0">
                                        <p class="mb-1"><span>Email:</span> <?= $job['job_email'] ?></p>
                                        <p class="mb-1"><span>Contact:</span> <?= $job['job_number'] ?></p>
                                    </div>
                                    <div class="">
                                        <a href="<?= $job['job_website'] ?>" class="text-primary mb-2 d-block">Website</a>
                                        <a href="tel:<?= $job['job_number'] ?>"
                                            class="btn btn-outline-primary me-2">Call</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <?php } ?>
        </div>
    </div>
</div>

<!-- Job End -->