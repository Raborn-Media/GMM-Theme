<?php
$section_title = get_sub_field('section_title');
$section_subtitle = get_sub_field('section_subtitle');
$section_text = get_sub_field('section_text');
?>

<!-- BEGIN  team-section -->
<section class='team-section'>
    <div class='grid-container team-container'>
        <div class='grid-x'>
            <div class='cell text-center'>
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

                <?php if ($section_text) : ?>
                    <article class='section-text'>
                        <?php echo $section_text; ?>
                    </article>
                <?php endif; ?>

                <?php
                $featured_posts = get_sub_field('team_members_list');
                if ($featured_posts) : ?>
                    <div class='team-members-list '>
                        <?php foreach ($featured_posts as $post) :
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post);
                            $job = get_field('job_title');
                            ?>
                            <div class='team-member matchHeight'>
                                <div class='team-member__photo'>
                                    <?php the_post_thumbnail(); ?>
                                </div>
                               <div class='team-member__info'>
                                   <h3>
                                       <?php the_title(); ?>
                                   </h3>
                                   <h4>
                                       <?php echo $job; ?>
                                   </h4>
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
<!-- END  team-section -->
