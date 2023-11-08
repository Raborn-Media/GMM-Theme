<?php
$section_icon = get_sub_field('section_icon');
$section_title = get_sub_field('section_title');
$section_subtitle = get_sub_field('section_subtitle');
?>
<!-- BEGIN  reviews-section -->
<section class='reviews-section'>
    <div class='grid-container'>
        <div class='grid-x'>
            <div class='cell text-center'>
                <?php if ($section_icon) : ?>
                    <div class='section-icon'>
                        <?php echo wp_get_attachment_image($section_icon['id'], 'medium'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($section_subtitle) : ?>
                    <h4 class='section-subtitle'>
                        <?php echo $section_subtitle; ?>
                    </h4>
                <?php endif; ?>
                <?php if ($section_title) : ?>
                    <h2 class='section-title'>
                        <?php echo $section_title; ?>
                    </h2>
                <?php endif; ?>
            </div>
            <div class='cell'>
                <?php
                $featured_posts = get_sub_field('reviews_slider');
                if ($featured_posts): ?>
                    <div class='reviews-slider text-center'>
                        <?php foreach ($featured_posts as $post):
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post);
                            $rating = get_field('rating');
                            $job_title = get_field('job_title');
                            $company = get_field('company');

                            ?>
                            <div class='reviews-slider__slide'>
                                <div class="review-rating">
                                    <?php for ($i = 0; $i < $rating; $i++) { ?>
                                        <div class="rating-star"><i class="fa fa-star"></i></div>
                                    <?php } ?>
                                </div>
                                <article>
                                    <?php the_content(); ?>
                                </article>
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                                <div class='author-info'>
                                    <p>
                                        <?php echo $company ?>
                                    </p>
                                    <span><?php _e('|') ?></span>
                                    <p>
                                        <?php echo $job_title ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  reviews-section -->
