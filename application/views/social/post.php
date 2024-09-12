<div class="post-wrapper pb-44" style="min-width:300px; max-width: 800px;">
    <div class="p-4 bg-white shadow min-w-[300px] ">
        <div class="top-section py-4 mt-11" >
<!--			--><?php //= var_dump($user); ?>
			<div class="rounded-full overflow-hidden" style="width: 30px; height: 30px;">
				<?php if( $user->user_profile_pic  !== null):?>
					<img src="<?=base_url().'uploads/user_profiles/'.$user->user_profile_pic ?> " alt="" style="object-fit: cover; width: 100%; height: 100%;"/>
				<?php else:?>
					<i class="fa fa-user-circle" aria-hidden="true"></i>
				<?php endif;?>
				<h5 class="mt-0 font-bold text-lg mb-1"><?= $user->user_name ?></h5>

			</div>

        </div>
		<div class="img-wrapper">
			<img src="<?= base_url() ."uploads/blog_images/" . $blog->image_url ?>" alt="">
		</div>
		<div class="interaction-bar bg-gray-100 p-2 ">
			<div class="flex justify-evenly">
				<a href="#"> <i class="fa-solid fa-heart"></i> Like</a>
				<a href="#"> <i class="fa-solid fa-comment"></i> Comment</a>
				<a href="#"> <i class="fa-solid fa-share"></i> Share</a>
			</div>
		</div>
		<div class="post-content py-6">
			<p class="text-xl"><?=  $blog->content ?></p>
		</div>
		<span class="action-item d-flex flex-column align-items-center">
                    <button class="btn btn-icon btn-sm btn-primary comment-btn" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-comment-alt"></i></span>
                    </button>
                    <span><?= count($comments) ?>+</span>
                </span>
		<form action="/add_comments" method="POST" id='comment_form' class="mt-3">
			<div class="comment-form">
				<div class="form-group ">
                    <textarea name="comment" id="comment" class="w-full border p-1" placeholder="Write your comment here..."
							 rows="4" required></textarea>
				</div>
				<input type="hidden" name="blog_id" value="<?= $blog->post_id; ?>">
				<button type="submit" class="px-4 py-2 m-2 bg-accent rounded-full shadow-sm text-white hover:bg-accent-light">
					<i class="fas fa-paper-plane mr-2"></i> Post Comment
				</button>
			</div>
		</form>
		<ul class="list-unstyled comment-list mb-20">
			<!-- Comment 1 -->
			<?php foreach ($comments as $comment) {
				?>

				<li class="media mb-3 border p-4">
					<div class="media-body">
						<div class="user flex items-center text-nowrap flex-nowrap">
				<div class="rounded-full overflow-hidden" style="width: 30px; height: 30px;" >
					<?php if($comment['user_profile_pic'] !== null):?>
						<img src="<?=base_url().'uploads/user_profiles/'.$comment['user_profile_pic']?> " alt="" style="object-fit: cover; width: 100%; height: 100%;"/>
					<?php else:?>
				<i class="fa fa-user-circle" aria-hidden="true"></i>
				<?php endif;?>
				</div>
					<h5 class="mt-0 font-bold text-lg mb-1"><?= $comment['user_name'] ?></h5>

						</div>
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
