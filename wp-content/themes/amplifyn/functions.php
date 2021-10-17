<?php

if (! class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you '
        . 'activate the plugin in <a href="'
        . esc_url(admin_url('plugins.php#timber')) . '">'
        . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });
    return;
}

// composer dependencies
require_once(__DIR__ . '/vendor/autoload.php');

class AmplifynSite extends TimberSite
{
    public function __construct()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');

        add_action('init', [ $this, 'cleanupHeader' ]);
        add_action('init', [ $this, 'addMenus' ]);
        add_action('init', [ $this, 'disableDefaultWysiwyg' ]);

        add_filter('timber_context', [ $this, 'addToContext' ]);
        add_filter('timber/twig', [ $this, 'addFunctionsToTwig']);

        add_action('wp_enqueue_scripts', [ $this, 'addStylesAndScripts' ], 999);

        parent::__construct();
    }

    public function cleanupHeader()
    {
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');

        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    }

    public function addToContext($context)
    {
        $context['nav_menu'] = new TimberMenu('nav-menu');
        $context['footer_menu_left'] = new TimberMenu('footer-menu-left');
        $context['footer_menu_center'] = new TimberMenu('footer-menu-center');
        $context['footer_menu_right'] = new TimberMenu('footer-menu-right');

        $context['site'] = $this;
        $context['options'] = get_fields('options');
        $context['footer_widgets'] = Timber::get_widgets('footer_widgets');

        return $context;
    }

    // expose custom functions to Twig environment
    public function addFunctionsToTwig($twig)
    {
        // $twig->addFunction(new Timber\Twig_Function('get_random_number', 'amplifyn_get_random_number'));

        // $twig->addFilter(new Timber\Twig_Filter('charlimit', 'amplifyn_timber_charlimit'));

        return $twig;
    }

    public function addStylesAndScripts()
    {
        global $wp_styles;

        if (!is_admin()) {
            wp_deregister_script('jquery');
            wp_enqueue_script(
              'jquery',
              get_template_directory_uri() . '/src/js/vendor/jquery.js',
              [ ],
              '3.5.0',
              false
            );

            wp_enqueue_script(
              'jquery-migrate',
              get_template_directory_uri() . '/src/js/vendor/jquery-migrate-3.3.2.min.js',
              [ 'jquery' ],
              '3.3.2',
              true
            );

            wp_enqueue_script(
              'modernizr-js',
              get_template_directory_uri() . '/src/js/vendor/modernizr.custom.js',
              [ 'jquery' ],
              '2.6.2',
              true
            );

            wp_enqueue_style(
              'splide-css',
              get_template_directory_uri() .
                  '/src/css/vendor/splide.min.css',
              [],
              '1.0.3'
            );

            wp_enqueue_script(
              'splide-js',
              get_template_directory_uri() . '/src/js/vendor/splide.min.js',
              [ 'jquery' ],
              '1.0.0',
              true
            );

            wp_enqueue_script(
              'site-js',
              get_template_directory_uri() . '/app.js',
              [ 'jquery' ],
              '1.0.0',
              true
            );
        }
    }

    public function addMenus()
    {
        register_nav_menus([
          'nav-menu' => __('Header Navbar'),
        //   'footer-menu-left' => __('Footer Left'),
        //   'footer-menu-center' => __('Footer Center'),
        //   'footer-menu-right' => __('Footer Right'),
        ]);
    }

    // remove default WYSIWYG for posts and pages
    public function disableDefaultWysiwyg()
    {
        remove_post_type_support('post', 'editor');
        remove_post_type_support('page', 'editor');
    }
}

new AmplifynSite();

// send Yoast block to bottom of all edit pages
function amplifyn_yoast_to_bottom() {
	return 'low';
}
add_filter('wpseo_metabox_prio', 'amplifyn_yoast_to_bottom');

// custom shortcodes
require_once(get_template_directory() . '/includes/amplifyn_shortcodes.php');

// option pages
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page([
    'page_title'  => 'Global Settings',
    'menu_title'  => 'Global Settings',
    'menu_slug'   => 'global-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ]);

  acf_add_options_sub_page([
    'page_title' => 'Signup Forms',
    'menu_title' => 'Signup Forms',
    'menu_slug' => 'email-signup-settings',
    'parent_slug' => 'global-settings',
]);
}
