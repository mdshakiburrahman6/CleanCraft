jQuery(document).ready(function($){
    var frame;
    var $chooseBtn = $('#cleancraft_set_service_image');
    var $removeBtn = $('#cleancraft_remove_service_image');
    var $preview = $('.service-image-preview');
    var $input = $('#service_image_id');

    $chooseBtn.on('click', function(e){
        e.preventDefault();

        if (frame) {
            frame.open();
            return;
        }

        frame = wp.media({
            title: 'Select Service Image',
            button: { text: 'Use this image' },
            multiple: false
        });

        frame.on('select', function(){
            var attachment = frame.state().get('selection').first().toJSON();
            $input.val(attachment.id);

            var img = attachment.sizes?.medium?.url ?? attachment.url;

            $preview.html('<img src="'+img+'" style="max-width:100%;height:auto;">');

            $removeBtn.show();
        });

        frame.open();
    });

    $removeBtn.on('click', function(e){
        e.preventDefault();
        $input.val('');
        $preview.html('');
        $removeBtn.hide();
    });
});
