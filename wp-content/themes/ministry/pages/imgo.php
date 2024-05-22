<?php
/*
Template Name: Wizard Form Template
*/

get_header();

?>

<div class="container">
    <h1>Create a New Post</h1>
    <form id="post_form" method="POST" enctype="multipart/form-data">
        <div>
            <label for="post_title">Title:</label>
            <input type="text" id="post_title" name="post_title" required>
        </div>
        <div>
            <label for="post_content">Content:</label>
            <textarea id="post_content" name="post_content" required></textarea>
        </div>
        <div>
            <button type="button" data-toggle="modal" data-target="#uploadModal">Upload Image</button>
        </div>
        <div>
            <input type="hidden" id="image_data" name="image_data">
        </div>
        <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
        <div>
            <button type="submit">Create Post</button>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="file" id="post_image" name="post_image" accept="image/*">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="uploadImageButton">Upload</button>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
?>
