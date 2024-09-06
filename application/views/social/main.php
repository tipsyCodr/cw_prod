<style>
    /* grid styling  */
    .post-wrapper {
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

<div class="post-wrapper flex flex-row">
    <div class="side-bar left sticky-left ">

        <ul class="space-y-2">
            <li
                class=" rounded-lg p-2 <?= current_url() === base_url('social') ? 'active' : '' ?>   hover:bg-gray-300 transition duration-300">
                <div class="flex items-center">
                    <div class="" style="width: 60px;"><i class="fas fa-2x fa-fire-alt text-red-500 mr-2"></i></div>
                    <a class="" href="<?= base_url('social') ?>">Trending </a>
                </div>
            </li>
            <li class=" rounded-lg p-2 hover:bg-gray-300 transition duration-300">
                <div class="flex items-center">
                    <div class="" style="width: 60px;"><i class="fas fa-2x fa-envelope text-blue-500 mr-2 pr-2"></i>
                    </div>
                    <?php if ($this->session->userdata('login')): ?>
                        <a class=" block" href="#"><?php else: ?><a class="block"
                                href="<?= base_url('login') ?>"><?php endif; ?>Messages</a>
                </div>
            </li>
            <li class=" rounded-lg p-2 hover:bg-gray-300 transition duration-300">
                <div class="flex items-center">
                    <div class="" style="width: 60px;"><i class="fas fa-2x fa-paint-brush text-orange-400 mr-2"></i>
                    </div>
                    <?php if ($this->session->userdata('login')): ?>
                        <a class="" href="<?= base_url('blog/my_posts') ?>">
                        <?php else: ?>
                            <a class="" href="<?= base_url('login') ?>">
                            <?php endif; ?>
                            My Posts
                        </a>
                </div>
            </li>
            <li class=" rounded-lg p-2 hover:bg-gray-300 transition duration-300" onclick="openPopup();">
                <div class="flex items-center">
                    <div class="" style="width: 60px;"><i class="fas fa-2x fa-plus-square text-accent mr-2"></i>
                    </div>
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
        <div class="flex items-center justify-between my-3 top-bar">
            <div class="text-left">
                <h2 class="text-2xl  font-black"> <i class="fas  fa-fire-alt text-red-600 mr-2"></i>
                    Trending </h2>
            </div>
            <p class="font-bold lg:block hidden ">Recent Posts</p>
            <div class="flex items-center">
                <button class=" bg-black text-white py-2 px-4 rounded-full flex-nowrap text-nowrap"
                    onclick="openPopup();">
                    <i class="fa fa-plus me-2"></i>Create Post
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
                    <div class="flex items-center my-6 ">
                        <a href="profile/<?= $blog['user_id']; ?>" class="flex items-center">
                            <?php if (empty($blog['user_image'])): ?>
                                <i class="fas fa-3x fa-user-circle h-10 w-10 rounded-full mr-2 text-accent"></i>
                            <?php else: ?>
                                <img src="<?= base_url() ?>/uploads/user_images/<?= $blog['user_image']; ?>" alt=""
                                    class="h-10 w-10 rounded-full mr-2" />
                            <?php endif; ?>
                            <div class="flex flex-col">
                                <span class="font-bold"><?= $blog['first_name'] . ' ' . $blog['last_name']; ?></span>
                                <span
                                    class="text-black font-bold text-xl px-4"><?= empty($blog['username']) ? 'Anonymous' : $blog['username']; ?></span>
                            </div>
                        </a>
                    </div>

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
                        <div class='py-2 border-b-2 bg-gray-100 flex justify-evenly items-center'>
                            <a class='flex  items-center block cursor-pointer ' href="#"> <i
                                    class="fa-regular fa-2x fa-heart hover:text-red-500 transition-all "></i>
                                <p class="p-2">Like</p>
                            </a>
                            <a class='flex  items-center block cursor-pointer ' href="#"> <i
                                    class="fa-regular fa-2x fa-comment hover:text-blue-500 transition-all "></i>
                                <p class="p-2">Comments</p>
                            </a>
                            <a class='flex  items-center block cursor-pointer ' href="#" data-bs-toggle="modal"
                                data-bs-target="#shareModal"> <i
                                    class="fa hover:text-blue-500 transition-all fa-2x fa-share"></i>
                                <p class="p-2">Share</p>
                            </a>
                        </div>

                        <div class="flex justify-start my-2">
                            <div class="flex items-center gap-x-2">
                                <?php if ($likedstatus) { ?>
                                    <p class=" " data-id="<?= $blog_id; ?>"><i class="fa fa-heart text-red-400"></i></p>

                                <?php } else { ?>
                                    <p class=" rounded-full text-white" data-id="<?= $blog_id; ?>"><i
                                            class="fa fa-heart text-red-400 "></i>
                                    </p>
                                <?php } ?>
                                <span><?= $like_count ?></span>
                            </div>
                            <div class="flex items-center px-2">
                                <a href="blog_details/<?= $blog_id; ?>" class="btn btn-outline-secondary btn-sm me-2">
                                    <i class="fa fa-comment-alt text-blue-400"></i>
                                </a>
                                <span>10+</span>

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
    <h1 class="text-center font-black">There is No Post yet..</h1>
<?php } ?>
<!-- loop ends -->
</div>

<div class="side-bar right overflow-scroll">
    <div class="flex flex-col">
        <div class="stories-wrapper">
            <h6 class="text-black font-black text-2xl p-2">Stories</h6>
            <div class="stories-wrapper  flex flex-row overflow-x-auto flex-nowrap text-nowrap snap-x" draggable="true">
                <div class="story flex-1 h-150px min-w-100px overflow-hidden rounded-lg mr-2">
                    <img class="h-full w-full object-cover object-center"
                        src="<?= base_url('uploads/blog_images/1.jpg') ?>" alt="Stories 1">
                </div>
                <div class="story flex-1 h-150px min-w-100px overflow-hidden rounded-lg mr-2">
                    <img class="h-full w-full object-cover object-center"
                        src="<?= base_url('uploads/blog_images/3.png') ?>" alt="Stories 2">
                </div>
                <div class="story flex-1 h-150px min-w-100px overflow-hidden rounded-lg mr-2">
                    <img class="h-full w-full object-cover object-center"
                        src="<?= base_url('uploads/blog_images/1.jpg') ?>" alt="Stories 1">
                </div>
                <div class="story flex-1 h-150px min-w-100px overflow-hidden rounded-lg mr-2">
                    <img class="h-full w-full object-cover object-center"
                        src="<?= base_url('uploads/blog_images/3.png') ?>" alt="Stories 2">
                </div>
                <div class="story flex-1 h-150px min-w-100px overflow-hidden rounded-lg mr-2">
                    <img class="h-full w-full object-cover object-center"
                        src="<?= base_url('uploads/blog_images/1.jpg') ?>" alt="Stories 1">
                </div>
                <div class="story flex-1 h-150px min-w-100px overflow-hidden rounded-lg mr-2">
                    <img class="h-full w-full object-cover object-center"
                        src="<?= base_url('uploads/blog_images/3.png') ?>" alt="Stories 2">
                </div>
            </div>
        </div>
        <div class="ads my-3">
            <h6 class="text-2xl font-bold">Ads</h6>
            <div class="items">
                <img src="https://via.placeholder.com/300x200" alt="Ad 1">
            </div>
        </div>
        <div class="joblist-wrapper">
            <h6 class="font-black">Recommended Jobs</h6>
            <ul class="list-group list-group-flush">
                <?php foreach ($jobs as $job) { ?>
                    <li class="list-group-item flex items-center">
                        <a href=".#" class="title">
                            <!-- <a href="#<?= base_url('jobs/detail/' . $job['id']) ?>" class="title"> -->
                            <?= $job['job_title'] ?>
                        </a>
                        <div class="ml-auto">
                            <span
                                class="px-2 py-1 rounded-full bg-accent text-white"><?= $job['job_type'] == 1 ? 'Full Time' : 'Part Time' ?></span>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

</div>


</div>
<div id="create_blog" class="popup-overlay " style="display:none">
    <div class="popup-box overflow-hidden">
        <div class="popup-header p-3 flex flex-row justify-between">
            <h6 class=" font-black">Create Post</h6>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                onclick="closePopup();"></button>

        </div>
        <div class="popup-body h-full">
            <div class="container mx-auto p-4 max-w-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center py-4">
                        <i class="fas text-danger fa-user-circle fa-3x"></i>
                        <?php if (!$this->session->userdata('login')): ?>
                            <span class="font-black ml-2">Anonymous</span>
                        <?php else: ?>
                            <span
                                class="font-black ml-2"><?= $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <form id="add_blog" action="<?= base_url('add_blog') ?>" method="post" enctype="multipart/form-data"
                    class="space-y-4">

                    <div class="mb-3">
                        <textarea id="caption"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Whats on your mind?" required rows=" 4"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="blog_image[]" id="blog_image" required multiple />
                    </div>
                    <div id="image-preview" class="grid grid-cols-3 gap-4 overflow-y-auto max-h-96">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="py-2 text-xl font-bold bg-accent text-white w-full rounded-full">
                            <i class="fas fa-plus my-2"></i> Create Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var offset = $(".side-bar.left").offset();
        var topPadding = 20; //if want a bit padding on top
        var rightTopPadding = 20; //if want a bit padding on top
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

    const container = document.querySelector('.stories-wrapper');

    container.addEventListener('dragstart', (e) => {
        // Store the initial scroll position
        const initialScrollLeft = container.scrollLeft;
        const initialScrollTop = container.scrollTop;

        // Store the mouse position
        const mouseX = e.clientX;
        const mouseY = e.clientY;

        // Add event listeners for drag and dragend
        document.addEventListener('drag', (e) => {
            // Calculate the new scroll position based on the mouse movement
            const newScrollLeft = initialScrollLeft + (e.clientX - mouseX);
            const newScrollTop = initialScrollTop + (e.clientY - mouseY);

            // Update the scroll position
            container.scrollLeft = newScrollLeft;
            container.scrollTop = newScrollTop;
        });

        document.addEventListener('dragend', () => {
            // Remove the event listeners
            document.removeEventListener('drag', () => { });
            document.removeEventListener('dragend', () => { });
        });
    });
</script>