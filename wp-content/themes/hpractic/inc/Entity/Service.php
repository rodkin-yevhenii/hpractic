<?php

namespace Hpr\Entity;

/**
 * Class Service
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Entity
 */
class Service extends AffiliateAbstract
{
    private string $excerpt;
    /**
     * Service constructor.
     *
     * @param int $id   Service ID;
     */
    public function __construct(int $id)
    {
        parent::__construct($id);

        $this->excerpt = get_the_excerpt($id);
    }

    /**
     * @return string
     */
    public function getExcerpt(): string
    {
        return $this->excerpt;
    }
}
