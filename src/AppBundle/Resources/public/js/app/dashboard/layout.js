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
 
            $.ajax({
                type: 'get',
                url: Routing.generate('dashboard_graphmarket'),
            }).done(function (response) {
                console.log(parseInt(response.countsupplies));
                var dataCAMarket = new Array();
                dataCAMarket.push({y: parseInt(response.caventes), indexLabel: "CA des Offres Résolus"});
                dataCAMarket.push({y: parseInt(response.casupplies), indexLabel: "CA des Souscriptions Résolus"});
                
                var dataAchatMarket = new Array();
                dataAchatMarket.push({y: parseInt(response.cademands), indexLabel: "Montant des Demandes Résolus"});
                dataAchatMarket.push({y: parseInt(response.caorders), indexLabel: "Montant des Commandes Résolus"});
                
                var datapointMarket = new Array();
                datapointMarket.push({y: parseInt(response.countventes), indexLabel: "Offres"});
                datapointMarket.push({y: parseInt(response.countdemands), indexLabel: "Demandes"});
                datapointMarket.push({y: parseInt(response.countsupplies), indexLabel: "Souscriptions"});
                datapointMarket.push({y: parseInt(response.countorders), indexLabel: "Commandes"});
                
                var dataAchatCAMarket = new Array();
                dataAchatCAMarket.push({y: parseInt(response.caventes)+parseInt(response.casupplies), indexLabel: "Chiffre d'affaire réalisé"});
                dataAchatCAMarket.push({y: parseInt(response.cademands)+parseInt(response.caorders), indexLabel: "Achat effectué"});
                
                //graph market
                var marketgraph = new CanvasJS.Chart("graphlemarche",
                        {
                            theme: "theme1",
                
                            title: {
                                text: "Le Marché"
                            },
                            data: [
                                {
                                    type: "pie",
                                    showInLegend: true,
                                    legendText: "{indexLabel}",
                                    dataPoints: datapointMarket
                                }
                            ]

                        });
                
                // graphe chiffre d'affaire
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
                                legendText: "{indexLabel}",
                                dataPoints: dataCAMarket
                            }
                        ]
                    });
               
                // graphe achats sur le marché
                var achatmarket = new CanvasJS.Chart("graphachatmarket",
                    {
                        theme: "theme2",
                        title: {
                            text: "Achats"
                        },
                        data: [
                            {
                                type: "pie",
                                showInLegend: true,
                                legendText: "{indexLabel}",
                                dataPoints: dataAchatMarket
                            }
                        ]
                    });
                // graphe achats sur le marché
                var achatchiffreaffairemarket = new CanvasJS.Chart("graphchiffreachat",
                    {
                        theme: "theme2",
                        title: {
                            text: "Chiffre d'affaire & Achat"
                        },
                        data: [
                            {
                                type: "pie",
                                showInLegend: true,
                                legendText: "{indexLabel}",
                                dataPoints: dataAchatCAMarket
                            }
                        ]
                    });
                    
            chiffreaffaire.render();
            marketgraph.render();
            achatchiffreaffairemarket.render();
            achatmarket.render();
            
            }).fail(function () {
                alert("error");
            }).always(function () {
                //console.log(response);
            });


            

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

        }
);

