<div class='container-fluid my-2 text-center d-none d-lg-block'>

    <div class="row">
        <div class="col-12 col-lg-4"></div>
        <div class="col-12 col-lg-4">
            <!-- <img src="/uploads/landing_img/banner.jpg" alt="Sahu Samaj" style="width: 70%;"> -->
            <a href="/" class="">

                <img src="<?php echo base_url('/uploads/landing_img/community_site_logo.jpg'); ?>" alt="Logo" class="img-fluid"
                    style="max-height: 120px;">
            </a>

        </div>
        <div class="col-12 col-lg-4">
                 <?php if (!($this->session->userdata('login'))): ?>
                                  <a href="<?= base_url() ?>/user_registration" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0">
                   		 <i class="fas fa-user-plus me-2"></i>रजिस्टर करे
                </a>
                	<a href="<?= base_url('login') ?>" class="btn btn-primary rounded-pill py-2 px-4 m-2 flex-shrink-0">
                    	<i class="fas fa-sign-in-alt me-2"></i>लॉग इन करे
                	</a>
            	<?php else: ?>
                	<a href="<?= base_url('logout') ?>" class="btn btn-primary rounded-pill py-2 px-4 m-2 flex-shrink-0">
                 	   <i class="fas fa-sign-out-alt me-2"></i>Logout
                	</a>
            	<?php endif; ?>	
        </div>
    </div>
</div>

<style>
    .sticky-top .navbar-light .navbar-brand img {
        max-height: 100px;
    }
</style>
<div class="container nav-bar sticky-top px-4 py-2 py-lg-0">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a href="/" class="navbar-brand p-0 d-lg-none d-sm-inline">
            <img src="<?php echo base_url('/uploads/landing_img/community_site_logo.jpg'); ?>" alt="Logo" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="<?= base_url() ?>" class="nav-item nav-link active">
                    होम
                </a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        जॉब
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="<?= base_url() ?>job" class="dropdown-item">
                            जॉब सूची
                        </a>
                        <a href="<?= base_url() ?>job_listing_form" class="dropdown-item">
                            जॉब पोस्ट करे
                        </a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        बिज़नस
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="<?= base_url() ?>business" class="dropdown-item">
                            बिज़नस सूचि
                        </a>
                        <a href="<?= base_url() ?>business_listing_form" class="dropdown-item">
                            पोस्ट करे
                        </a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-nowrap" data-bs-toggle="dropdown">
                        वैवाहिक सेवाए
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="<?= base_url() ?>matrimonial_form" class="dropdown-item">
                            रजिस्टर करे
                        </a>
                        <a href="<?= base_url() ?>matrimonial" class="dropdown-item">
                            जीवनसाथी ढूंढे
                        </a>
                    </div>
                </div>
                <a href="<?= base_url('blog') ?>" class="nav-item nav-link">
                    समाचार
                </a>
                <a href="#contact_info" class="nav-item nav-link text-nowrap">
                    कांटेक्ट करे
                </a>
            </div>
            <?php if (!($this->session->userdata('login'))): ?>
                <span class="d-none d-lg-none d-sm-inline-block">

                    <a href="<?= base_url() ?>/user_registration"
                        class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0">
                        <i class="fas fa-user-plus me-2"></i>रजिस्टर करे
                    </a>
                    <a href="<?= base_url('login') ?>" class="btn btn-primary rounded-pill py-2 px-4 m-2 flex-shrink-0">
                        <i class="fas fa-sign-in-alt me-2"></i>लॉग इन करे
                    </a>
                <?php else: ?>
                    <span class="d-lg-none d-sm-inline-block">

                    <a href="<?= base_url('logout') ?>" class="btn btn-primary rounded-pill py-2 px-4 m-2 flex-shrink-0">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </span>
            <?php endif; ?>

        </div>
    </nav>
</div>