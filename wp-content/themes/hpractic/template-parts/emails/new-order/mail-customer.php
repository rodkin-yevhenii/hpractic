<?php

$products = $args['products'] ?? [];

if (empty($products)) :
    return '';
endif;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"
>
<head>
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width" name="viewport"/>
    <!--[if !mso]><!-->
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    <!--<![endif]-->
    <title></title>
    <!--[if !mso]><!-->
    <!--<![endif]-->
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        table,
        td,
        tr {
            vertical-align: top;
            border-collapse: collapse;
        }

        * {
            line-height: inherit;
        }

        a[x-apple-data-detectors=true] {
            color: inherit !important;
            text-decoration: none !important;
        }
    </style>
    <style id="media-query" type="text/css">
        @media (max-width: 720px) {

            .block-grid,
            .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
            }

            .block-grid {
                width: 100% !important;
            }

            .col {
                width: 100% !important;
            }

            .col_cont {
                margin: 0 auto;
            }

            img.fullwidth,
            img.fullwidthOnMobile {
                max-width: 100% !important;
            }

            .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
            }

            .no-stack.two-up .col {
                width: 50% !important;
            }

            .no-stack .col.num2 {
                width: 16.6% !important;
            }

            .no-stack .col.num3 {
                width: 25% !important;
            }

            .no-stack .col.num4 {
                width: 33% !important;
            }

            .no-stack .col.num5 {
                width: 41.6% !important;
            }

            .no-stack .col.num6 {
                width: 50% !important;
            }

            .no-stack .col.num7 {
                width: 58.3% !important;
            }

            .no-stack .col.num8 {
                width: 66.6% !important;
            }

            .no-stack .col.num9 {
                width: 75% !important;
            }

            .no-stack .col.num10 {
                width: 83.3% !important;
            }

            .video-block {
                max-width: none !important;
            }

            .desktop_hide {
                display: block !important;
                max-height: none !important;
            }
        }

        @media (max-width: 1080px) {
            .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
            }
        }
    </style>
    <style id="icon-media-query" type="text/css">
        @media (max-width: 720px) {
            .icons-inner {
                text-align: center;
            }

            .icons-inner td {
                margin: 0 auto;
            }
        }
    </style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
<!--[if IE]>
<div class="ie-browser"><![endif]-->
<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
       style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;"
       valign="top" width="100%">
    <tbody>
    <tr style="vertical-align: top;" valign="top">
        <td style="word-break: break-word; vertical-align: top;" valign="top">
            <!--[if (mso)|(IE)]>
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td align="center" style="background-color:#FFFFFF"><![endif]-->
                        <?php
                        get_template_part('template-parts/emails/new-order/header');
                        get_template_part('template-parts/emails/new-order/order-title');

                        $productsLength = count($products);
                        $counter = 1;

                        foreach ($products as $id => $quantity) {
                            get_template_part(
                                'template-parts/emails/new-order/order-item',
                                null,
                                [
                                    'id' => $id,
                                    'quantity' => $quantity
                                ]
                            );

                            if ($counter++ === $productsLength) {
                                continue;
                            }
                            get_template_part('template-parts/emails/new-order/line');
                        }
                        ?>


                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                 style="min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f2f5f8;">
                                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#f2f5f8;">
                                    <!--[if (mso)|(IE)]>
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                           style="background-color:transparent;">
                                        <tr>
                                            <td align="center">
                                                <table cellpadding="0" cellspacing="0" border="0" style="width:700px">
                                                    <tr class="layout-full-width" style="background-color:#f2f5f8"><![endif]-->
                                    <!--[if (mso)|(IE)]>
                                    <td align="center" width="700"
                                        style="background-color:#f2f5f8;width:700px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                                        valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                    <![endif]-->
                                    <div class="col num12"
                                         style="min-width: 320px; max-width: 700px; display: table-cell; vertical-align: top; width: 700px;">
                                        <div class="col_cont" style="width:100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                       role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner"
                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;"
                                                            valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                                   class="divider_content" height="10" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 10px; width: 100%;"
                                                                   valign="top" width="100%">
                                                                <tbody>
                                                                <tr style="vertical-align: top;" valign="top">
                                                                    <td height="10"
                                                                        style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                        valign="top"><span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table cellpadding="0" cellspacing="0" role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                       valign="top" width="100%">
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td align="center"
                                                            style="word-break: break-word; vertical-align: top; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; padding-top: 0px; text-align: center; width: 100%;"
                                                            valign="top" width="100%">
                                                            <h1 style="color:#555555;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:24px;font-weight:normal;letter-spacing:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0;">
                                                                <strong>Ваши данные</strong></h1>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                       role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner"
                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;"
                                                            valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                                   class="divider_content" height="0" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;"
                                                                   valign="top" width="100%">
                                                                <tbody>
                                                                <tr style="vertical-align: top;" valign="top">
                                                                    <td height="0"
                                                                        style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                        valign="top"><span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                       role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner"
                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;"
                                                            valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                                   class="divider_content" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #161616; width: 25%;"
                                                                   valign="top" width="25%">
                                                                <tbody>
                                                                <tr style="vertical-align: top;" valign="top">
                                                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                        valign="top"><span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid mixed-two-up"
                                 style="min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f2f5f8;">
                                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#f2f5f8;">
                                    <!--[if (mso)|(IE)]>
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                           style="background-color:transparent;">
                                        <tr>
                                            <td align="center">
                                                <table cellpadding="0" cellspacing="0" border="0" style="width:700px">
                                                    <tr class="layout-full-width" style="background-color:#f2f5f8"><![endif]-->
                                    <!--[if (mso)|(IE)]>
                                    <td align="center" width="233"
                                        style="background-color:#f2f5f8;width:233px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                                        valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                    <![endif]-->
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
                                                        <td style="padding-right: 10px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                <![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:30px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            Имя:</p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <!--[if mso]>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-right: 10px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                <![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:30px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            Телефон:</p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <!--[if mso]>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-right: 10px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                <![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:30px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            Комментарий</p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td>
                                    <td align="center" width="466"
                                        style="background-color:#f2f5f8;width:466px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                                        valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                    <![endif]-->
                                    <div class="col num8"
                                         style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 464px; width: 466px;">
                                        <div class="col_cont" style="width:100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <!--[if mso]>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-right: 30px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                <![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:30px;padding-bottom:10px;padding-left:10px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            Евгений</p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <!--[if mso]>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-right: 30px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                <![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:30px;padding-bottom:10px;padding-left:10px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            +38 067 1234567</p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <!--[if mso]>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-right: 30px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                <![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:30px;padding-bottom:10px;padding-left:10px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum
                                                            dolor sit amet, consectetuer adipiscing elit.</p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                 style="min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f2f5f8;">
                                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#f2f5f8;">
                                    <!--[if (mso)|(IE)]>
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                           style="background-color:transparent;">
                                        <tr>
                                            <td align="center">
                                                <table cellpadding="0" cellspacing="0" border="0" style="width:700px">
                                                    <tr class="layout-full-width" style="background-color:#f2f5f8"><![endif]-->
                                    <!--[if (mso)|(IE)]>
                                    <td align="center" width="700"
                                        style="background-color:#f2f5f8;width:700px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                                        valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                    <![endif]-->
                                    <div class="col num12"
                                         style="min-width: 320px; max-width: 700px; display: table-cell; vertical-align: top; width: 700px;">
                                        <div class="col_cont" style="width:100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                       role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner"
                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;"
                                                            valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                                   class="divider_content" height="0" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;"
                                                                   valign="top" width="100%">
                                                                <tbody>
                                                                <tr style="vertical-align: top;" valign="top">
                                                                    <td height="0"
                                                                        style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                        valign="top"><span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                 style="min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #ffffff;">
                                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                                    <!--[if (mso)|(IE)]>
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                           style="background-color:transparent;">
                                        <tr>
                                            <td align="center">
                                                <table cellpadding="0" cellspacing="0" border="0" style="width:700px">
                                                    <tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
                                    <!--[if (mso)|(IE)]>
                                    <td align="center" width="700"
                                        style="background-color:#ffffff;width:700px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                                        valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                    <![endif]-->
                                    <div class="col num12"
                                         style="min-width: 320px; max-width: 700px; display: table-cell; vertical-align: top; width: 700px;">
                                        <div class="col_cont" style="width:100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                       role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner"
                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;"
                                                            valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                                   class="divider_content" height="20" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 20px; width: 100%;"
                                                                   valign="top" width="100%">
                                                                <tbody>
                                                                <tr style="vertical-align: top;" valign="top">
                                                                    <td height="20"
                                                                        style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                        valign="top"><span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table cellpadding="0" cellspacing="0" role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                       valign="top" width="100%">
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td align="center"
                                                            style="word-break: break-word; vertical-align: top; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; padding-top: 0px; text-align: center; width: 100%;"
                                                            valign="top" width="100%">
                                                            <h1 style="color:#555555;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:24px;font-weight:normal;letter-spacing:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0;">
                                                                <strong>Что дальше?</strong></h1>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                       role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner"
                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;"
                                                            valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                                   class="divider_content" height="0" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;"
                                                                   valign="top" width="100%">
                                                                <tbody>
                                                                <tr style="vertical-align: top;" valign="top">
                                                                    <td height="0"
                                                                        style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                        valign="top"><span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                       role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner"
                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;"
                                                            valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                                   class="divider_content" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #161616; width: 25%;"
                                                                   valign="top" width="25%">
                                                                <tbody>
                                                                <tr style="vertical-align: top;" valign="top">
                                                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                        valign="top"><span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!--[if mso]>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-right: 30px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                <![endif]-->
                                                <div
                                                    style="color:#161616;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.8;padding-top:10px;padding-right:30px;padding-bottom:10px;padding-left:30px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="line-height: 1.8; font-size: 12px; color: #161616; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 22px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.8; word-break: break-word; text-align: left; mso-line-height-alt: 25px; margin-top: 0; margin-bottom: 0;">
                                                            В ближайшее время с вами свяжется наш менеджер для уточнения деталей
                                                            заказа.<br/>Заказы, оформленные через корзину сайта в выходные и
                                                            праздничные дни, будут по очереди обработаны в первый рабочий день.</p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <table cellpadding="0" cellspacing="0" role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                       valign="top" width="100%">
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td align="center"
                                                            style="word-break: break-word; vertical-align: top; padding-bottom: 5px; padding-left: 30px; padding-right: 10px; padding-top: 10px; text-align: center; width: 100%;"
                                                            valign="top" width="100%">
                                                            <h3 style="color:#555555;direction:ltr;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;font-weight:normal;letter-spacing:normal;line-height:120%;text-align:left;margin-top:0;margin-bottom:0;">
                                                                Рабочие дни<strong>:</strong></h3>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!--[if mso]>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-right: 10px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                <![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:30px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            9:00 – 19:00 Пн – Пт<br/>9:00 – 15:00 Сб</p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                       role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner"
                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;"
                                                            valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                                   class="divider_content" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;"
                                                                   valign="top" width="100%">
                                                                <tbody>
                                                                <tr style="vertical-align: top;" valign="top">
                                                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                        valign="top"><span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!--[if mso]>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-right: 10px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                <![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:30px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            <strong>С уважением, компания «Practice House»</strong></p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                       role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner"
                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;"
                                                            valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                                   class="divider_content" height="40" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 40px; width: 100%;"
                                                                   valign="top" width="100%">
                                                                <tbody>
                                                                <tr style="vertical-align: top;" valign="top">
                                                                    <td height="40"
                                                                        style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                        valign="top"><span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <div style="background-color:#f2f5f8;">
                            <div class="block-grid"
                                 style="min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f2f5f8;">
                                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#f2f5f8;">
                                    <!--[if (mso)|(IE)]>
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                           style="background-color:#f2f5f8;">
                                        <tr>
                                            <td align="center">
                                                <table cellpadding="0" cellspacing="0" border="0" style="width:700px">
                                                    <tr class="layout-full-width" style="background-color:#f2f5f8"><![endif]-->
                                    <!--[if (mso)|(IE)]>
                                    <td align="center" width="700"
                                        style="background-color:#f2f5f8;width:700px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                                        valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;">
                                    <![endif]-->
                                    <div class="col num12"
                                         style="min-width: 320px; max-width: 700px; display: table-cell; vertical-align: top; width: 700px;">
                                        <div class="col_cont" style="width:100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                       role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td class="divider_inner"
                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 25px; padding-bottom: 20px; padding-left: 25px;"
                                                            valign="top">
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                                   class="divider_content" height="1" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px dotted #F9F9F9F9; height: 1px; width: 100%;"
                                                                   valign="top" width="100%">
                                                                <tbody>
                                                                <tr style="vertical-align: top;" valign="top">
                                                                    <td height="1"
                                                                        style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                        valign="top"><span></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!--[if mso]>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                <![endif]-->
                                                <div
                                                    style="color:#222222;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; color: #222222; mso-line-height-alt: 14px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            <span style="font-size: 14px;">Если у вас возникнут вопросы, просто свяжитесь с нами:</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <div style="background-color:#f2f5f8;">
                            <div class="block-grid three-up"
                                 style="min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f2f5f8;">
                                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#f2f5f8;">
                                    <!--[if (mso)|(IE)]>
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                           style="background-color:#f2f5f8;">
                                        <tr>
                                            <td align="center">
                                                <table cellpadding="0" cellspacing="0" border="0" style="width:700px">
                                                    <tr class="layout-full-width" style="background-color:#f2f5f8"><![endif]-->
                                    <!--[if (mso)|(IE)]>
                                    <td align="center" width="233"
                                        style="background-color:#f2f5f8;width:233px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                                        valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                    <![endif]-->
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
                                                    style="color:#222222;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; color: #222222; mso-line-height-alt: 14px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            <span style="font-size: 14px;">+38 (050) 618-48-64</span><br/><span
                                                                style="font-size: 14px;">+38 (096) 172-48-68</span></p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td>
                                    <td align="center" width="233"
                                        style="background-color:#f2f5f8;width:233px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                                        valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                    <![endif]-->
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
                                                    style="color:#222222;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div class="txtTinyMce-wrapper"
                                                         style="line-height: 1.2; font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; color: #222222; mso-line-height-alt: 14px;">
                                                        <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">
                                                            <span style="font-size: 14px;">hpractic@gmail.com</span></p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td>
                                    <td align="center" width="233"
                                        style="background-color:#f2f5f8;width:233px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;"
                                        valign="top">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                    <![endif]-->
                                    <div class="col num4"
                                         style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 232px; width: 233px;">
                                        <div class="col_cont" style="width:100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <table cellpadding="0" cellspacing="0" class="social_icons" role="presentation"
                                                       style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                       valign="top" width="100%">
                                                    <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td style="word-break: break-word; vertical-align: top; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;"
                                                            valign="top">
                                                            <table align="center" cellpadding="0" cellspacing="0"
                                                                   class="social_table" role="presentation"
                                                                   style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;"
                                                                   valign="top">
                                                                <tbody>
                                                                <tr align="center"
                                                                    style="vertical-align: top; display: inline-block; text-align: center;"
                                                                    valign="top">
                                                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 5px; padding-left: 5px;"
                                                                        valign="top"><a href="viber://chat?number=+380506184864"
                                                                                        target="_blank"><img alt="Custom"
                                                                                                             height="32"
                                                                                                             src="images/viber.png"
                                                                                                             style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"
                                                                                                             title="Custom"
                                                                                                             width="31"/></a></td>
                                                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 5px; padding-left: 5px;"
                                                                        valign="top"><a href="tg://resolve?domain=Practice_house"
                                                                                        target="_blank"><img alt="Custom"
                                                                                                             height="32"
                                                                                                             src="images/telegram.png"
                                                                                                             style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"
                                                                                                             title="Custom"
                                                                                                             width="33"/></a></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]>
                    </td>
                </tr>
            </table><![endif]-->
        </td>
    </tr>
    </tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>
