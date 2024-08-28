<style>
    .side-bar {
        width: 20%;
        position: sticky;
        box-shadow: 2px 7px 6px 0px #ede5e5;
    }

    .main {
        width: 55%;
        box-shadow: 2px 7px 6px 0px #ede5e5;
    }

    .side-bar a {
        color: #000;
        text-decoration: none;
    }

    .side-bar ul li,
    .side-bar ul {
        padding: 10px;
        border-radius: 20px;
    }

    .side-bar ul li .fas {
        margin-right: 20px;
    }

    .side-bar ul li:hover {
        background-color: #efefef;
    }

    .side-bar ul li.active,
    .side-bar ul li.active a {
        background-color: black;
        color: white;
    }
</style>
<div class="wrapper d-flex flex-row">

    <div class="side-bar left">
        <ul class="list">
            <li class="list-group-item align-items-center active d-flex align-items-center ">
                <div class="d-flex align-items-center">
                    <i class="fas fa-2x fa-fire-alt text-danger mr-2"></i>
                    <a class="" href="#">
                        Trending
                    </a>
                </div>
            </li>
            <li class="list-group-item d-flex align-items-center ">
                <div class="d-flex align-items-center">
                    <i class="fas fa-2x fa-envelope text-info mr-2 pr-2"></i>
                    <a class="ml-3 d-block" href="#">
                        Messages
                    </a>
                </div>
            </li>
            <li class="list-group-item d-flex align-items-center ">
                <div class="d-flex align-items-center">
                    <i class="fas fa-2x fa-paint-brush text-primary mr-2"></i>
                    <a class="ml-3" href="#">
                        My Posts
                    </a>
                </div>
            </li>
            <li class="list-group-item d-flex align-items-center ">
                <div class="d-flex align-items-center">
                    <i class="fas fa-2x fa-plus-square text-warning mr-2"></i>
                    <a class="ml-3" href="#">
                        Create
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <div class="main ">
        <div class="px-4">
            <h2>Latest Feed</h2>
        </div>
        <div class="container my-5 d-flex flex-column w-75 justify-content-center align-items-center">
            <div class="">
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
                                            <div
                                                class="position-absolute top-0 end-0 bg-info text-white rounded-pill px-2 py-1 m-2">
                                                <b><?= count($images) - 1; ?>+</b>
                                            </div>
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
                                            <button class="btn btn-outline-primary bg-primary btn-sm like-btn text-white"
                                                type="button" data-id="<?= $blog_id; ?>">
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
            <h1 class="text-center">There is No Post yet..</h1>
        <?php } ?>
    </div>

    <div class="side-bar right">
        <div class="ad-container">

        </div>
    </div>

</div>