<div class="space-y-2">
    <form id="profile_pic_form">
        <h1 for="user_profile_pic" class="block mb-2 text-2xl font-bold text-center text-gray-900 dark:text-white">
            Update Profile
            Picture</h1>
        <label for="user_profile_pic">
            <div class="flex flex-col items-center w-full m-2">
                <?php if (isset($user->user_profile_pic) && !empty($user->user_profile_pic)) { ?>
                    <img id='preview'
                        class="w-32 h-32 object-cover rounded-full overflow-hidden border-4 border-accent-dark"
                        src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>" alt="">
                <?php } else { ?>
                    <i class="fas fa-user-circle fa-8x text-accent"></i>
                <?php } ?>
            </div>
        </label>
        <p class="text-accent text-center py-6"> Note: Click on your profile picture to change it.</p>
        <input class="text-center hidden" type="file" name="user_profile_pic" id="user_profile_pic" accept="image/*"
            class="" onchange="updateImage()">
    </form>
</div>
<div class="space-y-4 px-4">
    <!-- <form id="name_form" class="flex flex-col space-y-2">
        <h1 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Name</h1>
        <div class="flex space-x-2">
            <input type="text" name="user_name" id="user_name" class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent" placeholder="Name" value="<?= $user->user_name ?>">
            <button type="submit" class="my-2 text-white bg-accent hover:bg-accent-dark focus:ring-4 focus:outline-none focus:ring-accent font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-accent dark:hover:bg-accent dark:focus:ring-accent">Update</button>
        </div>
    </form> -->
    <form id="email_form" class="flex flex-col space-y-2">
        <div class="">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Email</label>
            <input type="email" name="user_email" id="user_email"
                class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent"
                placeholder="Email" value="<?= $user->user_email ?>">
            <button type="submit"
                class="my-2 text-white bg-accent hover:bg-accent-dark focus:ring-4 focus:outline-none focus:ring-accent font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-accent dark:hover:bg-accent dark:focus:ring-accent">Update</button>
        </div>
    </form>
    <form action='<?= base_url('update') ?> ' id="mobile_form" class="flex flex-col space-y-2">
        <div class="">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Mobile</label>
            <input type="number" name="user_mobile" id="user_mobile"
                class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent"
                placeholder="Mobile" value="<?= $user->user_mobile ?>">
            <button type="submit"
                class="my-2 text-white bg-accent hover:bg-accent-dark focus:ring-4 focus:outline-none focus:ring-accent font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-accent dark:hover:bg-accent dark:focus:ring-accent">Update</button>
        </div>
    </form>
    <form id="password_form" class="flex flex-col space-y-2">
        <div class="flex flex-col ">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Password</label>
            <span id="error_pass" class="text-red-500">s</span>
            <input type="password" name="password" id="new_password"
                class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent"
                placeholder="New Password">
            <input type="password" name="confirm_password" id="confirm_password"
                class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent"
                placeholder="Confirm Password" onchange="checkPass(this);">
            <button type="submit"
                class="my-2 text-white bg-accent hover:bg-accent-dark focus:ring-4 focus:outline-none focus:ring-accent font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-accent dark:hover:bg-accent dark:focus:ring-accent">Update</button>
        </div>
    </form>
</div>
<script>
    function updateImage() {
        const preview = document.getElementById('preview');
        const file = document.getElementById('user_profile_pic').files[0];

        const formData = new FormData();
        formData.append('user_profile_pic', file);
        $.ajax({
            url: '<?= base_url('profile-pic/update') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                response = JSON.parse(response);
                if (response.success) {
                    // Update the image source to the new uploaded image
                    preview.src = response.image_path + '?' + new Date().getTime(); // Add timestamp to force browser cache refresh
                    alert('Profile Picture Updated!');
                } else {
                    alert(response.message);
                    console.log(response);
                }
            },
            error: function (xhr, status, error) {
                alert(error);
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function () {


    })
    function checkPass() {
        const new_pass = $('#new_password').val();
        const conf_pass = $('#confirm_password').val();
        console.log(new_pass, conf_pass);

        if (new_pass !== conf_pass) {
            console.log("Both password does not match");

            $('#error_pass').html('Both password does not match');
        } else {
            $('#error_pass').html('Password Match!');

        }
    }

</script>