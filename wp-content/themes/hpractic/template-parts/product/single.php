<?php

use Hpr\Entity\Product;
use Hpr\Service\Breadcrumbs\Breadcrumbs;

$id = $args['id'] ?? get_the_ID();
$product = new Product($id);
$breadcrumbs = new Breadcrumbs($id);
?>
<div class="head head--secondary">
    <div class="head__top">
        <div class="container">
            <div class="breadcrumbs">
                <?php $breadcrumbs->render(); ?>
            </div>
        </div>
    </div>
</div>
<div class="product">
    <div class="product__head">
        <div class="container">
            <div class="product__head-inner">
                <?php get_template_part('template-parts/product/gallery', null, ['gallery' => $product->getGallery()])?>
                <div class="product__details">
                    <h3 class="product__title">
                        Светящаяся табличка 400х300 мм боковой монтаж
                    </h3>
                    <div class="product__part-number">Артикул 02598</div>
                    <div class="product__price"><strong class="value">12 236</strong> грн</div>
                    <div class="product__list">
                        <ul>
                            <li>Под заказ, 12 дней</li>
                            <li>Минимальный заказ - 5 шт.</li>
                            <li>Оптом и в розницу, опт от 10 шт.</li>
                        </ul>
                        <p>Обычный текст для примера</p>
                    </div>
                    <div class="product__count">
                        <div class="quantity">
                            <button class="quantity__btn quantity__btn--minus" type="button" data-type="minus"></button>
                            <button class="quantity__btn quantity__btn--plus" type="button" data-type="plus"></button>
                            <input class="quantity__input" type="text" value="1" name="number" min="1" max="99">
                        </div>
                    </div>
                    <button type="button" class="btn btn--primary">Заказать</button>
                    <div class="product__info u-desktop-lg-hidden">
                        <div class="product__info-item">
                            <div class="product__info-head">
                                <svg class="icon">
                                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-car"></use>
                                </svg>
                                <span>Доставка</span>
                            </div>
                            <div class="product__info-body">
                                <ul>
                                    <li>Самовывоз</li>
                                    <li>Перевозчик «Новая почта»</li>
                                    <li>Доставка нашим курьером</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product__info-item">
                            <div class="product__info-head">
                                <svg class="icon">
                                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-credit-cards"></use>
                                </svg>
                                <span>Оплата</span>
                            </div>
                            <div class="product__info-body">
                                <ul>
                                    <li>Безналичный расчет</li>
                                    <li>На карту ПриватБанк</li>
                                    <li>Наложенный платеж</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__info u-desktop-lg-visible">
                    <div class="product__info-item">
                        <div class="product__info-head">
                            <svg class="icon">
                                <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-car"></use>
                            </svg>
                            <span>Доставка</span>
                        </div>
                        <div class="product__info-body">
                            <ul>
                                <li>Самовывоз</li>
                                <li>Перевозчик «Новая почта»</li>
                                <li>Доставка нашим курьером</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product__info-item">
                        <div class="product__info-head">
                            <svg class="icon">
                                <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-credit-cards"></use>
                            </svg>
                            <span>Оплата</span>
                        </div>
                        <div class="product__info-body">
                            <ul>
                                <li>Безналичный расчет</li>
                                <li>На карту ПриватБанк</li>
                                <li>Наложенный платеж</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__body">
        <div class="tabs">
            <div class="tabs__nav">
                <div class="container">
                    <div class="tabs__nav-inner">
                        <div class="tabs__nav-item" data-tab="description">
                            <span>Описание</span>
                        </div>
                        <div class="tabs__nav-item" data-tab="characteristic">
                            <span>Характеристики</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabs__items article">
                <div class="container">
                    <div class="tabs__items-inner">
                        <div class="tabs__items-tab" data-tab="description">
                            <p>
                                Стол изготовлен из прозрачного материала - оргстекла. Форма столешницы прямоугольная.
                                Профиль стола имеет о-образный вид. Скругления стола на углах плавные,
                                легко поддаются уборке. Внизу имеется полка Для увеличения нагружаемой
                                способности стола добавляем к конструкции усиливающие пластины под столешницу
                                в виде арок.
                                Внизу имеются 4 ножек, которые имеют круглую форму. Высота ножек 50 мм.
                                Дополнительные опции:
                            </p>
                            <ul>
                                <li>
                                    На указанную часть изделия наносим желаемый рисунок, логотип.
                                    Изображение может быть нанесено двумя способами: УФ-печать либо лазерная
                                    гравировка
                                </li>
                                <li>
                                    Придаем матовость прозрачным деталям
                                </li>
                            </ul>
                            <h4>Комплект поставки:</h4>
                            <ul>
                                <li>
                                    Стол
                                </li>
                                <li>
                                    Компания "Practice House" является производителем продукции из оргстекла
                                    и прочих пластиков. Изготавливаем товары согласно указанным габаритными
                                    размерами и конфигурации
                                </li>
                            </ul>
                            <figure class="table-container">
                                <table>
                                    <thead>
                                    <tr>
                                        <td>Столбец 1</td>
                                        <td>Столбец 2</td>
                                        <td>Столбец 3</td>
                                        <td>Столбец 4</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Ячейка 1</td>
                                        <td>Ячейка 2</td>
                                        <td>Ячейка 3</td>
                                        <td>Ячейка 4</td>
                                    </tr>
                                    <tr>
                                        <td>Ячейка 1</td>
                                        <td>Ячейка 2</td>
                                        <td>Ячейка 3</td>
                                        <td>Ячейка 4</td>
                                    </tr>
                                    <tr>
                                        <td>Ячейка 1</td>
                                        <td>Ячейка 2</td>
                                        <td>Ячейка 3</td>
                                        <td>Ячейка 4</td>
                                    </tr>
                                    <tr>
                                        <td>Ячейка 1</td>
                                        <td>Ячейка 2</td>
                                        <td>Ячейка 3</td>
                                        <td>Ячейка 4</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <figcaption>Пример названия таблицы</figcaption>
                            </figure>
                            <p>
                                Наша компания готова изготовить продукцию в необходимых вам габаритных
                                размерах, с оптимальной комплектацией и в наиболее подходящем цветовом
                                решении. Дополнительно на элементы конструкции наносим изображение с
                                помощью цветной УФ печати, лазерной гравировки либо самоклеящейся пленки
                                с изображением.
                            </p>
                        </div>
                        <div class="tabs__items-tab" data-tab="characteristic">
                            <h4>Габаритные размеры столика</h4>
                            <figure class="table-container">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Длина столика</td>
                                        <td>800 мм</td>
                                    </tr>
                                    <tr>
                                        <td>Глубина столика</td>
                                        <td>400 мм</td>
                                    </tr>
                                    <tr>
                                        <td>Высота столика</td>
                                        <td>450 мм</td>
                                    </tr>
                                    <tr>
                                        <td>Толщина</td>
                                        <td>10 мм</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <figcaption>Пример названия таблицы</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
