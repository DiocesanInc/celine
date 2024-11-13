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

$headingFontColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["heading_font_color"] : "white";
$headingBackgroundColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["heading_background_color"] : "var(--clr-primary)";

switch ($headingBackgroundColor) {
    case 'var(--clr-primary)':
        $tmpClr = "primary";
        break;
    case 'var(--clr-secondary)':
        $tmpClr = "secondary";
        break;
    case 'var(--clr-tertiary)':
        $tmpClr = "tertiary";
        break;
    case 'var(--clr-quaternary)':
        $tmpClr = "quaternary";
        break;
}

$tmpClrVar = "var(--clr-$tmpClr)";
$tmpClrVar2 = "var(--clr-$tmpClr-2)";

$headingBackgroundColorActive = get_field($tmpClr . "_color", 'options')["is_gradient"] ? "linear-gradient(90deg, $tmpClrVar, $tmpClrVar2)" : $tmpClrVar;

$contentFontColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["content_font_color"] : "black";
$contentBackgroundColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["content_background_color"] : "white";
?>
<div class="wp-block-group">
    <div class="accordion-block" id="<?php echo $id; ?>">
        <div class="accordion">
            <?php if (have_rows('accordion')) :
                while (have_rows('accordion')) : the_row(); ?>
            <div class="accordion-section-title">
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
    border: 1px solid <?php echo $headingBackgroundColor ?>;
    border-radius: 10px;
    padding: 0;
    margin: 1.5625rem 0 0;
    min-height: 3rem;
    transition: border-radius .4s ease;
    background: <?php echo $headingBackgroundColor ?>;
}

#<?php echo "$id .accordion-section-title h4";

?> {
    margin: 0 0 0 1em;
    padding-right: 2rem;
    color: <?php echo get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["heading_font_color"]: "white";
    ?>
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
    color: <?php echo $headingFontColor ?>;
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
    background: <?php echo $headingBackgroundColorActive ?>;
    border-radius: 10px 10px 0 0;
}

#<?php echo "$id .accordion-content";

?> {
    border-radius: 0 0 10px 10px;
    background: <?php echo $contentBackgroundColor ?>;
    color: <?php echo $contentFontColor ?>;
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