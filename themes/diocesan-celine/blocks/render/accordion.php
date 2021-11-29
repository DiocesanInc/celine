<?php

/**
 * Block Name: Accordion
 * This is the template that displays the Accordion block.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package dpiChild
 */

// create id attribute for specific styling
$id = 'accordion-' . $block['id'];
?>

<div class="accordion-block" id="<?php echo $id; ?>">
    <div class="accordion">
        <?php if (have_rows('accordion')) :
            while (have_rows('accordion')) : the_row(); ?>
        <div class="accordion-section-title has-primary-background-color has-white-color">
            <h4 class="font-header">
                <?php the_sub_field('section_title'); ?>
            </h4>
            <div class="accordion-toggle">
                <i class="fas fa-plus"></i>
                <i class="fas fa-minus"></i>
            </div>
        </div>
        <div class="accordion-content">
            <?php the_sub_field('section_content'); ?>
        </div>
        <?php endwhile;
        endif; ?>
    </div>
</div>

<style type="text/css">
#<?php echo $id;

?> {
    margin-bottom: 3.5rem;
}

#<?php echo "$id .accordion-section-title";

?> {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid var(--clr-primary);
    border-radius: 10px;
    padding: 0;
    margin: 1.5625rem 0 0;
    min-height: 3rem;
    transition: border-radius .4s ease;
}

#<?php echo "$id .accordion-section-title h4";

?> {
    margin: 0 0 0 1em;
    padding-right: 2rem;
}

#<?php echo "$id .accordion-section-title .ui-accordion-header-icon.ui-icon";

?> {
    display: none;
}

#<?php echo "$id .accordion-section-title .accordion-toggle .fa-minus";
?>,
#<?php echo "$id .accordion-section-title.ui-accordion-header-active .accordion-toggle .fa-plus";
?>,
#<?php echo "$id .accordion-section-title .accordion-toggle .fa-plus";
?>,
#<?php echo "$id .accordion-section-title.ui-accordion-header-active .accordion-toggle .fa-minus";

?> {
    transition: transform .4s ease;
    position: absolute;
    right: 1rem;
    top: 1.5rem;
}

#<?php echo "$id .accordion-section-title .accordion-toggle .fa-plus";
?>,
#<?php echo "$id .accordion-section-title.ui-accordion-header-active .accordion-toggle .fa-minus";

?> {
    transform: translateY(-50%) scale(1);
}

#<?php echo "$id .accordion-section-title .accordion-toggle .fa-minus";
?>,
#<?php echo "$id .accordion-section-title.ui-accordion-header-active .accordion-toggle .fa-plus";

?> {
    transform: translateY(-50%) scale(0);
}

#<?php echo "$id .accordion-section-title.ui-accordion-header-active";

?> {
    background: <?php echo is_array(get_field('primary_color', 'options')) ? "linear-gradient(90deg, var(--clr-primary), var(--clr-primary-2))": "var(--clr-primary)";
    ?>;
    border-radius: 10px 10px 0 0;
}

#<?php echo "$id .accordion-content";

?> {
    border-radius: 0 0 10px 10px;
}

#<?php echo "$id .accordion-content ol";
?>,
#<?php echo "$id .accordion-content ul";

?> {
    margin-left: 0;
}

#<?php echo "$id .accordion-content p";

?> {
    margin-bottom: 1.5em;
}
</style>

<script>
jQuery(".accordion").accordion({
    collapsible: true,
    active: false,
    heightStyle: "content",
});
</script>