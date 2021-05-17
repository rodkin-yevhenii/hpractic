<?php

use Hpr\Entity\Product;

$id = $args['id'] ?? false;
$quantity = $args['quantity'] ?? false;

if (!$id) {
    return;
}

$product = new Product($id);

$imgId = $product->getGallery()[0] ?? false;
$img = '';

if ($imgId) {
    $img =  wp_get_attachment_image_url($imgId, 'product-gallery-thumbnail');
}
?>
<div style="background-color:transparent;">
    <div class="block-grid three-up no-stack"
         style="min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
            <!--[if (mso)|(IE)]>
            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                   style="background-color:transparent;">
                <tr>
                    <td align="center">
                        <table cellpadding="0" cellspacing="0" border="0" style="width:700px">
                            <tr class="layout-full-width" style="background-color:transparent"><![endif]-->
            <!--[if (mso)|(IE)]>
            <td align="center" width="116"
                style="background-color:transparent;width:116px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                valign="top">
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;">
                            <![endif]-->

                            <!--     PRODUCT IMAGE       -->
                            <div class="col num2"
                                 style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 116px; width: 116px;">
                                <div class="col_cont" style="width:100% !important;">
                                    <!--[if (!mso)&(!IE)]><!-->
                                    <div
                                        style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                                        <!--<![endif]-->
                                        <div align="center" class="img-container center autowidth"
                                             style="padding-right: 0px;padding-left: 0px;">
                                            <!--[if mso]>
                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                <tr style="line-height:0px">
                                                    <td style="padding-right: 0px;padding-left: 0px;" align="center">
                                                        <![endif]-->
                                                        <a href="#" style="outline:none" tabindex="-1" target="_blank">
                                                            <img
                                                                align="center"
                                                                border="0"
                                                                style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 75px; display: block; padding: 10px;"
                                                                alt="<?php echo $product->getTitle() ?>"
                                                                title="<?php echo $product->getTitle() ?>"
                                                                width="75"
                                                                height="75"
                                                                src="<?php echo $img; ?>"/>
                                                        </a>
                                                        <!--[if mso]>
                                                    </td>
                                                </tr>
                                            </table>
                                            <![endif]-->
                                        </div>
                                        <!--[if (!mso)&(!IE)]><!-->
                                    </div>
                                    <!--<![endif]-->
                                </div>
                            </div>
                            <!--     /PRODUCT IMAGE       -->

                            <!--[if (mso)|(IE)]>
                        </td>
                    </tr>
                </table>
                <![endif]-->
            <!--[if (mso)|(IE)]></td>
            <td align="center" width="350"
                style="background-color:transparent;width:350px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                valign="top">
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                            <![endif]-->

                            <!--     PRODUCT DATA       -->
                            <div class="col num6"
                                 style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 348px; width: 350px;">
                                <div class="col_cont" style="width:100% !important;">
                                    <!--[if (!mso)&(!IE)]><!-->
                                    <div
                                        style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                        <!--<![endif]-->
                                        <!--[if mso]>
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 10px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                        <![endif]-->
                                        <div
                                            style="font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;">
                                            <div class="txtTinyMce-wrapper"
                                                 style="line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;">
                                                <p style="margin: 0; font-size: 16px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 19px; margin-top: 0; margin-bottom: 0;">
                                                    <a href="<?php echo $product->getUrl(); ?>" style="text-decoration: none; font-size: 14px;">
                                                        <strong><?php echo $product->getTitle(); ?></strong>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <!--[if mso]></td></tr></table><![endif]-->
                                        <!--[if mso]>
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 10px; padding-left: 25px; padding-top: 0px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                        <![endif]-->
                                        <div
                                            style="font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:0px;padding-right:10px;padding-bottom:10px;padding-left:25px;">
                                            <div class="txtTinyMce-wrapper"
                                                 style="line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;">
                                                <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                    <?php _e('Артикул', 'hpractice');
                                                    ?>:   <?php echo $product->getSku();?>
                                                </p>
                                            </div>
                                        </div>
                                        <!--[if mso]></td></tr></table><![endif]-->
                                        <!--[if mso]>
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 10px; padding-left: 25px; padding-top: 0px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                        <![endif]-->
                                        <div
                                            style="font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:0px;padding-right:10px;padding-bottom:10px;padding-left:25px;">
                                            <div class="txtTinyMce-wrapper"
                                                 style="line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;">
                                                <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                    <?php _e('Количество', 'hpractice');
                                                    ?>:   <?php echo $quantity;?>
                                                </p>
                                            </div>
                                        </div>
                                        <!--[if mso]></td></tr></table><![endif]-->
                                        <!--[if (!mso)&(!IE)]><!-->
                                    </div>
                                    <!--<![endif]-->
                                </div>
                            </div>
                            <!--     /PRODUCT DATA       -->

                            <!--[if (mso)|(IE)]>
                        </td>
                    </tr>
                </table>
                <![endif]-->
            <!--[if (mso)|(IE)]></td>
            <td align="center" width="233"
                style="background-color:transparent;width:233px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                valign="top">
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                            <![endif]-->

                            <!--     PRODUCT PRICE       -->
                            <div class="col num4"
                                 style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 232px; width: 233px;">
                                <div class="col_cont" style="width:100% !important;">
                                    <!--[if (!mso)&(!IE)]><!-->
                                    <div
                                        style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                        <!--<![endif]-->
                                        <!--[if mso]>
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                        <![endif]-->
                                        <div
                                            style="font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                            <div class="txtTinyMce-wrapper"
                                                 style="line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;">
                                                <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                    <?php
                                                    echo $product->isMinPrice() ? __('от', 'hpractice') : ''; ?> <?php
                                                    echo $product->getPrice(); ?> грн
                                                </p>
                                            </div>
                                        </div>
                                        <!--[if mso]></td></tr></table><![endif]-->
                                        <!--[if (!mso)&(!IE)]><!-->
                                    </div>
                                    <!--<![endif]-->
                                </div>
                            </div>
                            <!--     /PRODUCT PRICE       -->

            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
    </div>
</div>
