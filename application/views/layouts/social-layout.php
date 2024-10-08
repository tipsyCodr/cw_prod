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
		<div class="popup-body h-full">
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


	<?= $post_slot ?>



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


<script>
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
		$(document).on('click', '.like-btn', function () {
			const $this = $(this);
			const dataId = $this.attr('data-id');
			const likeIcon = $this.children('i');
			const likeCountSpan = $('#like-' + dataId);

			fetch('<?= base_url(); ?>increaseLike', {
				method: 'POST',
				headers: { 'Content-Type': 'application/json' },
				body: JSON.stringify({ id: dataId })
			})
				.then(response => response.json())
				.then(response => {
					// const likeCountSpan = $this.nextElementSibling;
					if (response.status === 'liked') {
						console.log(response)
						likeIcon.removeClass('fa-regular').addClass('fa-solid text-red-500')
					} else if (response.status === 'disliked') {
						console.log('Like disliked')
						likeIcon.removeClass('fa-solid text-red-500').addClass('fa-regular');

					}
				});
		});

	});



</script>
