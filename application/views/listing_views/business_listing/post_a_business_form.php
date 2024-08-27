<style>
    /* Custom CSS for the form */
    .form-head {
        font-family: -webkit-body;
        font-size: -webkit-xxx-large;
        font-weight: bolder;
    }

    .form-control.resume {
        border-radius: 0.25rem;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control.resume:hover,
    .form-control.resume:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .nice-select {
        border-radius: 0.25rem;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .nice-select:hover,
    .nice-select:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .custom-file-input:focus~.custom-file-label,
    .custom-file-input:hover~.custom-file-label {
        border-color: #80bdff;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
    }

    .btn-primary {
        transition: background-color 0.3s, transform 0.2s;
        border-radius: 0.25rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-primary:active {
        background-color: #004085;
        transform: translateY(0);
    }

    /* Hover effect for form-group labels */
    .form-group:hover .form-label {
        color: #007bff;
        cursor: pointer;
    }

    /* Hover effect for custom-file label */
    .custom-file-label:hover {
        color: #007bff;
        cursor: pointer;
    }

    /* Add margin to alert boxes */
    .alert {
        margin-bottom: 1rem;
    }
</style>
<!-- POST A BUSINESS START -->
<section class="section bg-light mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 my-2">
                <div class="post-job bg-white p-4">
                    <div class="custom-form">
                        <div id="message3"></div>

                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <?php echo form_open_multipart('business_listing_form_submit'); ?>

                        <h4 class="text-dark text-center form-head">Post A New Business</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label for="company_name" class="text-muted">Name of the Business</label>
                                    <input id="company_name" name="company_name" type="text" class="form-control resume"
                                        placeholder="" value="<?php echo set_value('company_name'); ?>">
                                    <?php echo form_error('company_name', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label for="address-1" class="text-muted">Address 1</label>
                                    <textarea id="address_1" name="address_1" rows="2" class="form-control resume"
                                        placeholder=""><?php echo set_value('address_1'); ?></textarea>
                                    <?php echo form_error('address_1', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label for="address-2" class="text-muted">Address 2</label>
                                    <textarea id="address_2" name="address_2" rows="2" class="form-control resume"
                                        placeholder=""><?php echo set_value('address_2'); ?></textarea>
                                    <?php echo form_error('address_2', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="city" class="text-muted">City</label>
                                    <input id="city" name="city" type="text" class="form-control resume" placeholder=""
                                        value="<?php echo set_value('city'); ?>">
                                    <?php echo form_error('city', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="country" class="text-muted">Country</label>
                                    <div class="form-button">
                                        <select id="country" name="country" class="nice-select form-select">
                                            <option data-display="Country">Country</option>
                                            <option value="1" <?php echo set_select('country', '1'); ?>>Afghanistan
                                            </option>
                                            <option value="2" <?php echo set_select('country', '2'); ?>>Bangladesh
                                            </option>
                                            <option value="3" <?php echo set_select('country', '3'); ?>>Canada</option>
                                            <option value="4" <?php echo set_select('country', '4'); ?>>Dominica
                                            </option>
                                        </select>
                                    </div>
                                    <?php echo form_error('country', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="opening-time" class="text-muted">Opening Time</label>
                                    <input id="opening_time" name="opening_time" type="text" class="form-control resume"
                                        placeholder="8000" value="<?php echo set_value('opening_time'); ?>">
                                    <?php echo form_error('opening_time', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="closing-time" class="text-muted">Closing Time</label>
                                    <input id="closing_time" name="closing_time" type="text" class="form-control resume"
                                        placeholder="20000" value="<?php echo set_value('closing_time'); ?>">
                                    <?php echo form_error('closing_time', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="business_category" class="text-muted">Business Category</label>
                                    <div class="form-button">
                                        <select id="business_category" name="business_category" class="nice-select form-select">
                                            <option data-display="Category">Category</option>
                                            <option value="1" <?php echo set_select('business_category', '1'); ?>>Web
                                                Developer</option>
                                            <option value="2" <?php echo set_select('business_category', '2'); ?>>PHP
                                                Developer</option>
                                            <option value="3" <?php echo set_select('business_category', '3'); ?>>Web
                                                Designer</option>
                                            <option value="4" <?php echo set_select('business_category', '4'); ?>>
                                                Graphic Designer</option>
                                        </select>
                                    </div>
                                    <?php echo form_error('business_category', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="pin-code" class="text-muted">Pin Code</label>
                                    <input id="pin_code" name="pin_code" type="text" class="form-control resume"
                                        placeholder="" value="<?php echo set_value('pin_code'); ?>">
                                    <?php echo form_error('pin_code', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label for="website" class="text-muted">Website</label>
                                    <input id="website" name="website" type="url" class="form-control resume"
                                        placeholder="" value="<?php echo set_value('website'); ?>">
                                    <?php echo form_error('website', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="email-address" class="text-muted">Email Address</label>
                                    <input id="email_address" name="email_address" type="text"
                                        class="form-control resume" placeholder=""
                                        value="<?php echo set_value('email_address'); ?>">
                                    <?php echo form_error('email_address', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="phone-number" class="text-muted">Phone Number</label>
                                    <input id="phone_number" name="phone_number" type="text" class="form-control resume"
                                        placeholder="" value="<?php echo set_value('phone_number'); ?>">
                                    <?php echo form_error('phone_number', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="fax" class="text-muted">Fax</label>
                                    <input id="fax" name="fax" type="text" class="form-control resume" placeholder=""
                                        value="<?php echo set_value('fax'); ?>">
                                    <?php echo form_error('fax', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                <label class="custom-file-label" for="business_image"><i
                                class="mdi mdi-cloud-upload mr-1"></i> Upload Files</label>
                                    <input id="business_image" name="business_image" type="file" class="custom-file-input"
                                        value="<?php echo set_value('business_image'); ?>">
                                    <?php echo form_error('business_image', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="animated-btn btn btn-primary btn-lg w-100"
                                data-animation="fadeInUp" data-animation-delay="1000">Submit Business</button>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- POST A BUSINESS END -->