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
class GraphController extends Controller
{
    /**
     * @Route("/graph/market", name="dashboard_graphmarket")
     * @Template()
     * @Cache(smaxage="600", public="true")
     */
    public function dashboard_graphmarketAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $ventes = $em->getRepository('AppBundle:Vente')
                ->getDashboardCountMarket($userId);
        $demands = $em->getRepository('AppBundle:Demand')
                ->getDashboardCountMarket($userId);
        $supplies = $em->getRepository('AppBundle:Supply')
                ->getDashboardCountMarket($userId);
        $orders = $em->getRepository('AppBundle:Order')
                ->getDashboardCountMarket($userId);
        
      
          return $this->render('dashboard/graph/dashboard_graphmarket.html.twig', array(
            'ventes' => $ventes, 'demands' => $demands, 'supplies' => $supplies, 'orders' => $orders
        ));
    }
    
}
