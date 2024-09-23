<div>
    <h1 class="font-bold text-3xl text-accent-dark px-4 py-2">Matrimonials</h1>
    <style>
        .matri_image {
            width: 60%;
        }

        @media (min-width: 768px) {
            .matri_image {
                width: 30%;
            }
        }
    </style>
    <div class="result-list">
        <?php if (!empty($profiles)) {
            foreach ($profiles as $profile) { ?>
                <div
                    class="item-wrapper overflow-hidden my-4 mx-2 flex flex-row justify-start rounded-lg bg-accent-lightest hover:bg-accent-light transition-all">

                    <div class="image matri_image bg-cover bg-center bg-no-repeat"
                        style=" background-image:url(<?= base_url('uploads/matrimonial_img/user_images/' . $profile['images']) ?>);">
                    </div>

                    <div class="info p-2 ml-2" style="width: 70%;">

                        <div class="name">
                            <p class="font-bold text-xl">
                                <?php if (isset($profile['hide_name']) && $profile['hide_name'] == 0 && isset($profile['name']) && $profile['name'] != '') { ?>
                                    <?= $profile['name'] ?>
                                <?php } else { ?>
                                    <span class="font-light text-sm italic">
                                        < Hidden> Request to view
                                    </span>
                                <?php } ?>,
                                <span class="text-md age">
                                    <?php
                                    $date = new DateTime($profile['dob']);
                                    $now = new DateTime();
                                    $interval = $now->diff($date);
                                    echo $interval->format('%y');
                                    ?>
                                </span>
                            </p>
                        </div>
                        <div class="traits">
                            <ul class="flex items-center overflow-scroll">

                                <?php if (isset($profile['job_occupation']) && $profile['job_occupation'] != '') { ?>
                                    <li class="text-nowrap text-sm"><?= $profile['job_occupation'] ?> </li>
                                    <li class="mx-1 pb-1 text-sm"><span class="bg-accent-dark inline-block rounded-full"
                                            style="width:5px;height:5px;"></span></li>
                                <?php } ?>

                                <?php if (isset($profile['marrital_status']) && $profile['marrital_status'] != '') { ?>
                                    <li class="text-nowrap text-sm capitalize"><?= $profile['marrital_status'] ?> </li>
                                    <!-- 
                                        Single: Never married
                                        Married: Married and not separated
                                        Widowed: Widowed and not remarried
                                        Divorced: Divorced and not remarried
                                        Separated: Separated, including living common law
                                        Registered partnership: In some cases.
                                    -->
                                <?php } ?>

                            </ul>
                        </div>
                        <div class="description  text-gray-900 "
                            style="height: 100px;overflow: hidden;text-overflow: ellipsis;">
                            <p class="text-sm"><b>Height: </b><?= ($profile['height']) ?? '' ?> ft</p>
                            <p class="text-sm"><b>Qualification: </b><?= ($profile['education']) ?? '' ?></p>
                            <p class="text-sm"><b>Mother Tongue: </b><?= ($profile['mother_tongue']) ?? '' ?></p>
                            <p class="text-sm"><b>Gotra: </b><?= ($profile['gotram']) ?? '' ?></p>
                            <p class="text-sm"><b>Zodiac: </b><?= ($profile['zodiac']) ?? '' ?></p>

                        </div>
                        <div class="interaction py-2 flex flex-col lg:flex-row justify-evenly items-center">
                            <a href="<?= base_url('cw_yaris3556/admin/matrimonial/view/' . $profile['matrimonial_id']) ?>"
                                class="p-2 my-1  text-center border-accent-dark border w-full bg-gradient-to-r from-accent-dark to-accent rounded-full text-white text-sm text-nowrap px-3 py-2 send-request"><i
                                    class="fa text-secondary fa-eye pr-2"></i>View
                                Profile</a>
                            <?php if ($profile['flag_admin'] == 0) { ?>
                                <a class="p-2 m-1  text-center border-red-600 border w-full bg-gradient-to-r from-red-500 to-red-600 rounded-full text-white text-sm text-nowrap px-3 p-2 send-request"
                                    href="<?= base_url('cw_yaris3556/admin/matrimonial/profile/suspend/' . $profile['matrimonial_id']) ?>">
                                    <i class="fa fa-lock text-secondary pr-1"></i> Suspend Profile
                                </a>
                            <?php } else { ?>
                                <a class="p-1 my-1 text-center border-green-600 border w-full bg-gradient-to-r from-green-500 to-green-600 rounded-full text-white text-sm text-nowrap px-3 py-2 send-request"
                                    href="<?= base_url('cw_yaris3556/admin/matrimonial/profile/enable/' . $profile['matrimonial_id']) ?>">
                                    <i class="fa fa-lock-open text-secondary pr-2"></i> Enable Profile
                                </a>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    </div>
</div>