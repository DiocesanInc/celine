<?php
/**
 * The template for displaying taxonomies
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package transfiguration
 */

use Celine\Theme\Controllers\TemplateController;

get_header();
?>

<?php get_template_part('template-parts/headers/page-header'); ?>

<div class="content-area" id="primary">
    <main class="site-main" id="main">
        <?php if(have_posts()) : ?>
        <div class="entry-content limit-width">
            <?php if(get_post_type() === 'ministry' && term_description()) : ?>
            <div class="<?php echo get_post_type(); ?>-description taxonomy-description">
                <?php echo term_description(); ?>
            </div>
            <?php endif; ?>
            <div class="<?php echo get_post_type(); ?>-container taxonomy-container grid-container">
                <?php $q = new WP_Query(
                    array(
                        'post_type'      => get_post_type(),
                        'post_status'    => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $wp_query->get_queried_object()->taxonomy,
                                    'field' => 'ID',
                                    'terms' => $wp_query->get_queried_object()->term_id,
                                ),
                            ),
                        'posts_per_page' => -1,
                        'orderby'        => array(
                            'menu_order' => 'ASC',
                            'name'       => 'ASC',
                        ),
                    )
                );

                while($q->have_posts()) : $q->the_post();
                    get_template_part("template-parts/cpts/singles/ministry", "group");
                endwhile; ?>
            </div>
            <div class="back-button-container align-center" <?php echo TemplateController::animate("fade-up"); ?>>
                <p>Go back to all ministries</p>
                <a href="/ministries"
                    class="the-button has-primary-color has-primary-border-color has-transparent-background-color"
                    title="ministries">Go Back</a>
            </div>
        </div>
        <?php else :
            get_template_part('template-parts/content', 'none');
        endif; ?>
    </main>
</div>


<?php
get_footer();