jQuery(document).ready(function($){

    $('.legitimate-counter').each(function (){
        var allowed_length = $(this).data('maxallowed');
        var existing_length = $(this).val().length;
        var remaining_on_load = parseInt(allowed_length) - parseInt(existing_length);
        // $(this).siblings('span.help-text').text(remaining_on_load);

        $(this).keyup(function (){
            var tlength = $(this).val().length;
            if(tlength > allowed_length) {
                $(this).css({'color':'red'});
            } else {
                $(this).removeAttr('style');
            }
            // var remain = allowed_length - parseInt(tlength);
            // $(this).siblings('span.help-text').text(remain);
        });
    });

    var mediaUploader;
    if($('#legitimate-image').val() !='') {
        $("#legitimate_image_remove_btn").show();
        $("#legitimate_image_btn").hide();
    } else {
        $("#legitimate_image_remove_btn").hide();
        $("#legitimate_image_btn").show();
    }
    $("#legitimate_image_remove_btn").click(function (e){
        e.preventDefault();
        $('#legitimate-image').val('');
        $('#legitimate-img-preview').attr('src','');
        $(this).hide();
        $("#legitimate_image_btn").show();
    })
    $('#legitimate_image_btn').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Chose Legitimate Image',
            library : {
                type : 'image'
            },
            button: {
                text: 'Chose Legitimate Image'
            },
            multiple: false
        });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            if(attachment.url) {
                if(attachment.filesizeInBytes >= 2000000) {
                    $('#image-help').text('you are trying to add an image which is more than the allowed size');
                    $('#image-help').css({'color':'red'});
                } else {
                    $('#legitimate-image').val(attachment.url);
                    $('#legitimate-img-preview').attr('src',attachment.url);
                    $("#legitimate_image_btn").hide();
                    $("#legitimate_image_remove_btn").show();
                    $('#image-help').removeAttr('style');
                    $('#image-help').text('');
                }
            } else {
                $("#legitimate_image_remove_btn").hide();
                $("#legitimate_image_btn").show();
            }

        });
        mediaUploader.open();
    });
});