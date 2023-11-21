<?php
$section_title = get_sub_field('section_title');
$section_subtitle = get_sub_field('section_subtitle');
$section_button = get_sub_field('section_button');
$section_text = get_sub_field('section_text');
$anchor_id = get_sub_field('anchor_id');
$articles_bg = get_sub_field('articles_bg');
?>

<!-- BEGIN  product-values-section -->
<section class='product-values-section' id='<?php echo $anchor_id ? $anchor_id : ''; ?>'>
    <div class='grid-container top-container'>
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
                <?php if ($section_button) : ?>
                    <a href='<?php echo $section_button['url']; ?>' class='section-button button'>
                        <?php echo $section_button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class='cell large-6'>
                <?php if (have_rows('anchor_links')) : ?>
                    <div class='anchor-links'>
                        <?php while (have_rows('anchor_links')) : the_row();
                            $link_icon = get_sub_field('link_icon');
                            $link = get_sub_field('link');
                            ?>
                            <?php if ($section_button) : ?>
                                <a href='<?php echo $link['url']; ?>' class='anchor-links__link'>
                                    <?php if ($link_icon) : ?>
                                        <div class='link_icon'>
                                            <?php echo wp_get_attachment_image($link_icon['id'], 'large'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <h3>
                                        <?php echo $link['title']; ?>
                                    </h3>
                                </a>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if (have_rows('anchor_articles')) : ?>
        <div
            class='anchor-articles section-bottom-triangle section-top-triangle' <?php bg($articles_bg['url'], 'full_hd'); ?>>
            <div class='overlay'></div>
            <div class='grid-container articles-container'>
                <?php while (have_rows('anchor_articles')) : the_row();
                    $anchor_id = get_sub_field('anchor_id');
                    $article_text = get_sub_field('article_text');
                    $article_image = get_sub_field('article_image');
                    ?>
                    <div class='grid-x anchor-article' id='<?php echo $anchor_id ? $anchor_id : ''; ?>'>
                        <div class='cell large-6'>
                            <?php if ($article_text) : ?>
                                <article class='article-text'>
                                    <?php echo $article_text; ?>
                                </article>
                            <?php endif; ?>
                        </div>
                        <div class='cell large-6'>
                            <?php if ($article_image) : ?>
                                <div class='article-image'>
                                    <?php echo wp_get_attachment_image($article_image['id'], 'large'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
<!-- END  product-values-section -->
