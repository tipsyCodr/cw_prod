<!-- Business Start -->
<style>
    .list-item {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
        display: flex;
        align-items: flex-start;
    }


    .list-item h4 {
        margin: 0;
        font-size: 1.25rem;
    }

    .list-item a {
        color: #333;
        text-decoration: none;

    }

    .list-item a:hover {
        text-decoration: none;

    }

    .text-muted {
        color: #6c757d;
    }

    .text-primary {
        color: #007bff;
    }

    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }


    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
<div class="container-fluid blog pb-5 overflow-hidden">
    <div class="container pb-5 z-1">
        <div class="text-center mx-auto pb-5 wow fadeInUp " data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">व्यवसाय सूचि</h4>
            <h1 class="display-5 mb-4">नये डाले गए व्यवसाय</h1>
            <p class="mb-0">हमारी कंपनी एक प्रमुख व्यवसाय सेवा प्रदाता है जो विभिन्न उद्योगों में पेशेवर सेवाएँ प्रदान
                करती है। हमारे पास अनुभवी टीम है जो ग्राहकों की विशिष्ट आवश्यकताओं को पूरा करने के लिए कस्टम समाधान
                प्रदान करती है। हम गुणवत्ता, समर्पण और समय पर सेवाओं के लिए प्रतिबद्ध हैं। आपके व्यवसाय की वृद्धि और
                सफलता में योगदान देने के लिए हम आपके साथ काम करने के लिए तत्पर हैं।</p>

        </div>

        <div class="row g-4">

            <?php foreach ($business_list as $business) { ?>
                <div class="container shadow-sm p-3 mb-5 bg-body-tertiary rounded z-100">
                    <div class="row mb-4">
                        <div class="col-12">
                            <!-- List Item -->
                            <div
                                class="list-item d-flex flex-column flex-md-row align-items-start mb-4 border p-3 rounded ">
                                <!-- Image Section -->
                                <a href="#" class="mb-3 mb-md-0 me-md-3 order-1 p-1">
                                    <img src="uploads/business_listing/<?= $business['business_image'] ?>"
                                        class="img-fluid rounded" alt="<?= $business['company_name'] ?>"
                                        style="width:200px; height: auto; object-fit: cover;">
                                </a>

                                <!-- Details Section -->
                                <div class="  mb-3 mb-md-0 order-2 ps-3">
                                    <h4 class="mb-2"><?= $business['company_name'] ?></h4>
                                    <div class="text-muted mb-2"><span>Time:</span> <?= $business['opening_time'] ?> -
                                        <?= $business['closing_time'] ?>
                                    </div>
                                    <p class="mb-1"><span>Location:</span> <?= $business['city'] ?>,
                                        <?= $business['pin_code'] ?>,
                                        <?= $business['country'] ?>
                                    </p>
                                    <p class="mb-1"><span>Address 1:</span> <?= $business['address_1'] ?></p>
                                    <p class="mb-1"><span>Address 2:</span> <?= $business['address_2'] ?></p>
                                    <p class="mb-1"><span>Email:</span> <?= $business['email_address'] ?></p>
                                    <p class="mb-1"><span>Contact:</span> <?= $business['phone_number'] ?></p>
                                </div>

                                <!-- Action Section -->
                                <div class=" order-3  mx-auto">
                                    <div class="mb-md-0">
                                        <p class="mb-1"><span>Fax:</span> <?= $business['fax'] ?></p>
                                    </div>
                                    <div class="">
                                        <a href="<?= $business['website'] ?>"
                                            class="text-primary mb-2 d-block "><?= $business['website'] ?></a>
                                        <a href="tel:<?= $business['phone_number'] ?>"
                                            class="btn btn-outline-primary me-2 ">Call</a>
                                        <a href="<?= $business['website'] ?>" class="btn btn-primary" target="_blank">Visit
                                            Website</a>
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

<!-- Business End -->