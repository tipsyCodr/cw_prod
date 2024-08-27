
<?php if(!$this->session->has_userdata('login')): ?>
    <script>
        swal("Information..!", "You need to login first to view this page", "info");
        setTimeout(function () {
            window.location.href = "<?=base_url()?>login";
        }, 2000);
    </script>
   
<?php endif; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


<style>
    .post-details {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 1rem;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .post-title {
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .post-meta {
        color: #888;
        font-size: 0.9rem;
        margin-bottom: 20px;
    }

    .post-images {
        width: 100%;

        margin: 0 auto;


    }


    .item {

        display: flex;
        justify-content: center;
        align-items: center;

        width: 50%;
        margin: 0 auto;

    }

    .item img {

        width: 100vw;


    }

    .post-content {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .post-actions .actions {
        display: flex;
        justify-content: flex-start;

        align-items: center;
    }

    .action-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .btn-icon {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #007bff;
        color: #fff;
        transition: transform 0.3s ease, background-color 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-icon:hover {
        transform: scale(1.1);
        background-color: #0056b3;
    }
</style>
<?php

$uid = $this->session->userdata('login');
$blog_id = $blog->post_id;
$blogObject = (object) $blog;
$caption = $blogObject->content;
$images = $blogObject->image_url;
$likes = $blogObject->post_likes;

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
$image_urls = explode(",", $blog->image_url);



?>
<div class="container my-3">
    <div class="post-details">

        <p class="post-meta">
            <span>Published on :<b><?= date('M-d-Y', strtotime($blog->created_at)); ?></b></span>
        </p>

        <!-- Owl Carousel for Multiple Images -->

        <div class="post-images owl-carousel owl-theme">

            <?php foreach ($image_urls as $image_url) {
                ?>
                <div class="item">
                    <img src="/uploads/blog_images/<?= $image_url ?>" alt="Post Image 1" class="img-fluid">
                </div>
                <?php
            } ?>



            <!-- Add more images as needed -->
        </div>


        <div class="post-content mt-4 text-center">
            <p class='fs-5'><?= $blog->content ?></p>
        </div>

        <div class="post-actions mt-4">
            <div class="actions d-flex justify-content-start gap-5 align-items-center">
                <span class="d-flex flex-column align-items-center">

                    <?php if ($likedstatus) { ?>
                        <button class="btn btn-icon btn-sm btn-primary like-btn bg-danger" type="button"
                            data-id="<?= $blog_id; ?>">
                            <span class="btn-inner--icon"><i class="far fa-thumbs-up"></i></span>
                        </button>
                    <?php } else {
                        ?>
                        <button class="btn btn-icon btn-sm btn-primary like-btn " type="button" data-id="<?= $blog_id; ?>">
                            <span class="btn-inner--icon"><i class="far fa-thumbs-up"></i></span>
                        </button>
                        <?php
                    } ?>


                    <span><?= $like_count ?>+</span>

                </span>
                <span class="action-item d-flex flex-column align-items-center">
                    <button class="btn btn-icon btn-sm btn-primary comment-btn" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-comment-alt"></i></span>
                    </button>
                    <span><?= count($comments) ?>+</span>
                </span>

                <!-- share button modal  -->
                <!-- Share Modal -->
                <div class="modal fade " id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog d-flex justify-content-center align-items-center">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="shareModalLabel">Share this Blog</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-center gap-3">
                                <!-- Social Media Icons -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u=YOUR_BLOG_URL" target="_blank"
                                    class="btn btn-primary">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=YOUR_BLOG_URL" target="_blank"
                                    class="btn btn-info">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=YOUR_BLOG_URL"
                                    target="_blank" class="btn btn-secondary">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text=YOUR_BLOG_URL" target="_blank"
                                    class="btn btn-success">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="action-item d-flex flex-column align-items-center">
                    <button class="btn btn-icon btn-sm btn-primary share-btn" type="button" data-bs-toggle="modal"
                        data-bs-target="#shareModal">
                        <span class="btn-inner--icon"><i class="fas fa-share-alt"></i></span>
                    </button>
                    <span style="visibility: hidden;">&nbsp;</span>
                </span>
            </div>
        </div>

        <form action="/add_comments" method="POST" id='comment_form'>
            <div class="comment-form mt-3">
                <div class="form-group">
                    <textarea name="comment" id="comment" class="form-control" placeholder="Write your comment here..."
                        rows="4"></textarea>
                </div>
                <input type="hidden" name="blog_id" value="<?= $blog->post_id; ?>">
                <button type="submit" class="btn btn-primary mt-3 w-10 rounded-pill shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i> Post Comment
                </button>
            </div>
        </form>

    </div>
    <!-- Comments Section -->
    <div class="post-comments mt-2">
        <hr>
        <h3>Comments</h3>
        <hr>

        <ul class="list-unstyled">
            <!-- Comment 1 -->
            <?php foreach ($comments as $comment) {
                ?>

                <li class="media mb-3 border p-4">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1"><?= $comment['user_name'] ?></h5>
                        <p><?= $comment['comment_text'] ?></p>
                        <small class="text-muted"><?= date("M-d-Y", strtotime($comment['created_at'])) ?></small>
                    </div>
                </li>

                <?php
            }
            ?>


        </ul>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>

    // handle like button 
    $(document).on('click', '.like-btn', function () {
        var $this = $(this);
        var dataId = $(this).attr('data-id');
        var likeCountSpan = $this.siblings('span');

        $.ajax({
            url: '<?= base_url(); ?>increaseLike',
            type: 'POST',
            data: { id: dataId },
            success: function (response) {
                var response = JSON.parse(response);

                if (response.status == 'liked') {
                    likeCountSpan.text(response.like_count);
                    $this.removeClass('btn-outline-primary').addClass('btn-danger');
                }
                if (response.status == 'disliked') {
                    likeCountSpan.text(response.like_count);
                    $this.removeClass('btn-danger').addClass('btn-outline-primary');
                }
            }
        });
    });
    // comment add 
    $("#comment_form").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: "/add_comments",
            type: "POST",
            data: formData,
            success: function (data) {
                if (data) {
                    $('#comment').val('');
                    $('#comment_form').trigger("reset");
                    // alert('you have commented on a post');
                    location.reload();
                }
            }
        });
    });


    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop: true,                // Enables infinite loop
            margin: 10,                // Margin between items
            dots: true,                // Show pagination dots
            autoplay: false,            // Automatically play the carousel
            autoplayTimeout: 2000,     // Time between slides (3 seconds)
            autoplayHoverPause: true,  // Pause on hover
            smartSpeed: 800,           // Transition speed (800ms)
            responsive: {
                0: {
                    items: 1           // Number of items for screen width 0-599px
                },
                600: {
                    items: 1        // Number of items for screen width 600-999px
                },
                1000: {
                    items: 1     // Number of items for screen width 1000px and above
                }
            }
        });
    });


</script>