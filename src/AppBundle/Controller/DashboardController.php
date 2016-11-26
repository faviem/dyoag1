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
class DashboardController extends Controller {

    /**
     * View of dashboard.
     *
     * @Route("/", name="dashboard_index")
     * @Method("GET")
     */
    public function indexAction(Request $request) {
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
     * @Route("/mesoffres", name="dashboard_mesoffres")
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
     * @Route("/mesoffres/brouillons", name="dashboard_mesoffresBrouillons")
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
     * @Route("/mesoffres/publications", name="dashboard_mesoffresPublies")
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
     * @Route("/mesoffres/resolus", name="dashboard_mesoffresResolus")
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
     * @Route("/mesoffres/expires", name="dashboard_mesoffresExpires")
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
     * @Route("/mesdemandes", name="dashboard_mesdemandes")
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
     * @Route("/mesdemandes/brouillons", name="dashboard_mesdemandesBrouillons")
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
     * @Route("/mesdemandes/publies", name="dashboard_mesdemandesPublies")
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
     * @Route("/mesdemandes/resolus", name="dashboard_mesdemandesResolus")
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
     * @Route("/mesdemandes/expires", name="dashboard_mesdemandesExpires")
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

    //les demandes et offres en cours pour un produit
    /**
     * View of dashboard.
     *
     * @Route("/dashboard/demandesEncoursproduit/{id}", name="dashborad_demandesEncoursproduit")
     * @Method("GET")
     */
    public function demandesEncoursproduitAction(Request $request, $id)
    {        
        $product = $this->getDoctrine()->getManager()->getRepository('AppBundle:Product')->find($id);
        $em = $this->getDoctrine()->getManager();
        
        $demands = $em->getRepository('AppBundle:Demand')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>true,'published'=>true,'product' => $product),array(
                    'createAt' => 'ASC'
        ));
        $count = 0;
        foreach ($demands as $i){ $count++; }
        return $this->render('dashboard/demandesEncoursproduit.html.twig',array(
                    'demands' => $demands,  'product' => $product,  'id' => $id,  'count' => $count
        
        ));
    }
    
    /**
     * View of dashboard.
     *
     * @Route("/dashboard/offreEncoursproduit/{id}", name="dashborad_offreEncoursproduit")
     * @Method("GET")
     */
    public function offreEncoursproduitAction(Request $request, $id)
    {  
        $product = $this->getDoctrine()->getManager()->getRepository('AppBundle:Product')->find($id);
        $em = $this->getDoctrine()->getManager();
        
        $demands = $em->getRepository('AppBundle:Vente')
                ->findBy(array ('deleted' => false,'canceled' => false,'available'=>true,'published'=>true,'product' => $id),array(
                    'createAt' => 'ASC'
        ));
        $count = 0;
        foreach ($demands as $i){ $count++; }
       
        return $this->render('dashboard/offreEncoursproduit.html.twig',array(
                    'demands' => $demands,  'product' => $product,  'id' => $id,  'count' => $count
        
        ));
    }
    
    //les commandes et souscriptions des offres et demandes
    /**
     * View of dashboard.
     *
     * @Route("/dashboard/commandesOffre/{id}", name="dashborad_commandesOffre")
     * @Method("GET")
     */
    public function commandesOffreAction(Request $request, $id)
    {  
        $vente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Vente')->find($id);
        $em = $this->getDoctrine()->getManager();
        
        $commandes = $em->getRepository('AppBundle:Order')
                ->findBy(array ('deleted' => false,'canceled' => false,'vente' => $id),array(
                    'createAt' => 'ASC'
        ));
        $count = 0;
        foreach ($commandes as $i){ $count++; }
       
        return $this->render('dashboard/commandesOffre.html.twig',array(
                    'commandes' => $commandes,  'vente' => $vente,  'id' => $id,  'count' => $count
        
        ));
    }
    
    /**
     * View of dashboard.
     *
     * @Route("/dashboard/souscriptionsDemande/{id}", name="dashborad_souscriptionsDemande")
     * @Method("GET")
     */
    public function souscriptionsDemandeAction(Request $request, $id)
    {  
        $vente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Demand')->find($id);
        $em = $this->getDoctrine()->getManager();
        
        $commandes = $em->getRepository('AppBundle:Supply')
                ->findBy(array ('deleted' => false,'canceled' => false,'demand' => $id),array(
                    'createAt' => 'ASC'
        ));
        $count = 0;
        foreach ($commandes as $i){ $count++; }
       
        return $this->render('dashboard/souscriptionsDemande.html.twig',array(
                    'commandes' => $commandes,  'vente' => $vente,  'id' => $id,  'count' => $count
        
        ));
    }
    
}
