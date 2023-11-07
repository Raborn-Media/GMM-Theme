<?php
$section_title = get_sub_field('section_title');
$section_subtitle = get_sub_field('section_subtitle');
$section_image = get_sub_field('section_image');
$section_text = get_sub_field('section_text');
$section_button = get_sub_field('section_button');
?>

<!-- BEGIN  about-section -->
<section class='about-section'>
    <div class='grid-container'>
        <div class='grid-x content-row'>
            <div class='cell large-6'>
                <?php if ($section_image) : ?>
                    <div class='section-image'>
                        <?php echo wp_get_attachment_image($section_image['id'], 'large'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class='cell large-6'>
                <?php if ($section_subtitle) : ?>
                    <h4 class='section-subtitle'>
                        <?php echo $section_subtitle; ?>
                    </h4>
                <?php endif; ?>
                <?php if ($section_subtitle) : ?>
                    <h2 class='section-title'>
                        <?php echo $section_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($section_text) : ?>
                    <article class='section-text'>
                        <?php echo $section_text; ?>
                    </article>
                <?php endif; ?>

                <?php if (have_rows('section_list')) : ?>
                    <div
                        class='section-list'>
                        <?php while (have_rows('section_list')) : the_row();
                            $list_item_icon = get_sub_field('list_item_icon');
                            $list_item_title = get_sub_field('list_item_title');
                            $list_item_text = get_sub_field('list_item_text');
                            ?>
                            <div class='list-item <?php echo $list_item_text ? 'list-item__100' : 'list-item__50'; ?>'>
                                <?php if ($list_item_icon) : ?>
                                    <div class='list-item__icon'>
                                        <?php echo wp_get_attachment_image($list_item_icon['id'], 'large'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class='list-item__content'>
                                    <?php if ($list_item_title) : ?>
                                        <h3 class='list-item-title'>
                                            <?php echo $list_item_title; ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if ($list_item_text) : ?>
                                        <article class='list-item-text'>
                                            <?php echo $list_item_text; ?>
                                        </article>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END  about-section -->
