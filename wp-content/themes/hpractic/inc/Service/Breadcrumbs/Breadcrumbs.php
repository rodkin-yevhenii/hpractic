<?php

namespace Hpr\Service\Breadcrumbs;

use Hpr\Admin\ProductInit;
use Hpr\Admin\ServiceInit;

/**
 * Class Breadcrumbs
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Service\Breadcrumbs
 */
class Breadcrumbs
{
    private array $items;
    private int $currentItemId;

    /**
     * Breadcrumbs constructor.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $post = get_post($id);
        $this->currentItemId = $id;
        $homeId = get_option('page_on_front');
        $this->items[] = $this->getPostData($homeId);

        switch (get_post_type($id)) {
            case ProductInit::$cptName:
                // todo create for products.
                break;
            case ServiceInit::$cptName:
                // todo create for service.
                break;
            default:
                $parentId = $post->post_parent;

                if (!empty($parentId)) {
                    $this->items[] = $this->getPostData($parentId);
                }
        }

        $this->items[] = $this->getPostData($this->currentItemId, true);
    }

    /**
     * Get array with post url, title and id.
     *
     * @param int $id
     * @param bool $isCurrent
     *
     * @return array
     */
    private function getPostData(int $id, bool $isCurrent = false): array
    {
        $data['id'] = $id;

        if (!$isCurrent) {
            $url = get_permalink($id);

            if (!$url) {
                return [];
            }

            $data['url'] = $url;
        }

        $title = get_the_title($id);

        if (empty($title)) {
            return [];
        }

        $data['title'] = $title;

        return $data;
    }

    /**
     * Render breadcrumbs markup.
     */
    public function render(): void
    {
        ob_start(); ?>
        <ul>
            <?php foreach ($this->items as $item) : ?>
                <li>
                    <?php if (!empty($item['url'])) : ?>
                        <a href="<?php echo $item['url'];  ?>"><?php echo $item['title'] ?? '';  ?></a>
                    <?php else : ?>
                        <span class="active"><?php echo $item['title'] ?? '';  ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php echo ob_get_clean();
    }
}
