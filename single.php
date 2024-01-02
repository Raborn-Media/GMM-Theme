<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header();
get_template_part('parts/hero-section');
?>
<main class="main-content">
    <div class="grid-container single-post-container">
        <div class="grid-x">
            <!-- BEGIN of post content -->
            <div class="large-6 small-12 cell">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) :
                        the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                            <?php if ($product_subtitle = get_field('product_subtitle')) : ?>
                                <h4 class='product-subtitle'>
                                    <?php echo $product_subtitle; ?>
                                </h4>
                            <?php endif; ?>
                            <h2 class="page-title entry__title"><?php the_title(); ?></h2>
                            <div class="entry__content clearfix">
                                <?php the_content('', true); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="large-6 small-12 cell">
                <?php if (has_post_thumbnail()) : ?>
                    <div title="<?php the_title_attribute(); ?>" class="entry__thumb">
                        <div class='product-image'>
                            <?php the_post_thumbnail('full_hd'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($product_second_image = get_field('product_second_image')) : ?>
                    <div title="<?php the_title_attribute(); ?>" class="entry__thumb">
                        <div class='product-image'>
                            <?php echo wp_get_attachment_image($product_second_image['id'], 'full_hd'); ?>
                        </div>
                    </div>
<!---->
<!--                --><?php //else : ?>
<!--                    <div title="--><?php //the_title_attribute(); ?><!--" class="entry__thumb">-->
<!--                        <div class='product-image'>-->
<!--                            --><?php //the_post_thumbnail('full_hd'); ?>
<!--                        </div>-->
<!--                    </div>-->
                <?php endif; ?>
            </div>
            <!-- END of post content -->
        </div>

        <?php if ($technical_data = get_field('technical_data')) : ?>
            <div class='technical-data-wrap'>

                <div class='technical-data-heading'>
                    <h3>
                        <?php _e('Technical Data'); ?>
                    </h3>
                </div>

                <div class='technical-data'>
                    <article>
                        <?php echo $technical_data; ?>
                    </article>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- BEGIN  gallery-section -->
    <!--    --><?php
    //    $images = get_field('gallery_slider');
    //    if ($images): ?>
    <!--        <section class='gallery-section'>-->
    <!--            <div class='grid-container'>-->
    <!--                <div class='grid-x'>-->
    <!--                    <div class='cell'>-->
    <!--                        <div class='gallery-slider'>-->
    <!--                            --><?php //foreach ($images as $image): ?>
    <!--                                <div class='gallery-slider__slide'>-->
    <!--                                    --><?php //echo wp_get_attachment_image($image['id'], 'large', false, ['data-no-lazy' => '1']); ?>
    <!--                                </div>-->
    <!--                            --><?php //endforeach; ?>
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </section>-->
    <!--    --><?php //endif; ?>

    <!-- END  gallery-section -->

    <!-- BEGIN  cta-section -->
    <section class='cta-section'>
        <?php
        $section_title = get_field('section_title', 'options');
        $section_image = get_field('section_image', 'options');
        $section_bg = get_field('section_bg', 'options');
        $section_text = get_field('section_text', 'options');
        $section_button = get_field('section_button', 'options');
        ?>
        <div class='sectio-bg' <?php bg($section_bg['url'], 'full_hd'); ?>>
            <div class='grid-container cta-container'>
                <div class='grid-x'>
                    <div class='cell large-8 content-col'>
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

                        <?php if ($section_button) : ?>
                            <a href='<?php echo $section_button['url']; ?>' class='section-button button'>
                                <?php echo $section_button['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class='cell large-4'>
                        <?php if ($section_image) : ?>
                            <div class='section-image'>
                                <?php echo wp_get_attachment_image($section_image['id'], 'large'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END  cta-section -->

</main>

<?php get_footer(); ?>
