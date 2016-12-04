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
                    var value1 = $(this).val(),
                        type = $('#marketTabs').find('li.active a').data("type"),
                        value2 = $("#filter_city").val();
                    self.filterByCityProduct(type, 'city', value2, 'product', value1);
                });

                /**
                 * @module       Filter list
                 * @description  Filter list by city
                 */
                $("#filter_city").change(function () {
                    var value1 = $(this).val(),
                        type = $('#marketTabs').find('li.active a').data("type"),
                        value2 = $("#filter_product").val();
                    self.filterByCityProduct(type, 'city', value1, 'product', value2);
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

                },

                filterByCityProduct: function (type, key1, value1, key2, value2) {
                    $('form').spin();
                    var data = {
                        type: type,
                        key1: key1,
                        value1: value1,
                        key2: key2,
                        value2: value2,
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
