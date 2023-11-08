<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell large-3 contacts-col text-right">
                <h4 class='column-title'>
                    <?php _e('Contact Us'); ?>
                </h4>

                <?php if ($email = get_field('email', 'options')) : ?>
                    <div class='email'>
                        <h5 class='column-subtitle'>
                            <?php _e('Email'); ?>
                        </h5>
                        <a href='mailto:<?php echo $email; ?>'>
                            <?php echo $email ?>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($phone = get_field('phone', 'options')) : ?>
                    <div class='phone'>
                        <h5 class='column-subtitle'>
                            <?php _e('Phone'); ?>
                        </h5>
                        <a href='tel:+1<?php echo sanitize_number($phone); ?>'>
                            <?php echo $phone ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($address = get_field('address', 'options')) : ?>
                    <div class='address'>
                        <h5 class='column-subtitle'>
                            <?php _e('Address'); ?>
                        </h5>
                        <a href='https://maps.app.goo.gl/tQdSaEnqxhSP9KP8A' target='_blank'>
                            <?php echo $address ?>
                        </a>
                    </div>
                <?php endif; ?>

            </div>
            <div class="cell large-6 text-center logo-col">
                <div class="footer__logo">
                    <a href='<?php echo get_home_url(); ?>'>
                        <?php if ($footer_logo = get_field('footer_logo', 'options')) :
                            echo wp_get_attachment_image($footer_logo['id'], 'large');
                        else :
                            show_custom_logo();
                        endif; ?>
                    </a>
                </div>
                <?php if ($copyright = get_field('copyright', 'options')) : ?>
                    <div class="footer__copy">
                        <?php echo $copyright; ?>
                    </div>
                <?php endif; ?>
                <div class='footer__sp'>
                    <?php get_template_part('parts/socials'); // Social profiles?>
                </div>
            </div>
            <div class="cell large-3">
                <h4 class='column-title'>
                    <?php _e('Quick Links'); ?>
                </h4>
                <?php
                if (has_nav_menu('footer-menu')) {
                    wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'footer-menu', 'depth' => 1));
                }
                ?>
            </div>
        </div>
    </div>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
