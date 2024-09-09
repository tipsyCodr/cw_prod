<div class="wrapper">
    <div class="user-details">
        <div class="id-card">
            <div class=" ">
                <div class="">
                    <div class="py-6 px-4 font-bold text-3xl">Community ID Card</div>
                </div>
            </div>

        </div>
        <div class="id-wrapper shadow-lg  mx-6  p-2 rounded-lg  bg-gradient-to-r from-orange-500 to-yellow-500">

            <div class="flex justify-start items-center ">
                <div class="user-img">
                    <?php if (isset($user) && !empty($user->user_profile_pic)): ?>
                        <i class="fas fa-user-circle fa-6x text-accent bg-white rounded-full"></i>
                    <?php else: ?>
                        <img src="<?= base_url('uploads/user_profiles/' . $user->user_profile_pic) ?>" alt=""
                            class="rounded-full">
                    <?php endif; ?>
                </div>
                <div class="user-info px-4">
                    <h3 class="font-black text-3xl text-white fot"><?= $user->user_name ?></h3>
                    <p class=" text-sm text-white"><i class="fa p-1.5 fa-envelope "></i> <?= $user->user_email ?></p>
                    <p class="text-sm text-white"><i class="fa p-1.5 fa-phone"></i> <?= $user->user_mobile ?></p>
                    <p class="text-sm text-white"><i class="fa p-1.5 fa-home"></i> <?= $user->user_address ?></p>
                </div>
                <!-- <div class="flex-1">
                    <a class="text-white border border-white px-2 py-1 rounded-full hover:bg-accent hover:text-white transition-colors"
                        href="#">View</a>
                </div> -->
            </div>
            <!-- <h1 class="text-white font-bold text-2xl text-center  ">Sahu Samaaj</h1> -->

        </div>


    </div>
    <div class="flyer-section ">
        <div class="py-6 px-4 font-bold text-3xl ">
            Today's Flyer
        </div>

        <div class="flyer-wrapper flex justify-center items-center  ">
            <div class="border p-2 rounded-sm w-3/4">
                <img src="<?= base_url('uploads/flyers/' . rand(1, 3) . '.jpg') ?>" alt="">
            </div>
        </div>

    </div>


    <div class="menu-options mt-4">
        <div class="flex flex-col">
            <a class="px-6 font-bold text-md py-4 border-y border-gray-200 hover:bg-gray-300 hover:text-white"
                href="#">Profile</a>
            <a class="px-6 font-bold text-md py-4 border-y border-gray-200 hover:bg-gray-300 hover:text-white"
                href="#">Settings</a>
            <a class="px-6 font-bold text-md py-4 border-y border-gray-200 hover:bg-gray-300 hover:text-white"
                href="<?= base_url('logout') ?>">Log
                Out</a>

        </div>
    </div>
</div>