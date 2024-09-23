<div class="wrapper ">
    <div class="post-wrapper">
        <div class="img-wrapper p-3">
            <img src="<?= base_url() . 'uploads/blog_images/' . $post->image_url ?>" alt="">

        </div>
        <div class="content-wrapper p-3">
            <p class="description"><?= $post->content ?></p>
        </div>
        <div class="comment-wrapper">
            <div class="post-comment-wrapper">
                <div class="border-2 rounded-lg m-2">
                    <form action=" <?= base_url('admin/posts/comment/add') ?>" method="POST">
                        <textarea class="w-full rounded-t-lg border-none" name="comment" id="comment"
                            rows="3"></textarea>
                        <input class=" w-full p-2 rounded-b-lg bg-blue-500 hover:bg-blue-600 text-white" type="submit"
                            value="Comment">
                    </form>
                </div>
                <div class="comments pb-10">
                    <h3 class="my-3 mx-2 font-bold text-xl">All Comments </h3>
                    <ul class="list-unstyled comment-list">
                        <?php foreach ($comments as $comment) {
                            ?>
                            <li class="media p-2 bg-gray-50 hover:bg-gray-200 rounded-lg my-2 mx-4 flex justify-between">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-bold"><?= $comment['user_name'] ?> said:
                                        <span class="font-normal"><?= $comment['comment_text'] ?></span>
                                    </h5>
                                </div>
                                <div class="flex items-center">
                                    <?php if ($comment['admin_delete'] == 0) { ?>
                                        <a class=' inline-block p-2 bg-red-500 hover:bg-red-600 m-1 text-white rounded-md'
                                            href="<?= base_url('cw_yaris3556/admin/comment/delete/' . $comment['comment_id']) ?>">
                                            Delete</a>
                                    <?php } else { ?>
                                        <a class=' inline-block p-2 bg-orange-500 hover:bg-orange-600 m-1 text-white rounded-md'
                                            href="<?= base_url('cw_yaris3556/admin/comment/restore/' . $comment['comment_id']) ?>">
                                            Restore </a>
                                    <?php } ?>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>