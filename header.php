<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Set up Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="<?php bloginfo('charset'); ?>">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <!-- Remove Microsoft Edge's & Safari phone-email styling -->
    <meta name="format-detection" content="telephone=no,email=no,url=no">

    <!-- Add external fonts below (GoogleFonts / Typekit) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class('no-outline fxy'); ?>>
<?php wp_body_open(); ?>

<!-- <div class="preloader hide-for-medium">
    <div class="preloader__icon"></div>
</div> -->

<!-- BEGIN of header -->
<header class="header">
    <div class="grid-container menu-grid-container">
        <div class="grid-x">
            <div class="medium-3 large-4 small-8 cell-8">
                <div class="logo text-center medium-text-left">
                    <h2>
                        <?php show_custom_logo(); ?><span class="show-for-sr"><?php echo get_bloginfo('name'); ?></span>
                    </h2>
                </div>
            </div>
            <div class="medium-9 large-8 small-4 cell-4">
                <?php if (has_nav_menu('header-menu')) : ?>
                    <div class="title-bar hide-for-medium" data-responsive-toggle="main-menu" data-hide-for="medium">
                        <button class="menu-icon" type="button" data-toggle aria-label="Menu" aria-controls="main-menu">
                            <span></span></button>
                        <div class="title-bar-title">Menu</div>
                    </div>
                    <nav class="top-bar" id="main-menu">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'menu_class' => 'menu header-menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
                            'walker' => new theme\FoundationNavigation()
                        )); ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<!-- END of header -->
