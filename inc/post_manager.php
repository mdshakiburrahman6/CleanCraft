<?php

// This file is for managing the default wordpress posts
function cleancraft_post_excerpt_more($length){
    return 25;
}
add_filter('excerpt_length', 'cleancraft_post_excerpt_more');