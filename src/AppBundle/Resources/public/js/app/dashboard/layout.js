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
 * New product page
 *
 * @version 1.0 [11 Octobre 2016]
 * @author Jacques Adjahoungbo <jtocson@gmail.com>
 */

define(
        [
            'jquery',
            'canvasjs'
        ],
        function ($) {
            'use strict';
            console.log('OK');
            // $('#dataTables-example').DataTable();

            /**
             * @module       Tabs
             * @description  Bootstrap tabs
             */

//            $('#myTabs a').click(function (e) {
//                e.preventDefault()
//                $(this).tab('show')
//            });

            var marketgraph = new CanvasJS.Chart("graphlemarche",
                    {
                        theme: "theme1",
                        title: {
                            text: "Le Marché"
                        },
                        data: imprimegrapheMarket() 
                        
                    });
            marketgraph.render();

            var chiffreaffaire = new CanvasJS.Chart("graphchiffreaffaire",
                    {
                        theme: "theme2",
                        title: {
                            text: "Chiffre d'affaire"
                        },
                        data: [
                            {
                                type: "pie",
                                showInLegend: true,
                                toolTipContent: "{y} - #percent %",
                                yValueFormatString: "#0.#,,. Million",
                                legendText: "{indexLabel}",
                                dataPoints: [
                                    {y: 41, indexLabel: "PlayStation 3"},
                                    {y: 21, indexLabel: "Wii"},
                                    {y: 31, indexLabel: "Xbox 360"},
                                    {y: 11, indexLabel: "Nintendo DS"},
                                    {y: 17, indexLabel: "PSP"},
                                    {y: 43, indexLabel: "Nintendo 3DS"},
                                    {y: 17, indexLabel: "PS Vita"}
                                ]
                            }
                        ]
                    });
            chiffreaffaire.render();

            var productsoffresgraph = new CanvasJS.Chart("productsoffresgraph", {
                theme: "theme2",
                title: {
                    text: "Produits/Offres ou souscriptions"
                },
                axisX: {
                    interval: 10
                },
                dataPointWidth: 60,
                data: [{
                        type: "column",
                        indexLabelLineThickness: 2,
                        dataPoints: [
                            {x: 10, y: 230, indexLabel: "Lowest"},
                            {x: 20, y: 710, indexLabel: "Highest"},
                            {x: 30, y: 380},
                            {x: 40, y: 567},
                            {x: 50, y: 280},
                            {x: 60, y: 507},
                            {x: 70, y: 680},
                            {x: 80, y: 287},
                            {x: 90, y: 460},
                            {x: 100, y: 509}
                        ]
                    }]
            });
            productsoffresgraph.render();

            var productsdemandgraph = new CanvasJS.Chart("productsdemandgraph", {
                theme: "theme2",
                title: {
                    text: "Produits/Demandes ou commandes"
                },
                axisX: {
                    interval: 10
                },
                dataPointWidth: 60,
                data: [{
                        type: "column",
                        indexLabelLineThickness: 2,
                        dataPoints: [
                            {x: 10, y: 230, indexLabel: "Lowest"},
                            {x: 20, y: 710, indexLabel: "Highest"},
                            {x: 30, y: 380},
                            {x: 40, y: 567},
                            {x: 50, y: 280},
                            {x: 60, y: 507},
                            {x: 70, y: 680},
                            {x: 80, y: 287},
                            {x: 90, y: 460},
                            {x: 100, y: 509}
                        ]
                    }]
            });
            productsdemandgraph.render();

            
            function imprimegrapheMarket () {
                    var resultat="";
                    $.ajax({
                        type: 'get',
                        url: Routing.generate('dashboard_graphmarket'),
                    }).done(function (response) {
                        resultat=response;
                    }).fail(function () {
                        alert("error");
                    }).always(function () {
                        console.log('OK');
                    });
                    
                    return resultat;
                }

        }
);

