<style>
    .blog-img img {
        height: 300px;
        /* Adjust the height as needed */
        object-fit: cover;
        width: 100%;
    }

    .ellipsis {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 200px;
        /* Adjust as needed */
        cursor: pointer;
    }

    .full-text {
        display: none;
    }
</style>
<!-- Carousel Start -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="container  my-5">
    <div class="row">
        <div class="col-12 col-md-8">
            <!-- Main Carousel -->
            <section id="main_carousel" class="splide" aria-label="Main Carousel"
                style="overflow:hidden;border-radius: 20px;max-height: 413px;">
                <div class="splide__track">
                    <ul class="splide__list">
                          <li class="splide__slide">
                            <img src="<?php echo base_url('uploads/matrimonial_img/banner/wedding_image.webp'); ?>"
                                class="d-block w-100" alt="...">
                        </li>
                        <li class="splide__slide">
                            <img src="<?php echo base_url('uploads/matrimonial_img/banner/wedding_image.webp'); ?>"
                                class="d-block w-100" alt="...">
                        </li>
                        <li class="splide__slide">
                            <img src="<?php echo base_url('uploads/matrimonial_img/banner/wedding_image.webp'); ?>"
                                class="d-block w-100" alt="...">
                        </li>                    </ul>
                </div>
                <button class="splide__toggle" type="button">
                    <span class="splide__toggle__play">Play</span>
                    <span class="splide__toggle__pause">Pause</span>
                </button>
            </section>

            <!-- Thumbnail Carousel -->
            <section id="thumbnail_carousel" class="splide" aria-label="Thumbnail Carousel" style="margin-top: 15px;">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img src="<?php echo base_url('uploads/matrimonial_img/banner/wedding_image.webp'); ?>" class="d-block w-100"
                                alt="Thumbnail 1" style="max-width: 100px; cursor: pointer;">
                        </li>
                        <li class="splide__slide">
                            <img src="<?php echo base_url('uploads/matrimonial_img/banner/wedding_image.webp'); ?>" class="d-block w-100"
                                alt="Thumbnail 2" style="max-width: 100px; cursor: pointer;">
                        </li>
                        <li class="splide__slide">
                            <img src="<?php echo base_url('uploads/matrimonial_img/banner/wedding_image.webp'); ?>" class="d-block w-100"
                                alt="Thumbnail 3" style="max-width: 100px; cursor: pointer;">
                        </li>
                    </ul>
                </div>
            </section>
        </div>

        <div class="col-12 col-md-4">
            <section id='notice_carousel' class="splide" aria-label="Notice Carousel"
                style="overflow:hidden;border-radius: 20px;">
                <div class="splide__track">
                    <ul class="splide__list text-center">
                        <li class="splide__slide  text-white">
                            <div class="" style="max-height: 413px; height: 413px;">
                                <img src="https://via.placeholder.com/400x350" alt="Notice 01 Image"
                                    class="img-fluid mb-2">
                                <div class="text-black">ध्यान दें: पटेल समाज की आगामी बैठक 25 अगस्त 2024 को आयोजित की
                                    जाएगी।</div>
                            </div>
                        </li>
                        <li class="splide__slide  text-white">
                            <div class="" style="max-height: 413px; height: 413px;">
                                <img src="https://via.placeholder.com/400x350" alt="Notice 02 Image"
                                    class="img-fluid mb-2">
                                <div class="text-black">सूचना: समाज के सभी सदस्यों के लिए नि:शुल्क स्वास्थ्य शिविर 30
                                    अगस्त
                                    2024 को लगेगा।</div>
                            </div>
                        </li>
                        <li class="splide__slide text-white">
                            <div class="" style="max-height: 413px; height: 413px;">
                                <img src="https://via.placeholder.com/400x350" alt="Notice 03 Image"
                                    class="img-fluid mb-2">
                                <div class="text-black">महत्वपूर्ण: पटेल समाज की वार्षिक महासभा 10 सितंबर 2024 को आयोजित
                                    की
                                    जाएगी।</div>
                            </div>
                        </li>
                    </ul>

                </div>
            </section>
        </div>
    </div>





</div>

<!-- Carousel End -->

<div class="container-fluid feature py-5">
    <div class="container py-5">
        <div class="row g-4">
            <!-- Business Listings -->
            <div class="col-lg-4 wow  fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item " style="height: 300px;">
                    <div class="feature-content p-4 bg-white text-center">
                        <div class="feature-content-inner">
                            <!-- Added briefcase icon -->
                            <i class="fas fa-briefcase fa-5x me-2 col-md-12 text-center "
                                style=" transition: all 0.3s ease;"></i>
                            <h4 class=" text-center fw-bold ">Business Listings</h4>
                            <p class="">Showcase your business within the Sahu Samaj community and connect
                                with fellow members for potential collaborations and support.</p>
                            <a href="#" class="btn btn-primary rounded py-2 px-4">Learn More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                    <style>
                        .feature-item:hover i {
                            color: var(--primary-color) !important;
                        }

                        .feature-item:hover {
                            box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
                        }
                    </style>
                </div>
            </div>
            <!-- Matrimonial Services -->
            <div class="col-lg-4 wow  fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item " style="height: 300px;">
                    <div class="feature-content p-4 bg-white text-center">
                        <div class="feature-content-inner">
                            <!-- Added briefcase icon -->
                            <i class="fas fa-heart fa-5x me-2 col-md-12 text-center  "
                                style=" transition: all 0.3s ease;"></i>
                            <h4 class=" text-center fw-bold ">Matrimonial Listing</h4>
                            <p class="">Showcase your business within the Sahu Samaj community and connect
                                with fellow members for pote ntial collaborations and support.</p>
                            <a href="#" class="btn btn-primary rounded py-2 px-4">Learn More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Community Events -->
            <div class="col-lg-4 wow  fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item " style="height: 300px;">
                    <div class="feature-content p-4 bg-white text-center">
                        <div class="feature-content-inner">
                            <!-- Added briefcase icon -->
                            <i class="fas fa-briefcase fa-5x me-2 col-md-12 text-center  "
                                style=" transition: all 0.3s ease;"></i>
                            <h4 class=" text-center fw-bold ">Job Listing</h4>
                            <p class="">Showcase your business within the Sahu Samaj community and connect
                                with fellow members for potential collaborations and support.</p>
                            <a href="#" class="btn btn-primary rounded py-2 px-4">Learn More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Feature End -->

<!-- About Start -->
<!-- About Sahu Samaj Start -->
<div class="container-fluid about pb-5">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                <div>
                    <h4 class="text-primary">साहू समाज के बारे में</h4>
                    <h1 class="display-5 mb-4">साहू समाज की समृद्ध विरासत और एकता का उत्सव</h1>
                    <p class="mb-5">साहू समाज एक जीवंत समुदाय है जो हमारी समृद्ध सांस्कृतिक विरासत को संरक्षित करने और
                        सदस्यों के बीच एकता को बढ़ावा देने के लिए समर्पित है। हम जीवन के विभिन्न क्षेत्रों में
                        एक-दूसरे का समर्थन करते हुए अपनी परंपराओं और मूल्यों का उत्सव मनाने के लिए प्रतिबद्ध हैं।</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-people-arrows fa-3x text-primary"></i></div>
                                <div>
                                    <h4>सांस्कृतिक कार्यक्रम</h4>
                                    <p>साहू समाज की सुंदरता और परंपराओं को प्रदर्शित करने वाले विभिन्न सांस्कृतिक
                                        कार्यक्रमों में भाग लें और आनंद उठाएं।</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-heart fa-3x text-primary"></i></div>
                                <div>
                                    <h4>समुदाय का समर्थन</h4>
                                    <p>साहू समाज के सदस्यों को समर्थन और सहायता प्रदान करने वाली पहलों में शामिल हों।
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-handshake fa-3x text-primary"></i></div>
                                <div>
                                    <h4>सहयोगी अवसर</h4>
                                    <p>समुदाय के भीतर सहयोग के अवसरों की खोज करें और सामूहिक विकास और सफलता के लिए
                                        नई संभावनाएं बनाएं।</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-graduation-cap fa-3x text-primary"></i></div>
                                <div>
                                    <h4>शैक्षिक कार्यक्रम</h4>
                                    <p>साहू समाज के सदस्यों को ज्ञान और कौशल से सशक्त बनाने के लिए विभिन्न शैक्षिक
                                        कार्यक्रमों और संसाधनों तक पहुंच प्राप्त करें।</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="position-relative rounded">
                    <div class="rounded" style="margin-top: 40px;">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="rounded mb-4">
                                    <img src="https://telisociety.com/wp-content/uploads/2023/03/333206620_6640908432590835_7125988540919382755_n.jpg"
                                        class="img-fluid rounded w-100" alt="साहू समाज समुदाय">
                                </div>
                                <div class="row gx-4 gy-0">
                                    <div class="col-6">
                                        <div class="counter-item bg-primary rounded text-center p-4 h-100">
                                            <div class="counter-item-icon mx-auto mb-3">
                                                <i class="fas fa-users fa-3x text-white"></i>
                                            </div>
                                            <div class="counter-counting mb-3">
                                                <span class="text-white fs-2 fw-bold"
                                                    data-toggle="counter-up">10,000</span>
                                                <span class="h1 fw-bold text-white">+</span>
                                            </div>
                                            <h5 class="text-white mb-0">सक्रिय सदस्य</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="counter-item bg-dark rounded text-center p-4 h-100">
                                            <div class="counter-item-icon mx-auto mb-3">
                                                <i class="fas fa-trophy fa-3x text-white"></i>
                                            </div>
                                            <div class="counter-counting mb-3">
                                                <span class="text-white fs-2 fw-bold" data-toggle="counter-up">50</span>
                                                <span class="h1 fw-bold text-white">+</span>
                                            </div>
                                            <h5 class="text-white mb-0">समुदाय की उपलब्धियाँ</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded bg-primary p-4 position-absolute d-flex justify-content-center"
                        style="width: 90%; height: 80px; top: -40px; left: 50%; transform: translateX(-50%);">
                        <h3 class="mb-0 text-white">साहू समाज समुदाय का गर्व</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About End -->


<!-- Service Start -->
<!-- Our Service Start -->
<div class="container-fluid service py-5">
    <div class="container service-section py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Services</h4>
            <h1 class="display-5 text-white mb-4">Explore Our Community Services</h1>
            <p class="mb-0 text-white">At Sahu Samaj, we offer a range of services designed to support and enrich our
                community members. From cultural events to educational programs, discover how we can assist and engage
                with you.</p>
        </div>
        <div class="row g-4">
            <div class="col-0 col-md-1 col-lg-2 col-xl-2"></div>
            <div class="col-md-10 col-lg-8 col-xl-8 wow fadeInUp" data-wow-delay="0.2s">
                <!-- Removed the days div -->
            </div>
            <div class="col-0 col-md-1 col-lg-2 col-xl-2"></div>

            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item p-4">
                    <div class="service-content">
                        <div class="mb-4">
                            <i class="fas fa-users fa-4x text-primary"></i>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">Community Gatherings</a>
                        <p class="mb-0">Join us for community gatherings that celebrate our traditions and foster
                            connections among members.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item p-4">
                    <div class="service-content">
                        <div class="mb-4">
                            <i class="fas fa-book fa-4x text-primary"></i>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">Educational Workshops</a>
                        <p class="mb-0">Participate in workshops and educational programs designed to enhance knowledge
                            and skills within our community.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item p-4">
                    <div class="service-content">
                        <div class="mb-4">
                            <i class="fas fa-handshake fa-4x text-primary"></i>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">Support Services</a>
                        <p class="mb-0">Access various support services, including counseling and assistance for members
                            in need.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="service-item p-4">
                    <div class="service-content">
                        <div class="mb-4">
                            <i class="fas fa-calendar-alt fa-4x text-primary"></i>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">Event Planning</a>
                        <p class="mb-0">Plan and organize community events with our support, from festivals to cultural
                            celebrations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service End -->



<!-- Attractions Start -->
<div class="container-fluid attractions py-5">
    <div class="container attractions-section py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">JOBS</h4>
            <h1 class="display-5 text-white mb-4">Explore Our Community Job List</h1>
            <p class="text-white mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci
                facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                sint dolorem autem obcaecati, ipsam mollitia hic.
            </p>
        </div>
        <div class="splide" id="job_carousel">
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide wow fadeInUp" data-wow-delay="0.2s">
                        <img src="uploads/landing_img/person-1.jpeg" class="img-fluid rounded w-100" alt="">
                        <a href="#" class="attractions-name">Roller Coaster</a>
                    </div>
                    <div class="splide__slide wow fadeInUp" data-wow-delay="0.4s">
                        <img src="uploads/landing_img/person-2.jpeg" class="img-fluid rounded w-100" alt="">
                        <a href="#" class="attractions-name">Carousel</a>
                    </div>
                    <div class="splide__slide wow fadeInUp" data-wow-delay="0.6s">
                        <img src="uploads/landing_img/person-3.jpeg" class="img-fluid rounded w-100" alt="">
                        <a href="#" class="attractions-name">Arcade Game</a>
                    </div>
                    <div class="splide__slide wow fadeInUp" data-wow-delay="0.8s">
                        <img src="uploads/landing_img/person-4.jpeg" class="img-fluid rounded w-100" alt="">
                        <a href="#" class="attractions-name">Hanging Carousel</a>
                    </div>
                    <div class="splide__slide wow fadeInUp" data-wow-delay="1s">
                        <img src="uploads/landing_img/person-5.jpeg" class="img-fluid rounded w-100" alt="">
                        <a href="#" class="attractions-name">Carousel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Attractions End -->

<!-- Gallery Start -->
<div class="container-fluid gallery pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Gallery</h4>
            <h1 class="display-5 mb-4">Moments of Sahu Samaj Events</h1>
            <p class="mb-0">Explore the vibrant moments and memorable events of Sahu Samaj captured through our gallery.
                From community celebrations to cultural festivals, see the essence of our shared heritage and unity.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="gallery-item">
                    <img src="https://teliindia.in/images/Gaya_Sahu_samaj_Bhamashah_Jayanti.jpg"
                        class="img-fluid rounded w-100 h-100" alt="">
                    <div class="search-icon">
                        <a href="https://teliindia.in/images/Gaya_Sahu_samaj_Bhamashah_Jayanti.jpg"
                            class="btn btn-light btn-lg-square rounded-circle" data-lightbox="Gallery-1"><i
                                class="fas fa-search-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="gallery-item">
                    <img src="https://th.bing.com/th/id/OIP.QkMVSP7ZF-scNkT2ZbBXRwHaEK?rs=1&pid=ImgDetMain"
                        class="img-fluid rounded w-100 h-100" alt="">
                    <div class="search-icon">
                        <a href="https://th.bing.com/th/id/OIP.QkMVSP7ZF-scNkT2ZbBXRwHaEK?rs=1&pid=ImgDetMain"
                            class="btn btn-light btn-lg-square rounded-circle" data-lightbox="Gallery-2"><i
                                class="fas fa-search-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="gallery-item">
                    <img src="https://teliindia.in/images/Guna_district_Sahu_Samaj_shaadi.jpg"
                        class="img-fluid rounded w-100 h-100" alt="">
                    <div class="search-icon">
                        <a href="https://teliindia.in/images/Guna_district_Sahu_Samaj_shaadi.jpg"
                            class="btn btn-light btn-lg-square rounded-circle" data-lightbox="Gallery-3"><i
                                class="fas fa-search-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="gallery-item">
                    <img src="https://i.ytimg.com/vi/4uXYWXxPqtk/hqdefault.jpg" class="img-fluid rounded w-100 h-100"
                        alt="">
                    <div class="search-icon">
                        <a href="https://i.ytimg.com/vi/4uXYWXxPqtk/hqdefault.jpg"
                            class="btn btn-light btn-lg-square rounded-circle" data-lightbox="Gallery-4"><i
                                class="fas fa-search-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="gallery-item">
                    <img src="https://images.bhaskarassets.com/web2images/521/2023/08/15/14bhilai-pullout-pg9-0_deb8c24e-e8b2-4bb0-86ba-ab1ea6fbd793-large.jpg"
                        class="img-fluid rounded w-100 h-100" alt="">
                    <div class="search-icon">
                        <a href="https://images.bhaskarassets.com/web2images/521/2023/08/15/14bhilai-pullout-pg9-0_deb8c24e-e8b2-4bb0-86ba-ab1ea6fbd793-large.jpg"
                            class="btn btn-light btn-lg-square rounded-circle" data-lightbox="Gallery-5"><i
                                class="fas fa-search-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="gallery-item">
                    <img src="https://teliindia.in/Teli_Samaj_news_Image.php?ano=1441&Image=Chhabra_Sahu_Samaj_samuhik_Vivah_Sammelan_Sampanna.jpg"
                        class="img-fluid rounded w-100 h-100" alt="">
                    <div class="search-icon">
                        <a href="https://teliindia.in/Teli_Samaj_news_Image.php?ano=1441&Image=Chhabra_Sahu_Samaj_samuhik_Vivah_Sammelan_Sampanna.jpg"
                            class="btn btn-light btn-lg-square rounded-circle" data-lightbox="Gallery-6"><i
                                class="fas fa-search-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery End -->

<style>
    #more-description {
        display: none;
    }

    #read-more {
        color: #007bff;
        text-decoration: none;
        cursor: pointer;
    }

    #read-more:hover {
        text-decoration: underline;
    }
</style>
<!-- Job Start -->
<div class="container-fluid blog pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Career Opportunities</h4>
            <h1 class="display-5 mb-4">Explore Employment Opportunities in Sahu Samaj</h1>
            <p class="mb-0">Discover a range of job opportunities within our Sahu Samaj community. We are committed to
                supporting our members by providing access to various career paths and professional growth. Explore the
                latest job openings and find your next career opportunity with us.</p>
        </div>

        <div class="owl-carousel owl-theme">

            <?php foreach ($job_list as $job) { ?>
                <div class="item wow fadeInUp" data-wow-delay="0.2s">
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
                            <div id="content" class="mb-1 ellipsis" onclick="toggleText()"><?= $job['job_description'] ?>
                            </div>
                            <div id="full-content" class="mb-1 full-text "><?= $job['job_description'] ?></div>

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



<!-- Business Start -->
<div class="container-fluid blog pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Business Opportunities</h4>
            <h1 class="display-5 mb-4">Discover New Ventures in Sahu Samaj</h1>
            <p class="mb-0">Explore exciting business opportunities and ventures within our Sahu Samaj community. We are
                dedicated to fostering entrepreneurship and supporting our members in launching and growing their
                businesses. Find out about the latest business prospects and connect with fellow entrepreneurs.</p>
        </div>
        <div class="owl-carousel owl-theme">

            <?php foreach ($business_list as $business) { ?>
                <div class="item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <a href="#">
                                <img src="uploads/business_listing/<?= $business['business_image'] ?>"
                                    class="img-fluid w-100 rounded-top" alt="<?= $business['company_name'] ?>">
                            </a>
                            <div class="blog-category py-2 px-4"><?= $business['business_category'] ?></div>
                            <div class="blog-date job-content"><span>Time :</span> <?= $business['opening_time'] ?> -
                                <?= $business['closing_time'] ?>
                            </div>
                        </div>
                        <div class="blog-content job-content p-4">
                            <a href="#" class="h4 d-inline-block mb-4"><span><?= $business['company_name'] ?></span></a>
                            <p class="mb-1"><span><?= $business['city'] ?>     <?= $business['pin_code'] ?>,
                                    <?= $business['country'] ?></span></p>
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


<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Committee</h4>
            <h1 class="display-5 mb-4">Meet Our Esteemed Sahu Samaj Committee Members</h1>
            <p class="mb-0">Our Sahu Samaj committee is dedicated to serving our community with integrity and
                commitment. Get to know the individuals who are leading our initiatives and working towards the
                betterment of our society. Each member brings unique skills and passion to our collective mission.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item p-4">
                    <div class="team-content">
                        <div class="d-flex justify-content-between border-bottom pb-4">
                            <div class="text-start">
                                <h4 class="mb-0">Anil Kumar Sahu</h4>
                                <p class="mb-0">Chairperson</p>
                            </div>
                            <div>
                                <img src="uploads/landing_img/team-1.jpg" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="Anil Kumar">
                            </div>
                        </div>
                        <div class="team-icon rounded-pill my-4 p-3">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                        <p class="text-center mb-0">Anil Kumar is committed to leading our community with vision and
                            dedication. Under his leadership, we aim to enhance our collective welfare and strengthen
                            our community bonds.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="team-item p-4">
                    <div class="team-content">
                        <div class="d-flex justify-content-between border-bottom pb-4">
                            <div class="text-start">
                                <h4 class="mb-0">Sunita Sahu</h4>
                                <p class="mb-0">Secretary</p>
                            </div>
                            <div>
                                <img src="uploads/landing_img/team-2.jpg" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="Sunita Sharma">
                            </div>
                        </div>
                        <div class="team-icon rounded-pill my-4 p-3">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                        <p class="text-center mb-0">Sunita Sharma plays a crucial role in organizing and coordinating
                            events, ensuring that our committee’s activities run smoothly and effectively.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item p-4">
                    <div class="team-content">
                        <div class="d-flex justify-content-between border-bottom pb-4">
                            <div class="text-start">
                                <h4 class="mb-0">Ravi Sahu</h4>
                                <p class="mb-0">Treasurer</p>
                            </div>
                            <div>
                                <img src="uploads/landing_img/team-3.jpg" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="Ravi Patel">
                            </div>
                        </div>
                        <div class="team-icon rounded-pill my-4 p-3">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                        <p class="text-center mb-0">Ravi Patel is responsible for managing the financial aspects of our
                            committee, ensuring transparency and proper allocation of resources.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Testimonials</h4>
            <h1 class="display-5 text-white mb-4">Members Reviews</h1>
            <p class="text-white mb-0">We are proud to share the thoughts of our valued members. Their satisfaction and
                trust inspire us to keep striving for excellence.
            </p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
            <div class="testimonial-item p-4">
                <p class="text-white fs-4 mb-4">The community here is amazing. The support and camaraderie among members
                    make it feel like a true family.</p>
                <div class="testimonial-inner">
                    <div class="testimonial-img">
                        <img src="uploads/landing_img/testimonial-1.jpg" class="img-fluid" alt="Image">
                        <div class="testimonial-quote btn-lg-square rounded-circle"><i
                                class="fa fa-quote-right fa-2x"></i>
                        </div>
                    </div>
                    <div class="ms-4">
                        <h4>Ravi Sahu</h4>
                        <p class="text-start text-white">Software Engineer</p>
                        <div class="d-flex text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item p-4">
                <p class="text-white fs-4 mb-4">Being a part of this community has been a game-changer for me. The
                    opportunities to connect and grow are endless.</p>
                <div class="testimonial-inner">
                    <div class="testimonial-img">
                        <img src="uploads/landing_img/testimonial-2.jpg" class="img-fluid" alt="Image">
                        <div class="testimonial-quote btn-lg-square rounded-circle"><i
                                class="fa fa-quote-right fa-2x"></i>
                        </div>
                    </div>
                    <div class="ms-4">
                        <h4>Anjali Sahu</h4>
                        <p class="text-start text-white">Entrepreneur</p>
                        <div class="d-flex text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item p-4">
                <p class="text-white fs-4 mb-4">This platform has truly allowed me to expand my network and gain
                    valuable insights from fellow members.</p>
                <div class="testimonial-inner">
                    <div class="testimonial-img">
                        <img src="uploads/landing_img/testimonial-3.jpg" class="img-fluid" alt="Image">
                        <div class="testimonial-quote btn-lg-square rounded-circle"><i
                                class="fa fa-quote-right fa-2x"></i>
                        </div>
                    </div>
                    <div class="ms-4">
                        <h4>Amit Sahu</h4>
                        <p class="text-start text-white">Consultant</p>
                        <div class="d-flex text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial End -->
<script>
    function toggleText() {
        var ellipsis = document.getElementById("content");
        var fullText = document.getElementById("full-content");

        if (fullText.style.display === "none") {
            fullText.style.display = "block";
            ellipsis.style.display = "none";
        } else {
            fullText.style.display = "none";
            ellipsis.style.display = "block";
        }
    }
</script>