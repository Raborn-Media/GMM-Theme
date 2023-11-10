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
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <!-- BEGIN of post content -->
            <div class="large-6 small-12 cell">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) :
                        the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                            <h1 class="page-title entry__title"><?php the_title(); ?></h1>
                            <p class="entry__meta"><?php echo sprintf(__('Written by %s on %s', 'fxy'), get_the_author_posts_link(), get_the_time(get_option('date_format'))); ?></p>
                            <div class="entry__content clearfix">
                                <?php the_content('', true); ?>
                            </div>
                            <h6 class="entry__cat"><?php _e('Posted Under: ', 'fxy'); ?><?php the_category(', '); ?></h6>
                            <?php comments_template(); ?>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="large-6 small-12 cell">
                <?php if (has_post_thumbnail()) : ?>
                    <div title="<?php the_title_attribute(); ?>" class="entry__thumb">
                        <?php the_post_thumbnail('full_hd'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- END of post content -->
        </div>
    </div>
    <!-- BEGIN  gallery-section -->
    <?php
    $images = get_field('gallery_slider');
    if ($images): ?>
        <section class='gallery-section'>
            <div class='grid-container'>
                <div class='grid-x'>
                    <div class='cell'>
                        <div class='gallery-slider'>
                            <?php foreach ($images as $image): ?>
                                <div class='gallery-slider__slide'>
                                    <?php echo wp_get_attachment_image($image['id'], 'large', false, ['data-no-lazy' => '1']);?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

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
