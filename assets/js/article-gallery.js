jQuery(document).ready(function ($) {

    let galleryFrame;

    $('#article_galery_button').on('click', function (e) {
        e.preventDefault();

        // যদি আগেই media frame তৈরি থাকে
        if (galleryFrame) {
            galleryFrame.open();
            return;
        }

        // Media frame তৈরি
        galleryFrame = wp.media({
            title: 'Select Article Gallery Images',
            button: {
                text: 'Use selected images'
            },
            multiple: true
        });

        // Image select হলে
        galleryFrame.on('select', function () {

            let selection = galleryFrame.state().get('selection');
            let ids = [];

            // আগের preview clear
            $('#gallery_wrapper ul').empty();

            selection.each(function (attachment) {
                attachment = attachment.toJSON();
                ids.push(attachment.id);

                $('#gallery_wrapper ul').append(
                    '<li style="display:inline-block;margin:5px;">' +
                        '<img src="' + attachment.sizes.thumbnail.url + '" />' +
                    '</li>'
                );
            });

            // Hidden input-এ ID save
            $('#article_galery').val(ids.join(','));
        });

        galleryFrame.open();
    });

});
