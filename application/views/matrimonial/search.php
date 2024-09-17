<div class="wrapper py-5">

    <div class="filter-wrapper hidden">
        <p class="font-bold text-xl text-center py-4">Looking For</p>
        <div class="flex justify-center items-center mb-4">
            <div class="text-gray-700 mr-4">
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio" name="looking" value="G" checked>
                    <span class="ml-2">Groom</span>
                </label>
                <label class="inline-flex items-center ml-6">
                    <input type="radio" class="form-radio" name="looking" value="B">
                    <span class="ml-2">Bride</span>
                </label>
            </div>
        </div>

        <!-- height wrapper -->
        <div class="sm:flex sm:flex-row block sm:justify-center">
            <div class="flex items-center mb-4 justify-center">
                <div class="text-gray-700 mr-4">
                    <p class="font-bold text-xl">
                        Height
                    </p>
                    <div class="mt-2 ">
                        <label for="min-height-slider"> Min.Height</label>
                        <div class="flex items-center">
                            <input type="range" id="min-height-slider" name="min_height" min="48" max="84" value="48"
                                class="w-full"
                                onchange="document.getElementById('min-height-slider-value').innerHTML=this.value" /><span
                                class="ml-2" id="min-height-slider-value">48</span>
                        </div>
                        <label for="max-height-slider"> Max. Height</label>
                        <div class="flex items-center">
                            <input type="range" id="max-height-slider" name="max_height" min="48" max="84" value="84"
                                class="w-full"
                                onchange="document.getElementById('max-height-slider-value').innerHTML=this.value" />
                            <span class="ml-2" id="max-height-slider-value">84</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- height wrapper -->

            <!-- age wrapper -->
            <div class="flex items-center mb-4 justify-center">
                <div class="text-gray-700 mr-4">
                    <p class="font-bold text-xl">
                        Age
                    </p>
                    <div class="mt-2 ">
                        <label for="min-age-slider"> Min.Age</label>
                        <div class="flex items-center">
                            <input type="range" id="min-age-slider" name="min_age" min="48" max="84" value="48"
                                class="w-full"
                                onchange="document.getElementById('min-age-slider-value').innerHTML=this.value" /><span
                                class="ml-2" id="min-age-slider-value">48</span>
                        </div>
                        <label for="max-age-slider"> Max. Age</label>
                        <div class="flex items-center">
                            <input type="range" id="max-age-slider" name="max_age" min="48" max="84" value="84"
                                class="w-full"
                                onchange="document.getElementById('max-age-slider-value').innerHTML=this.value" />
                            <span class="ml-2" id="max-age-slider-value">84</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- age wrapper -->
        <div class="container mx-auto px-4 py-6">
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="text-gray-700">
                    <p class="font-bold text-xl">Caste</p>
                    <div class="mt-2">
                        <input type="text" name="caste" placeholder="Search by caste"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" />
                    </div>
                </div>
                <div class="text-gray-700">
                    <p class="font-bold text-xl">State</p>
                    <div class="mt-2">
                        <input type="text" name="state" placeholder="Search by state"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" />
                    </div>
                </div>
                <div class="text-gray-700">
                    <p class="font-bold text-xl">City</p>
                    <div class="mt-2">
                        <input type="text" name="city" placeholder="Search by city"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" />
                    </div>
                </div>
                <div class="text-gray-700">
                    <p class="font-bold text-xl">Mother Tongue</p>
                    <div class="mt-2">
                        <input type="text" name="mother_tongue" placeholder="Search by mother tongue"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" />
                    </div>
                </div>
                <div class="text-gray-700">
                    <p class="font-bold text-xl">Education</p>
                    <div class="mt-2">
                        <input type="text" name="education" placeholder="Search by education"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" />
                    </div>
                </div>
                <div class="text-gray-700">
                    <p class="font-bold text-xl">Annual Income</p>
                    <div class="mt-2 flex flex-col gap-2 sm:flex-row sm:gap-4">
                        <input type="number" name="income_from" placeholder="from"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" />
                        <input type="number" name="income_to" placeholder="to"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" />
                    </div>
                </div>
                <div class="text-gray-700">
                    <p class="font-bold text-xl">Occupation</p>
                    <div class="mt-2">
                        <input type="text" name="occupation" placeholder="Search by occupation"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" />
                    </div>
                </div>
                <div class="text-gray-700">
                    <p class="font-bold text-xl">Profile Picture</p>
                    <div class="mt-2">
                        <input type="checkbox" name="profile_picture"
                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded" />
                    </div>
                </div>
                <div class="text-gray-700">
                    <p class="font-bold text-xl">Complexion</p>
                    <div class="mt-2">
                        <input type="text" name="complexion" placeholder="Search by complexion"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="result-wrapper px-2 ">
        <a href="javascript:window.history.back()"
            class="text-white bg-accent <hover:bg-accent-dark></hover:bg-accent-dark> focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 py-2 px-4 rounded-md">
            <i class="fas fa-chevron-left"></i> Back
        </a>
        <div class="result-count font-black text-lg my-4">
            <p class="" style="color:#f92f60">(<?= count($profiles) ?>) Profile Matched 💞</p>
        </div>
        <hr>
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
                        class="item-wrapper overflow-hidden my-4 mx-2 flex flex-row justify-start rounded-lg bg-accent-lightest hover:bg-accent-light">

                        <div class="image matri_image bg-cover bg-center bg-no-repeat"
                            style=" background-image:url(uploads/matrimonial_img/user_images/<?= $profile['images'] ?>);">
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
                            <div class="interaction py-2  flex justify-evenly items-center">
                                <a href="#"
                                    class="p-2 text-center border-accent-dark border w-full bg-gradient-to-r from-accent-dark to-accent rounded-full text-white text-sm text-nowrap px-3 py-2"><i
                                        class="fa text-secondary fa-bell pr-2"></i>Send
                                    Request</a>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>

        </div>