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

        $produits = $em->getRepository('AppBundle:Product')->findAll();
         return $this->render('dashboard/index.html.twig',array(
                    'produits' => $produits,
        ));
        
    }    
    
    //les actions pour les offres
    /**
     * View of dashboard.
     *
     * @Route("/mesoffres", name="mesoffres")
     * @Method("GET")
     */
    public function mesoffresAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $ventes = $em->getRepository('AppBundle:Vente')
                ->findBy(array ('deleted' => false,'canceled' => false,'user' => $userId),array(
                    'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        
         return $this->render('dashboard/mesoffres.html.twig',array(
                    'ventes' => $ventes,  'brouillons' => $CountBrouillons,   'expires' => $CountExpires,
                    'publies' => $CountPulibes,  'resolus' => $CountResolus,
        ));
        
    }    
    
    /**
     * View of dashboard.
     *
     * @Route("/mesoffres/brouillons", name="mesoffresBrouillons")
     * @Method("GET")
     */
    public function mesoffresBrouillonsAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $ventes = $em->getRepository('AppBundle:Vente')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>true,'published'=>false,'user' => $userId),array(
                    'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        
         return $this->render('dashboard/mesoffresbrouillons.html.twig',array(
                    'ventes' => $ventes,  'brouillons' => $CountBrouillons,   'expires' => $CountExpires,
                    'publies' => $CountPulibes,  'resolus' => $CountResolus,
        ));
        
    }    
    
    /**
     * View of dashboard.
     *
     * @Route("/mesoffres/publications", name="mesoffresPublies")
     * @Method("GET")
     */
    public function mesoffresPubliesAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $ventes = $em->getRepository('AppBundle:Vente')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>true,'published'=>true,'user' => $userId),array(
                    'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        
         return $this->render('dashboard/mesoffrespublies.html.twig',array(
                    'ventes' => $ventes,  'brouillons' => $CountBrouillons,   'expires' => $CountExpires,
                    'publies' => $CountPulibes,  'resolus' => $CountResolus,
        ));
        
    }    
    
    /**
     * View of dashboard.
     *
     * @Route("/mesoffres/resolus", name="mesoffresResolus")
     * @Method("GET")
     */
    public function mesoffresResolusAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $ventes = $em->getRepository('AppBundle:Vente')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>false,'published'=>true,'user' => $userId),array(
                    'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        
         return $this->render('dashboard/mesoffresresolus.html.twig',array(
                    'ventes' => $ventes,  'brouillons' => $CountBrouillons,   'expires' => $CountExpires,
                    'publies' => $CountPulibes,  'resolus' => $CountResolus,
        ));
        
    }    
    
    /**
     * View of dashboard.
     *
     * @Route("/mesoffres/expires", name="mesoffresExpires")
     * @Method("GET")
     */
    public function mesoffresExpiresAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $ventes = $em->getRepository('AppBundle:Vente')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>false,'published'=>true,'user' => $userId),array(
                    'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        
         return $this->render('dashboard/mesoffresexpires.html.twig',array(
                    'ventes' => $ventes,  'brouillons' => $CountBrouillons,   'expires' => $CountExpires,
                    'publies' => $CountPulibes,  'resolus' => $CountResolus,
        ));
        
         
    }    
    
    //les actions de demandes
    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes", name="mesdemandes")
     * @Method("GET")
     */
    public function mesdemandesAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $ventes = $em->getRepository('AppBundle:Demand')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>false,'published'=>true,'user' => $userId),array(
                    'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        
         return $this->render('dashboard/mesdemandes.html.twig',array(
                    'demands' => $ventes,  'brouillons' => $CountBrouillons,   'expires' => $CountExpires,
                    'publies' => $CountPulibes,  'resolus' => $CountResolus,
        ));
        
         
    }    
    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes/brouillons", name="mesdemandesBrouillons")
     * @Method("GET")
     */
    public function mesdemandesBrouillonsAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $ventes = $em->getRepository('AppBundle:Demand')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>true,'published'=>false,'user' => $userId),array(
                    'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        
         return $this->render('dashboard/mesdemandesbrouillons.html.twig',array(
                    'demands' => $ventes,  'brouillons' => $CountBrouillons,   'expires' => $CountExpires,
                    'publies' => $CountPulibes,  'resolus' => $CountResolus,
        ));
        
    }    
    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes/publies", name="mesdemandesPublies")
     * @Method("GET")
     */
    public function mesdemandesPubliesAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $ventes = $em->getRepository('AppBundle:Demand')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>true,'published'=>false,'user' => $userId),array(
                    'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        
         return $this->render('dashboard/mesdemandespublies.html.twig',array(
                    'demands' => $ventes,  'brouillons' => $CountBrouillons,   'expires' => $CountExpires,
                    'publies' => $CountPulibes,  'resolus' => $CountResolus,
        ));
        
    }    
    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes/resolus", name="mesdemandesResolus")
     * @Method("GET")
     */
    public function mesdemandesResolusAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $ventes = $em->getRepository('AppBundle:Demand')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>true,'published'=>false,'user' => $userId),array(
                    'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        
         return $this->render('dashboard/mesdemandesresolus.html.twig',array(
                    'demands' => $ventes,  'brouillons' => $CountBrouillons,   'expires' => $CountExpires,
                    'publies' => $CountPulibes,  'resolus' => $CountResolus,
        ));
        
    }    
    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes/expires", name="mesdemandesExpires")
     * @Method("GET")
     */
    public function mesdemandesExpiresAction(Request $request)
    {        
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        
        $ventes = $em->getRepository('AppBundle:Demand')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>true,'published'=>false,'user' => $userId),array(
                    'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        
         return $this->render('dashboard/mesdemandesexpires.html.twig',array(
                    'demands' => $ventes,  'brouillons' => $CountBrouillons,   'expires' => $CountExpires,
                    'publies' => $CountPulibes,  'resolus' => $CountResolus,
        ));
        
    }    
    
}
