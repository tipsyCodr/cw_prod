<div class="wrapper">

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
        <div class="result-wrapper">
            <div class="col-md-9 col-sm-9 col-xs-12 hidden-sm hidden-xs">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="row">
                            <span class="lable-cstm-search" id="total-matches"><?= count($results['matches']) ?>
                                Matches</span>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 hidden-sm hidden-xs">
                        <div class="demo-search pull-right">
                            <nav class="pagination-outer" aria-label="Page navigation">
                                <ul id="ajax_pagin_ul" class="pagination">

                                    <li class="page-item last_link ci-pagination-last"><a
                                            href="https://shaadi.telisahusamaj.in/search/result/22"
                                            data-ci-pagination-page="1" class="page-link new-class"="22"=""><span
                                                aria-hidden="true">First</span></a></li>

                                    <li class="page-item last_link ci-pagination-last"><a
                                            href="https://shaadi.telisahusamaj.in/search/result/22"
                                            data-ci-pagination-page="1" class="page-link new-class"="22"=""><span
                                                aria-hidden="true">Prev</span></a></li>
                                    <li class="page-item active"><a class="page-link">1</a></li>
                                    <li><a href="https://shaadi.telisahusamaj.in/search/result/2"
                                            data-ci-pagination-page="1" class="page-link new-class"="2"="">2</a></li>
                                    <li><a href="https://shaadi.telisahusamaj.in/search/result/3"
                                            data-ci-pagination-page="1" class="page-link new-class"="3"="">3</a></li>
                                    <li class="page-item last_link ci-pagination-next"><a
                                            href="https://shaadi.telisahusamaj.in/search/result/2"
                                            data-ci-pagination-page="1" class="page-link new-class"="2"=""
                                            rel="next"><span aria-hidden="true">Next</span></a></li>
                                    <li class="page-item last_link ci-pagination-last"><a
                                            href="https://shaadi.telisahusamaj.in/search/result/22"
                                            data-ci-pagination-page="1" class="page-link new-class"="22"=""><span
                                                aria-hidden="true">Last</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div id="results-container">
                    <?php
                    if (!empty($results)) {
                        foreach ($results['matches'] as $result) { ?>
                            <div class="m-b ">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">

                                        <a target="_blank"
                                            href="https://shaadi.telisahusamaj.in/search/view-profile/<?php echo $result->uid; ?>">
                                            <img src="uploads/matrimonial_img/user_images/<?php echo $result->images; ?>"
                                                class="img-responsive placeholder-img" title="<?php echo $result->user_name; ?>"
                                                alt="<?php echo $result->user_id; ?>">
                                        </a>

                                        <div class="profile-card-btn">
                                            <a href="<?= base_url() ?>matromonial_profile/<?php echo $result->uid; ?>"
                                                class="s-card-1 OpenSans-Light">View Full Profile</a>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <hr class="search-r-hr">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 margin-top-10 right-hr new-p">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Name:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold"><?php echo $result->user_name; ?></p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Age / Height:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold"><?php echo calculateAge($result->dob); ?> Years,
                                                        <?php echo $result->height; ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Religion:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold">Hindu</p>
                                                </div>
                                                <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                                        <p class="sr1 Roboto-Bold">Caste:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                        <p class="sr2 Roboto-Bold"><?php echo $result->caste; ?></p>
                                    </div> -->
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Mother Tongue:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold"><?php echo $result->mother_tongue; ?></p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Education:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold"><?php echo $result->education; ?></p>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Occupation:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold"><?php echo $result->job_occupation; ?></p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Annual Income:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold"><?php echo $result->salary; ?></p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Location:</p>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold">
                                                        <?php echo $result->user_address . ', ' . $result->user_pincode . ' ' . $result->user_city . ', ' . $result->user_state; ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <p class="sr3"><?php echo $result->description; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <p class="fs-1 text-center font-weight-bold">No Matches found</p><?php } ?>
                </div>
            </div>

        </div>
    </div>