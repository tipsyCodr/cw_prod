<style>
    /* Custom CSS */
    .form-head {
        font-family: -webkit-body;
        font-size: -webkit-xxx-large;
        font-weight: bolder;
    }

    .post-job {
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

    }

    .custom-form {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 500;
        color: #495057;
    }

    .form-control.resume {
        border-radius: 0.375rem;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
    }

    .nice-select {
        width: 100%;
        border-radius: 0.375rem;
        border: 1px solid #ced4da;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
    }

    .nice-select:focus {
        border-color: #80bdff;
        outline: 0;
    }

    .custom-file-label {
        display: flex;
        align-items: center;
        color: #6c757d;
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
        content: "Browse";
    }

    .btn-custom {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 0.375rem;
        padding: 0.5rem 1.5rem;
        font-size: 1rem;
        font-weight: 500;
    }

    .btn-custom:hover {
        background-color: #0056b3;
        color: #fff;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 0.2rem;
    }

    .alert-dismissible .btn-close {
        box-shadow: none;
        background: transparent;
    }

    .text-muted {
        color: #6c757d;
    }

    /* Hover effects for form elements */
    .form-control.resume:hover {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .nice-select:hover {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .custom-file-input:focus~.custom-file-label,
    .custom-file-input:hover~.custom-file-label {
        border-color: #80bdff;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
    }

    .btn-custom {
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-custom:hover {
        background-color: #0056b3;
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-custom:active {
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
</style>
<!-- POST A JOB START -->
<section class="section bg-light mt-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="post-job bg-white p-4 my-2">
                    <div class="custom-form">
                        <div id="message3"></div>

                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <?php echo form_open_multipart('job_listing_form_submit'); ?>

                        <h4 class="text-dark  text-center form-head">Post A New Job</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label for="job_title" class="form-label text-muted">Job Title</label>
                                    <input id="job_title" name="job_title" type="text" class="form-control resume"
                                        placeholder="" value="<?php echo set_value('job_title'); ?>">
                                    <?php echo form_error('job_title', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_type" class="form-label text-muted">Job Type</label>
                                    <div class="form-button">
                                        <select id="job_type" name="job_type" class="nice-select form-select">
                                            <option data-display="Job Type">Job Type</option>
                                            <option value="1" <?php echo set_select('job_type', '1'); ?>>Full Time
                                            </option>
                                            <option value="2" <?php echo set_select('job_type', '2'); ?>>Part Time
                                            </option>
                                        </select>
                                    </div>
                                    <?php echo form_error('job_type', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_category" class="form-label text-muted">Job Category</label>
                                    <div class="form-button">
                                        <select id="job_category" name="job_category" class="nice-select form-select">
                                            <option data-display="Category">Category</option>
                                            <option value="1" <?php echo set_select('job_category', '1'); ?>>Web
                                                Developer</option>
                                            <option value="2" <?php echo set_select('job_category', '2'); ?>>PHP
                                                Developer</option>
                                            <option value="3" <?php echo set_select('job_category', '3'); ?>>Web
                                                Designer</option>
                                            <option value="4" <?php echo set_select('job_category', '4'); ?>>Graphic
                                                Designer</option>
                                        </select>
                                    </div>
                                    <?php echo form_error('job_category', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_city" class="form-label text-muted">City</label>
                                    <input id="job_city" name="job_city" type="text" class="form-control resume"
                                        placeholder="" value="<?php echo set_value('job_city'); ?>">
                                    <?php echo form_error('job_city', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_country" class="form-label text-muted">Country</label>
                                    <div class="form-button">
                                        <select id="job_country" name="job_country" class="nice-select form-select">
                                            <option data-display="Country">Country</option>
                                            <option value="1" <?php echo set_select('job_country', '1'); ?>>Afghanistan
                                            </option>
                                            <option value="2" <?php echo set_select('job_country', '2'); ?>>Bangladesh
                                            </option>
                                            <option value="3" <?php echo set_select('job_country', '3'); ?>>Canada
                                            </option>
                                            <option value="4" <?php echo set_select('job_country', '4'); ?>>Dominica
                                            </option>
                                        </select>
                                    </div>
                                    <?php echo form_error('job_country', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_minimum_salary" class="form-label text-muted">Minimum Salary</label>
                                    <input id="job_minimum_salary" name="job_minimum_salary" type="text"
                                        class="form-control resume" placeholder="8000"
                                        value="<?php echo set_value('job_minimum_salary'); ?>">
                                    <?php echo form_error('job_minimum_salary', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_maximum_salary" class="form-label text-muted">Maximum Salary</label>
                                    <input id="job_maximum_salary" name="job_maximum_salary" type="text"
                                        class="form-control resume" placeholder="20000"
                                        value="<?php echo set_value('job_maximum_salary'); ?>">
                                    <?php echo form_error('job_maximum_salary', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_education_level" class="form-label text-muted">Education
                                        Level</label>
                                    <div class="form-button">
                                        <select id="job_education_level" name="job_education_level"
                                            class="nice-select form-select">
                                            <option data-display="Level">Level</option>
                                            <option value="1" <?php echo set_select('job_education_level', '1'); ?>>
                                                Level-1</option>
                                            <option value="2" <?php echo set_select('job_education_level', '2'); ?>>
                                                Level-2</option>
                                            <option value="3" <?php echo set_select('job_education_level', '3'); ?>>
                                                Level-3</option>
                                            <option value="4" <?php echo set_select('job_education_level', '4'); ?>>
                                                Level-4</option>
                                        </select>
                                    </div>
                                    <?php echo form_error('job_education_level', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_experience" class="form-label text-muted">Year of Experience</label>
                                    <div class="form-button">
                                        <select id="job_experience" name="job_experience"
                                            class="nice-select form-select">
                                            <option data-display="Experience">Experience</option>
                                            <option value="1" <?php echo set_select('job_experience', '1'); ?>>1 Year
                                            </option>
                                            <option value="2" <?php echo set_select('job_experience', '2'); ?>>2 Year
                                            </option>
                                            <option value="3" <?php echo set_select('job_experience', '3'); ?>>3 Year
                                            </option>
                                        </select>
                                    </div>
                                    <?php echo form_error('job_experience', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label for="job_website" class="form-label text-muted">Website</label>
                                    <input id="job_website" name="job_website" type="url" class="form-control resume"
                                        placeholder="" value="<?php echo set_value('job_website'); ?>">
                                    <?php echo form_error('job_website', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_email" class="form-label text-muted">Email Address</label>
                                    <input id="job_email" name="job_email" type="text" class="form-control resume"
                                        placeholder="" value="<?php echo set_value('job_email'); ?>">
                                    <?php echo form_error('job_email', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_number" class="form-label text-muted">Phone Number</label>
                                    <input id="job_number" name="job_number" type="text" class="form-control resume"
                                        placeholder="" value="<?php echo set_value('job_number'); ?>">
                                    <?php echo form_error('job_number', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_gender" class="form-label text-muted">Gender</label>
                                    <div class="form-button">
                                        <select id="job_gender" name="job_gender" class="nice-select form-select">
                                            <option data-display="Gender">Gender</option>
                                            <option value="1" <?php echo set_select('job_gender', '1'); ?>>Male</option>
                                            <option value="2" <?php echo set_select('job_gender', '2'); ?>>Female
                                            </option>
                                        </select>
                                    </div>
                                    <?php echo form_error('job_gender', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="job_shift" class="form-label text-muted">Shift</label>
                                    <div class="form-button">
                                        <select id="job_shift" name="job_shift" class="nice-select form-select">
                                            <option data-display="Shift">Shift</option>
                                            <option value="1" <?php echo set_select('job_shift', '1'); ?>>Morning
                                            </option>
                                            <option value="2" <?php echo set_select('job_shift', '2'); ?>>Evening
                                            </option>
                                        </select>
                                    </div>
                                    <?php echo form_error('job_shift', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label for="job_description" class="form-label text-muted">Job Description</label>
                                    <textarea id="job_description" name="job_description" rows="6"
                                        class="form-control resume"
                                        placeholder=""><?php echo set_value('job_description'); ?></textarea>
                                    <?php echo form_error('job_description', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <div class="input-group mt-2 mb-2">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="job_image"
                                                    name="job_image" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="job_image"><i
                                                        class="mdi mdi-cloud-upload mr-1"></i> Upload Files</label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-inline-item">
                                        <h6 class="text-muted mb-0">Upload Images Or Documents.</h6>
                                    </li>
                                </ul>
                                <?php echo form_error('job_image', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn animated-btn btn-primary btn-lg w-100"
                                data-animation="fadeInUp" data-animation-delay="1000">Post a Job</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- POST A JOB END -->