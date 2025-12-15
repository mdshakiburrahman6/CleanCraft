jQuery(function ($) {

    function toggleFaqFields() {
        let type = $('#faq_type').val();

        if (type === 'text') {
            $('#faq-text').show();
            $('#faq-radio').hide();
        } else {
            $('#faq-text').hide();
            $('#faq-radio').show();
        }
    }

    function updateOptionLabels() {
        $('#faq-options-wrapper .faq-option-row').each(function (index) {
            let label = String.fromCharCode(65 + index); // A, B, C
            $(this).find('.faq-option-label').text(label);
        });
    }

    // Initial run
    toggleFaqFields();
    updateOptionLabels();

    // On type change
    $('#faq_type').on('change', toggleFaqFields);

    // Add option
    $('#add-radio-option').on('click', function () {

        $('#faq-options-wrapper').append(
            '<div class="faq-option-row">' +
                '<span class="faq-option-label"></span>' +
                '<input type="text" name="faq_options[]" placeholder="Option" style="width:100%;">' +
            '</div>'
        );

        updateOptionLabels();
    });

});
