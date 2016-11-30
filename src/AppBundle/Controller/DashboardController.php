<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Vente;
use AppBundle\Entity\Demand;
use AppBundle\Entity\Order;
use AppBundle\Entity\Product;

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
    public function dashboard_indexAction(Request $request) {
        return $this->redirectToRoute('dashboard_mesoffresPublies');
    }
    
    //les actions pour les offres
    /**
     * View of dashboard.
     *
     * @Route("/mesoffres/publications", name="dashboard_mesoffresPublies")
     * @Method("GET")
     */
    public function mesoffresPubliesAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $ventes = $em->getRepository('AppBundle:Vente')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'published' => true, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        $CountCorbeille = $em->getRepository('AppBundle:Vente')->getDashboardCountCorbeille($userId);

        return $this->render('dashboard/offre/dashboard_mesoffresPublies.html.twig', array(
                    'ventes' => $ventes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus, 'corbeille' => $CountCorbeille
        ));
    }

    /**
     * View of dashboard.
     *
     * @Route("/mesoffres/brouillons", name="dashboard_mesoffresBrouillons")
     * @Method("GET")
     */
    public function mesoffresBrouillonsAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $ventes = $em->getRepository('AppBundle:Vente')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'published' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        $CountCorbeille = $em->getRepository('AppBundle:Vente')->getDashboardCountCorbeille($userId);

        return $this->render('dashboard/offre/dashboard_mesoffresBrouillons.html.twig', array(
                    'ventes' => $ventes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus, 'corbeille' => $CountCorbeille
        ));
    }

    /**
     * View of dashboard.
     *
     * @Route("/mesoffres/expires", name="dashboard_mesoffresExpires")
     * @Method("GET")
     */
    public function mesoffresExpiresAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $ventes = $em->getRepository('AppBundle:Vente')
                ->getDashboardExpires($userId);
        $CountBrouillons = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        $CountCorbeille = $em->getRepository('AppBundle:Vente')->getDashboardCountCorbeille($userId);

        return $this->render('dashboard/offre/dashboard_mesoffresExpires.html.twig', array(
                    'ventes' => $ventes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus, 'corbeille' => $CountCorbeille
        ));
    }

    /**
     * View of dashboard.
     *
     * @Route("/mesoffres/resolus", name="dashboard_mesoffresResolus")
     * @Method("GET")
     */
    public function mesoffresResolusAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $ventes = $em->getRepository('AppBundle:Vente')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => false, 'published' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        $CountCorbeille = $em->getRepository('AppBundle:Vente')->getDashboardCountCorbeille($userId);

        return $this->render('dashboard/offre/dashboard_mesoffresResolus.html.twig', array(
                    'ventes' => $ventes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus, 'corbeille' => $CountCorbeille
        ));
    }

    /**
     * View of dashboard.
     *
     * @Route("/mesoffres/corbeille", name="dashboard_mesoffresCorbeille")
     * @Method("GET")
     */
    public function mesoffresCorbeilleAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $ventes = $em->getRepository('AppBundle:Vente')
                ->findBy(array('deleted' => false, 'canceled' => true, 'available' => true, 'published' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Vente')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Vente')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Vente')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Vente')->getDashboardCountExpires($userId);
        $CountCorbeille = $em->getRepository('AppBundle:Vente')->getDashboardCountCorbeille($userId);

        return $this->render('dashboard/offre/dashboard_mesoffresCorbeille.html.twig', array(
                    'ventes' => $ventes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus, 'corbeille' => $CountCorbeille
        ));
    }

    /**
     * Créer des offres au brouillon.
     *
     * @Route("/mesoffres/brouillon/new", name="dashboard_newoffrebrouillon")
     * @Method({"GET", "POST"})
     */
    public function dashboard_newoffrebrouillonAction(Request $request) {
        $vente = new Vente();
        $form = $this->createForm('AppBundle\Form\VenteType', $vente);
        $form->handleRequest($request);
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            //check if the submit is draft or publish
            if (null !== $request->request->get('publish')) {
                $vente->setPublished(false);
            }
            $em = $this->getDoctrine()->getManager();
            if (null === $vente->getImageName()) {
                $vente->setImageName($vente->getProduct()->getImageName());
            }
            $vente->setUser($user);
            $em->persist($vente);
            $em->flush();
            $this->addFlash(
                    'success', "Votre offre de produit a été bien enregistré au brouillon!"
            );
            return $this->redirectToRoute('dashboard_mesoffresBrouillons');
        }

        return $this->render('dashboard/offre/dashboard_newbrouillon.html.twig', array(
                    'vente' => $vente,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Annuler des offres qui ne sont pas encore commandés.
     *
     * @Route("/mesoffres/offre/annuler", name="dashboard_annuleroffre")
     * @Method({"GET", "POST"})
     */
    public function dashboard_annuleroffreAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $vente = $em->getRepository('AppBundle:Vente')->find($request->get('id'));
            $vente->setCanceledAt(new \DateTime());
            $vente->setPublished(false);
            $vente->setCanceled(true);
            $vente->setCanceledReason($request->get('canceledReason'));
            $em->flush();
            return $this->redirectToRoute('dashboard_mesoffresCorbeille');
        }
    }

    /**
     * Restaurer les offres de la corbeille.
     *
     * @Route("/mesoffres/offre/restaurer", name="dashboard_restaureroffre")
     * @Method({"GET", "POST"})
     */
    public function dashboard_restaureroffreAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $vente = $em->getRepository('AppBundle:Vente')->find($request->get('id'));
            $vente->setCanceledAt(null);
            $vente->setPublished(false);
            $vente->setCanceled(false);
            $vente->setCanceledReason(null);
            $em->flush();
            return $this->redirectToRoute('dashboard_mesoffresBrouillons');
        }
    }

    /**
     * Publier les offres annulés de la corbeille.
     *
     * @Route("/mesoffres/offre/publier", name="dashboard_publieroffre")
     * @Method({"GET", "POST"})
     */
    public function dashboard_publieroffreAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $vente = $em->getRepository('AppBundle:Vente')->find($request->get('id'));
            $vente->setCanceledAt(null);
            $vente->setPublished(true);
            $vente->setCanceled(false);
            $vente->setCanceledReason(null);
            $em->flush();
            return $this->redirectToRoute('dashboard_mesoffresPublies');
        }
    }

    /**
     * Relancer la publication des offres expirés.
     *
     * @Route("/mesoffres/offre/relancer", name="dashboard_relanceroffre")
     * @Method({"GET", "POST"})
     */
    public function dashboard_relanceroffreAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $vente = $em->getRepository('AppBundle:Vente')->find($request->get('id'));
            $vente->setDateLimitUpdate(new \DateTime());
            $vente->setDateLimit(new \DateTime());
            $vente->getDateLimitUpdate()->add(new \DateInterval('P30D'));
            $vente->getDateLimit()->add(new \DateInterval('P30D'));
            $vente->setPublished(true);
            $em->flush();
            return $this->redirectToRoute('dashboard_mesoffresPublies');
        }
    }

    /**
     * Consulter les commandes d'un offre.
     *
     * @Route("/mesoffres/offre/commandes", name="dashboard_commandesoffre")
     * @Method({"GET"})
     */
    public function dashboard_commandesoffreAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $vente = $em->getRepository('AppBundle:Vente')->find($request->get('id'));

        return $this->render('dashboard/offre/dashboard_commandesoffre.html.twig', array(
                    'vente' => $vente,
        ));
    }

    /**
     * Accepter les commandes.
     *
     * @Route("/mesoffres/offre/accepter", name="dashboard_approuvercmde")
     * @Method({"GET", "POST"})
     */
    public function dashboard_approuvercmdeAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $cmde = $em->getRepository('AppBundle:Order')->find($request->get('id'));
            $cmde->setAcceptedAt(new \DateTime());
            $cmde->setAccepted(true);
            $em->flush();
            return $this->redirectToRoute('dashboard_commandesoffre',array(
                    'id' => $cmde->getVente()->getId(),
            ));
        }
    }
    
    //les actions de demandes   
    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes/publies", name="dashboard_mesdemandesPublies")
     * @Method("GET")
     */
    public function mesdemandesPubliesAction(Request $request) {
         $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'published' => true, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        $CountCorbeille = $em->getRepository('AppBundle:Demand')->getDashboardCountCorbeille($userId);

        return $this->render('dashboard/demand/dashboard_mesdemandesPublies.html.twig', array(
                    'demandes' => $demandes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus, 'corbeille' => $CountCorbeille
        ));
    }
    
    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes/brouillons", name="dashboard_mesdemandesBrouillons")
     * @Method("GET")
     */
    public function mesdemandesBrouillonsAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'published' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        $CountCorbeille = $em->getRepository('AppBundle:Demand')->getDashboardCountCorbeille($userId);

        return $this->render('dashboard/demand/dashboard_mesdemandesBrouillons.html.twig', array(
                    'demandes' => $demandes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus,'corbeille' => $CountCorbeille
        ));
    }
    
    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes/expires", name="dashboard_mesdemandesExpires")
     * @Method("GET")
     */
    public function mesdemandesExpiresAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('AppBundle:Demand')
                ->getDashboardExpires($userId);
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        $CountCorbeille = $em->getRepository('AppBundle:Demand')->getDashboardCountCorbeille($userId);

        return $this->render('dashboard/demand/dashboard_mesdemandesExpires.html.twig', array(
                    'demandes' => $demandes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus,'corbeille' => $CountCorbeille
        ));
    }

    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes/resolus", name="dashboard_mesdemandesResolus")
     * @Method("GET")
     */
    public function mesdemandesResolusAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        $CountCorbeille = $em->getRepository('AppBundle:Demand')->getDashboardCountCorbeille($userId);

        return $this->render('dashboard/demand/dashboard_mesdemandesResolus.html.twig', array(
                    'demandes' => $demandes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus,'corbeille' => $CountCorbeille
        ));
    }

    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes/corbeille", name="dashboard_mesdemandesCorbeille")
     * @Method("GET")
     */
    public function mesdemandesCorbeilleAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => true, 'available' => true, 'published' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);
        $CountCorbeille = $em->getRepository('AppBundle:Demand')->getDashboardCountCorbeille($userId);

        return $this->render('dashboard/demand/dashboard_mesdemandesCorbeille.html.twig', array(
                    'demandes' => $demandes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus, 'corbeille' => $CountCorbeille
        ));
    }
    
    /**
     * Créer des demandes au brouillon.
     *
     * @Route("/mesdemandes/brouillon/new", name="dashboard_newdemandebrouillon")
     * @Method({"GET", "POST"})
     */
    public function dashboard_newdemandebrouillonAction(Request $request) {
        $demand = new Demand();
        $form = $this->createForm('AppBundle\Form\DemandType', $demand);
        $form->handleRequest($request);
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if (null === $demand->getImageName()) {
                $demand->setImageName($demand->getProduct()->getImageName());
            }
            $demand->setPublished(false);
            $demand->setUser($user);
            $em->persist($demand);
            $em->flush();
            $this->addFlash(
                    'success', "Votre demande d'approvisionnement a été bien enregistrée!"
            );
            return $this->redirectToRoute('dashboard_mesdemandesBrouillons');
        }

        return $this->render('dashboard/demand/dashboard_newbrouillon.html.twig', array(
                    'demand' => $demand,
                    'form' => $form->createView(),
        ));
    }
    
    /**
     * Annuler les demandes qui ne sont pas encore souscrites.
     *
     * @Route("/mesdemandes/demande/annuler", name="dashboard_annulerdemande")
     * @Method({"GET", "POST"})
     */
    public function dashboard_annulerdemandeAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $demand = $em->getRepository('AppBundle:Demand')->find($request->get('id'));
            $demand->setCanceledAt(new \DateTime());
            $demand->setPublished(false);
            $demand->setCanceled(true);
            $demand->setCanceledReason($request->get('canceledReason'));
            $em->flush();
            return $this->redirectToRoute('dashboard_mesdemandesCorbeille');
        }
    }

    /**
     * Restaurer les demandes annulées de la corbeille.
     *
     * @Route("/mesdemandes/demande/restaurer", name="dashboard_restaurerdemande")
     * @Method({"GET", "POST"})
     */
    public function dashboard_restaurerdemandeAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $demand = $em->getRepository('AppBundle:Demand')->find($request->get('id'));
            $demand->setCanceledAt(null);
            $demand->setPublished(false);
            $demand->setCanceled(false);
            $demand->setCanceledReason(null);
            $em->flush();
            return $this->redirectToRoute('dashboard_mesdemandesBrouillons');
        }
    }

    /**
     * Publier les demandes créées au brouillon.
     *
     * @Route("/mesdemandes/demande/publier", name="dashboard_publierdemande")
     * @Method({"GET", "POST"})
     */
    public function dashboard_publierdemandeAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $demand = $em->getRepository('AppBundle:Demand')->find($request->get('id'));
            $demand->setCanceledAt(null);
            $demand->setPublished(true);
            $demand->setCanceled(false);
            $demand->setCanceledReason(null);
            $em->flush();
            return $this->redirectToRoute('dashboard_mesdemandesPublies');
        }
    }

    /**
     * Relancer la publication des demandes expirées.
     *
     * @Route("/mesdemandes/demande/relancer", name="dashboard_relancerdemande")
     * @Method({"GET", "POST"})
     */
    public function dashboard_relancerdemandeAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $demand = $em->getRepository('AppBundle:Demand')->find($request->get('id'));
            $demand->setDateLimitUpdate(new \DateTime());
            $demand->setDateLimit(new \DateTime());
            $demand->getDateLimitUpdate()->add(new \DateInterval('P30D'));
            $demand->getDateLimit()->add(new \DateInterval('P30D'));
            $demand->setPublished(true);
            $em->flush();
            return $this->redirectToRoute('dashboard_mesdemandesPublies');
        }
    }
    
    /**
     * Consulter les souscriptions d'une demande.
     *
     * @Route("/mesdemandes/demande/souscriptions", name="dashboard_souscriptionsdemande")
     * @Method({"GET"})
     */
    public function dashboard_souscriptionsdemandeAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $demand = $em->getRepository('AppBundle:Demand')->find($request->get('id'));

        return $this->render('dashboard/demand/dashboard_souscriptionsdemande.html.twig', array(
                    'demande' => $demand,
        ));
    }

    /**
     * Accepter les souscriptions.
     *
     * @Route("/mesdemandes/demande/accepter", name="dashboard_approuversous")
     * @Method({"GET", "POST"})
     */
    public function dashboard_approuversousAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $sous = $em->getRepository('AppBundle:Supply')->find($request->get('id'));
            $sous->setAcceptedAt(new \DateTime());
            $sous->setAccepted(true);
            $em->flush();
            return $this->redirectToRoute('dashboard_souscriptionsdemande',array(
                    'id' => $sous->getDemand()->getId(),
            ));
        }
    }
    
    //les operations sur mes souscriptions effectuées
    /**
     * Consulter mes souscriptions (proposition d'offres) aux demandes des autres clients.
     *
     * @Route("/souscriptions/views", name="dashboard_souscriptionsviews")
     * @Method({"GET"})
     */
    public function dashboard_souscriptionsviewsAction(Request $request) {

        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $supplies = $em->getRepository('AppBundle:Supply')
                ->findBy(array('deleted' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));

        return $this->render('dashboard/souscription/dashboard_souscriptionsviews.html.twig', array(
                    'supplies' => $supplies,
        ));
    }
    
    /**
     * Annuler la souscription pendant qu'elle n'est pas encore acceptées par l'acheteur.
     *
     * @Route("/souscription/annuler", name="dashboard_annulersouscription")
     * @Method({"GET", "POST"})
     */
    public function dashboard_annulersouscriptionAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $supply = $em->getRepository('AppBundle:Supply')->find($request->get('id'));
            $supply->setCanceledAt(new \DateTime());
            $supply->setCanceled(true);
            $supply->setCanceledReason($request->get('canceledReason'));
            $em->flush();
            return $this->redirectToRoute('dashboard_souscriptionsviews');
        }
    }
    
    /**
     * Restauration de la souscription annulée sur le marché.
     *
     * @Route("/souscription/restaurer", name="dashboard_restaurersouscription")
     * @Method({"GET", "POST"})
     */
    public function dashboard_restaurersouscriptionAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $supply = $em->getRepository('AppBundle:Supply')->find($request->get('id'));
            $supply->setCanceledAt(null);
            $supply->setCanceled(false);
            $supply->setCanceledReason(null);
            $em->flush();
            return $this->redirectToRoute('dashboard_souscriptionsviews');
        }
    }
    
    /**
     * Enregistrer la conclusion de la souscription après.
     *
     * @Route("/souscription/conclusion", name="dashboard_concluresouscription")
     * @Method({"GET", "POST"})
     */
    public function dashboard_concluresouscriptionAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $supply = $em->getRepository('AppBundle:Supply')->find($request->get('id'));
            $supply->setDeliveredAt(new \DateTime());
            $supply->setDelivered(true);
            $supply->setRating($request->get('rating'));
            $supply->setDeliverConclusion($request->get('deliverConclusion'));
            $em->flush();
            return $this->redirectToRoute('dashboard_souscriptionsviews');
        }
    }
    
    //les operations sur mes commandes émises
    /**
     * Consulter mes commandes (proposition de demande) aux offres après des autres vendeurs.
     *
     * @Route("/commandes/views", name="dashboard_commandesviews")
     * @Method({"GET"})
     */
    public function dashboard_commandesviewsAction(Request $request) {

        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $orders = $em->getRepository('AppBundle:Order')
                ->findBy(array('deleted' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));

        return $this->render('dashboard/commande/dashboard_commandesviews.html.twig', array(
                    'orders' => $orders,
        ));
    }
    
    /**
     * Annuler la commande pendant qu'elle n'est pas encore acceptées par le vendeur.
     *
     * @Route("/commande/annuler", name="dashboard_annulercommande")
     * @Method({"GET", "POST"})
     */
    public function dashboard_annulercommandeAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $order = $em->getRepository('AppBundle:Order')->find($request->get('id'));
            $order->setCanceledAt(new \DateTime());
            $order->setCanceled(true);
            $order->setCanceledReason($request->get('canceledReason'));
            $em->flush();
            return $this->redirectToRoute('dashboard_commandesviews');
        }
    }
      
    /**
     * Restauration de la commande annulée sur le marché.
     *
     * @Route("/commande/restaurer", name="dashboard_restaurercommande")
     * @Method({"GET", "POST"})
     */
    public function dashboard_restaurercommandeAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $order = $em->getRepository('AppBundle:Order')->find($request->get('id'));
            $order->setCanceledAt(null);
            $order->setCanceled(false);
            $order->setCanceledReason(null);
            $em->flush();
            return $this->redirectToRoute('dashboard_commandesviews');
        }
    }
    
    /**
     * Enregistrer la conclusion de la commande après.
     *
     * @Route("/commande/conclusion", name="dashboard_conclurecommande")
     * @Method({"GET", "POST"})
     */
    public function dashboard_conclurecommandeAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $order = $em->getRepository('AppBundle:Order')->find($request->get('id'));
            $order->setDeliveredAt(new \DateTime());
            $order->setDelivered(true);
            $order->setRating($request->get('rating'));
            $order->setDeliverConclusion($request->get('deliverConclusion'));
            $em->flush();
            return $this->redirectToRoute('dashboard_commandesviews');
        }
    }
    
}
