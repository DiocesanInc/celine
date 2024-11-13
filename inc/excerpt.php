<?php

/**
 * Filter the except length to 50 words.
 *
 * @link https://developer.wordpress.org/reference/hooks/excerpt_length/
 *
 * @param integer $length Excerpt length.
 * @return integer modified excerpt length.
 */
function custom_excerpt_length($length)
{
    return 20;
}

/**
 * Filter the excerpt "read more" string.
 *
 * @link https://developer.wordpress.org/reference/hooks/excerpt_more/
 *
 * @param string $more "Read more" excerpt string.
 * @return string modified "read more" excerpt string.
 */
function celine_excerpt_more($more)
{
    return '…';
}