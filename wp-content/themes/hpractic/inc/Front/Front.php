<?php

namespace Hpr\Front;

use Hpr\Service\Helpers\Helpers;

/**
 * Class Front
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Front
 */
class Front
{
    /**
     * Front constructor.
     */
    public function __construct()
    {
        $this->registerHooks();
    }

    /**
     * Register frontend hooks.
     */
    private function registerHooks(): void
    {
        add_action('wp_ajax_nopriv_send_contact_form', [Helpers::class, 'sendContactFormCallback']);
        add_action('wp_ajax_send_contact_form', [Helpers::class, 'sendContactFormCallback']);
        add_action('wp_ajax_nopriv_send_callback_form', [Helpers::class, 'sendCallbackFormCallback']);
        add_action('wp_ajax_send_callback_form', [Helpers::class, 'sendCallbackFormCallback']);
    }
}
