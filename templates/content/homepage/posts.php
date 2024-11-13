<?php

/**
 * Partial for the Homepage template's News section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

$type = get_field("post_content_type") ? "jump-off" : "news";



get_template_part("/templates/content/homepage/$type");