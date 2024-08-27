<style>
    body {
        background-color: aliceblue;
        /* Gradient background */
        font-family: Arial, sans-serif;
    }

    .card {
        border-radius: 15px;
        /* border-color: solid #000000; */
        background: linear-gradient(135deg, #6e8efb 0%, #a777e3 100%);
        color: #fff;
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.02);
        /* Slight zoom effect */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        background-color: #4a4a4a;
        color: #fff;
        border-bottom: none;
    }

    .card-body {
        background-color: #ffffff;
        color: #333;

    }


    .btn-primary:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        transition: box-shadow 0.3s ease;
    }

    .form-control {
        transition: border-color 0.3s ease;
    }
</style>
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg">
                <div class="card-header text-center">

                    <h2 class="card-title mb-0" style="font-family: ui-monospace;">User Registration</h2>
                </div>

                <div id="form-messages" class="alert alert-danger alert-dismissible" style="display: none;"></div>
                <div class="card-body mb-5">
                    <?php if ($this->session->flashdata('success')): ?>
                        <script>
                            swal("Registered..!", "User Registered Successfully", 'success');
                            setTimeout(function () {

                                window.location.href = "<?php echo base_url(); ?>";
                            }, 2000)
                        </script>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>

                        <script>
                            swal("Oops...!", "Registration Failed ,Please try after sometimes..", 'error');
                        </script>
                    <?php endif; ?>

                    <?php $form_attributes = array('class' => 'mb-2');
                    echo form_open_multipart('user_registration_submit'); ?>

                    <div class="mb-3">
                        <label for="user_name" class="form-label">User Name</label>
                        <input type="text" name="user_name" class="form-control" id="user_name"
                            value="<?php echo set_value('user_name'); ?>" placeholder="Enter your user name">
                        <?php echo form_error('user_name', '<div class="mb-4  mt-3 alert alert-danger">', '</div>'); ?>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" name="user_email" class="form-control" id="user_email"
                                value="<?php echo set_value('user_email'); ?>" placeholder="Enter your email">
                            <?php echo form_error('user_email', '<div class="mb-3 mt-3 alert alert-danger h-50">', '</div>'); ?>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="user_mobile" class="form-label">Mobile</label>
                            <input type="text" name="user_mobile" class="form-control" id="user_mobile"
                                value="<?php echo set_value('user_mobile'); ?>" pattern="\d{10}"
                                title="Please enter only numbers" placeholder="Enter your mobile number">
                            <?php echo form_error('user_mobile', '<div class="mb-3 mt-3 alert alert-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="user_address" class="form-label">Address</label>
                        <textarea name="user_address" class="form-control" id="user_address" rows="3"
                            placeholder="Enter your address"><?php echo set_value('user_address'); ?></textarea>
                        <?php echo form_error('user_address', '<div class="mb-3 mt-3 alert alert-danger">', '</div>'); ?>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="user_city" class="form-label">City</label>
                            <input type="text" name="user_city" class="form-control" id="user_city"
                                value="<?php echo set_value('user_city'); ?>" placeholder="Enter your city">
                            <?php echo form_error('user_city', '<div class="mb-3 mt-3 alert alert-danger">', '</div>'); ?>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="user_pincode" class="form-label">Pincode</label>
                            <input type="number" name="user_pincode" class="form-control" id="user_pincode"
                                value="<?php echo set_value('user_pincode'); ?>" pattern="\d{6}"
                                title="Please enter a 6-digit pincode" placeholder="Enter your pincode">
                            <?php echo form_error('user_pincode', '<div class="mb-3 mt-3 alert alert-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="user_profile_pic" class="form-label">Profile Picture</label>
                        <input type="file" name="user_profile_pic" class="form-control" id="user_profile_pic"
                            accept="image/*">
                        <?php echo form_error('user_profile_pic', '<div class="mb-3 alert alert-danger">', '</div>'); ?>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary ">Register</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>