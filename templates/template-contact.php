<?php
/**
 * Template Name: Contact Page
 */

get_header();
get_template_part('parts/hero-section');
$default_email = get_field('email', 'options');
$contact_email = get_field('contact_email');
$email = $contact_email ? $contact_email : $default_email;
$default_phone = get_field('phone', 'options');
$contact_phone = get_field('contact_phone');
$phone = $contact_phone ? $contact_phone : $default_phone;
?>

<section class="contact">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) :
            the_post(); ?>
            <article id="<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="grid-container fluid">
                    <div class="grid-x contact-row">
                        <div class="cell large-7 form-col">
                            <?php $contact_form = get_field('contact_form'); ?>
                            <?php if (class_exists('GFAPI') && !empty($contact_form) && is_array($contact_form)) : ?>
                                <div class="contact__form">
                                    <?php echo do_shortcode("[gravityform id='{$contact_form['id']}' title='true' description='true' ajax='true']"); ?>
                                </div>
                            <?php endif; ?>
                            <div class="contact__links">
                                <?php if ($phone) : ?>
                                    <p class="contact-link contact-link--phone">
                                        <a href="tel:<?php echo sanitize_number($phone); ?>"><?php echo $phone; ?></a>
                                    </p>
                                <?php endif; ?>

                                <?php if ($email) : ?>
                                    <p class="contact-link contact-link--email">
                                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="cell large-5 map-col">
                            <?php if ($map_image = get_field('map_image')) : ?>
                                <div class='map-image'>
                                    <?php echo wp_get_attachment_image($map_image['id'], 'full_hd'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
