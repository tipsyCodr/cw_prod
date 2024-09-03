<style>
    /* grid styling  */
    .wrapper {
        height: 100vh;
        display: flex;
        flex-direction: row;
    }

    .stick-left {
        position: relative;
    }

    .side-bar {
        width: 30%;
        height: 85vh;
        /* box-shadow: 2px 7px 6px 0px #ede5e5; */
        border-right: .5px solid #efefef;

    }

    .main {
        width: 70%;
        border-right: .5px solid #efefef;

    }

    .right {
        padding: 0 10px;
    }

    /* grid styling  */



    /* menu list styling */
    .side-bar ul li,
    .side-bar ul {
        padding: 10px 20px;

        margin-top: 10px;
        border-radius: 30px;
        color: black;

    }

    .side-bar ul li .fas {
        margin-right: 20px;
    }

    .side-bar ul li:hover {
        background-color: #efefef;
        cursor: pointer;
    }

    .side-bar ul li a {
        color: black;
        text-decoration: none;
    }

    .side-bar ul li.active,
    .side-bar ul li.active a {
        background-color: black;
        font-weight: 900;
        color: white;
    }

    /* menu list styling */

    /* popup styling */
    .popup-overlay::before {
        content: ' ';
        opacity: 0.5;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: #fff;
        z-index: 1010;
    }

    .popup-box {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        z-index: 1022;
        width: 500px;
        height: 70vh;
        max-height: 600px;
        box-shadow: 1px 1px 10px #000;
        border-radius: 20px;
    }

    /* popup styling */

    .footer,
    .copyright {
        display: none;
    }

    /* for tablet and mobile */
    @media (max-width: 992px) {
        .side-bar {
            display: none;
        }

        .main {
            width: 100%;
        }
    }

    /* for tablet and mobile */
</style>

<div class="wrapper d-flex flex-row">
    <div class="side-bar left sticky-left">

        <ul class="list menu-list">
            <li class="list-group-item align-items-center active d-flex align-items-center "
                onclick="location.href='<?= base_url('blog') ?>';">
                <div class="d-flex align-items-center">
                    <i class="fas fa-2x fa-fire-alt text-danger mr-2"></i>
                    <a class="" href="#">
                        Trending
                    </a>
                </div>
            </li>
            <li class="list-group-item d-flex align-items-center" onclick="location.href='<?= base_url('login') ?>';">
                <div class="d-flex align-items-center">
                    <i class="fas fa-2x fa-envelope text-info mr-2 pr-2"></i>
                    <?php if ($this->session->userdata('login')): ?>
                        <a class="ml-3 d-block" href="#">
                        <?php else: ?>
                            <a class="ml-3 d-block" href="<?= base_url('login') ?>">
                            <?php endif; ?>
                            Messages
                        </a>
                </div>
            </li>
            <li class="list-group-item d-flex align-items-center" onclick="location.href='<?= base_url('login') ?>';">
                <div class="d-flex align-items-center">
                    <i class="fas fa-2x fa-paint-brush text-primary mr-2"></i>
                    <?php if ($this->session->userdata('login')): ?>
                        <a class="ml-3" href="<?= base_url('blog/my_posts') ?>">
                        <?php else: ?>
                            <a class="ml-3" href="<?= base_url('login') ?>">
                            <?php endif; ?>
                            My Posts
                        </a>
                </div>
            </li>
            <li class="list-group-item d-flex align-items-center " onclick="openPopup();">
                <div class="d-flex align-items-center">
                    <i class="fas fa-2x fa-plus-square text-warning mr-2"></i>
                    <?php if ($this->session->userdata('login')): ?>
                        <a class="ml-3" href="<?= base_url('blog/add_blog') ?>">
                        <?php else: ?>
                            <a class="ml-3">
                            <?php endif; ?>
                            Create
                        </a>
                </div>
            </li>
        </ul>
    </div>
    <div class="main px-3">

        <div class="d-flex flex-row justify-content-between align-content-center px-4 my-3 top-bar">
            <h2 class="fw-3 fw-bolder"> <i class="fas  fa-fire-alt text-danger mr-2"></i>
                Trending <i class="fas fa-angle-down text-muted ml-2"></i></h2>
            <p class="ml-auto align-self-center fw-bold">Recent Posts</p>
            <div class="">
                <button class="btn bg-black text-white w-100" onclick="openPopup();">
                    <i class="fas fa-plus me-2"></i>Create Post
                </button>
            </div>
        </div>
        <!-- loop start -->
        <?php if (count($blogs) > 0) {
            foreach ($blogs as $blog) {
                $uid = $this->session->userdata('login');
                $blog_id = $blog['post_id'];
                $caption = $blog['content'];
                $images = $blog['image_url'];
                $likes = $blog['post_likes'];
                $likedstatus = false;
                if (!empty($likes)) {
                    $likes_arr = explode(',', $likes);
                    if (count($likes_arr) > 0) {
                        if (in_array($uid, $likes_arr)) {
                            $likedstatus = true;
                        }
                    }
                }
                $like_count = $likes ? count(array_filter(explode(',', $likes))) : 0;
                $images = explode(',', $images);
                ?>
                <div class="mb-4">
                    <a href="blog_details/<?= $blog_id; ?>" class="text-primary text-decoration-none ">
                        <div class="">
                            <div class="card border-light shadow-sm rounded">
                                <div class="position-relative">
                                    <img src="<?= base_url() ?>/uploads/blog_images/<?= $images[0]; ?>" alt=""
                                        class="card-img-top rounded-top">
                                    <?php if (count($images) - 1 > 0) { ?>
                                        <div class="position-absolute top-0 end-0 bg-danger text-white rounded-pill px-2 py-1 m-2">
                                            <b><?= count($images) - 1; ?>+</b>
                                        </div>
                                    <?php } ?>

                                </div>

                    </a>
                    <div class="card-body mb-5">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="d-flex align-items-center">
                                <?php if ($likedstatus) { ?>
                                    <button class="btn btn-danger btn-sm like-btn" type="button" data-id="<?= $blog_id; ?>">
                                        <i class="far fa-thumbs-up"></i>
                                    </button>
                                <?php } else { ?>
                                    <button class="btn btn-outline-primary bg-primary btn-sm like-btn text-white" type="button"
                                        data-id="<?= $blog_id; ?>">
                                        <i class="far fa-thumbs-up"></i>
                                    </button>
                                <?php } ?>
                                <span class="ms-2"><?= $like_count ?></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="blog_details/<?= $blog_id; ?>" class="btn btn-outline-secondary btn-sm me-2">
                                    <i class="fas fa-comment-alt"></i>
                                </a>
                                <span>50+</span>
                                <button class="btn btn-outline-primary btn-sm ms-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#shareModal">
                                    <i class="fas fa-share-alt"></i>
                                </button>
                            </div>
                        </div>
                        <p class="card-text"><?= $blog['content']; ?><br /><a href="blog_details/<?= $blog_id; ?>"
                                class="text-primary text-decoration-none">Read more..</a></p>
                    </div>
                </div>

            </div>
        </div>

        <?php
            }
        } else {
            ?>
    <h1 class="text-center fw-bolder">There is No Post yet..</h1>
<?php } ?>
<!-- loop ends -->
</div>

<div class="side-bar right overflow-scroll">
    <div class="d-flex d-flex flex-column">
        <div class="stories-wrapper">
            <h6 class="fw-bolder">Stories</h6>
            <div class="items d-flex flex-row justify-content-evenly ">
                <div style="border-radius: 10px; width: 100px; height: 150px;overflow:hidden;"><img
                        class="img-fluid w-100 h-100" src="<?= base_url('uploads/blog_images/1.jpg') ?>"
                        alt="Stories 1">
                </div>
                <div style="border-radius: 10px; width: 100px; height: 150px;overflow:hidden;"><img
                        class="img-fluid w-100 h-100" src="<?= base_url('uploads/blog_images/3.png') ?>"
                        alt="Stories 2">
                </div>
            </div>
        </div>
        <div class="ads my-3">
            <h6>Ads</h6>
            <div class="items">
                <img src="https://via.placeholder.com/300x200" alt="Ad 1">
            </div>
        </div>
        <div class="joblist-wrapper">
            <h6 class="fw-bolder">Recommended Jobs</h6>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex align-items-center">
                    <div class="title">
                        Junior Web Developer
                    </div>
                    <div class="ml-auto">
                        <span class="badge bg-primary text-white">Full Time</span>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <div class="title">
                        Software Engineer
                    </div>
                    <div class="ml-auto">
                        <span class="badge bg-primary text-white">Full Time</span>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <div class="title">
                        Sales Manager
                    </div>
                    <div class="ml-auto">
                        <span class="badge bg-primary text-white">Part Time</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>


</div>
<div id="create_blog" class="popup-overlay " style="display:none">
    <div class="popup-box overflow-hidden">
        <div class="popup-header p-3 d-flex flex-row justify-content-between">
            <h6 class=" fw-bolder">Create Post</h6>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                onclick="closePopup();"></button>

        </div>
        <div class="popup-body" style=" height: 100%;">
            <div class="d-flex flex-row justify-content-center">
                <div class="container" style="max-width: 500px;">

                    <div class="d-flex flex-row align-items-center">
                        <div class="d-flex flex-row  align-items-center m-2">
                            <i class="fas text-danger fa-user-circle fa-3x"></i>
                            <span class="fw-bolder text-center " style="padding-left: 10px;">User</span>
                        </div>
                    </div>

                    <form id="add_blog" action="<?= base_url('add_blog') ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="mb-3 position-relative">
                            <textarea id="caption" class="form-control" name="blog_caption"
                                placeholder="अपने पोस्ट का कैप्शन लिखे...." required
                                style="height: 100px; resize: none;"></textarea>
                        </div>
                        <div class="">
                            <!-- <i class="fas fa-image  start-0 translate-middle-y ms-3 text-muted fa-2x"></i> -->
                            <input type="file" class="form-control " name="blog_image[]" id="blog_image" required
                                multiple />

                        </div>
                        <!-- Container to hold the image previews -->
                        <div id="image-preview"
                            class="d-flex flex-row flex-wrap justify-content-center mb-3 overflow-scroll;"
                            style="max-height: 200px;">
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-plus me-2"></i>Create Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var offset = $(".side-bar.left").offset();
        var topPadding = 70; //if want a bit padding on top
        var rightTopPadding = 90; //if want a bit padding on top
        $(window).scroll(function () {
            if ($(window).scrollTop() > offset.top) {
                $('.side-bar.left').css('margin-top', $(window).scrollTop() - offset.top + topPadding);
                $('.side-bar.right').css('margin-top', $(window).scrollTop() - offset.top + rightTopPadding);
            } else {
                $('.side-bar.left').css('margin-top', 0);
                $('.side-bar.right').css('margin-top', 0);
            }
        });

        $('#blog_image').on('change', function () {
            var previewContainer = $('#image-preview');
            previewContainer.empty(); // Clear previous previews
            var files = this.files;

            $.each(files, function (i, file) {
                // Ensure the file is an image
                if (file.type.startsWith('image/')) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var img = $('<img>').attr('src', e.target.result)
                            .addClass('img-thumbnail') // Bootstrap class for styling the preview
                            .css({
                                'width': '150px',   // Uniform width
                                'height': '150px',  // Uniform height
                                'object-fit': 'cover', // Ensure the image covers the space nicely
                                'border-radius': '10px', // Rounded corners for a polished look
                                'box-shadow': '0px 4px 8px rgba(0, 0, 0, 0.1)', // Subtle shadow
                                'margin': '10px',
                                'cursor': 'pointer', // Change cursor to pointer on hover
                                'transition': 'transform 0.2s ease' // Smooth hover effect
                            });
                        img.on('click', function () {
                            $('#modalImage').attr('src', e.target.result);
                            $('#imageModal').modal('show');
                        });
                        previewContainer.append(img);
                    };

                    reader.readAsDataURL(file);
                }
            });
        });

    });
    function closePopup() {
        $('#add_blog')[0].reset();
        $('#image-preview').empty();
        $('#create_blog').hide();
    }
    function openPopup() {
        $('#create_blog').show();
        // $('#add_blog')[0].reset();
        // $('#image-preview').empty();
    }

</script>