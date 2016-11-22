/*
 * This file is part of the Benagro package.
 *
 * (c) Jacques Adjahoungbo <jtocson@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

/**
 * Home page
 *
 * @version 1.0 [17 Novembre 2016]
 * @author Jacques Adjahoungbo <jtocson@gmail.com>
 */

define(
        [
            'jquery',
            'bootstrap'
        ],
        function ($) {
            'use strict';
            $(function () {

                /**
                 * @module       Tabs
                 * @description  Bootstrap tabs
                 */

                $("#myTabs a").each(function () {
                    if (this.href == window.location.href) {
                        $(this).parent().addClass("active");
                    }
                });
            });
        }
);

