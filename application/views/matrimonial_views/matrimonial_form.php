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

                        <?php echo form_open_multipart('matrimonial_form_submit'); ?>

                        <h4 class="text-dark  text-center form-head">Register for Matrimonial</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label for="job_occupation" class="form-label text-muted">Job / Occupation</label>
                                    <input id="job_occupation" name="job_occupation" type="text" class="form-control resume"
                                        placeholder="Doctor" value="<?php echo set_value('job_occupation'); ?>">
                                    <?php echo form_error('job_occupation', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group app-label mt-2">
                                    <label for="dob" class="form-label text-muted">D.O.B.</label>
                                    <input id="dob" name="dob" type="date" class="form-control resume"
                                        placeholder="17/5/2002" value="<?php echo set_value('dob'); ?>">
                                    <?php echo form_error('dob', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group app-label mt-2">
                                    <label for="height" class="form-label text-muted">Height</label>
                                    <input id="height" name="height" type="text" class="form-control resume"
                                        placeholder="5.11''" value="<?php echo set_value('height'); ?>">
                                    <?php echo form_error('height', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group app-label mt-2">
                                    <label for="weight" class="form-label text-muted">Weight</label>
                                    <input id="weight" name="weight" type="text" class="form-control resume"
                                        placeholder="63 Kgs" value="<?php echo set_value('height'); ?>">
                                    <?php echo form_error('weight', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label for="gender" class="form-label text-muted">Gender</label>
                                    <div class="form-button">
                                        <select id="gender" name="gender" class="nice-select form-select">
                                            <option data-display="Gender">Gender</option>
                                            <option value="M" <?php echo set_select('gender', 'M'); ?>>Male</option>
                                            <option value="F" <?php echo set_select('gender', 'F'); ?>>Female
                                            </option>
                                        </select>
                                    </div>
                                    <?php echo form_error('gender', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>

                        <div class="row col-lg-12">
                            <div class="col-md-4">
                            <div class="form-group app-label mt-2">
                                    <label for="mother_tongue" class="form-label text-muted">Mother Tongue</label>
                                    <input id="mother_tongue" name="mother_tongue" type="text" class="form-control resume"
                                        placeholder="Hindi" value="<?php echo set_value('mother_tongue'); ?>">
                                    <?php echo form_error('mother_tongue', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group app-label mt-2">
                                    <label for="gotram" class="form-label text-muted">Gotram</label>
                                    <input id="gotram" name="gotram" type="text" class="form-control resume"
                                        placeholder="" value="<?php echo set_value('gotram'); ?>">
                                    <?php echo form_error('gotram', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group app-label mt-2">
                                    <label for="zodiac" class="form-label text-muted">Zodiac</label>
                                    <input id="zodiac" name="zodiac" type="text" class="form-control resume"
                                        placeholder="Libra" value="<?php echo set_value('zodiac'); ?>">
                                    <?php echo form_error('zodiac', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="education" class="form-label text-muted">Education</label>
                                    <input id="education" name="education" type="text"
                                        class="form-control resume"placeholder="Graduation BSC"
                                        value="<?php echo set_value('education'); ?>">
                                    <?php echo form_error('education', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label for="salary" class="form-label text-muted">Salary</label>
                                    <input id="salary" name="salary" type="text"
                                        class="form-control resume" placeholder="20000 Rs / month"
                                        value="<?php echo set_value('salary'); ?>">
                                    <?php echo form_error('salary', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group app-label mt-2">
                                    <label for="description" class="form-label text-muted">Description</label>
                                    <textarea id="description" name="description" rows="6"
                                        class="form-control resume"
                                        placeholder="Aboout yourself..."><?php echo set_value('description'); ?></textarea>
                                    <?php echo form_error('description', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <div class="input-group mt-2 mb-2">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="images"
                                                    name="images" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="images"><i
                                                        class="mdi mdi-cloud-upload mr-1"></i> Upload Image</label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-inline-item">
                                        <h6 class="text-muted mb-0">Upload Images.</h6>
                                    </li>
                                </ul>
                                <?php echo form_error('images', '<div class="mb-4 mt-3 alert alert-danger">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn animated-btn btn-primary btn-lg w-100"
                                data-animation="fadeInUp" data-animation-delay="1000">Register</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- POST A JOB END -->