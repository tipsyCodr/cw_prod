<style>
    .panel {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    #height-slider {
        margin: 20px 0;
    }

    .t-h {
        display: flex;
        justify-content: space-between;
    }

    .h1-h,
    .h2-h {
        font-size: 1rem;
    }


    .s-all,
    .clear-all {
        cursor: pointer;
    }

    .rotate-icon {
        transition: transform 0.3s ease;
    }

    .rotate-icon.rotate {
        transform: rotate(180deg);
    }
</style>
<!-- Sidebar for search filters -->
<div class="col-md-3 col-sm-3 col-xs-6 hidden-sm hidden-xs">
    <select class="form-control select-cust" style="height:35px;margin-top: 20px;width:60%;" name="search_order"
        id="search_order" onchange="change_sort()">
        <option selected="" value="latest_first" class="color-30">Latest First</option>
        <option value="latest_last" class="color-65">Oldest First</option>
        <option value="last_login_first" class="color-65">Latest Login First</option>
        <option value="last_login_last" class="color-65">Last Login First</option>
    </select>

    <div class="mt-5">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 pr-0">
                <div class="fr-main">
                    <div class="hidden-sm hidden-xs">
                        <p class="fr-cptn1 OpenSans-Regular"><i class="fas fa-sliders-h fr-slider"></i>Member
                            Filter</p>
                    </div>
                    <div class="row pt-0">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form class="light pt-0" action="https://shaadi.telisahusamaj.in/search/search_now"
                                name="keyword_search_form" id="keyword_search_form" method="post">
                                <input type="text" placeholder="Search by Keywords" required="" name="keyword" value=""
                                    id="keyword">
                                <button type="submit" class="btn btn-primary filter-btn"
                                    onclick="member_Filter()">Search <i class="fa fa-search fr-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="row margin-top-10">
                        <div class="col-md-12 col-sm-12 col-xs-12"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <hr class="fr hr3">
                        </div>
                    </div>
                    <form name="frm_filter" id="frm_filter" method="post">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <p class="fr-height fw-bold">Gender</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <p class="radio-custm">
                                    <input type="radio" id="M" onclick="member_Filter()" value="M" name="gender" <?php if($results['gender']=='M'){?>checked=""<?php }?>>
                                    <label for="M" class="lbl1">Male</label>
                                </p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <p class="radio-custm">
                                    <input type="radio" id="F" onclick="member_Filter()" value="F" name="gender"
                                    <?php if($results['gender']=='F'){?>checked=""<?php }?>>
                                    <label for="F" class="lbl1">Female</label>
                                </p>
                            </div>
                        </div>
                        <hr class="fr hr3">

                        <!--height slider range-->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p class="fr-height OpenSans-Bold">Height</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Slider container -->
                                <div id="height-slider"></div>
                                <div class="t-h">
                                    <span class="h1-h">
                                        <span id="from_height_display">4 ft</span>
                                        <input type="hidden" name="from_height" id="from_height" value="48">
                                    </span>
                                    <span class="h2-h float-end">
                                        <span id="to_height_display">7 ft</span>
                                        <input type="hidden" name="to_height" id="to_height" value="84">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr class="fr hr3">

                        <!--end range height slider-->
                        <!--age slier range-->
                        <div class="row margin-top-10">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p class="fr-height OpenSans-Bold">Age</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Slider container -->
                                <div id="age-slider"></div>
                                <div class="t-h">
                                    <span class="h1-h">
                                        <span id="from_age_display"><?=$results['from_age']?> Year</span>
                                        <input type="hidden" name="from_age" id="from_age" value="<?=$results['from_age']?>">
                                    </span>
                                    <span class="h2-h float-end">
                                        <span id="to_age_display"><?=$results['to_age']?> Year</span>
                                        <input type="hidden" name="to_age" id="to_age" value="<?=$results['to_age']?>">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr class="fr hr3">
                        <!--end range age slider-->

                        <!-- caste  -->
                        <div class="row margin-top-minus">
                            <div class="panel panel-default panel1-cstm pannel-new">
                                <div class="panel-heading panel-cstm" role="tablist">
                                    <h4 class="panel-title">
                                        <button class="btn d-flex align-items-center " type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsecaste"
                                            aria-expanded="false" aria-controls="collapsecaste">

                                            <i class="fa fa-chevron-down ms-2 rotate-icon" aria-hidden="true"></i>
                                            &nbsp;
                                            Caste
                                        </button>
                                    </h4>
                                </div>
                                <a href="javascript:void(0)" onclick="select_all_checkbox('list_disp_caste')">
                                    <span class="s-all float-end">
                                        Select All |
                                    </span>
                                </a>
                                <a href="javascript:void(0)" onclick="clear_refine('list_disp_caste');">
                                    <span class="clear-all float-end">
                                        Clear All
                                    </span>
                                </a>
                                <div id="collapsecaste" class="collapse" role="tabpanel"
                                    aria-labelledby="collapsecaste">
                                    <div class="bg-color">
                                        <div class="content" id="list_disp_caste">
                                            <div class="box">
                                                <!-- Example Checkboxes -->
                                                <?php
                                                if (!empty($castes)) {
                                                    foreach ($castes as $caste) {
                                                        ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="caste"
                                                                data-caste-id="<?= $caste->id ?>">
                                                            <label class="form-check-label" for="caste1">
                                                                <?= $caste->caste ?>
                                                            </label>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end cast  -->
                        <!-- state -->
                        <div class="row margin-top-minus">
                            <div class="panel panel-default panel1-cstm pannel-new">
                                <div class="panel-heading panel-cstm" role="tablist">
                                    <h4 class="panel-title">
                                        <button class="btn d-flex align-items-center" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseState"
                                            aria-expanded="false" aria-controls="collapseState">
                                            <i class="fa fa-chevron-down ms-2 rotate-icon" aria-hidden="true"></i>
                                            &nbsp;
                                            State
                                        </button>
                                    </h4>
                                </div>
                                <a href="javascript:void(0)" onclick="select_all_checkbox('list_disp_state')">
                                    <span class="s-all float-end">
                                        Select All |
                                    </span>
                                </a>
                                <a href="javascript:void(0)" onclick="clear_refine('list_disp_state');">
                                    <span class="clear-all float-end">
                                        Clear All
                                    </span>
                                </a>
                                <div id="collapseState" class="collapse" role="tabpanel"
                                    aria-labelledby="collapseState">
                                    <div class="bg-color overflow-auto" style="max-height:200px">
                                        <div class="position-sticky top-0">
                                            <input type="text" class="form-control search-box"
                                                placeholder="Search State"
                                                onkeyup="filterContent('list_disp_state', this.value)">
                                        </div>
                                        <div class="content list_disp_state" id="list_disp_state">
                                            <?php
                                            if (!empty($states)) {
                                                foreach ($states as $state) {
                                                    ?>
                                                    <div class="box">
                                                        <div class="form-check">
                                                            <input class="form-check-input state-checkbox" type="checkbox"
                                                                value="<?= $state->state_id ?>"
                                                                id="state<?= $state->state_id ?>"
                                                                data-state-id="<?= $state->state_id ?>" onchange=" loadCities(); member_Filter(); ">
                                                            <label class="form-check-label" for="state<?= $state->state_id ?>">
                                                                <?= $state->state ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end state -->

                        <!-- city -->
                        <div class="row margin-top-minus">
                            <div class="panel panel-default panel1-cstm pannel-new">
                                <div class="panel-heading panel-cstm" role="tablist">
                                    <h4 class="panel-title">
                                        <button class="btn d-flex align-items-center" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseCity"
                                            aria-expanded="false" aria-controls="collapseCity">
                                            <i class="fa fa-chevron-down ms-2 rotate-icon" aria-hidden="true"></i>
                                            &nbsp;
                                            City
                                        </button>
                                    </h4>
                                </div>
                                <a href="javascript:void(0)" onclick="select_all_checkbox('city_list')">
                                    <span class="s-all float-end">
                                        Select All |
                                    </span>
                                </a>
                                <a href="javascript:void(0)" onclick="clear_refine('city_list');">
                                    <span class="clear-all float-end">
                                        Clear All
                                    </span>
                                </a>
                                <div id="collapseCity" class="collapse" role="tabpanel" aria-labelledby="collapseCity">
                                    <div class="bg-color overflow-auto" style="max-height:200px">
                                        <input type="text" class="form-control search-box position-sticky top-0"
                                            id="searchCity" placeholder="Search City"
                                            onkeyup="filterContent('city_list', this.value)">
                                        <div class="content city_list" id="city_list">
                                            <p>Select State First</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end city -->

                        <!-- mother tongue -->
                        <div class="row margin-top-minus">
                            <div class="panel panel-default panel1-cstm pannel-new">
                                <div class="panel-heading panel-cstm" role="tablist">
                                    <h4 class="panel-title">
                                        <button class="btn d-flex align-items-center" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseMotherTongue"
                                            aria-expanded="false" aria-controls="collapseMotherTongue">
                                            <i class="fa fa-chevron-down ms-2 rotate-icon" aria-hidden="true"></i>
                                            &nbsp;
                                            Mother Tongue
                                        </button>
                                    </h4>
                                </div>
                                <a href="javascript:void(0)" onclick="select_all_checkbox('mothertongue_list')">
                                    <span class="s-all float-end">
                                        Select All |
                                    </span>
                                </a>
                                <a href="javascript:void(0)" onclick="clear_refine('mothertongue_list');">
                                    <span class="clear-all float-end">
                                        Clear All
                                    </span>
                                </a>
                                <div id="collapseMotherTongue" class="collapse" role="tabpanel"
                                    aria-labelledby="collapseMotherTongue">
                                    <div class="bg-color overflow-auto" style="max-height:200px;">
                                        <div class="position-sticky top-0">
                                            <input type="text" class="form-control search-box position-sticky top-0"
                                                id="searchMotherTongue" placeholder="Search Mother Tongue"
                                                onkeyup="filterContent('mothertongue_list', this.value)">
                                        </div>
                                        <div class="content mothertongue_list" id="mothertongue_list">
                                            <!-- Example Checkboxes -->
                                            <?php
                                            if (!empty($motherTongues)) {
                                                foreach ($motherTongues as $motherTongue) {
                                                    ?>
                                                    <div class="box">
                                                        <div class="form-check">
                                                            <input class="form-check-input mother-tongue-checkbox" type="checkbox" value=""
                                                                id="mother_tongue_<?= $motherTongue->mother_tongue_id ?>"
                                                                data-mother-tongue-id="<?= $motherTongue->mother_tongue_id ?>" onchange="member_Filter()">
                                                            <label class="form-check-label"
                                                                for="mother_tongue_<?= $motherTongue->mother_tongue_id ?>">
                                                                <?= $motherTongue->mother_tongue ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of mother tongue -->
                        <!-- Education -->
                        <div class="row margin-top-minus">
                            <div class="panel panel-default panel1-cstm pannel-new">
                                <div class="panel-heading panel-cstm" role="tablist">
                                    <h4 class="panel-title">
                                        <button class="btn d-flex align-items-center" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseEducation"
                                            aria-expanded="false" aria-controls="collapseEducation">
                                            <i class="fa fa-chevron-down ms-2 rotate-icon" aria-hidden="true"></i>
                                            &nbsp;
                                            Education
                                        </button>
                                    </h4>
                                </div>
                                <a href="javascript:void(0)" onclick="select_all_checkbox('education_list')">
                                    <span class="s-all float-end">
                                        Select All |
                                    </span>
                                </a>
                                <a href="javascript:void(0)" onclick="clear_refine('education_list')">
                                    <span class="clear-all float-end">
                                        Clear All
                                    </span>
                                </a>
                                <div id="collapseEducation" class="collapse" role="tabpanel"
                                    aria-labelledby="collapseEducation">
                                    <div class="bg-color overflow-auto" style="max-height: 200px;">
                                        <input type="text" class="form-control search-box position-sticky top-0"
                                            id="searchEducation" placeholder="Search Education"
                                            onkeyup="filterContent('education_list', this.value)">
                                        <div class="content education_list" id="education_list">

                                            <?php
                                            if (!empty($education)) {
                                                foreach ($education as $edu) {
                                                    ?>
                                                    <div class="box">
                                                        <div class="form-check">
                                                            <input type="checkbox" id="education_id_<?= $edu->education_id ?>"
                                                                value="<?= $edu->education_id ?>" name="education[]"
                                                                class="education-checkbox"
                                                                data-education-id="<?= $edu->education_id ?>" onchange="member_Filter()">
                                                            <label class="form-check-label"
                                                                for="education_id_<?= $edu->education_id ?>">
                                                                <?= $edu->education ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end education -->


                        <!-- annual income  --><!-- Annual Income -->
                        <div class="row margin-top-minus">
                            <div class="panel panel-default panel1-cstm pannel-new">
                                <div class="panel-heading panel-cstm" role="tablist">
                                    <h4 class="panel-title">
                                        <button class="btn d-flex align-items-center" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseIncome"
                                            aria-expanded="false" aria-controls="collapseIncome">
                                            <i class="fa fa-chevron-down ms-2 rotate-icon" aria-hidden="true"></i>
                                            &nbsp;
                                            Annual Income
                                        </button>
                                    </h4>
                                </div>
                                <a href="javascript:void(0)" onclick="select_all_checkbox('income_list')">
                                    <span class="s-all float-end">
                                        Select All |
                                    </span>
                                </a>
                                <a href="javascript:void(0)" onclick="clear_refine('income_list')">
                                    <span class="clear-all float-end">
                                        Clear All
                                    </span>
                                </a>
                                <div id="collapseIncome" class="collapse" role="tabpanel"
                                    aria-labelledby="collapseIncome">
                                    <div class="bg-color overflow-auto" style="max-height:200px">
                                        <div class="content income_list">
                                            <div class="box">
                                                <div class="form-check">

                                                    <input id="income_id_Rs10000-50000" type="checkbox"
                                                        value="Rs 10,000 - 50,000" name="income[]"
                                                        class="income-checkbox">
                                                    <label for="income_id_Rs10000-50000" class="lbl1 lbl-break">Rs
                                                        10,000 - 50,000</label>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div class="form-check">

                                                    <input id="income_id_Rs50000-100000" type="checkbox"
                                                        value="Rs 50,000 - 1,00,000" name="income[]"
                                                        class="income-checkbox">
                                                    <label for="income_id_Rs50000-100000" class="lbl1 lbl-break">Rs
                                                        50,000 - 1,00,000</label>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div class="form-check">

                                                    <input id="income_id_Rs100000-200000" type="checkbox"
                                                        value="Rs 1,00,000 - 2,00,000" name="income[]"
                                                        class="income-checkbox">
                                                    <label for="income_id_Rs100000-200000" class="lbl1 lbl-break">Rs
                                                        1,00,000 - 2,00,000</label>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div class="form-check">

                                                    <input id="income_id_Rs200000-500000" type="checkbox"
                                                        value="Rs 2,00,000 - 5,00,000" name="income[]"
                                                        class="income-checkbox">
                                                    <label for="income_id_Rs200000-500000" class="lbl1 lbl-break">Rs
                                                        2,00,000 - 5,00,000</label>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div class="form-check">

                                                    <input id="income_id_Rs500000-1000000" type="checkbox"
                                                        value="Rs 5,00,000 - 10,00,000" name="income[]"
                                                        class="income-checkbox">
                                                    <label for="income_id_Rs500000-1000000" class="lbl1 lbl-break">Rs
                                                        5,00,000 - 10,00,000</label>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div class="form-check">

                                                    <input id="income_id_Rs1000000-5000000" type="checkbox"
                                                        value="Rs 10,00,000 - 50,00,000" name="income[]"
                                                        class="income-checkbox">
                                                    <label for="income_id_Rs1000000-5000000" class="lbl1 lbl-break">Rs
                                                        10,00,000 - 50,00,000</label>
                                                </div>
                                            </div>
                                            <div class="box" style="display:none;">
                                                <div class="form-check">

                                                    <input id="income_id_Rs5000000-10000000" type="checkbox"
                                                        value="Rs 50,00,000 - 1,00,00,000" name="income[]"
                                                        class="income-checkbox">
                                                    <label for="income_id_Rs5000000-10000000" class="lbl1 lbl-break">Rs
                                                        50,00,000 - 1,00,00,000</label>
                                                </div>
                                            </div>
                                            <div class="box" style="display:none;">
                                                <div class="form-check">

                                                    <input id="income_id_AboveRs10000000" type="checkbox"
                                                        value="Above Rs 1,00,00,000" name="income[]"
                                                        class="income-checkbox">
                                                    <label for="income_id_AboveRs10000000" class="lbl1 lbl-break">Above
                                                        Rs 1,00,00,000</label>
                                                </div>
                                            </div>
                                            <div class="box" style="display:none;">
                                                <div class="form-check">
                                                    <input id="income_id_Doesnotmatter" type="checkbox"
                                                        value="Does not matter" name="income[]" class="income-checkbox">
                                                    <label for="income_id_Doesnotmatter" class="lbl1 lbl-break">Does not
                                                        matter</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Annual Income -->
                        <!-- Employee In -->
                        <div class="row margin-top-minus">
                            <div class="panel panel-default panel1-cstm pannel-new">
                                <div class="panel-heading panel-cstm" role="tablist">
                                    <h4 class="panel-title">
                                        <button class="btn d-flex align-items-center" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseEmployeeIn"
                                            aria-expanded="false" aria-controls="collapseEmployeeIn">
                                            <i class="fa fa-chevron-down ms-2 rotate-icon" aria-hidden="true"></i>
                                            &nbsp;
                                            Employee In
                                        </button>
                                    </h4>
                                </div>
                                <a href="javascript:void(0)" onclick="select_all_checkbox('employee_in_list')">
                                    <span class="s-all float-end">
                                        Select All |
                                    </span>
                                </a>
                                <a href="javascript:void(0)" onclick="clear_refine('employee_in_list')">
                                    <span class="clear-all float-end">
                                        Clear All
                                    </span>
                                </a>
                                <div id="collapseEmployeeIn" class="collapse overflow-auto" style="height: 200px;"
                                    role="tabpanel" aria-labelledby="collapseEmployeeIn">
                                    <div class="bg-color">
                                        <input type="text" id="employee_in_search"
                                            class="form-control position-sticky top-0" placeholder="Search..."
                                            onkeyup="filterContent('employee_in_list', this.value)">
                                        <div class="content employee_in_list" id="employee_in_list">
                                            <?php
                                            if (!empty($employeeIn)) {
                                                foreach ($employeeIn as $employee) {
                                                    ?>
                                                    <div class="box">
                                                        <div class="form-check">
                                                            <input id="employee_in_id_<?= $employee->employee_in_id ?>"
                                                                type="checkbox" value="<?= $employee->employee_in_id ?>"
                                                                name="employee_in[]" class="employee_in employee-in-checkbox"
                                                                data-employee-in-id="<?= $employee->employee_in_id ?>" onchange="member_Filter()">
                                                            <label class="form-check-label"
                                                                for="employee_in_id_<?= $employee->employee_in_id ?>">
                                                                <?= $employee->employee_in ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Employee In -->

                        <!-- Profile Picture -->
                        <div class="row margin-top-minus">
                            <div class="panel panel-default panel1-cstm pannel-new">
                                <div class="panel-heading panel-cstm" role="tablist" id="headingprof">
                                    <h4 class="panel-title">
                                        <button class="btn d-flex align-items-center" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseProfilePicture"
                                            aria-expanded="false" aria-controls="collapseProfilePicture">
                                            <i class="fa fa-chevron-down ms-2 rotate-icon" aria-hidden="true"></i>
                                            &nbsp;
                                            Profile Picture
                                        </button>
                                    </h4>
                                </div>
                                <a href="javascript:void(0)" onclick="select_all_checkbox('profile_picture_list')">
                                    <span class="s-all float-end">
                                        Select All |
                                    </span>
                                </a>
                                <a href="javascript:void(0)" onclick="clear_refine('profile_picture_list')">
                                    <span class="clear-all float-end">
                                        Clear All
                                    </span>
                                </a>
                                <div id="collapseProfilePicture" class="collapse" role="tabpanel"
                                    aria-labelledby="headingprof">
                                    <div class="bg-color">
                                        <div class="content profile_picture_list">
                                            <div class="box">
                                                <p class="checkbox-m">
                                                    <input id="photo_search" type="checkbox" value="photo_search"
                                                        name="photo_search" class="profile_picture" onchange="member_Filter()">
                                                    <label for="photo_search" class="lbl1 lbl-break">With
                                                        Picture</label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Profile Picture -->

                        <!-- Complexion -->
                        <div class="row margin-top-minus">
                            <div class="panel panel-default panel1-cstm pannel-new">
                                <div class="panel-heading panel-cstm" role="tablist">
                                    <h4 class="panel-title">
                                        <button class="btn d-flex align-items-center" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseComplexion"
                                            aria-expanded="false" aria-controls="collapseComplexion">
                                            <i class="fa fa-chevron-down ms-2 rotate-icon" aria-hidden="true"></i>
                                            &nbsp;
                                            Complexion
                                        </button>
                                    </h4>
                                </div>
                                <a href="javascript:void(0)" onclick="select_all_checkbox('complexion_list')">
                                    <span class="s-all float-end">
                                        Select All |
                                    </span>
                                </a>
                                <a href="javascript:void(0)" onclick="clear_refine('complexion_list')">
                                    <span class="clear-all float-end">
                                        Clear All
                                    </span>
                                </a>
                                <div id="collapseComplexion" class="collapse overflow-auto" style="max-height: 200px;"
                                    role="tabpanel" aria-labelledby="collapseComplexion">
                                    <div class="bg-color">
                                        <div class="content">
                                            <div class="box">
                                                <input type="text" id="complexion_search" class="form-control"
                                                    placeholder="Search Complexion"
                                                    onkeyup="filterContent('complexion_list', this.value)">
                                            </div>
                                            <div class="complexion_list" id="complexion_list">

                                                <?php
                                                if (!empty($complexions)) {
                                                    foreach ($complexions as $complexion) {
                                                        ?>
                                                        <div class="box">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="complexion[]" class="complexion"
                                                                    id="complexion_id_<?= $complexion->complexion_id ?>"
                                                                    value="<?= $complexion->complexion_id ?>"
                                                                    data-complexion-id="<?= $complexion->complexion_id ?>">
                                                                <label class="form-check-label"
                                                                    for="complexion_id_<?= $complexion->complexion_id ?>">
                                                                    <?= $complexion->complexion ?>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Complexion -->
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>