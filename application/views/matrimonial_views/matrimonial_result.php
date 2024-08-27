<style>
    .sidebar {
        position: sticky;
        top: 0;
        height: 100vh;
        /* Full height */
        overflow-y: auto;
        /* Scrollable */
        background-color: #f8f9fa;
        /* Background color */
        padding: 1rem;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- In a view or controller -->
        <?php matrimonial_search_filter(); ?>

        <!-- Main content area -->
        <div class="col-md-9 col-sm-9 col-xs-12 hidden-sm hidden-xs">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="row">
                        <span class="lable-cstm-search" id="total-matches"><?= count($results['matches']) ?> Matches</span>
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
                                        data-ci-pagination-page="1" class="page-link new-class"="2"="" rel="next"><span
                                            aria-hidden="true">Next</span></a></li>
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
                                        <a href="<?=base_url()?>matromonial_profile/<?php echo $result->uid; ?>"
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
<?php
// Helper function to calculate age
function calculateAge($dob)
{
    $birthDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;
    return $age;
}
?>