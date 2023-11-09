<?php
$section_title = get_sub_field('section_title');
$section_image = get_sub_field('section_image');
$section_bg = get_sub_field('section_bg');
$section_text = get_sub_field('section_text');
$section_button = get_sub_field('section_button');
?>

<!-- BEGIN  cta-section -->
<section class='cta-section'>
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
                        <a href='<?php echo $section_button['url'];?>' class='section-button button'>
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
