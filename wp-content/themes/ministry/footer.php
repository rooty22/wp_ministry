
<?php if(is_front_page()):?>
<!-- Modal -->
<div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="customy-post-form" class="mx-3" enctype="multipart/form-data">
                    <div class="d-flex justify-content-center mt-3">
                        <div class="mb-3">
                            <div class="d-flex">
                                <input type="radio" name="link" id="qrRadio" class="modal_radio" checked />
                                <label for="qrRadio">رفع QR</label>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex mr-5">
                                <input type="radio" name="link" id="linkRadio" class="modal_radio" />
                                <label for="linkRadio">إدخال رابط</label>
                            </div>
                        </div>
                    </div>
                    <!-- <input type="file" id="qrInput" class="modal_link_input w-100 py-3 px-2 rounded" />
                    <input type="text" placeholder="أدخل الرابط (URL)" id="linkTextInput"
                        class="form-control modal_link_input py-4 px-2" style="display: none;" />
                    <button type="submit" class="w-100 btn btn-success mb-3">رفع الملف</button> -->

                    <input type="file" name="qr_input" id="qrInput" class="modal_link_input w-100 py-3 px-2 rounded" />
                    <input type="text" name="link_text_input" placeholder="أدخل الرابط (URL)" id="linkTextInput" class="form-control modal_link_input py-4 px-2" style="display: none;" />
                    <button type="button" id="custom-posty-form" class="w-100 btn btn-success mb-3">رفع الملف</button>

                </form>
            </div>
        </div>
    </div>
</div>
<?php endif;?>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/scripts.js"></script>

<?php wp_footer(); ?>

</body>
</html>
