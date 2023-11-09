<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();
$page_bg = get_field('page_bg', 'options');
$not_found_icon = get_field('not-found_icon', 'options');
$page_title = get_field('page_title', 'options');
?>
<!-- BEGIN of 404 page -->
<div class='not-found' <?php bg($page_bg['url'], 'full_hd'); ?>>
    <div class='overlay'></div>
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell text-center">
                <div class='not-found__icon'>
                    <?php echo wp_get_attachment_image($not_found_icon['id'], 'large');?>
                </div>
                <h1><?php echo $page_title; ?></h1>
                <a class="button" href="%1s">Return home</a>
            </div>
        </div>
    </div>
</div>
<!-- END of 404 page -->
<?php get_footer(); ?>
