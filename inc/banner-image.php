<?php

// Add second featured image
add_action('add_meta_boxes', 'page_header_image_add_metabox');
function page_header_image_add_metabox()
{
    add_meta_box('page_headerimagediv', 'Page Header Image', 'page_header_image_metabox', array('post', 'ministry'), 'side', 'low');
}

function page_header_image_metabox($post)
{
    global $content_width, $_wp_additional_image_sizes;

    $image_id = get_post_meta($post->ID, '_page_header_image_id', true);

    $old_content_width = $content_width;
    $content_width = 254;

    if ($image_id && get_post($image_id)) {

        if (!isset($_wp_additional_image_sizes['post-thumbnail'])) {
            $thumbnail_html = wp_get_attachment_image($image_id, array($content_width, $content_width));
        } else {
            $thumbnail_html = wp_get_attachment_image($image_id, 'post-thumbnail');
        }

        if (!empty($thumbnail_html)) {
            $content = $thumbnail_html;
            $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_page_header_image_button" >' . esc_html('Remove Page Header image') . '</a></p>';
            $content .= '<input type="hidden" id="upload_page_header_image" name="_page_header_cover_image" value="' . esc_attr($image_id) . '" />';
        }

        $content_width = $old_content_width;
    } else {

        $content = '<img src="" style="width:' . esc_attr($content_width) . 'px;height:auto;border:0;display:none;" />';
        $content .= '<p class="hide-if-no-js"><a title="' . esc_attr('Set Page Header Image') . '" href="javascript:;" id="upload_page_header_image_button" id="set-page_header-image" data-uploader_title="' . esc_attr('Choose an image') . '" data-uploader_button_text="' . esc_attr('Set Page Header image') . '">' . esc_html('Set Page Header image') . '</a></p>';
        $content .= '<input type="hidden" id="upload_page_header_image" name="_page_header_cover_image" value="" />';
    }

    echo $content;
}

add_action('save_post', 'page_header_image_save', 10, 1);
function page_header_image_save($post_id)
{
    if (isset($_POST['_page_header_cover_image'])) {
        $image_id = (int) $_POST['_page_header_cover_image'];
        update_post_meta($post_id, '_page_header_image_id', $image_id);
    }
}


function selectively_enqueue_admin_script($hook)
{
    if ('post.php' != $hook) {
        return;
    }
    wp_enqueue_script('secondimage', get_template_directory_uri() . '/assets/js/banner-image.js', array(), '1.0');
}
add_action('admin_enqueue_scripts', 'selectively_enqueue_admin_script');
