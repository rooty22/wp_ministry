jQuery(document).ready(function($) {
    $('#submy').on('click', function () {
        var data = {
            action: 'ajax_login',
            security: ajax_auth_object.nonce,
            username: $('#login-username').val(),
            password: $('#login-password').val(),
        };

        $.post(ajax_auth_object.ajaxurl, data, function (response) {
            var result = JSON.parse(response);

            if (result.loggedin) {
                $('#login-message').css({
                    display: 'block',
                    background: '#000',
                    color: '#FFF',
                    padding: '10px',
                });
                $('#login-message').text('Login Success');
                window.location.href = ajax_auth_object.siteUrl + '/';
                // console.log(ajax_auth_object.siteUrl);
            }
            
            // if (result.loggedin) {
            //     location.reload('/home');
            // }
        });
    });
});

// Makateb
// jQuery(document).ready(function($) {
//     $('#makatebFilter').change(function() {
//       var categoryID = $(this).val();
//       $.ajax({
//         url: ajax_auth_object.ajaxurl, 
//         type: 'POST',
//         data: {
//           action: 'filterPostsByCategory', 
//           catID: categoryID
//         },
//         success: function(response) {
//             // $('#makatebVal').html(response); 
//             $('[id=makatebVal]').hide();
//             // عرض النتائج في العنصر المحدد
//             $('#makatebVal').html(response).show(); 
//         },
//       });
//     });
// });

jQuery(document).ready(function($) {
    $('#mass1 #nextButton').click(function() {

        var selectedOption = $('#makatebFilter').val();
        if(selectedOption && !isNaN(selectedOption)) {

            var postTitle = $('#post_title').val();
            var postDateF = $('#post_date_from').val();
            var postDateT = $('#post_date_to').val();
            var postContent = $('#post_feqa').val();
            var postNum = $('#post_num').val();
            var postMoasher = $('#post_moasher').val();
            var postKhetat = $('#post_khetat').val();
            var postMostah = $('#post_mostah').val();
            var postTahaqaq = $('#post_tahaqaq').val();
            var customFieldRadio = $('.radio-container input[name="custom_field_radio"]:checked').val();
            var Soubat = $('#soubat').val();
            var anyUpdate = $('#any_updatee').val();

            $.ajax({
                url: ajax_auth_object.ajaxurl, 
                type: 'POST',
                data: {
                    action: 'filterPostsByCategory', 
                    post_title: postTitle,
                    post_content: postContent,
                    post_date_from: postDateF,
                    post_date_to: postDateT,
                    post_num: postNum,
                    post_moasher: postMoasher,
                    post_ketat: postKhetat,
                    post_mostah: postMostah,
                    post_tahqeeq: postTahaqaq,
                    post_soubat: Soubat,
                    post_any: anyUpdate,
                    post_redio: customFieldRadio,
                    catID: selectedOption
                },
                success: function(response) {
                    alert('Success');
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);
                }
            });
        } else {
            alert('لم يتم اختيار أي رقم من القائمة المنسدلة.');
        }
        
    });
});

// QR Upload
jQuery(document).ready(function($) {
    $('input[name="link"]').change(function() {
        if ($('#qrRadio').is(':checked')) {
            $('#qrInput').show();
            $('#linkTextInput').hide();
        } else {
            $('#qrInput').hide();
            $('#linkTextInput').show();
        }
    });

    $('#custom-posty-form').click(function() {

        var formData = new FormData($('#customy-post-form')[0]);
        var nonce = ajax_auth_object.nonce;

        formData.append('action', 'filterPostsByCategory');
        formData.append('nonce', nonce);

        $.ajax({
            url: ajax_auth_object.ajaxurl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert('Success');
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', error);
            }
        });
    });
});


