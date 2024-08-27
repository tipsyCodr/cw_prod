<style>
    /* Button Hover Effects */
    .like-btn,
    .comment-btn,
    .share-btn {
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .like-btn:hover,
    .comment-btn:hover,
    .share-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    /* Icon Animations */
    .like-btn i,
    .comment-btn i,
    .share-btn i {
        transition: all 0.3s ease;
    }

    .like-btn:active i,
    .comment-btn:active i,
    .share-btn:active i {
        transform: rotate(20deg) scale(1.1);
    }

    /* Active State for Like Button */
    .btn-danger.like-btn {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }

    .btn-danger.like-btn:hover {
        background-color: #c82333;
        border-color: #bd2130;
        transform: scale(1.1);
        background-color: #0056b3;
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
</style>
<div class="container my-5">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center ">
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
                <a href="blog_details/<?= $blog_id; ?>" class="text-primary text-decoration-none">
                    <div class="col-md-4 col-lg-4 mb-4">
                        <div class="card border-light shadow-sm rounded">
                            <div class="position-relative">
                                <img src="<?= base_url() ?>/uploads/blog_images/<?= $images[0]; ?>" alt=""
                                    class="card-img-top rounded-top">
                                <div class="position-absolute top-0 end-0 bg-info text-white rounded-pill px-2 py-1 m-2">
                                    <b><?= count($images) - 1; ?>+</b>
                                </div>
                            </div>
                </a>
                <div class="card-body">
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

        <?php
            }
        } else {
            ?>
    <h1 class="text-center">There is No Post yet..</h1>
<?php } ?>
</div>
</div>

<script>
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
</script>