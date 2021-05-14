<?php

namespace Hpr\Entity;

/**
 * Class Order
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Entity
 */
class Order
{
    private string $id;
    private string $status;
    private string $title;
    private string $customer;
    private string $phone;
    private string $email;
    private string $customerComment;
    private string $managerComment;
    private bool $isCustomerMailSent;
    private int $cost;
    private array $orderItems;

    public function __construct(int $orderId)
    {
        $post = get_post($orderId);

        if ('order' !== $post->post_type) {
            return;
        }

        $this->id = $post->ID;
        $this->title = $post->post_title;

        $fields = get_fields($orderId);
        $this->status = $fields['status'] ?? '';
        $this->customer = $fields['customer'] ?? __('Покупатель', 'hpractice');
        $this->phone = $fields['phone'] ?? '';
        $this->email = $fields['email'] ?? '';
        $this->customerComment = $fields['customer_comment'] ?? '';
        $this->managerComment = $fields['manager_comment'] ?? '';
        $this->isCustomerMailSent = $fields['isCustomerMailSent'] ?? '';
        $this->cost = $fields['cost'] ?? 0;

        if (empty($fields['order-items']) || !is_array($fields['order-items'])) {
            $this->orderItems = $fields['order-items'] ?? [];

            return;
        }

        foreach ($fields['order-items'] as $item) {
            $productId = $item['id'] ?? 0;
            $quantity = $item['quantity'] ?? 1;

            if (empty($productId)) {
                continue;
            }

            $this->orderItems[$productId] = $quantity;
        }
    }

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return mixed|string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @return mixed|string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return mixed|string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return mixed|string
     */
    public function getCustomerComment(): string
    {
        return $this->customerComment;
    }

    /**
     * @return mixed|string
     */
    public function getManagerComment(): string
    {
        return $this->managerComment;
    }

    /**
     * @return bool|mixed|string
     */
    public function isCustomerMailSent()
    {
        return $this->isCustomerMailSent;
    }

    /**
     * @return array|mixed
     */
    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    /**
     * @return int|mixed
     */
    public function getCost(): int
    {
        return $this->cost;
    }
}
