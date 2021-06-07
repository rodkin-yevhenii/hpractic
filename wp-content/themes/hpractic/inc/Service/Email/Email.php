<?php

namespace Hpr\Service\Email;

use Hpr\Entity\Message;
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
            $subject = __('Детали заказа № {{{order}}}', 'hpractice');
        }

        $subject = str_replace('{{{order}}}', $order->getId(), $subject);
        $message = str_replace('{{{customer}}}', $order->getCustomer(), ob_get_clean());
        $message = str_replace('{{{order}}}', $order->getId(), $message);
        $message = str_replace('{{{phone}}}', $order->getPhone(), $message);
        $message = str_replace('{{{email}}}', $order->getEmail(), $message);
        $message = str_replace('{{{comment}}}', $order->getCustomerComment(), $message);

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
        $managersEmails = get_field('managers-emails', 'option');

        if (empty($managersEmails) || empty($order->getOrderItems())) {
            return;
        }

        $subject = "Новый заказ на hpractice.com - №{$order->getId()}";

        ob_start();
        get_template_part(
            'template-parts/emails/new-order/mail',
            'customer',
            [
                'products' => $order->getOrderItems()
            ]
        );

        $message = str_replace('{{{customer}}}', $order->getCustomer(), ob_get_clean());
        $message = str_replace('{{{order}}}', $order->getId(), $message);
        $message = str_replace('{{{phone}}}', $order->getPhone(), $message);
        $message = str_replace('{{{email}}}', $order->getEmail(), $message);
        $message = str_replace('{{{comment}}}', $order->getCustomerComment(), $message);

        foreach ($managersEmails as $manager) {
            $email = $manager['email'] ?? '';

            wp_mail($email, $subject, $message, $this->headers);
        }
    }

    /**
     * Send Email.
     *
     * @param Message $mail
     *
     * @return bool
     */
    public function send(Message $mail): bool
    {
        if (wp_mail($mail->getTo(), $mail->getSubject(), $mail->getBody(), $this->getHeaders($mail))) {
            return true;
        }

        return false;
    }

    /**
     * Get email headers;
     *
     * @param Message $mail
     *
     * @return array
     */
    private function getHeaders(Message $mail): array
    {
        $login = 'info@hpractic.com';
        $to = $mail->getTo();

        $headers = [];
        $headers[] = "Date: " . date("D, j M Y G:i:s") . " +0300\r\n";
        $headers[] = "From: =?UTF-8?Q?" . str_replace("+", "_", str_replace("%", "=", urlencode('Practice House'))) . "?= <$login>\r\n";
        $headers[] = "X-Mailer: Post script Practice House \r\n";
        $headers[] = "Reply-To: =?UTF-8?Q?" . str_replace("+", "_", str_replace("%", "=", urlencode('Practice House'))) . "?= <$login>\r\n";
        $headers[] = "X-Priority: 3 (Normal)\r\n";
        $headers[] = "Message-ID: <12345654321." . date("YmjHis") . "@hpactic.com>\r\n";
        $headers[] = "To: =?UTF-8?Q?" . str_replace("+", "_", str_replace("%", "=", urlencode('Пользователю нашего сайта'))) . "?= <$to>\r\n";
        $headers[] = "Subject: =?UTF-8?Q?" . str_replace("+", "_", str_replace("%", "=", urlencode($mail->getSubject()))) . "?=\r\n";
        $headers[] = "MIME-Version: 1.0\r\n";
        $headers[] = "Content-Type: text/html; charset=UTF-8\r\n";
        $headers[] = "Content-Transfer-Encoding: 8bit\r\n";

//        if (!empty($mail->getFrom())) {
//            $headers[] = 'From: ' . $mail->getFrom() . '/r/n';
//        }
//
//        if (!empty($mail->getContentType())) {
//            $headers[] = 'content-type: ' . $mail->getContentType();
//        }

        return $headers;
    }
}
