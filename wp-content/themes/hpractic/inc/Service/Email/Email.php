<?php

namespace Hpr\Service\Email;

use Hpr\Entity\Order;

/**
 * Class Email
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Service\Email
 */
class Email
{
    private array $headers;

    /**
     * Email constructor.
     *
     * @param string $from  Site name and email.
     * @param string $type  Email type.
     */
    public function __construct(
        string $from = 'Practice House <info@hpractic.com>',
        string $type = 'text/html'
    ) {
        $this->headers = [
            'From: ' . $from,
            'content-type: ' . $type,
        ];
    }

    /**
     * Validate email.
     *
     * @return bool
     */
    private function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Send mail to the customer about the new order.
     *
     * @param int $orderId
     *
     * @return bool
     */
    public function sendNewOrderCustomerMail(int $orderId): bool
    {
        $order = new Order($orderId);

        if (!$this->isValidEmail($order->getEmail()) || empty($order->getOrderItems())) {
            return false;
        }

        $subject = get_field('customer-new-order-subject', 'option');

        ob_start();
        get_template_part(
            'template-parts/emails/new-order/mail',
            'customer',
            [
                'products' => $order->getOrderItems()
            ]
        );

        if (empty($subject)) {
            $subject = __('Детали Вашего заказа №{{{order}}}.', 'hpractice');
        }

        $subject = str_replace('{{{order}}}', $order->getId(), $subject);
        $message = str_replace('{{{customer}}}', $order->getCustomer(), ob_get_clean());

        if (wp_mail($order->getEmail(), $subject, $message, $this->headers)) {
            return true;
        }

        return false;
    }

    /**
     * Send mail to managers about the new order.
     *
     * @param int $orderId
     *
     * @return bool
     */
    public function sendNewOrderManagerMail(int $orderId): void
    {
        $order = new Order($orderId);
        $managersEmails = get_field('managers_emails', 'options');

        if (empty($managersEmails) || empty($order->getOrderItems())) {
            return;
        }

        $subject = "Новый заказ на hpractice.com - №{$order->getId()}";

        ob_start();
        get_template_part(
            'template-parts/emails/new-order/mail',
            'manager',
            [
                'order' => $order
            ]
        );

        $message = ob_get_clean();

        foreach ($managersEmails as $manager) {
            $email = $manager['email'] ?? '';

            wp_mail($email, $subject, $message, $this->headers);
        }
    }
}
