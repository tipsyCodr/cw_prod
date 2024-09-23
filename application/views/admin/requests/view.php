<div class="wrapper">
    <?php if (isset($verifications) && !empty($verifications)) { ?>
        <?php foreach ($verifications as $verification) { ?>

            <div
                class="item-wrapper overflow-hidden my-4 mx-2 flex flex-row justify-start rounded-lg bg-accent-lightest hover:bg-accent-light">

                <div class="image matri_image bg-cover bg-center bg-no-repeat"
                    style=" width: 30%;background-image:url(uploads/selfie/<?= $verification->selfie ?>);">
                </div>

                <div class="info p-2 ml-2" style="width: 70%;">

                    <div class="name">
                        <p class="font-bold text-xl">
                            <?= $verification->user_name; ?>
                        </p>
                    </div>
                    <div class="traits">
                        <p class="font-semibold text-md"><b>Verification: </b><?= ($verification->status) ?? '' ?>

                    </div>
                    <div class="description  text-gray-900 " style="overflow: hidden;text-overflow: ellipsis;">

                        <p class="font-semibold text-sm">Gotra: <?= ucwords($verification->gotra); ?> </p>
                        </p>
                        <p class="text-xs"><b><i
                                    class="fas fa-phone p-1 text-gray-500"></i></b><?= ($verification->user_mobile) ?? '' ?></p>

                    </div>
                    <div class="interaction py-2  flex justify-evenly items-center">
                        <a href="<?= base_url('cw_yaris3556/admin/requests/approve/' . $verification->id) ?>"
                            class="p-2 mx-2 text-center border-accent-dark border w-full bg-gradient-to-r from-green-600 to-green-400 rounded-full text-white text-sm text-nowrap px-3 py-2"><i
                                class="fa text-white fa-check pr-2"></i>Approve</a>
                        <a href="<?= base_url('cw_yaris3556/admin/requests/reject/' . $verification->id) ?>"
                            class="p-2 mx-2 text-center border-accent-dark border w-full bg-gradient-to-r from-red-600 to-red-400 rounded-full text-white text-sm text-nowrap px-3 py-2"><i
                                class="fa text-white fa-times  pr-2"></i> Reject</a>

                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="flex justify-center items-center">
            <p class="font-bold text-gray-500  p-6">No Requests Found</p>
        </div>
    <?php } ?>
</div>