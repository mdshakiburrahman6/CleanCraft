<?php
get_header();

the_post();

$questions = get_post_meta(get_the_ID(), '_questions', true);
$questions = is_array($questions) ? $questions : [];
?>

<div class="question-form-wrapper" style="max-width:700px;margin:40px auto;">

   <div class="div question-header">
        <h1 style="margin-bottom:30px;"><?php the_title(); ?></h1>
   </div>

       <div class="question-area">
            <?php foreach ($questions as $index => $q): ?>

                <div class="question-block" style="margin-bottom:30px;">

                    <p><strong><?php echo esc_html($q['question']); ?></strong></p>

                    
                    <?php if($q['type']=='text') : ?>
                        <p><?php echo esc_html($q['answer']); ?></p>
                    <?php  
                        elseif ($q['type']=='radio') :
                            if(!empty($q['options'])) :
                    ?>
                        <ul>
                           <?php foreach($q['options'] as $opt) : 
                                    if(!empty($opt)) :
                            ?>
                                 <li><?php echo esc_html( $opt ); ?></li>
                            <?php   endif;
                                endforeach;
                            ?>
                        </ul>
                    <?php endif; ?>
                    <?php endif; ?>


                </div>

            <?php endforeach; ?>
       </div>

</div>

<?php
get_footer();
