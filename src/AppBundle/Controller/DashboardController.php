<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use AppBundle\Entity\Vente;
//use Symfony\Component\HttpFoundation\JsonResponse;
//use AppBundle\Entity\Commande;

/**
 * dashboard controller.
 *
 * @Route("/dashboard")
 */
class DashboardController extends Controller
{
    /**
     * View of dashboard.
     *
     * @Route("/", name="index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {        
        $em = $this->getDoctrine()->getManager();

        $ventes = $em->getRepository('AppBundle:Vente')->findBy(array('user' => $this->getUser()->getId()),array(
                    'createAt' => 'ASC'
        ));
        $demands = $em->getRepository('AppBundle:Demand')->findBy(array('user' => $this->getUser()->getId()),array(
                    'createAt' => 'ASC'
        ));
        $produits = $em->getRepository('AppBundle:Product')->findAll();
         return $this->render('dashboard/index.html.twig',array(
                    'ventes' => $ventes,
                    'demands' => $demands,
                    'produits' => $produits,
        ));
        
    }    
    
}
