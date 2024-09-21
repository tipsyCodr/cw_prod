<div>
    <h1 class="font-bold text-3xl text-accent-dark px-4 py-2">Users</h1>
    <div class="wrapper">
        <?php foreach ($users as $user) { ?>
            <div
                class="item-wrapper overflow-hidden my-4 mx-2 flex flex-row justify-start rounded-lg bg-accent-lightest hover:bg-accent-light hover:-translate-y-1  transition-all">
                <?php if ($user->user_profile_pic) { ?>
                    <div class="image matri_image bg-cover bg-center bg-no-repeat"
                        style=" width: 30%;background-image:url(uploads/user_profiles/<?= $user->user_profile_pic ?>);">
                    </div>
                <?php } else { ?>
                    <div class="image matri_image flex justify-center items-center bg-gray-300 bg-cover bg-center bg-no-repeat"
                        style="width: 30%;">
                        <i class="fa fa-users fa-3x text-gray-500 "></i>
                    </div>
                <?php } ?>
                <div class="info p-2 ml-2" style="width: 70%;">

                    <div class="name">
                        <p class="font-bold text-xl">
                            <?= $user->user_name; ?>
                        </p>
                    </div>
                    <div class="traits">
                        <p class="text-sm"><b><i
                                    class="fa fa-envelope p-1 text-gray-500"></i></b><?= ($user->user_email) ?? '' ?>
                        </p>
                    </div>
                    <div class="description  text-gray-900 " style="overflow: hidden;text-overflow: ellipsis;">
                        <p class=" text-sm ">
                            <i><i class="fas fa-user-check p-1 text-gray-500"></i></i> Verified Member:<span
                                class="font-bold text-<?= ($user->user_verified_status == 0) ? 'red-600' : 'green-600'; ?>">
                                <?= ($user->user_verified_status == 0) ? 'No' : 'Yes'; ?></span>
                        </p>
                        <?php if (!empty($user->user_mobile)) { ?>
                            <p class="text-xs"><b><i class="fas fa-phone p-1 text-gray-500"></i></b> +91
                                <?= $user->user_mobile ?>
                            </p>
                        <?php } ?>
                    </div>
                    <!-- <div class="interaction py-2  flex justify-evenly items-center">
                        <a href="#" target="_blank"
                            class="p-2 mx-2 text-center border-accent-dark border w-full bg-gradient-to-r from-green-600 to-green-400 rounded-full text-white text-sm text-nowrap px-3 py-2"><i
                                class="fa text-white fa-check pr-2"></i>Approve</a>
                        <a href="#" target="_blank"
                            class="p-2 mx-2 text-center border-accent-dark border w-full bg-gradient-to-r from-red-600 to-red-400 rounded-full text-white text-sm text-nowrap px-3 py-2"><i
                                class="fa text-white fa-times  pr-2"></i> Reject</a>

                    </div> -->
                </div>
            </div>
        <?php } ?>
    </div>
</div>