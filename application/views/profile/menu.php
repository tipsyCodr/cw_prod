<div class="wrapper ">
    <div class="relative profile-hero flex justify-center items-center  sm:h-[55vh] h-[30vh]"
        style="background-image: url(<?= base_url('uploads/user_profiles/cover/rahul.jpg') ?>); background-position: top; background-size:cover;">

        <form id="profile_pic_form">
            <label for="user_profile_pic">
                <div class="flex flex-col items-center w-full m-2">
                    <?php if (isset($user->user_profile_pic) && !empty($user->user_profile_pic)) { ?>
                        <img id='preview'
                            class="border-4 object-cover border-white  shadow-lg rounded-full w-[200px] h-[200px]  absolute bottom-[-100px]"
                            src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>" alt="">
                    <?php } else { ?>
                        <i class="fas fa-user-circle fa-8x text-accent"></i>
                    <?php } ?>
                </div>
            </label>
            <input class="text-center hidden" type="file" name="user_profile_pic" id="user_profile_pic" accept="image/*"
                class="" onchange="updateImage()">
        </form>

        <a href="<?= base_url('profile-pic') ?>">
            <div class="hidden"
                style="background-image:url('<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>');background-position: top; background-size:cover;margin-left: auto; margin-right: auto; left: 0; right: 0;">
            </div>
        </a>

    </div>


    <div class="user-details mt-32">

        <div class="details text-center">
            <h1 class="text-black font-bold text-3xl flex justify-center items-center">
                <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                <?php if ($user->user_verified_status == 1) { ?>
                    <i class="my-auto i-[mage--verified-check-fill] text-badgeColor m-1"></i>
                <?php } ?>
            </h1>
            <p>@Member</p>
        </div>

        <div class="sm:flex block justify-center pt-5 border-top border-gray-600 ">

            <div class="">
                <div class="id-card">
                    <div class=" ">
                        <div class="">
                            <div class="py-6 px-4 font-bold  sm:text-justify text-center text-3xl">Community ID Card
                            </div>
                        </div>
                    </div>
                </div>
                <div class="id-wrapper rounded shadow-lg" style="min-width: 376px; min-height:213px;max-width:722px">
                    <div class="flex p-2 flex-col w-full justify-start items-center rounded-lg border ">
                        <div
                            class=" p-2 flex logo items-center bg-gradient-to-r from-orange-500 to-yellow-500 rounded-t">
                            <img class="img-fluid" src="<?= base_url('assets/images/logo.png') ?>" style="width: 25%;"
                                alt="">
                            <div class="px-4">
                                <p class="font-black text-2xl text-white uppercase  ">Aghariya Samaj</p>
                                <!-- <hr> -->
                                <!-- <p class="font-thin text-2xl text-white">Address: Bhilai</p> -->
                            </div>
                        </div>
                        <div class="grid grid-cols-5 gap-4 w-full bg-white p-2">
                            <div class="qr-code flex  items-center justify-center col-span-1">
                                <img style="width: 70px;"
                                    src="<?= base_url('assets/images/user_profile/main_site.png') ?>" alt="">
                            </div>
                            <div class="user-info px-0 col-span-2">
                                <h3 class="font-black text-md text-nowrap">
                                    <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                                </h3>
                                <p class=" text-sm text-nowrap"><i class="fa p-1.5 fa-envelope "></i>
                                    <?= isset($user) && isset($user->user_email) ? $user->user_email : '' ?>
                                </p>
                                <p class="text-sm "><i class="fa p-1.5 fa-phone"></i>
                                    <?= isset($user) && isset($user->user_mobile) ? $user->user_mobile : '<a href="#add-number">< Add Number ></a>' ?>
                                </p>
                                <p class="text-sm "><i class="fa p-1.5 fa-home"></i>
                                    <?= isset($user) && isset($user->user_address) ? $user->user_address : '<a href="#add-number">< Add Address ></a>' ?>
                                </p>
                            </div>
                            <div class="p-2 user-img mt-[-50px] flex justify-end col-span-2">
                                <a href="<?= base_url('profile-pic') ?>" class="">
                                    <?php if (isset($user) && empty($user->user_profile_pic)): ?>
                                        <i class="fas fa-user-circle fa-4x text-accent bg-white rounded-full"></i>
                                    <?php elseif (isset($user->user_profile_pic) && !empty($user->user_profile_pic)): ?>
                                        <img src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>"
                                            alt="" class="object-cover rounded-full w-[70px] h-[70px]">
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flyer-section " style="min-width: 376px; min-height:213px;max-width:722px;">
                    <div class="py-6 px-4 font-bold text-3xl sm:text-justify text-center     ">
                        Today's Flyer
                    </div>
                    <?php
                    $flyer = rand(1, 13);

                    ?>
                    <div class="flyer-wrapper  p-2 ">
                        <div class="button">
                            <button
                                class=" block text-center text-white p-2 border-accent-dark border w-full bg-gradient-to-r from-secondary to-orange-500 rounded-full"
                                type="button" onclick="saveAsImage()"><i class="fas fa-file-download px-2"></i> Download
                                & Share
                            </button>
                        </div>


                        <div id="capture">
                            <div class="relative border rounded-sm overflow-hidden "
                                style="min-height:40px; width: 100%;backaground-image: url(<?= base_url('uploads/flyers/' . $flyer . '.jpg') ?>);background-size: contain ;background-repeat: no-repeat; background-position: center">
                                <img src="<?= base_url('uploads/flyers/' . $flyer . '.jpg') ?>" alt="">
                                <div
                                    class="bottom-bar bg-orange-300 h-12 shadow absolute bottom-0 left-0 rounded-tr-xl pr-4">
                                    <div class="flex justify-between text-black">
                                        <div class=" mt-[-36px]  rounded-full px-2">
                                            <img class="object-cover rounded-full w-20 h-20 border-4"
                                                src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>"
                                                alt="">
                                        </div>
                                        <div class=" flex flex-col ">
                                            <p class="text-md font-bold ">
                                                <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                                            </p>
                                            <p class="text-left text-xs">Member</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button
                            class=" block text-center text-white p-2 border-accent-dark border w-full bg-gradient-to-r from-secondary to-orange-500 rounded-full"
                            type="button" onclick="location.reload()"><i class="fas fa-arrows-rotate px-2"></i>New
                            Image
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <div class="menu-options ml-0 sm:ml-10  ">
            <div class="py-6 px-4 font-bold text-3xl sm:text-justify text-center">
                <h2>Options</h2>
            </div>
            <div class="flex flex-col bg-transparent sm:bg-white rounded-lg">
                <a class=" px-6 font-bold text-md py-4 border-y border-gray-200 hover:bg-accent hover:text-white "
                    href="<?= base_url('social/members') ?>"><i class="fa fa-users  p-1"></i> All
                    Members</a>
                <?php if (isset($_SESSION['verified']) && $_SESSION['verified'] == 0) { ?>
                    <a class="px-6 font-bold text-md py-4 border-y border-gray-200 hover:bg-accent hover:text-white"
                        href="<?= base_url('membership') ?>"> <i class="fa fa-user  p-1"></i> Complete Your Profile
                        (CYP)
                    </a>
                <?php } ?>
                <a class="px-6 font-bold text-md py-4 border-y border-gray-200 hover:bg-accent hover:text-white"
                    href="<?= base_url('matrimonial/requests/get') ?>"><i class="fa fa-eye p-1"> </i> Profile View
                    Requests</a>
                <a class="px-6 font-bold text-md py-4 border-y border-gray-200 hover:bg-accent hover:text-white"
                    href="<?= base_url('profile-pic') ?>"><i class="fa fa-edit  p-2"></i>Update Profile</a>
                <a class="px-6 font-bold text-md py-4 border-y border-gray-200 hover:bg-accent hover:text-white"
                    href="#"><i class="fa fa-cog  p-2"></i>Settings</a>
                <a class="px-6 font-bold text-md py-4 border-y border-gray-200 hover:bg-accent hover:text-white"
                    href="<?= base_url('logout') ?>"> <i class="fa fa-sign-out  p-2"></i> Log
                    Out</a>
            </div>
        </div>
    </div>
</div>
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
            headers: {
                'Cache-Control': 'no-cache'
            },
            success: function (response) {
                console.log(response);
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



    function saveAsImage() {
        const findEl = document.getElementById('capture');

        // Ensure html2canvas is loaded correctly
        if (typeof html2canvas !== 'function') {
            console.error('html2canvas is not defined correctly.');
            return;
        }

        // Capture the element as an image
        html2canvas(findEl, { scale: 2 }).then((canvas) => {
            const link = document.createElement('a');
            document.body.appendChild(link);
            const today = new Date();
            const dateStr = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
            link.download = `flyer-${dateStr}.jpg`;
            link.href = canvas.toDataURL();
            link.click();
            link.remove();
        }).catch((error) => {
            console.error('Error capturing image:', error);
        });
    }
</script>