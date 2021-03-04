<?php

namespace Hpr\Entity;

/**
 * Class Cart
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Entity
 */
class Cart
{
    private array $cartItems = [];
    private static Cart $instance;

    /**
     * Cart constructor.
     *
     * @param int $userId
     */
    private function __construct()
    {
        if (!empty($_COOKIE['hPracticeCart'])) {
            $products = json_decode($_COOKIE['hPracticeCart'], true);

            if (is_array($products)) {
                $this->cartItems = $products;
            }
        }
    }

    /**
     * Return ThemeInit Instance.
     *
     * @return Cart
     */
    public static function getInstance(): Cart
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return array
     */
    public function getCartItems(): array
    {
        return $this->cartItems;
    }
}
