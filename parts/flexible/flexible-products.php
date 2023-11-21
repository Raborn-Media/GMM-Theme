<?php
$section_title = get_sub_field('section_title');
$section_button = get_sub_field('section_button');
$section_bg = get_sub_field('section_bg');
$section_text = get_sub_field('section_text');
$section_bottom_image = get_sub_field('section_bottom_image');
$section_bottom_text = get_sub_field('section_bottom_text');
$top_graphics = get_sub_field('top_graphics');
?>

<!-- BEGIN  products-section -->
<section
    class='products-section <?php echo $top_graphics == true ? 'section-top-triangle' : ''; ?>' <?php bg($section_bg['url'], 'full_hd'); ?>>
    <?php if ($section_bg) : ?>
        <div class='overlay'></div>
    <?php endif; ?>
    <div class='grid-container products-container'>
        <div class='grid-x'>
            <div class='cell text-center'>
                <?php if ($section_title) : ?>
                    <h2 class='section-title'>
                        <?php echo $section_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($section_text) : ?>
                    <article class='section-text'>
                        <?php echo $section_text; ?>
                    </article>
                <?php endif; ?>

                <?php
                $featured_posts = get_sub_field('products_list');
                if ($featured_posts): ?>
                    <div class='products-list text-center'>
                        <?php foreach ($featured_posts as $post):
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post);
                            ?>
                            <a href='<?php the_permalink(); ?>' class='product matchHeight'>
                                <div class='product__image'>
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <h4 class='product__title'>
                                    <?php the_title(); ?>
                                </h4>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>
                <?php if ($section_button) : ?>
                    <a href='<?php echo $section_button['url']; ?>' class='section-button button'>
                        <?php echo $section_button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class='bottom-content'>
        <div class='grid-container fluid'>
            <div class='grid-x'>
                <div class='cell large-6 matchHeight image-col'>
                    <?php if ($section_bottom_image) : ?>
                        <div class='bottom-content__imege'>
                            <?php echo wp_get_attachment_image($section_bottom_image['id'], 'full_hd'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class='cell large-6 text-col matchHeight'>
                    <?php if ($section_bottom_text) : ?>
                        <div class='bottom-content__text-wrap'>
                            <article class='bottom-content__text'>
                                <?php echo $section_bottom_text; ?>
                            </article>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END  products-sectio -->
