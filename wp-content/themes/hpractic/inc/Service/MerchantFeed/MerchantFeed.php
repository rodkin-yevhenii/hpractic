<?php

namespace Hpr\Service\MerchantFeed;

use DateTime;
use DateTimeZone;
use Hpr\Admin\ProductInit;
use Hpr\Entity\Product;
use WP_Query;
use XMLWriter;

/**
 * Class MerchantFeed
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Service\MerchantFeed
 */
class MerchantFeed
{
    private XMLWriter $xml;

    /**
     * MerchantFeed constructor.
     */
    public function __construct()
    {
        $this->xml = new XMLWriter();

        $this->registerHooks();
    }

    /**
     * Register hooks.
     */
    private function registerHooks(): void
    {
        add_action('wp', [$this, 'registerCrontabHooks']);
        add_action('create_feed_file_daily_event', [$this, 'createFeedXmlFile']);
    }

    /**
     * Register new cron event.
     */
    public function registerCrontabHooks(): void
    {
        if (!wp_next_scheduled('create_feed_file_daily_event')) {
            $today = date('Y-m-d 00:00:00');
            $dateTime = new DateTime($today, new DateTimeZone("Europe/Kiev"));
            $dateTime->modify('+1 day');

            wp_schedule_event($dateTime->getTimestamp(), 'daily', 'create_feed_file_daily_event');
        }
    }

    /**
     * Generate merchant feed xml file.
     */
    public function createFeedXmlFile(): void
    {
        $uploads = wp_get_upload_dir();
        $file    = $uploads['basedir'] . '/merchant-feed.xml';

        ob_start();
        $this->xml->openURI('php://output');
        $this->xml->startDocument();
        $this->xml->setIndent(true);
        $this->xml->startElement('rss');
        $this->xml->writeAttribute('xmlns:g', 'http://base.google.com/ns/1.0');
        $this->xml->writeAttribute('version', '2.0');

        $this->xml->startElement('channel');
        $this->xml->writeElement('title', get_bloginfo('name'));
        $this->xml->writeElement('description', get_bloginfo('description'));
        $this->xml->writeElement('link', site_url());

        $query = new WP_Query(
            [
                'post_type'   => ProductInit::$cptName,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'fields'      => 'ids',
                'lang' => 'ru'
            ]
        );

        if ($query->have_posts()) {
            foreach ($query->posts as $id) {
                $product = new Product($id);

                $this->xml->startElement('item');
                $this->xml->writeElement('id', $product->getSku());
                $this->xml->writeElement('title', $product->getTitle());
                $this->xml->startElement('description');
                $this->xml->writeCdata(
                    apply_filters(
                        'the_content',
                        get_the_content(null, true, $id)
                    )
                );

                // end description.
                $this->xml->endElement();
                $this->xml->writeElement('link', $product->getUrl());
                $this->xml->writeElement('image_link', get_field('no_watermark_image', $id));
                $this->xml->writeElement(
                    'availability',
                    $product->isUnderOrder() ? 'backorder' : 'in_stock'
                );
                $this->xml->writeElement('price', $product->getPrice() . ' UAH');
                $this->xml->writeElement('condition', 'new');

                // end item.
                $this->xml->endElement();
            }
        }

        // end channel.
        $this->xml->endElement();

        // end rss.
        $this->xml->endElement();
        $this->xml->endDocument();

        file_put_contents($file, ob_get_clean());
    }
}
