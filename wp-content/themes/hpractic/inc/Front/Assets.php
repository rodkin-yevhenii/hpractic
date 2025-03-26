<?php

namespace Hpr\Front;

/**
 * Class Assets
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package SPro\Admin
 */
class Assets
{
    /**
     * Assets constructor.
     */
    public function __construct()
    {
        $this->registerHooks();
    }

    /**
     * Register hooks for working with styles and scripts.
     */
    public function registerHooks(): void
    {
        add_action('wp_head', [$this, 'enqueueSeoScripts'], 1);
        add_action('wp_head', [$this, 'enqueueStyles'], 1);
        add_action('enqueue_body_scripts', [$this, 'enqueueSeoBodyScripts']);
        add_filter('style_loader_tag', [$this, 'wrapStyleTag'], 20, 4);
        add_action('wp_enqueue_scripts', [$this, 'jQueryInit']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
    }

    public function enqueueSeoScripts(): void
    {
        $scripts = get_field('head_scripts', 'option');

        if (empty($scripts)) {
            return;
        }

        echo $scripts;
    }

    public function enqueueSeoBodyScripts(): void
    {
        $scripts = get_field('body_scripts', 'option');

        if (empty($scripts)) {
            return;
        }

        echo $scripts;
    }

    /**
     * Include styles.
     */
    public function enqueueStyles(): void
    {
        $styles = $this->getStylesArray();

        foreach ($styles as $style) {
            wp_enqueue_style(
                $style['handle'],
                $style['src'],
                [],
                CACHE_BUSTER,
            );
        }
    }

    /**
     * Include scripts.
     */
    public function enqueueScripts(): void
    {
        $scripts = $this->getScriptsArray();

        foreach ($scripts as $script) {
            wp_enqueue_script(
                $script['handle'],
                $script['src'],
                is_array($script['deps']) ? $script['deps'] : (array) $script['deps'],
                CACHE_BUSTER,
                true
            );
        }
    }

    /**
     * Add preload attribute for styles.
     *
     * @param string $html     Link markup.
     * @param string $handle   link id.
     * @param string $href     link source.
     * @param string $media    Style devices types
     *
     * @return string
     */
    public function wrapStyleTag($html, $handle, $href, $media): string
    {
        if (is_admin()) {
            return $html;
        }

        ob_start(); ?>
        <link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'"
              id='<?php echo $handle ?>' href='<?php echo $href ?>' type='text/css' media='<?php echo $media ?>' />
        <?php return ob_get_clean();
    }

    /**
     * Get styles array.
     *
     * @return array
     */
    private function getStylesArray(): array
    {
        $css[] = [
            'handle' => 'fancybox',
            'src' => DIST_URI . 'css/jquery.fancybox.min.css'
        ];
        $css[] = [
            'handle' => 'magnific-popup',
            'src' => DIST_URI . 'css/magnific-popup.css'
        ];
        $css[] = [
            'handle' => 'slick',
            'src' => DIST_URI . 'css/slick.css'
        ];
        $css[] = [
            'handle' => 'hpractice',
            'src' => DIST_URI . 'css/style.css'
        ];

        return $css;
    }

    /**
     * Configure jquery.
     */
    public function jQueryInit(): void
    {
        wp_deregister_script('jquery');
        wp_register_script('jquery', DIST_URI . 'js/jquery-3.1.1.min.js', [], '3.1.1', true);
        wp_enqueue_script('jquery');
    }

    /**
     * Get scripts array.
     *
     * @return array
     */
    private function getScriptsArray(): array
    {
        $scripts[] = [
            'handle' => 'countUp',
            'src' => DIST_URI . 'js/countUp.umd.js',
            'deps' => 'jquery'
        ];
        $scripts[] = [
            'handle' => 'inputmask',
            'src' => DIST_URI . 'js/jquery.inputmask.bundle.min.js',
            'deps' => 'countUp'
        ];
        $scripts[] = [
            'handle' => 'fitvids',
            'src' => DIST_URI . 'js/jquery.fitvids.js',
            'deps' => 'inputmask'
        ];
        $scripts[] = [
            'handle' => 'easing',
            'src' => DIST_URI . 'js/jquery.easing.js',
            'deps' => 'fitvids'
        ];
        $scripts[] = [
            'handle' => 'slick',
            'src' => DIST_URI . 'js/slick.min.js',
            'deps' => 'easing'
        ];
        $scripts[] = [
            'handle' => 'magnific-popup',
            'src' => DIST_URI . 'js/jquery.magnific-popup.min.js',
            'deps' => 'slick'
        ];
        $scripts[] = [
            'handle' => 'fancybox',
            'src' => DIST_URI . 'js/jquery.fancybox.min.js',
            'deps' => 'magnific-popup'
        ];
        $scripts[] = [
            'handle' => 'resize-sensor',
            'src' => DIST_URI . 'js/ResizeSensor.js',
            'deps' => 'fancybox'
        ];
        $scripts[] = [
            'handle' => 'sticky-sideba',
            'src' => DIST_URI . 'js/sticky-sidebar.min.js',
            'deps' => 'resize-sensor'
        ];
        $scripts[] = [
            'handle' => 'validate',
            'src' => DIST_URI . 'js/jquery.validate.min.js',
            'deps' => 'sticky-sideba'
        ];
        $scripts[] = [
            'handle' => 'additional-methods',
            'src' => DIST_URI . 'js/additional-methods.js',
            'deps' => 'validate'
        ];
        $scripts[] = [
            'handle' => 'forms',
            'src' => DIST_URI . 'js/forms.js',
            'deps' => 'additional-methods'
        ];
        $scripts[] = [
            'handle' => 'cart',
            'src' => DIST_URI . 'js/cart.js',
            'deps' => 'forms'
        ];
        $scripts[] = [
            'handle' => 'hpractice',
            'src' => DIST_URI . 'js/main.js',
            'deps' => ['slick', 'cart']
        ];
        $scripts[] = [
            'handle' => 'tag-manager-actions',
            'src' => DIST_URI . 'js/tag-manager-actions.js',
            'deps' => 'cart'
        ];

        if (is_page_template('page-contacts.php')) {
            $scripts[] = [
                'handle' => 'contacts',
                'src' => DIST_URI . 'js/contacts.js',
                'deps' => 'cart'
            ];
        }

        return $scripts;
    }
}
