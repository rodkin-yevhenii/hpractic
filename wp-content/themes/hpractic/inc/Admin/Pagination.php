<?php

namespace Hpr\Admin;

/**
 * Class Pagination
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Admin
 */
class Pagination
{
    private int $currentPage;
    private int $lastPage;
    private int $pagesStep;
    private string $url;

    /**
     * Pagination constructor.
     */
    public function __construct(int $currentPage, int $lastPage, int $pagesStep = 2)
    {
        if (is_search() && !empty(get_search_query())) {
            $this->url = home_url() . '?s=' . get_search_query() . '&';
        } else {
            $this->url = get_permalink(get_the_ID()) . '?';
        }

        $this->currentPage = abs($currentPage);
        $this->lastPage = abs($lastPage);
        $this->pagesStep = abs($pagesStep);
    }

    /**
     * Get page URL.
     *
     * @param int $pageNumber
     *
     * @return string
     */
    private function getUrl(int $pageNumber): string
    {
        return $this->url . 'paged=' . $pageNumber . '';
    }

    /**
     * Show prev link markup.
     */
    private function getPrevPage(): void
    {
        $classes = 'pagination__prev btn btn--secondary btn--square btn-arrow btn-arrow--left';
        $href = $this->getUrl($this->currentPage - 1);

        if (1 === $this->currentPage) {
            $classes .= ' disabled';
            $href = $this->getUrl(1);
        }

        ob_start(); ?>
        <li class="pagination__item">
            <a href="<?php echo $href; ?>" class="<?php echo $classes; ?>">
                <svg class="icon">
                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-arrow-left"></use>
                </svg>
            </a>
        </li>
        <?php echo ob_get_clean();
    }

    /**
     * Show next link markup.
     */
    private function getNextPage(): void
    {
        $classes = 'pagination__next btn btn--secondary btn--square btn-arrow btn-arrow--right';
        $href = $this->getUrl($this->currentPage + 1);

        if ($this->lastPage === $this->currentPage) {
            $classes .= ' disabled';
            $href = $this->getUrl($this->currentPage);
        }

        ob_start(); ?>
        <li class="pagination__item">
            <a href="<?php echo $href; ?>" class="<?php echo $classes; ?>">
                <svg class="icon">
                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-arrow-right"></use>
                </svg>
            </a>
        </li>
        <?php echo ob_get_clean();
    }

    /**
     * Show first link markup.
     */
    private function getFirstPage(): void
    {
        if (1 >= $this->currentPage - $this->pagesStep) :
            return;
        endif;

        ob_start(); ?>
        <li class="pagination__item">
            <a href="<?php echo $this->getUrl(1); ?>">1</a>
        </li>
        <?php if (1 < $this->currentPage - $this->pagesStep - 1) : ?>
            <li class="pagination__item">
                <span class="separator">...</span>
            </li>
        <?php endif; ?>
        <?php echo ob_get_clean();
    }

    /**
     * Show last link markup.
     */
    private function getLastPage(): void
    {
        if ($this->lastPage <= $this->currentPage + $this->pagesStep) :
            return;
        endif;

        ob_start();

        if ($this->lastPage > $this->currentPage + $this->pagesStep + 1) : ?>
            <li class="pagination__item">
                <span class="separator">...</span>
            </li>
        <?php endif; ?>
        <li class="pagination__item">
            <a href="<?php echo $this->getUrl($this->lastPage); ?>">
                <?php echo $this->lastPage; ?>
            </a>
        </li>
        <?php echo ob_get_clean();
    }

    /**
     * Show current pages block.
     */
    private function getCurrentPages(): void
    {
        $startPage = $this->currentPage - $this->pagesStep > 1
            ? $this->currentPage - $this->pagesStep : 1;
        $lastPage = $this->currentPage + $this->pagesStep < $this->lastPage
            ? $this->currentPage + $this->pagesStep : $this->lastPage;

        ob_start();
        for ($i = $startPage; $i <= $lastPage; $i++) : ?>
            <li class="pagination__item">
                <a href="<?php echo $this->getUrl($i); ?>"<?php
                echo $i === $this->currentPage ? ' class="active"' : ''; ?>><?php echo $i; ?></a>
            </li>
        <?php endfor;
        echo ob_get_clean();
    }

    /**
     * Render pagination markup.
     */
    public function render(): void
    {
        if (1 === $this->lastPage) :
            return;
        endif;

        ob_start(); ?>
        <div class="pagination">
            <ul class="pagination__list">
                <?php
                $this->getPrevPage();
                $this->getFirstPage();
                $this->getCurrentPages();
                $this->getLastPage();
                $this->getNextPage();
                ?>
            </ul>
        </div>
        <?php echo ob_get_clean();
    }
}
