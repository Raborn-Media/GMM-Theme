<?php
$hero_title = get_sub_field('hero_title');
$hero_subtitle = get_sub_field('hero_subtitle');
$hero_bg = get_sub_field('hero_bg');
$hero_link = get_sub_field('hero_link');
?>

<!-- BEGIN  hero-section -->
<section class='hero-section' <?php bg($hero_bg['url'], 'full_hd'); ?>>\
    <div class='overlay'></div>
    <div class='grid-container'>
        <div class='grid-x'>
            <div class='cell large-6'>
                <?php if ($hero_subtitle) : ?>
                    <h4 class='hero-subtitle'>
                        <?php echo $hero_subtitle; ?>
                    </h4>
                <?php endif; ?>

                <?php if ($hero_title) : ?>
                    <h1 class='hero-title'>
                        <?php echo $hero_title; ?>
                    </h1>
                <?php endif; ?>

                <?php if ($hero_link) : ?>
                    <a href='<?php echo $hero_link['url']; ?>' class='button'>
                        <?php echo $hero_link['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  hero-section -->
