<div class="wrapper">
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
    <a href="javascript:window.history.back()"
        class="inline-block m-4 text-white bg-accent <hover:bg-accent-dark></hover:bg-accent-dark> focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 py-2 px-4 rounded-md">
        <i class="fas fa-chevron-left"></i> Back
    </a>
    <div class="items">
        <h1 class="font-bold text-xl px-4">All Members</h1>
        <?php if (!empty($members)) {
            foreach ($members as $member) { ?>
                <div
                    class="item-wrapper overflow-hidden my-4 mx-2 flex flex-row justify-start rounded-lg bg-accent-lightest hover:bg-accent-light">

                    <div class="image matri_image bg-cover bg-center bg-no-repeat"
                        style=" background-image:url(uploads/user_profiles/<?= $member->user_profile_pic ?>);">
                    </div>

                    <div class="info p-2 ml-2" style="width: 70%;">

                        <div class="name">
                            <p class="font-bold text-xl">
                                <?= $member->user_name; ?>
                            </p>
                        </div>
                        <div class="traits">
                            <p class="text-xs text-gray-500"> Member</p>

                        </div>
                        <div class="description  text-gray-900 " style="overflow: hidden;text-overflow: ellipsis;">

                            <p class="text-xs"><b><i
                                        class="fas fa-envelope p-1 text-gray-500"></i></b><?= ($member->user_email) ?? '' ?>
                            </p>
                            <p class="text-xs"><b><i
                                        class="fas fa-phone p-1 text-gray-500"></i></b><?= ($member->user_mobile) ?? '' ?></p>

                            <p class="text-sm"><b>Address:
                                </b><?= ($member->user_address) . ', ' . $member->user_pincode . ',' . $member->user_state ?? '' ?>
                            </p>
                        </div>
                        <div class="interaction py-2  flex justify-evenly items-center">
                            <a href="tel:<?= $member->user_mobile ?>" target="_blank"
                                class="p-2 mx-2 text-center border-accent-dark border w-full bg-gradient-to-r from-accent-dark to-accent rounded-full text-white text-sm text-nowrap px-3 py-2"><i
                                    class="fa text-secondary fa-phone pr-2"></i>Call</a>
                            <a href="https://wa.me/91<?= $member->user_mobile ?>" target="_blank"
                                class="p-2 mx-2 text-center border-accent-dark border w-full bg-gradient-to-r from-green-600 to-green-400 rounded-full text-white text-sm text-nowrap px-3 py-2"><i
                                    class="fab text-white fa-whatsapp pr-2"></i> Whatsapp</a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>