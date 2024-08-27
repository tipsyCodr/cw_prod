<?php if ($this->session->flashdata('added_blog')): ?>
    <script>
        swal("Created..!", "Blog Created Successfully..", 'success');
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error_blog')): ?>
    <script>
        swal("Oops...!", "There are sometimes wrong Please Try after some time", 'error');
    </script>
<?php endif; ?>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bg-white p-4 rounded shadow-sm">
                <h4 class="mb-4 text-center">Add Blog</h4>
                <form id="add_blog" action="/add_blog" method="post" enctype="multipart/form-data">
                    <div class="mb-3 position-relative">
                        <input type="file" class="form-control ps-5" name="blog_image[]" id="blog_image" required
                            multiple />
                        <i class="fas fa-image position-absolute top-50 start-0 translate-middle-y ms-3 text-muted fa-2x"></i>
                    </div>
                    <!-- Container to hold the image previews -->
                    <div id="image-preview" class="d-flex flex-wrap justify-content-center mb-3"></div>

                    <div class="mb-3 position-relative">
                        <textarea class="form-control ps-5" name="blog_caption" placeholder="Caption" required
                            style="height: 200px;"></textarea>
                        <i
                            class="fas fa-pencil-alt position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-plus me-2"></i>Add Blog
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Modal to view selected image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Selected Image" class="img-fluid" style="border-radius: 10px;">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Preview images 
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
</script>