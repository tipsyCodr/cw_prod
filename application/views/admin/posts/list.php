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
        <div class="flex flex-col items-center justify-center w-full">
            <div class="py-6 border-y px-2 " style="max-width:600px">
                <div class="flex items-center ">
                    <a href="profile/<?= $blog['user_id']; ?>" class="flex ">
                        <?php if (empty($blog['user_image'])): ?>
                            <i class="fas fa-2x fa-user-circle h-10 w-10 rounded-full  text-accent"></i>
                        <?php else: ?>
                            <img src="<?= base_url() ?>/uploads/user_images/<?= $blog['user_image']; ?>" alt=""
                                class="h-10 w-10 rounded-full " />
                        <?php endif; ?>
                        <div class="">
                            <span
                                class="font-bold text-xl"><?= empty($blog['username']) ? 'Anonymous' : $blog['username']; ?></span>
                        </div>
                    </a>
                </div>
                <a href="<?= base_url('cw_yaris3556/admin/post/view/' . $blog['post_id']) ?>"
                    class="text-primary text-decoration-none ">
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
                    <div class=' border-b-2 flex justify-evenly items-center'>
                        <?php if ($blog['admin_ban'] == 0) { ?>
                            <a class='bg-red-500 hover:bg-red-600 block w-full text-center text-white py-2'
                                href="<?= base_url('cw_yaris3556/admin/post/ban/' . $blog_id) ?>" data-id="<?= $blog_id; ?>">
                                <i class="fa fa-lock hover:text-red-500 transition-all "></i><span class="text-lg"> Ban Post </span>
                            </a>
                        <?php } else { ?>
                            <a class='bg-green-500 hover:bg-green-600 block w-full text-center text-white py-2'
                                href="<?= base_url('cw_yaris3556/admin/post/unban/' . $blog_id) ?>" data-id="<?= $blog_id; ?>">
                                <i class="fa fa-lock hover:text-red-500 transition-all "></i><span class="text-lg"> Unban Post
                                </span>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="flex justify-start my-2">
                        <div class="flex items-center gap-x-2">
                            <?php if ($likedstatus) { ?>
                                <p class=" " id='like-<?= $blog_id; ?>' data-id="<?= $blog_id; ?>"><i
                                        class="fa fa-heart text-red-400"></i></p>
                            <?php } else { ?>
                                <p class=" rounded-full text-white" data-id="<?= $blog_id; ?>"><i
                                        class="fa fa-heart text-red-400 "></i>
                                </p>
                            <?php } ?>
                            <span><?= $like_count ?></span>
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
    <p class="text-center text-gray-700 mb-[50px]">End Of Post</p>
</div>
</div>
<!-- loop ends -->