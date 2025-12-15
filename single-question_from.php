<?php
get_header();

the_post();

$questions = get_post_meta(get_the_ID(), '_questions', true);
$questions = is_array($questions) ? $questions : [];
?>

<div class="question-form-wrapper" style="max-width:700px;margin:40px auto;">

    <h1><?php the_title(); ?></h1>

    <form method="post">

        <?php foreach ($questions as $index => $q): ?>

            <div class="question-block" style="margin-bottom:30px;">

                <p><strong><?php echo esc_html($q['question']); ?></strong></p>

                <?php if ($q['type'] === 'text'): ?>

                    <input
                        type="text"
                        name="answers[<?php echo $index; ?>]"
                        placeholder="Your answer"
                        style="width:100%;padding:10px;"
                    >

                <?php elseif ($q['type'] === 'radio'): ?>

                    <?php foreach ($q['options'] as $opt): ?>
                        <label style="display:block;margin-bottom:8px;">
                            <input
                                type="radio"
                                name="answers[<?php echo $index; ?>]"
                                value="<?php echo esc_attr($opt); ?>"
                            >
                            <?php echo esc_html($opt); ?>
                        </label>
                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

        <button type="submit" style="padding:10px 20px;">
            Submit
        </button>

    </form>

</div>

<?php
get_footer();
