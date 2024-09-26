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
        /* position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        width: 500px;
        height: 70vh;
        max-height: 600px;
        box-shadow: 1px 1px 10px #000;
        border-radius: 10px; */
        /* z-index: 1022; */
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
<?php if ($this->session->flashdata('added_blog')): ?>
    <div class="fixed bottom-0 left-0 right-0 bg-green-500 text-white p-4 text-center">
        <?= $this->session->flashdata('added_blog'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error_blog')): ?>
    <div class="fixed bottom-0 left-0 right-0 bg-green-500 text-white p-4 text-center">
        <?= $this->session->flashdata('error_blog'); ?>
    </div>
<?php endif; ?>
<!-- popup box -->
<div id="create_blog" class="popup-overlay transition-all flex justify-center items-start" style="display:none">

    <div
        class="popup-box rounded-lg  transition-all overflow-hidden shadow fixed  bg-white z-[1022] w-3/4 h-3/4 min-w-[350px] max-w-[450px] max-h-[600px]">
        <div class="popup-header border border-bottom p-3 flex justify-between">
            <h6 class="font-black text-xl">Create Post</h6>
            <button class="text-black hover:text-gray-800 transition duration-300 focus:outline-none"
                onclick="closePopup();">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="popup-body h-full overflow-scroll pb-8">
            <div class="container mx-auto p-4 max-w-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center py-4">
                        <i class="fas text-red-500 fa-user-circle fa-2x"></i>
                        <div class="flex flex-col ">
                            <?php if (!$this->session->userdata('login')): ?>
                                <span class="font-black ml-2">Anonymous</span>
                            <?php else: ?>
                                <span class="font-black ml-2"><?= $this->session->userdata('logged_uname'); ?></span>
                            <?php endif; ?>
                            <div class="mt-0">
                                <!-- <label for="visibility" class="block text-sm font-medium text-gray-700">Visibility</label> -->
                                <select id="visibility" name="visibility"
                                    class="px-1 w-fit ml-2 block w-full text-sm text-gray-900 transition duration-150 font-bold ease-in-out bg-gray-300 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="open"> Open</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>

                <form id="add_blog" action="<?= base_url('add_blog') ?>" method="post" enctype="multipart/form-data"
                    class="space-y-4">
                    <div class="mb-3">
                        <textarea id="caption"
                            class=" w-full px-4 text-2xl border-transparent focus:border-transparent focus:ring-0"
                            name="blog_caption" placeholder="Whats on your mind?" required rows=" 6"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="blog_image[]" placeholder="Add images" id="blog_image" required multiple />
                    </div>
                    <div id="image-preview" class="grid grid-cols-3 gap-4 overflow-y-auto max-h-96">
                    </div>

                    <div class="text-right">
                        <button type="submit" id="post-btn"
                            class="py-1 text-md font-bold bg-accent bg-gray-300 text-white w-full rounded-lg" disabled>
                            Post
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<!-- popup box -->


<div class="post-wrapper flex flex-row">
    <div class="side-bar left sticky-left ">

        <ul class="space-y-2">
            <li class=" rounded-lg p-2 <?= current_url() === base_url('social') ? 'active' : '' ?> hover:bg-gray-300
                transition duration-300">
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
    <div class="main px-2 pb-28">
        <a href='<?= base_url('social/members') ?>'
            class="block my-4 p-2 text-center bg-gradient-to-r from-accent-dark to-accent  text-white w-full rounded-full ">
            <i class="fa fa-users"></i> All Members</a>

        <div class="flex items-center justify-between my-3 top-bar">
            <div class="text-left">
                <h2 class="text-lg  font-black"> <i class="fas  fa-fire-alt text-red-600 "></i>
                    Trending Posts </h2>
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
                <!-- new design -->
                <div class=" top-2 left-2  ">
                    <span class=" flex  p-1.5 rounded-full">
                        <span class=" bg-gradient-to-tr from-magiColor-blue to-magiColor p-[4px] rounded-full mr-2">
                            <?php if (!empty($blog['profile_pic'])): ?>
                                <img class=" object-cover rounded-full w-10 h-10 "
                                    src="<?= base_url() . 'uploads/user_profiles/' . $blog['profile_pic'] ?>" alt="" />
                            <?php else: ?>
                                <i class="py-1 fa fa-user-circle w-10 h-10  text-4xl text-accent-dark"></i>
                            <?php endif; ?>
                        </span>


                        <p class=" flex flex-col justify-start items-start my-auto text-black ">
                            <span class="my-auto flex flex-row items-start"><?= $blog['username'] ?>
                                <?php if ($blog['is_verified'] == 1) { ?>
                                    <i class="my-auto i-[mage--verified-check-fill] text-badgeColor m-1"></i>
                                <?php } ?>
                            </span>
                            <span class="text-xs">@Member</span>
                        </p>
                    </span>
                </div>

                <div class=" rounded-[30px] relative overflow-hidden mb-2 cursor-pointer border-bottom "
                    onclick="window.location.href='<?= site_url() . 'social/post/' . $blog['post_id'] ?>'"
                    style="max-width: 800px; max-height:900px; min-height:415px; min-width:200px; background-color: #000; background-image:url('<?= base_url() . 'uploads/blog_images/' . $blog['image_url']; ?>'); background-size: cover; background-repeat: no-repeat;background-position: center">
                </div>

                <div class=" bottom-0 w-full flex items-center content text-black px-4 ">
                    <p>
                        <!-- <span class="px-1"><i class="text-xl i-[teenyicons--heart-outline]"></i></span> -->
                        <a class='like-btn  cursor-pointer ' data-id="<?= $blog_id; ?>" onclick="likePost(this)">
                            <?= $likedstatus ?>
                            <?php if ($likedstatus == true) { ?>
                                <i class="text-2xl text-red-500  i-[teenyicons--heart-solid]"></i>
                                <!-- <i class="fa-solid fa-2x fa-heart text-red-500 hover:text-gray-500 transition-all "></i> -->
                            <?php } else { ?>
                                <i class="text-2xl i-[teenyicons--heart-outline]"></i>
                                <!-- <i class="fa-regular fa-2x fa-heart hover:text-red-500 transition-all "></i> -->

                            <?php } ?>
                        </a>
                        <a class="px-1"><i class="text-2xl i-[uil--comment]"></i></a>
                        <a class="pb-1"><i class="text-2xl fab fa-whatsapp"></i></a>
                    </p>
                </div>
                <div class="flex px-2">
                    <p class="text-md px-1"><span id="like-<?= $blog_id; ?>"
                            class=""><?= $blog['post_likes'] == null ? 0 : $blog['post_likes']; ?></span> Likes
                    </p>
                    <span class="text-md px-1"><?= $data['comment_count'][$blog['post_id']] ?? 0 ?> Comments</span>
                </div>
                <p class="text-sm h-10 overflow-hidden text-ellipsis mt-3 px-4"
                    style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    <span><?= $blog['username'] ?> </span><?= $blog['content']; ?>
                </p>
                <!-- new design -->

                <div class="py-6 border-y hidden">
                    <div class="flex items-center ">
                        <a href="profile/<?= $blog['user_id']; ?>" class="flex ">
                            <?php if (empty($blog['profile_pic'])): ?>
                                <i class="fas fa-2x fa-user-circle h-10 w-10 rounded-full  text-accent"></i>
                            <?php else: ?>
                                <img src="<?= base_url() ?>/uploads/user_profiles/<?= $blog['profile_pic']; ?>" alt=""
                                    class="h-10 w-10 rounded-full " />
                            <?php endif; ?>
                            <div class="">
                                <span
                                    class="font-bold text-xl"><?= empty($blog['username']) ? 'Anonymous' : $blog['username']; ?></span>
                            </div>
                        </a>
                    </div>

                    <a href="social/post/<?= $blog_id; ?>" class="text-primary text-decoration-none ">
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
                            <a class='flex like-btn items-center block cursor-pointer ' data-id="<?= $blog_id; ?>"
                                onclick="likePost(this)">
                                <?php if ($likedstatus == true) { ?>
                                    <i class="fa-solid fa-2x fa-heart text-red-500 hover:text-gray-500 transition-all "></i>
                                <?php } else { ?>
                                    <i class="fa-regular fa-2x fa-heart hover:text-red-500 transition-all "></i>

                                <?php } ?>
                                <span class="p-2">Like</span>
                            </a>
                            <a class='flex  items-center block cursor-pointer '
                                href="<?= base_url('social/post/' . $blog_id . "#comment"); ?>"> <i
                                    class="fa-regular fa-2x fa-comment hover:text-blue-500 transition-all "></i>
                                <p class="p-2">Comments</p>
                            </a>
                            <a class='flex  items-center block cursor-pointer '
                                href="<?= base_url('social/post/' . $blog_id . '?share=true'); ?>" target="_blank"> <i
                                    class="fa hover:text-blue-500 transition-all fa-2x fa-share"></i>
                                <p class="p-2">Share</p>
                            </a>
                        </div>

                        <div class="flex justify-start my-2">
                            <div class="flex items-center gap-x-2">

                                <p class=" rounded-full"><i class="fa fa-heart text-red-400 "></i>
                                    <span id='like-<?= $blog_id; ?>' data-id="<?= $blog_id; ?>"><?= $blog['likes'] ?></span>
                                </p>
                            </div>
                            <div class="flex items-center px-2">
                                <a href="social/post/<?= $blog_id; ?>" class="btn btn-outline-secondary btn-sm me-2">
                                    <i class="fa fa-comment-alt text-blue-400"></i>
                                </a>
                                <span>10+</span>

                            </div>
                            <div class="">
                                <a
                                    href="https://api.whatsapp.com/send/?text=<?= base_url('social/post/' . $blog_id . '?share=true'); ?>/&type=custom_url&app_absent=0"><i
                                        class="fa-brands fa-whatsapp text-green-600"></i></a>

                            </div>
                        </div>
                        <p class="card-text"><?= $blog['content']; ?><br /><a href="social/post/<?= $blog_id; ?>"
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
<div>
    <p class="block text-center text-gray-700 mb-[500px]">End Of Post</p>
</div>
<!-- loop ends -->
</div>

<div class="side-bar right overflow-scroll">
    <div class="flex flex-col">
        <div class="stories-wrapper hidden">
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


<script>
    window.onload = function () {
        window.likePost = function (el) {
            const $this = $(el);
            const dataId = $this.attr('data-id');
            const likeIcon = $this.children('i');
            const likeCountSpan = $('#like-' + dataId);

            $.ajax({
                url: "<?= base_url('social/post/like') ?>/" + dataId + "/" + <?= $this->session->userdata('login') ?>,
                method: 'POST',
                success: function (response) {
                    console.log(response);
                    console.log(likeCountSpan.text());

                    const responseData = response;
                    if (responseData.status === 'liked') {
                        likeIcon.removeClass('i-[teenyicons--heart-outline]').addClass('i-[teenyicons--heart-solid] text-red-500 ')
                        likeCountSpan.text(parseInt(likeCountSpan.text()) + 1);
                    } else if (responseData.status === 'unliked') {
                        likeIcon.removeClass('i-[teenyicons--heart-solid] text-red-500').addClass('i-[teenyicons--heart-outline]');
                        likeCountSpan.text(parseInt(likeCountSpan.text()) - 1);
                        // likeCountSpan.text(responseData.likes);
                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            })
        }

    }
    // Open/Close popup functions
    function closePopup() {
        $('#add_blog')[0].reset();
        $('#image-preview').empty();
        $('#create_blog').hide();
    }

    function openPopup() {
        $('#create_blog').show();
    }
    document.addEventListener('DOMContentLoaded', function () {
        const $leftSidebar = $('.side-bar.left');
        const $rightSidebar = $('.side-bar.right');
        const offset = $leftSidebar.offset();
        const topPadding = 20;
        const rightTopPadding = 20;

        // Scroll Event - Using debounce to reduce frequency
        $(window).on('scroll', function () {
            const scrollTop = $(window).scrollTop();
            const marginTop = scrollTop > offset.top ? scrollTop - offset.top : 0;

            $leftSidebar.css('margin-top', marginTop + topPadding);
            $rightSidebar.css('margin-top', marginTop + rightTopPadding);
        });

        // Image preview for blog image input
        $('#blog_image').on('change', function () {
            const previewContainer = $('#image-preview');
            previewContainer.empty(); // Clear previous previews
            const files = this.files;

            $.each(files, (i, file) => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = (e) => {
                        const img = $('<img>')
                            .attr('src', e.target.result)
                            .addClass('img-thumbnail')
                            .css({
                                width: '150px',
                                height: '150px',
                                objectFit: 'cover',
                                borderRadius: '10px',
                                boxShadow: '0px 4px 8px rgba(0, 0, 0, 0.1)',
                                margin: '10px',
                                cursor: 'pointer',
                                transition: 'transform 0.2s ease'
                            });

                        img.on('click', () => {
                            $('#modalImage').attr('src', e.target.result);
                            $('#imageModal').modal('show');
                        });

                        previewContainer.append(img);
                    };

                    reader.readAsDataURL(file);
                }
            });
        });



        // Close popup on Escape key press
        $(document).on('keydown', (e) => {
            if ($('#create_blog').is(':visible') && e.keyCode === 27) {
                closePopup();
            }
        });

        // Drag scrolling for stories
        const container = document.querySelector('.stories-wrapper');
        container.addEventListener('mousedown', (e) => {
            const startX = e.pageX - container.offsetLeft;
            const startScrollLeft = container.scrollLeft;

            const onMouseMove = (e) => {
                const x = e.pageX - container.offsetLeft;
                const scrollDistance = (x - startX) * 2; // Adjust the scroll speed
                container.scrollLeft = startScrollLeft - scrollDistance;
            };

            const onMouseUp = () => {
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
            };

            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
        });

        // Disable/Enable post button based on caption input
        const caption = document.getElementById('caption');
        const postBtn = document.getElementById('post-btn');

        caption.addEventListener('input', () => {
            const isCaptionFilled = caption.value.trim() !== '';
            postBtn.disabled = !isCaptionFilled;
            postBtn.classList.toggle('bg-gray-300', !isCaptionFilled);
        });


        // Like button handler (Repeated from earlier)
        // $(document).on('click', '.like-btn', function () {
        //     const $this = $(this);
        //     const dataId = $this.attr('data-id');
        //     const likeIcon = $this.children('i');
        //     const likeCountSpan = $('#like-' + dataId);

        //     fetch('<?= base_url(); ?>increaseLike', {
        //         method: 'POST',
        //         headers: { 'Content-Type': 'application/json' },
        //         body: JSON.stringify({ id: dataId })
        //     })
        //         .then(response => response.json())
        //         .then(response => {
        //             // const likeCountSpan = $this.nextElementSibling;
        //             if (response.status === 'liked') {
        //                 console.log(response)
        //                 likeIcon.removeClass('fa-regular').addClass('fa-solid text-red-500')
        //             } else if (response.status === 'disliked') {
        //                 console.log('Like disliked')
        //                 likeIcon.removeClass('fa-solid text-red-500').addClass('fa-regular');

        //             }
        //         });
    });




</script>