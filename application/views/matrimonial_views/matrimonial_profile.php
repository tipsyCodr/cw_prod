<style>
    .profile-header {
        background-color: #f8f9fa;
        padding-top: 20px;
        border-bottom: 2px solid #dee2e6;
    }

    .profile-img {
        max-width: 200px;
        border-radius: 10px;
    }

    .profile-info {
        margin-bottom: 20px;
    }

    .profile-info h5 {
        margin-bottom: 10px;
    }

    .profile-info p {
        margin-bottom: 5px;
    }
</style>
<div class="container-fluid">
    <div class="row">

        <!-- Profile Details -->
        <div class="profile-info col-md-9">
            <!-- <h2>Profile Details</h2> -->
            <div class="row">
                <div class="col-md-12">
                    <h5>Personal Information</h5>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>Date of Birth</th>
                                <td><?php echo date('d-m-Y', strtotime($matrimonial_profile['dob'])); ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?php echo $matrimonial_profile['gender'] == 'M' ? 'Male' : 'Female'; ?></td>
                            </tr>
                            <tr>
                                <th>Height</th>
                                <td><?php echo $matrimonial_profile['height']; ?></td>
                            </tr>
                            <tr>
                                <th>Weight</th>
                                <td><?php echo $matrimonial_profile['weight']; ?></td>
                            </tr>
                            <tr>
                                <th>Mother Tongue</th>
                                <td><?php echo $matrimonial_profile['mother_tongue']; ?></td>
                            </tr>
                            <tr>
                                <th>Gotram</th>
                                <td><?php echo $matrimonial_profile['gotram']; ?></td>
                            </tr>
                            <tr>
                                <th>Zodiac</th>
                                <td><?php echo $matrimonial_profile['zodiac']; ?></td>
                            </tr>
                            <tr>
                                <th>Education</th>
                                <td><?php echo $matrimonial_profile['education']; ?></td>
                            </tr>
                            <tr>
                                <th>Occupation</th>
                                <td><?php echo $matrimonial_profile['job_occupation']; ?></td>
                            </tr>
                            <tr>
                                <th>Employee In</th>
                                <td><?php echo $matrimonial_profile['employee_in_id']; ?></td>
                            </tr>
                            <tr>
                                <th>Salary</th>
                                <td><?php echo $matrimonial_profile['salary']; ?></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><?php echo $matrimonial_profile['description']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Header -->
        <div class="profile-header col-md-3">

            <div class="profile-header text-center">
                <h1><?php echo $matrimonial_profile['user_name']; ?></h1>
                <img src="<?php echo base_url('uploads/' . $matrimonial_profile['user_profile_pic']); ?>"
                    alt="Profile Picture" class="profile-img">
                <p class="lead"><?php echo $matrimonial_profile['age']; ?> years old</p>
            </div>
            <div class="">
                <h5>Contact Information</h5>
                <p><strong>Email:</strong> <?php echo $matrimonial_profile['user_email']; ?></p>
                <p><strong>Mobile:</strong> <?php echo $matrimonial_profile['user_mobile']; ?></p>
                <p><strong>Address:</strong> <?php echo $matrimonial_profile['user_address']; ?></p>
                <p><strong>City:</strong> <?php echo $matrimonial_profile['city']; ?></p>
                <p><strong>State:</strong> <?php echo $matrimonial_profile['state']; ?></p>
                <p><strong>Pincode:</strong> <?php echo $matrimonial_profile['user_pincode']; ?></p>
            </div>
        </div>
    </div>
</div>