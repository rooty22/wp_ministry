// jQuery(document).ready(function($) {
//     $('#bootu').click(function() {
//         // e.preventDefault();

//         var postType = $('#post_type_select').val();
//         var postTitle = $('#post_title').val();
//         var postContent = $('#post_content').val();

//         var nonce = ajax_auth_object2.nonce;

//         $.ajax({
//             url: ajax_auth_object2.ajaxurl,
//             type: 'POST',
//             data: {
//                 action: 'create_custom_post',
//                 post_type: postType,
//                 post_title: postTitle,
//                 post_content: postContent,
//                 nonce: nonce
//             },
//             success: function(response) {
//                 $('#form-response').html(response);
//             },
//             error: function(xhr, status, error) {
//                 console.log('AJAX Error:', error);
//             }
//         });
//     });
// });


jQuery(document).ready(function($) {
    function fetchData() {
        $.ajax({
            url: ajax_outo_object.ajaxurl, 
            type: 'POST',
            data: {
                action: 'filterOutoCateAll',
                // nonce: nonce, 
            },
            success: function(response) {
                var data = JSON.parse(response);

                var total = data.total;
                var nostartP = total ? Math.round((data.nostart / total) * 100) : 0;
                var ongoingP = total ? Math.round((data.ongoing / total) * 100) : 0;
                var endedP = total ? Math.round((data.ended / total) * 100) : 0;
                var stoppedP = total ? Math.round((data.stopped / total) * 100) : 0;

                $('#noStart').text(data.nostart);
                $('#nostartP').text(nostartP + '%');

                $('#onGoing').text(data.ongoing);
                $('#ongoingP').text(ongoingP + '%');

                $('#ended').text(data.ended);
                $('#endedP').text(endedP + '%');

                $('#stopped').text(data.stopped);
                $('#stoppedP').text(stoppedP + '%');

            },
            error: function() {
                $('#result').text('An error occurred.');
            }
        });
    }

    // استدعاء الدالة مباشرة عند تحميل الصفحة
    fetchData();

    $('#outoChan').on('change', function() {
        var selectedValue = $(this).val();
        if(selectedValue === 'all') {
            location.reload('/outbut_m1');
        }
    });
});

jQuery(document).ready(function($) {
    
    $('#outo').click(function() {

        var nonce = ajax_outo_object.nonce;

        var categoryID = $('#outoChan').val();

        $.ajax({
            url: ajax_outo_object.ajaxurl,
            type: 'POST',
            data: {
                action: 'filterOutoCate',
                catOut: categoryID,
                nonce: nonce
            },
            success: function(response) {
                var data = JSON.parse(response);

                var total = data.total;
                var nostartP = total ? Math.round((data.nostart / total) * 100) : 0;
                var ongoingP = total ? Math.round((data.ongoing / total) * 100) : 0;
                var endedP = total ? Math.round((data.ended / total) * 100) : 0;
                var stoppedP = total ? Math.round((data.stopped / total) * 100) : 0;

                $('#noStart').text(data.nostart);
                $('#nostartP').text(nostartP + '%');

                $('#onGoing').text(data.ongoing);
                $('#ongoingP').text(ongoingP + '%');

                $('#ended').text(data.ended);
                $('#endedP').text(endedP + '%');

                $('#stopped').text(data.stopped);
                $('#stoppedP').text(stoppedP + '%');
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', error);
            }
        });

    })
});

// Show Page
jQuery(document).ready(function($) {
    
    $('#outoShow').click(function() {

        var categoryID = $('#outoShow').val();

        // $.ajax({
        //     url: ajax_outo_object.ajaxurl,
        //     type: 'POST',
        //     data: {
        //         action: 'filterOutoShow',
        //         catOut: categoryID
        //     },
        //     success: function(response) {
        //         // var data = JSON.parse(response);
        //         // $('#makeShow').html(response);
        //         // console.log(response);
                
        //     },
        //     error: function(xhr, status, error) {
        //         console.log('AJAX Error:', error);
        //     }
        // });

    })

});

// Edit Post
// jQuery(document).ready(function($) {
//     $('#editPoso').on('click', function() {

//         var postId = $('#postId').val();

//         var postTitle = $('#post_title').val();
//         var postDateF = $('#post_date_from').val();
//         var postDateT = $('#post_date_to').val();
//         var postContent = $('#post_feqa').val();
//         var postNum = $('#post_num').val();
//         var postMoasher = $('#post_moasher').val();
//         var postKhetat = $('#post_khetat').val();
//         var postMostah = $('#post_mostah').val();
//         var postTahaqaq = $('#post_tahaqaq').val();
//         var customFieldRadio = $('.radio-container input[name="custom_field_radio"]:checked').val();
//         var Soubat = $('#soubat').val();
//         var anyUpdate = $('#any_updatee').val();

//         var category = $('#editPoFilter').val();

//         $.ajax({
//             url: ajax_outo_object.ajaxurl,
//             method: 'POST',
//             data: {
//                 action: 'update_custom_post',
//                 post_id: postId,
//                 post_title: postTitle,
//                 post_cont: postContent,
//                 post_date_from: postDateF,
//                 post_date_to: postDateT,
//                 post_num: postNum,
//                 post_moasher: postMoasher,
//                 post_ketat: postKhetat,
//                 post_mostah: postMostah,
//                 post_tahqeeq: postTahaqaq,
//                 post_soubat: Soubat,
//                 post_any: anyUpdate,
//                 post_redio: customFieldRadio,
//                 category: category
//             },
//             success: function(response) {
//                 $('#form-response').html(response);
//             },
//             error: function(xhr, status, error) {
//                 console.log('AJAX Error:', error);
//             }
//         });
//     });
// });

jQuery(document).ready(function($) {
    $('#editCustomPostForm').submit(function(e) {
        e.preventDefault();

        var categoryID = $('#editPoFilter').val();

        let formData = $(this).serialize();
        formData += '&catID=' + categoryID;

        $.ajax({
            type: 'POST',
            url: ajax_outo_object.ajaxurl,
            data: formData + '&action=update_custom_post',
            success: function(response) {
                if (response.success) {
                    alert('Post saved successfully');
                    location.reload('/show_m_one');
                } else {
                    alert(response.data.message);
                }
            },
            error: function(response) {
                alert('There was an error.');
            }
        });
    });
});

// Upload Photo
document.addEventListener('DOMContentLoaded', function() {
    jQuery(document).ready(function($) {
        $('#uploadImageButton').click(function() {
            let fileInput = $('#post_image')[0];
            if (fileInput.files.length > 0) {
                let file = fileInput.files[0];
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_data').val(e.target.result);
                    $('#uploadModal').modal('hide');
                    $('.modal-backdrop').remove(); // إزالة الخلفية السوداء عند إغلاق المودال
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please select an image to upload.');
            }
        });

        $('#post_form').submit(function(e) {
            e.preventDefault();

            let formData = {
                'action': 'create_custom_post',
                'post_title': $('#post_title').val(),
                'post_content': $('#post_content').val(),
                'image_data': $('#image_data').val(),
                'post_nonce_field': $('#post_nonce_field').val()
            };

            $.ajax({
                type: 'POST',
                url: ajax_outo_object.ajaxurl,
                data: formData,
                success: function(response) {
                    if (response.success) {
                        alert('Post created successfully!');
                        window.location.reload();
                    } else {
                        alert(response.data.message);
                    }
                },
                error: function(response) {
                    alert('There was an error.');
                }
            });
        });
    });
});

// Form Mass 2
jQuery(document).ready(function($) {

    // النسبة الكلية
    function calculateOverallPercentage() {
        var total = 0;
        var count = 0;

        $('#content1 input[type="number"]').each(function() {
            var value = parseFloat($(this).val());
            if (!isNaN(value)) {
                total += value;
                count++;
            }
        });

        if (count === 0) {
            $('#green-text').text('');
            return;
        }

        var overallPercentage = total / count;
        $('#green-text').text(overallPercentage.toFixed(2) + '%');
    }

    $('#content1 input[type="number"]').on('input', function() {
        calculateOverallPercentage();
    });

    // حساب النسبة المئوية عند تحميل الصفحة إذا كانت هناك قيم مدخلة مسبقًا
    calculateOverallPercentage();
    
    // حساب قيمة
    function calculatePairPercentage(id1, id2, displayId) {
        var num1 = parseFloat($('#' + id1).val());
        var num2 = parseFloat($('#' + id2).val());

        if (!isNaN(num1) && !isNaN(num2) && num2 !== 0) {
            var percentage = (num2 / num1) * 100;
            var percentageText = percentage.toFixed(2) + '%';
            
            $('#' + displayId).text(percentageText);
        } else {
            $('#' + displayId).text('');
        }
    }

    function calculateAllPercentages() {
        calculatePairPercentage('post_adud', 'post_adud2', 'showe1');
        calculatePairPercentage('post_adud3', 'post_adud4', 'showe2');
        calculatePairPercentage('post_adud5', 'post_adud6', 'showe3');
        calculatePairPercentage('post_adud7', 'post_adud8', 'showe4');
    }

    $('#content1 input[type="number"]').on('input', function() {
        calculateAllPercentages();
    });

    // ارسال بيانات
    $('#wizard_form_mess2').submit(function(e) {
        e.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: ajax_outo_object.ajaxurl,
            data: formData + '&action=submit_form_wizz',
            success: function(response) {
                alert('Post added successfully');
                console.log(response);
                location.reload('/input-mass2');
            },
            error: function(response) {
                alert('There was an error.');
                console.log(response);
            }
        });
    });
});