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
            color: #222222;
        }

        body table td a[href] {
            color: #222222!important;
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

        .customer-data {
            padding: 15px 30px;
            font-size: 14px;
            line-height: 1.8;
            word-break: break-word;
        }

        .customer-data .label {
            width: 33%
        }

        .customer-data .value {
            width: 67%
        }

        .customer-data__name,
        .customer-data__phone,
        .customer-data__email,
        .customer-data__comment {
            display:flex;
            padding: 5px 0;
        }

        .customer-data .customer-data__email .value a,
        .customer-data .customer-data__email a {
            color: #444!important;
            text-decoration: none!important;
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

            .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
            }

            .footer__email {
                padding-left: 30px;
            }

            .customer-data__comment {
                display:block;
            }

            .customer-data .label {
                width: 100%
            }

            .customer-data .value {
                width: 100%
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

                        get_template_part('template-parts/emails/new-order/customer-data');
                        get_template_part('template-parts/emails/new-order/info');
                        get_template_part('template-parts/emails/new-order/footer');
                        ?>


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
