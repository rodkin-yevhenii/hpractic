<?php

namespace Hpr\Entity;

/**
 * Class Product
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Entity
 */
class Product extends AffiliateAbstract
{
    private string $sku;
    private string $price;
    private array $gallery;
    private array $characteristics;
    private bool $isUnderOrder;
    private bool $isMinOrder;
    private bool $isMinPrice;
    private string $sellingType;
    private string $underOrderTime;
    private string $minOrder;
    private string $additionalText;

    /**
     * Product constructor.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        parent::__construct($id);

        $fields = get_fields($id);
        $this->sku = $fields['product_settings']['sku'] ?? '';
        $this->price = $fields['product_settings']['price'] ?? 0;
        $this->isMinPrice = $fields['product_settings']['is-min-price'] ?? false;
        $this->gallery = $fields['product_gallery'] ?? [];
        $this->characteristics = !empty($fields['product_characteristic']) ? $fields['product_characteristic'] : [];
        $this->isUnderOrder = $fields['product_settings']['is-under-order'] ?? false;
        $this->isMinOrder = $fields['product_settings']['is-min-order'] ?? false;
        $wholesaleQuantity = $fields['product_settings']['wholesale-quantity'] ?? false;
        $sellingType = $fields['product_settings']['retail'] ?? '';
        switch ($sellingType) {
            case 'wholesaleAndRetail':
                if (!$wholesaleQuantity) {
                    $this->sellingType = __('Оптом и в роздницу.', 'hpractice');
                } else {
                    $this->sellingType = sprintf(
                        __('Оптом и в роздницу, опт от %d шт.', 'hpractice'),
                        $wholesaleQuantity
                    );
                }
                break;
            case 'wholesale':
                if (!$wholesaleQuantity) {
                    $this->sellingType = __('Оптом.', 'hpractice');
                } else {
                    $this->sellingType = sprintf(
                        __('Оптом, опт от %d шт.', 'hpractice'),
                        $wholesaleQuantity
                    );
                }
                break;
            default:
                $this->sellingType = __('В розницу.', 'hpractice');
        }

        $underOrderTime = (int) $fields['product_settings']['under-order-time'] ?? 0;
        $this->underOrderTime = sprintf(
            __('Под заказ, %d дней', 'hpractice'),
            $underOrderTime
        );
        $minOrder = (int) $fields['product_settings']['min-order'] ?? 0;
        $this->minOrder = sprintf(
            __('Минимальный заказ - %d шт.', 'hpractice'),
            $minOrder
        );
        $this->additionalText = $fields['product_settings']['additional-text'] ?? '';
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @return array
     */
    public function getGallery(): array
    {
        return $this->gallery;
    }

    /**
     * @return array
     */
    public function getCharacteristic(): array
    {
        return $this->characteristics;
    }

    /**
     * @return bool
     */
    public function isUnderOrder(): bool
    {
        return $this->isUnderOrder;
    }

    /**
     * @return bool
     */
    public function isMinOrder(): bool
    {
        return $this->isMinOrder;
    }

    /**
     * @return bool
     */
    public function getSellingType(): string
    {
        return $this->sellingType;
    }

    /**
     * @return string
     */
    public function getUnderOrderTime(): string
    {
        return $this->underOrderTime;
    }

    /**
     * @return string
     */
    public function getMinOrder(): string
    {
        return $this->minOrder;
    }

    /**
     * @return string
     */
    public function getAdditionalText(): string
    {
        return $this->additionalText;
    }

    /**
     * @return bool
     */
    public function isMinPrice(): bool
    {
        return $this->isMinPrice;
    }
}
