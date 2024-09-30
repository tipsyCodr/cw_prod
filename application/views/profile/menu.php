<div class="wrapper ">
    <label for="user_cover_pic">
        <div id="coverPreview" class="relative profile-hero flex justify-center items-center  sm:h-[55vh] h-[30vh]"
            style="background-image: url(<?= (isset($user->user_cover_pic) && !empty($user->user_cover_pic)) ? base_url('uploads/user_profiles/cover/' . $user->user_cover_pic) : base_url('assets/images/defaultCover.jpg') ?>); background-position: top; background-size:cover;">

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
                <input class="text-center hidden" type="file" name="user_profile_pic" id="user_profile_pic"
                    accept="image/*" class="" onchange="updateImage()">
            </form>

            <a href="<?= base_url('profile-pic') ?>">
                <div class="hidden"
                    style="background-image:url('<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>');background-position: top; background-size:cover;margin-left: auto; margin-right: auto; left: 0; right: 0;">
                </div>
            </a>
            <input class="hidden" type="file" accept="image/*" name="user_cover_pic" id="user_cover_pic"
                onchange="updateCoverImage()">

        </div>
    </label>

    <div class="user-details mt-32">

        <div class="details text-center">
            <h1 class="text-black font-bold text-xl flex justify-center items-center">
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
                            <div class="py-6 px-4 font-bold  sm:text-justify text-center text-2xl">Community ID Card
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
                <div class="flyer-section " style="max-width:722px;">

                    <div class="pt-6 px-4 font-bold text-2xl sm:text-justify text-center     ">
                        Today's Flyer
                    </div>
                    <?php $flyer = rand(1, 13); ?>

                    <!-- test -->
                    <div class="flyer-wrapper  py-2 ">
                        <div class="button">
                            <button
                                class="my-4 block text-center text-white p-2 border-accent-dark border w-full bg-gradient-to-r from-secondary to-orange-500 rounded-full"
                                type="button" onclick="saveAsImage()"><i class="fas fa-file-download px-2"></i> Download
                                & Share
                            </button>
                        </div>
                        <div id="capture" style="min-width: 400 px;">
                            <div class="relative border rounded-sm overflow-hidden "
                                style="min-height:40px; width: 100%;backaground-image: url(<?= base_url('uploads/flyers/' . $flyer . '.jpg') ?>);background-size: contain ;background-repeat: no-repeat; background-position: center">
                                <img src="<?= base_url('uploads/flyers/' . $flyer . '.jpg') ?>" alt="">
                                <!-- Slider main container -->
                                <div class="mt-[-94px]">
                                    <div class="swiper bottombarSlider  ">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper h-[6.5rem]">
                                            <!-- Slides -->
                                            <div class="swiper-slide">
                                                <div class=" one-line-thin full-width ">
                                                    <div class=" footer">
                                                        <div id=""
                                                            class="bottom-bar  pr-2 mt-[4.7rem] bg-blue-500 flex justify-between items-center gap-2 w-full  rounded-t">
                                                            <div class="">
                                                                <img class="mt-[-31px] object-cover rounded-full w-[70px] h-[60px] border-4"
                                                                    src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>"
                                                                    alt="">
                                                            </div>

                                                            <div
                                                                class="flex gap-2 flex-nowrap justify-between items-center w-full">
                                                                <p
                                                                    class="text-nowrap flyer-text text-white text-sm font-bold ">
                                                                    <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                                                                </p>
                                                                <div class="flex gap-4 flex-nowrap">
                                                                    <!-- <p
                                                                        class="text-nowrap flyer-text text-white text-left text-xs scale-90 sm:scale-100">
                                                                        <i class="fa  fa-at "></i> Member
                                                                    </p> -->
                                                                    <p
                                                                        class="text-nowrap flyer-text text-white text-left text-xs scale-90 sm:scale-100">
                                                                        <i class="fa  fa-envelope "></i>
                                                                        <?= isset($user) && is_object($user) ? $user->user_email : '' ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="swiper-slide">
                                                <div class="left-half-two-line ">
                                                    <div class=" absolute bottom-0 footer pt-2 ">
                                                        <div id=""
                                                            class="bottom-bar pb-3 px-4 mt-3 bg-blue-500 flex flex-row items-center gap-2 w-fit  rounded-t">
                                                            <img class="mt-[-31px] object-cover rounded-full w-20 h-20 border-4"
                                                                src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>"
                                                                alt="">
                                                            <div class=" flex flex-col ">
                                                                <p class="flyer-text text-white text-lg font-bold ">
                                                                    <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                                                                </p>

                                                                <div class="flex gap-2">
                                                                    <p class="flyer-text text-white text-left text-xs">
                                                                        <i class="fa  fa-at "></i> Member
                                                                    </p>
                                                                    <p class="flyer-text text-white text-left text-xs">
                                                                        <i class="fa  fa-envelope "></i>
                                                                        <?= isset($user) && is_object($user) ? $user->user_email : '' ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class=" right-half-two-line ">
                                                    <div class="  absolute bottom-0 footer pt-2 right-0">
                                                        <div id=" " class="bottom-bar flex flex-row-reverse items-center gap-2 w-fit pb-3 px-4
                                                            mt-3 bg-blue-500 rounded-t">
                                                            <img class="mt-[-31px] object-cover rounded-full w-20
                                                                h-20 border-4"
                                                                src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>"
                                                                alt="">
                                                            <div class=" flex flex-col ">
                                                                <p class="flyer-text text-white text-lg font-bold ">
                                                                    <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                                                                </p>

                                                                <div class="flex gap-2">
                                                                    <p class="flyer-text text-white text-left text-xs">
                                                                        <i class="fa  fa-at "></i> Member
                                                                    </p>
                                                                    <p class="flyer-text text-white text-left text-xs">
                                                                        <i class="fa  fa-envelope "></i>
                                                                        <?= isset($user) && is_object($user) ? $user->user_email : '' ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide ">
                                                <div class=" left-half-three-line ">
                                                    <div class=" absolute bottom-0 footer ">
                                                        <div id=""
                                                            class="bottom-bar  mt-7 px-4 bg-blue-500 flex flex-row items-center gap-2 w-fit ">
                                                            <img class="object-cover rounded-full w-14 h-14 border-4"
                                                                src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>"
                                                                alt="">
                                                            <div class=" flex flex-col ">
                                                                <p class="flyer-text text-white text-sm font-bold ">
                                                                    <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                                                                </p>

                                                                <p class="flyer-text text-white text-left text-xs"><i
                                                                        class="fa  fa-at "></i> Member</p>
                                                                <p class="flyer-text text-white text-left text-xs">
                                                                    <i class="fa  fa-envelope "></i>
                                                                    <?= isset($user) && is_object($user) ? $user->user_email : '' ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide ">
                                                <div class=" right-half-three-line ">
                                                    <div class=" absolute bottom-0 right-0 footer pt-1 ">
                                                        <div id=" " class=" px-4 bg-blue-500 flex flex-row-reverse
                                                        items-center bottom-bar mt-7 gap-2 w-fit ">
                                                            <img class=" object-cover rounded-full w-14 h-14 border-4"
                                                                src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>"
                                                                alt="">
                                                            <div class=" flex flex-col ">
                                                                <p
                                                                    class="flyer-text text-right  text-white text-sm font-bold ">
                                                                    <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                                                                </p>

                                                                <p class="flyer-text text-right text-white  text-xs">
                                                                    Member <i class="fa  fa-at "></i></p>
                                                                <p class="flyer-text text-right text-white  text-xs">
                                                                    <?= isset($user) && is_object($user) ? $user->user_email : '' ?>
                                                                    <i class="fa  fa-envelope "></i>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class=" full-three-line-left ">
                                                    <div class="absolute bottom-0 footer  pt-1">
                                                        <div id=""
                                                            class="bottom-bar px-4 mt-7 bg-blue-500 flex flex-row items-center gap-2 w-full ">
                                                            <img class="object-cover rounded-full w-14 h-14  border-4"
                                                                src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>"
                                                                alt="">
                                                            <div class=" flex flex-col ">
                                                                <p class="flyer-text text-white text-sm font-bold ">
                                                                    <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                                                                </p>

                                                                <p class="flyer-text text-white text-left text-xs"><i
                                                                        class="fa  fa-at "></i> Member</p>
                                                                <p class="flyer-text text-white text-left text-xs">
                                                                    <i class="fa  fa-envelope "></i>
                                                                    <?= isset($user) && is_object($user) ? $user->user_email : '' ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class=" full-three-line-reverse ">
                                                    <div class="absolute bottom-0 footer pt-2 ">
                                                        <div id=""
                                                            class="bottom-bar mt-7 px-4 bg-blue-500 flex flex-row-reverse items-center gap-2 w-full ">
                                                            <img class="object-cover rounded-full w-14 h-14 border-4"
                                                                src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>"
                                                                alt="">
                                                            <div class=" flex flex-col ">
                                                                <p class="flyer-text text-white text-sm font-bold ">
                                                                    <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                                                                </p>

                                                                <p class="flyer-text text-white text-left text-xs"><i
                                                                        class="fa  fa-at "></i> Member</p>
                                                                <p class="flyer-text text-white text-left text-xs">
                                                                    <i class="fa  fa-envelope "></i>
                                                                    <?= isset($user) && is_object($user) ? $user->user_email : '' ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="flex justify-between p-2 text-white">
                            <div class="bottom-prev p-2 rounded-full bg-accent px-2 py-2">Previous Design</div>
                            <div class="bottom-next p-2 rounded-full bg-accent px-3 py-2">Next Design</div>
                        </div>
                        <button
                            class=" my-4 block text-center text-white p-2 border-accent-dark border w-full bg-gradient-to-r from-secondary to-orange-500 rounded-full"
                            type="button" onclick="location.reload()"><i class="fas fa-arrows-rotate px-2"></i>New
                            Image
                        </button>
                        <div class="flex justify-evenly">

                            <input type="color" name="back-color" id="bg-color-picker" class="hidden" value="#fdba8c"
                                onchange="colorPicker()">
                            <label for="bg-color-picker"
                                class="block px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                                Background Color
                            </label>
                            <input type="color" name="back-color" id="name-color-picker" class="hidden" value="#000000"
                                onchange="nameColorPicker()">
                            <label for="name-color-picker"
                                class="block px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                                Name Color
                            </label>
                        </div>
                    </div>
                    <!-- test -->


                    <div class="hidden flyer-wrapper  p-2 ">
                        <div class="button">
                            <button
                                class="my-4 block text-center text-white p-2 border-accent-dark border w-full bg-gradient-to-r from-secondary to-orange-500 rounded-full"
                                type="button" onclick="saveAsImage()"><i class="fas fa-file-download px-2"></i> Download
                                & Share
                            </button>
                        </div>
                        <div id="capture">
                            <div class="relative border rounded-sm overflow-hidden "
                                style="min-height:40px; width: 100%;backaground-image: url(<?= base_url('uploads/flyers/' . $flyer . '.jpg') ?>);background-size: contain ;background-repeat: no-repeat; background-position: center">
                                <img src="<?= base_url('uploads/flyers/' . $flyer . '.jpg') ?>" alt="">
                                <div id="bottom-bar"
                                    class="bottom-bar bg-orange-300 h-12 shadow absolute bottom-0 left-0 rounded-tr-xl pr-4">
                                    <div class="flex justify-between text-black">
                                        <div class=" mt-[-36px]  rounded-full px-2">
                                            <img class="object-cover rounded-full w-20 h-20 border-4"
                                                src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>"
                                                alt="">
                                        </div>
                                        <div class=" flex flex-col ">
                                            <p class="flyer-text text-md font-bold ">
                                                <?= isset($user) && is_object($user) ? $user->user_name : '' ?>
                                            </p>
                                            <p class="flyer-text text-left text-xs">Member</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button
                            class=" my-4 block text-center text-white p-2 border-accent-dark border w-full bg-gradient-to-r from-secondary to-orange-500 rounded-full"
                            type="button" onclick="location.reload()"><i class="fas fa-arrows-rotate px-2"></i>New
                            Image
                        </button>
                        <div class="flex justify-evenly">

                            <input type="color" name="back-color" id="bg-color-picker" class="hidden" value="#fdba8c"
                                onchange="colorPicker()">
                            <label for="bg-color-picker"
                                class="block px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                                Background Color
                            </label>
                            <input type="color" name="back-color" id="name-color-picker" class="hidden" value="#000000"
                                onchange="nameColorPicker()">
                            <label for="name-color-picker"
                                class="block px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                                Name Color
                            </label>
                        </div>
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
                    href="<?= base_url('profile-pic') ?>"><i class="fa fa-edit  p-2"></i>Profile Setting</a>
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
                    location.reload();
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
    function updateCoverImage() {
        const preview = document.getElementById('coverPreview');
        const file = document.getElementById('user_cover_pic').files[0];

        const formData = new FormData();
        formData.append('user_cover_pic', file);
        $.ajax({
            url: '<?= base_url('cover-pic/update') ?>',
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
                    preview.style.backgroundImage = 'url("' + response.image_path + '?' + new Date().getTime() + '")'; // Add timestamp to force browser cache refresh
                    alert('Cover Picture Updated!');
                    location.reload();
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
        html2canvas(findEl, { scale: 3 }).then((canvas) => {
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
    function colorPicker() {
        const colorPicker = document.getElementById('bg-color-picker');
        const bottomBar = document.querySelectorAll('.bottom-bar');
        const chosenColor = colorPicker.value;
        bottomBar.forEach(bar => bar.style.backgroundColor = chosenColor);
    }
    function nameColorPicker() {
        const colorPicker = document.getElementById('name-color-picker');
        const texts = document.querySelectorAll('.flyer-text');
        const chosenColor = colorPicker.value;
        texts.forEach(text => text.style.color = chosenColor);
    }
</script>