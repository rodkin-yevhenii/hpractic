<?php

namespace Hpr\Entity;

/**
 * Class AffiliateAbstract
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Entity
 */
class AffiliateAbstract
{
    private int $id;
    private string $title;
    private string $content;
    private string $thumbUrl;

    /**
     * AffiliateAbstract constructor.
     *
     * @param int $id           Post id.
     * @param string $title     Post title.
     * @param string $thumbUrl  Post thumbnail url.
     */
    public function __construct(int $id)
    {
        $this->id = $id;
        $this->title = get_the_title($id);
        $this->thumbUrl = get_the_post_thumbnail_url($id);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getThumbUrl(): string
    {
        return $this->thumbUrl;
    }
}
