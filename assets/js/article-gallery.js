jQuery(document).ready(function (jQuery) {

    let galleryFrame;

    jQuery('#article_galery_button').on('click', function (e) {
        e.preventDefault();

        if (galleryFrame) {
            galleryFrame.open();
            return;
        }
        galleryFrame = wp.media({
            title: 'Select Article Gallery Images',
            button: {
                text: 'Use selected images'
            },
            multiple: true
        });

        galleryFrame.on('select', function () {

            let selection = galleryFrame.state().get('selection');
            let ids = [];

            jQuery('#gallery_wrapper ul').empty();

            selection.each(function (attachment) {
                attachment = attachment.toJSON();
                ids.push(attachment.id);

                jQuery('#gallery_wrapper ul').append(
                    '<li style="display:inline-block;margin:5px;">' +
                        '<img src="' + attachment.sizes.thumbnail.url + '" />' +
                    '</li>'
                );
            });

            jQuery('#article_galery').val(ids.join(','));
        });

        galleryFrame.open();
    });

});
