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
            'FloatingSocialButton',
            'bootstrap',
            'datapicker',
            'select2',
            'jquery.spin'
        ],
        function ($, TemplateSelectorGroup) {
            'use strict';

            function Market() {
                var self = this;
                /**
                 * @module       Tabs
                 * @description  Bootstrap tabs
                 */

                $("#myTabs a").each(function () {
                    if (this.href == window.location.href) {
                        $(this).parent().addClass("active");

                    }
                });

                /**
                 * @module       Select2
                 * @description  Select2
                 */
                $('select').select2({
                    theme: "bootstrap"
                });

                /**
                 * @module       Load list
                 * @description  Load list
                 */

                this.loadList('vente'); // Initialize default list

                $('#marketTabs a').click(function (e) {
                    e.preventDefault();
                    self.loadList($(this).data("type"));
                    $(this).tab('show')
                });

                /**
                 * @module       Filter list
                 * @description  Filter list by product
                 */
                $("#filter_product").change(function () {
                    var value = $(this).val(),
                            type = $('#marketTabs').find('li.active a').data("type");

                    self.filterBy(type, 'product', value);
                });

                /**
                 * @module       Filter list
                 * @description  Filter list by category
                 */
                $("#filter_category").change(function () {
                    var value = $(this).val(),
                            type = $('#marketTabs').find('li.active a').data("type");

                    self.filterBy(type, 'category', value);
                });
            }

            Market.prototype = {
                loadList: function (type) {
                    $('form').spin();
                    var data = {
                        type: type
                    };
                    $.ajax({
                        type: 'get',
                        url: Routing.generate('market_list'),
                        data: data
                    }).done(function (response) {

                        if (data.type == "vente") {
                            $("#offers").show();
                            $("#offers").html(response);
                        } else {
                            $("#offers").hide();
                            $("#demands").html(response);
                        }
                    }).fail(function () {
                        alert("error");
                    }).always(function () {
                        $('form').find('.spinner').hide()
                    });
                },
                filterBy: function (type, key, value) {
                    $('form').spin();
                    var data = {
                        type: type,
                        key: key,
                        value: value
                    };
                    $.ajax({
                        type: 'get',
                        url: Routing.generate('market_list_lister'),
                        data: data
                    }).done(function (response) {
                        if (data.type == "vente") {
                            $("#offers").show();
                            $("#offers").html(response);
                        } else {
                            $("#offers").hide();
                            $("#demands").html(response);
                        }
                    }).fail(function () {
                        alert("error");
                    }).always(function () {
                        $('form').find('.spinner').hide()
                    });

                }


            }


            new Market();
        }
);
