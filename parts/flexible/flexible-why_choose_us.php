<?php
$section_title = get_sub_field('section_title');
$section_subtitle = get_sub_field('section_subtitle');
$section_text = get_sub_field('section_text');
$section_bg = get_sub_field('section_bg');
$section_image = get_sub_field('section_image');
$section_button = get_sub_field('section_button');
?>

<!-- BEGIN  why-choose-us -->
<section class='why-choose-us' <?php bg($section_bg['url'], 'full_hd'); ?>>
    <div class='overlay'></div>
    <div class='grid-container section-container'>
        <div class='grid-x'>
            <div class='cell large-6 content-col'>
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

                <?php if ($section_text) : ?>
                    <a href='<?php echo $section_button['url'];?>' class='button'>
                        <?php echo $section_button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class='cell large-6 image-col'>
                <?php if ($section_image) : ?>
                    <div class='section-image'>
                        <?php echo wp_get_attachment_image($section_image['id'], 'full_hd'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  why-choose-us -->
