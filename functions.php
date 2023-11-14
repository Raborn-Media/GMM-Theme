<?php
/**
 * Functions
 */

// Declaring the assets manifest
$manifest_json = get_theme_file_path() . '/dist/assets.json';
$assets = [
    'manifest' => file_exists($manifest_json) ? json_decode(file_get_contents($manifest_json), true) : [],
    'dist' => get_theme_file_uri() . '/dist',
    'dist_path' => get_theme_file_path() . '/dist',
];
unset($manifest_json);

/**
 * Retrieve the path to the asset, use hashed version if exists
 *
 * @param $asset
 * @param boolean|string $path Defines if returned result is a path or a url (without leading slash if using path)
 *
 * @return string
 */
function asset_path($asset, $path = false)
{
    global $assets;
    $asset = isset($assets['manifest'][$asset]) ? $assets['manifest'][$asset] : $asset;
    return "{$assets[$path ? 'dist_path' : 'dist']}/{$asset}";
}

/******************************************************************************
 * Constants
 *****************************************************************************/
define('IMAGE_PLACEHOLDER', asset_path('images/placeholder.jpg'));

/******************************************************************************
 * Included Functions
 *****************************************************************************/
if (file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    require_once $composer;
}

array_map(function ($file) {
    $file = "/inc/{$file}.php";
    if (!locate_template($file, true, true)) {
        echo sprintf(__('Error locating <code>%s</code> for inclusion.', 'fxy'), $file);
    }
}, [
    'helpers',
    'recommended-plugins',
    'class-foundation-navigation',
    'class-dynamic-admin',
    'class-lazyload',
    'theme-customizations',
//    'home-slider',
    'svg-support',
    'gravity-form-customizations',
    'custom-fields-search',
    'google-maps',
    'tiny-mce-customizations',
//    'posttypes',
    'rest',
//    'gutenberg-support', // !!!IMPORTANT  Comment line 159 for enable Gutenberg
//    'woo-customizations',
//    'divi-support',
//    'elementor-support',
//    'shortcodes',
]);

// Register ACF Gravity Forms field
add_action('init', function () {
    if (class_exists('ACF')) {
        require_once 'inc/class-fxy-acf-field-gf-field-v5.php';
    }
});

// Prevent Fatal error on site if ACF not installed/activated
add_action('wp', function () {
    include_once 'inc/acf-placeholder.php';
}, PHP_INT_MAX);

/******************************************************************************
 * Enqueue Scripts and Styles for Front-End
 *****************************************************************************/
add_action('init', function () {
    wp_register_script('runtime.js', asset_path('scripts/runtime.js'), [], null, true);
    wp_register_script('vendor.js', asset_path('scripts/vendor.js'), [], null, true);
    if (file_exists(asset_path('styles/vendor.css', true))) {
        wp_register_style('vendor.css', asset_path('styles/vendor.css'), [], null);
    }
});

add_action('wp_enqueue_scripts', function () {
    if (!is_admin()) {
        // Disable gutenberg built-in styles
        // wp_dequeue_style('wp-block-library');

        wp_enqueue_script('jquery');

        wp_enqueue_style('vendor.css');
        wp_enqueue_style('main.css', asset_path('styles/main.css'), [], null);
        wp_enqueue_script(
            'main.js',
            asset_path('scripts/main.js'),
            ['jquery', 'runtime.js', 'vendor.js'],
            null,
            true
        );

        wp_localize_script(
            'main.js',
            'ajax_object',
            [
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('project_nonce'),
            ]
        );
    }
});

/******************************************************************************
 * Additional Functions
 *****************************************************************************/

// Dynamic Admin
if (class_exists('theme\DynamicAdmin') && is_admin()) {
    $dynamic_admin = new theme\DynamicAdmin();
//    $dynamic_admin->addField('page', 'template', __('Page Template', 'fxy'), 'template_detail_field_for_page');
    $dynamic_admin->run();
}

// Apply lazyload to whole page content
if (class_exists('theme\CreateLazyImg')) {
    add_action(
        'template_redirect',
        function () {
            ob_start(function ($html) {
                $lazy = new theme\CreateLazyImg;
                $buffer = $lazy->ignoreScripts($html);
                $buffer = $lazy->ignoreNoscripts($buffer);

                $html = $lazy->lazyloadImages($html, $buffer);
                $html = $lazy->lazyloadPictures($html, $buffer);
                $html = $lazy->lazyloadBackgroundImages($html, $buffer);

                return $html;
            });
        }
    );
}

/*********************** PUT YOU FUNCTIONS BELOW *****************************/

// Custom media library's image sizes
add_image_size('full_hd', 1920, 0, ['center', 'center']);
add_image_size('large_high', 1024, 0, false);
// add_image_size( 'name', width, height, ['center','center']);

// Disable gutenberg
add_filter('use_block_editor_for_post_type', '__return_false');

/*****************************************************************************/

// Function to get product names from the custom post type.
function get_product_names()
{
    $args = array(
        'post_type' => 'products', // Replace with your custom post type.
        'order' => 'ASC', // ASC, DESC
        'posts_per_page' => -1,
    );

    $products = get_posts($args);

    $product_names = array();
    foreach ($products as $product) {
        $product_names[] = get_the_title($product->ID);
    }

    return $product_names;
}

// Replace 'your_form_id' and 'your_select_field_id' with your actual form ID and Select field ID.
add_filter('gform_pre_render', 'populate_product_names');
add_filter('gform_pre_validation', 'populate_product_names');
add_filter('gform_pre_submission_filter', 'populate_product_names');
add_filter('gform_admin_pre_render', 'populate_product_names');
function populate_product_names($form)
{
    if ($form['id'] == 1) {
        // Get the product names from the custom post type.
        $product_names = get_product_names(); // You need to implement the function get_product_names().

        // Loop through the form fields
        foreach ($form['fields'] as &$field) {
            // Match the field ID and type (adjust as needed)
            if ($field['id'] == 5 && $field['type'] == 'select') {
                $choices = array();

                foreach ($product_names as $product_name) {
                    $choices[] = [
                            'text' => $product_name,
                            'value' => $product_name,
                    ];
                }
                $field['choices'] = $choices;
            }
        }
    }

    return $form;
}
