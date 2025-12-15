jQuery(function ($) {

    function toggleFields(item) {
        let type = item.find('.qst-type').val();

        if (type === 'text') {
            item.find('.qst-text').show();
            item.find('.qst-radio').hide();
        } else {
            item.find('.qst-text').hide();
            item.find('.qst-radio').show();
        }
    }

    // Initial load (VERY IMPORTANT)
    $('.question-item').each(function () {
        toggleFields($(this));
    });

    // Change type
    $(document).on('change', '.qst-type', function () {
        toggleFields($(this).closest('.question-item'));
    });

    // Add Question
    $('#add-question').on('click', function () {

        let index = $('.question-item').length;

        let html = `
        <div class="question-item" style="border:1px solid #ddd; padding:15px; margin-bottom:15px;">

            <label><strong>Question</strong></label>
            <input type="text" name="qst[${index}][question]" style="width:100%;">

            <label><strong>Type</strong></label>
            <select name="qst[${index}][type]" class="qst-type">
                <option value="text">Text</option>
                <option value="radio">Radio</option>
            </select>

            <div class="qst-text">
                <input type="text" name="qst[${index}][answer]" placeholder="Short answer" style="width:100%;">
            </div>

            <div class="qst-radio" style="display:none;">
                <input type="text" name="qst[${index}][options][]" placeholder="Option" style="width:100%; margin-bottom:6px;">
                <button type="button" class="add-option button">Add Option</button>
            </div>
        </div>
        `;

        $('#questions-wrapper').append(html);
    });

    // Add Option
    $(document).on('click', '.add-option', function () {
        let wrapper = $(this).closest('.qst-radio');
        let name = wrapper.find('input').first().attr('name');

        $(this).before(
            `<input type="text" name="${name}" placeholder="Option" style="width:100%; margin-bottom:6px;">`
        );
    });

});
