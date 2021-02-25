<?php

namespace Hpr\Service\Cart;

use Hpr\Entity;

/**
 * Class Cart
 * @package Hpr\Service\Cart
 */
class Cart
{
    private Entity\Cart $cart;

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        $this->cart = Entity\Cart::getInstance();
    }

    public function render(): void
    {
        get_template_part('template-parts/cart/popup', null, ['cartItems' => $this->cart->getCartItems()]);
    }
}
