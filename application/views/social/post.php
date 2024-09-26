<div class="post-wrapper pb-44" style="margin:0 auto; min-width:300px; max-width: 800px;">
	<div class="p-4  shadow min-w-[300px] ">
		<div class=" top-2 left-2  ">
			<span class=" flex  p-1.5 rounded-full">
				<span class=" bg-gradient-to-tr from-magiColor-blue to-magiColor p-[4px] rounded-full mr-2">
					<?php if (!empty($user->user_profile_pic)): ?>
						<img class=" object-cover rounded-full w-10 h-10 "
							src="<?= base_url() . 'uploads/user_profiles/' . $user->user_profile_pic ?>" alt="" />
					<?php else: ?>
						<i class="py-1 fa fa-user-circle w-10 h-10  text-4xl text-accent-dark"></i>
					<?php endif; ?>
				</span>


				<p class=" flex flex-col justify-start items-start my-auto text-black ">
					<span class="my-auto flex flex-row items-start"><?= $user->user_name ?>
						<?php if ($user->user_verified_status == 1) { ?>
							<i class="my-auto i-[mage--verified-check-fill] text-badgeColor m-1"></i>
						<?php } ?>
					</span>
					<span class="text-xs">@Member</span>
				</p>
			</span>
		</div>
		<div class="img-wrapper rounded-[31px] overflow-hidden">
			<img src="<?= base_url() . "uploads/blog_images/" . $blog->image_url ?>" alt="">
		</div>
		<div class="interaction-bar  p-2 ">
			<div class="social-bar flex items-center">
				<a class='like-btn  cursor-pointer my-auto mx-2' data-id="<?= $blog->post_id; ?>"
					onclick="likePost(this)">
					<?= $likedstatus ?>
					<?php if ($likedstatus == true) { ?>
						<i class="text-2xl text-red-500  i-[teenyicons--heart-solid]"></i>
						<!-- <i class="fa-solid fa-2x fa-heart text-red-500 hover:text-gray-500 transition-all "></i> -->
					<?php } else { ?>
						<i class="text-2xl i-[teenyicons--heart-outline]"></i>
						<!-- <i class="fa-regular fa-2x fa-heart hover:text-red-500 transition-all "></i> -->
					<?php } ?>
				</a>

				<a class="px-1  my-auto mx-2"><i class="text-2xl i-[uil--comment]"></i></a>

				<a class="pb-1 my-auto mx-2"><i class="text-2xl fab fa-whatsapp"></i></a>
			</div>

			<div class="flex px-2">
				<p class="text-md px-1"><span id="like-<?= $blog->post_id; ?>"
						class=""><?= $blog->post_id == null ? 0 : $blog->post_id; ?></span> Likes
					<!-- class=""><?= $likes == null ? 0 : $likes; ?></span> Likes -->
				</p>
				<span class="text-md px-1"><?= count($comments) ?> Comments</span>

			</div>
			<p class="text-sm h-10 overflow-hidden text-ellipsis mt-3 px-4"
				style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
				<span><?= $user->user_name ?> </span><?= $blog->content; ?>
			</p>
		</div>


		<form action="<?= base_url('social/post/comment/add') ?>" method="POST" id='comment_form' class="mt-3">
			<div class="comment-form">
				<div class="form-group ">
					<textarea name="comment" id="comment" class="w-full border p-1"
						placeholder="Write your comment here..." rows="4" required></textarea>
				</div>
				<input type="hidden" name="blog_id" value="<?= $blog->post_id; ?>">
				<button type="submit"
					class="px-4 py-2 m-2 bg-accent rounded-full shadow-sm text-white hover:bg-accent-light">
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
							<div class="rounded-full overflow-hidden" style="width: 30px; height: 30px;">
								<?php if ($comment['user_profile_pic'] !== null): ?>
									<img src="<?= base_url() . 'uploads/user_profiles/' . $comment['user_profile_pic'] ?> "
										alt="" style="object-fit: cover; width: 100%; height: 100%;" />
								<?php else: ?>
									<i class="fa fa-user-circle" aria-hidden="true"></i>
								<?php endif; ?>
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
</script>