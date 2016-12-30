<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
//use AppBundle\Form\ContactType;
//use AppBundle\Form\ContactHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

/**
 * Graph controller.
 *
 * @Route("/dashboard")
 */
class GraphController extends Controller {

    /**
     * @Route("/graph/market", name="dashboard_graphmarket")
     * @Template()
     * @Cache(smaxage="600", public="true")
     */
    public function dashboard_graphmarketAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        //comptage des nombres sur le marché
        $countventes = $em->getRepository('AppBundle:Vente')
                ->getDashboardCountMarket($userId);
        $countdemands = $em->getRepository('AppBundle:Demand')
                ->getDashboardCountMarket($userId);
        $countsupplies = $em->getRepository('AppBundle:Supply')
                ->getDashboardCountMarket($userId);
        $countorders = $em->getRepository('AppBundle:Order')
                ->getDashboardCountMarket($userId);
        //chiffres d'affaire réalisé
        $CAventes = 0;
        $CA = $em->getRepository('AppBundle:Vente')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => false, 'published' => false, 'user' => $userId));
        foreach ($CA as $i) {
            $CAventes = $CAventes + ($i->getQuantite() * $i->getPrixUnit());
        }
        $CAsupplies = 0;
        $CA = $em->getRepository('AppBundle:Supply')
                ->findBy(array('deleted' => false, 'accepted' => true, 'delivered' => true, 'user' => $userId));
        foreach ($CA as $i) {
            $CAsupplies = $CAsupplies + ($i->getQuantite() * $i->getDemand()->getPrixUnit());
        }
        //achats sur le marché
        $CAdemands = 0;
        $CA = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => false, 'published' => false, 'user' => $userId));
        foreach ($CA as $i) {
            $CAdemands = $CAdemands + ($i->getQuantite() * $i->getPrixUnit());
        }
        $CAorders = 0;
        $CA = $em->getRepository('AppBundle:Order')
                ->findBy(array('deleted' => false, 'accepted' => true, 'delivered' => true, 'user' => $userId));
        foreach ($CA as $i) {
            $CAorders = $CAorders + ($i->getQuantite() * $i->getVente()->getPrixUnit());
        }
        //comptages des nombres du rubrique offre
        $CountBrouillonsV = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibesV = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolusV = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpiresV = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        $CountCorbeilleV = $em->getRepository('AppBundle:Vente')->getDashboardCountCorbeille($userId);
        //comptages des nombres du rubrique demande
        $CountBrouillonsD = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibesD = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolusD = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpiresD = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        $CountCorbeilleD = $em->getRepository('AppBundle:Demand')->getDashboardCountCorbeille($userId);
        
        $dataPoints = array(
            //premier rubrique
            "countventes" => $countventes, "countdemands" => $countdemands, "countorders" => $countsupplies, "countsupplies" => $countorders,
            //deuxième rubrique
            "caventes" => $CAventes, "casupplies" => $CAsupplies,"cademands" => $CAdemands, "caorders" => $CAorders,
            //offres
             "CountBrouillonsV" => $CountBrouillonsV, "CountPulibesV" => $CountPulibesV,"CountResolusV" => $CountResolusV, "CountExpiresV" => $CountExpiresV, "CountCorbeilleV" => $CountCorbeilleV,
            //demandes
             "CountBrouillonsD" => $CountBrouillonsD, "CountPulibesD" => $CountPulibesD,"CountResolusD" => $CountResolusD, "CountExpiresD" => $CountExpiresD, "CountCorbeilleD" => $CountCorbeilleD
           );

        return new JsonResponse($dataPoints);
    }

}
