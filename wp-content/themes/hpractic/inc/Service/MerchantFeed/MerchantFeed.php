<?php

namespace Hpr\Service\MerchantFeed;

use DateTime;
use DateTimeZone;
use Exception;
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

    private const EXCLUDED_PRODUCTS = [1826];

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
        add_action('create_feed_file_daily_event', [$this, 'generateMerchantFeeds']);
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

    public function generateMerchantFeeds(): void
    {
        $this->createFeedXmlFile('ru');
        $this->createFeedXmlFile('uk');
    }

    /**
     * Generate merchant feed xml file.
     *
     * @param string $lang Localization language code.
     *
     * @throws Exception
     */
    private function createFeedXmlFile(string $lang): void
    {
        $uploads = wp_get_upload_dir();
        $file    = $uploads['basedir'] . "/merchant-feed-$lang.xml";

        ob_start();
        $this->xml->openURI('php://output');
        $this->xml->startDocument();
        $this->xml->setIndent(true);
        $this->xml->startElement('rss');
        $this->xml->writeAttribute('xmlns:g', 'http://base.google.com/ns/1.0');
        $this->xml->writeAttribute('version', '2.0');

        $this->xml->startElement('channel');
        $this->xml->writeElement('g:title', get_bloginfo('name'));
        $this->xml->writeElement(
            'g:description',
            'ru' === $lang
            ? 'Пластиковые изделия любой сложности'
            : 'Пластикові вироби будь-якої складності'
        );
        $this->xml->writeElement('g:link', site_url());

        $query = new WP_Query(
            [
                'post_type'   => ProductInit::$cptName,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'fields'      => 'ids',
                'lang' => $lang
            ]
        );

        if ($query->have_posts()) {
            foreach ($query->posts as $id) {
                if (in_array($id, self::EXCLUDED_PRODUCTS)) {
                    continue;
                }

                $product = new Product($id);

                $this->xml->startElement('item');
                $this->xml->writeElement('g:id', $product->getSku());
                $this->xml->writeElement('g:title', $product->getTitle());
                $this->xml->startElement('g:description');
                $this->xml->writeCdata(
                    apply_filters(
                        'the_content',
                        get_the_content(null, true, $id)
                    )
                );

                // end description.
                $this->xml->endElement();
                $this->xml->writeElement('g:link', $product->getUrl());
                $this->xml->writeElement('g:image_link', get_field('no_watermark_image', $id));
                $this->xml->writeElement(
                    'g:availability',
                    $product->isUnderOrder() ? 'backorder' : 'in_stock'
                );
                $this->xml->writeElement('g:price', $product->getPrice() . ' UAH');
                $this->xml->writeElement('g:condition', 'new');

                if ($product->isUnderOrder()) {
                    $today = date('Y-m-d 00:00:00');
                    $dateTime = new DateTime($today, new DateTimeZone("Europe/Kiev"));
                    $dateTime->modify(sprintf('+%d day', $product->getUnderOrderTime()));

                    $this->xml->writeElement('g:availability_date', $dateTime->format('c'));
                }

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
