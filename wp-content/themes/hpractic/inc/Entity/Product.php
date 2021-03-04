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
        $this->gallery = $fields['product_gallery'] ?? [];
        $this->characteristics = $fields['product_characteristic'];
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
}
