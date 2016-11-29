<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Vente;
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
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
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
     * @Route("/mesoffres/brouillon/new", name="dashboard_newbrouillon")
     * @Method({"GET", "POST"})
     */
    public function dashboard_newbrouillonAction(Request $request) {
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
     * Restaurer les offres de la corbeille.
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
     * Approuver les commandes.
     *
     * @Route("/mesoffres/offre/approuver", name="dashboard_approuvercmde")
     * @Method({"GET", "POST"})
     */
    public function dashboard_approuvercmdeAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $cmde = $em->getRepository('AppBundle:Order')->find($request->get('id'));
            $cmde->setApprouvedAt(new \DateTime());
            $cmde->setApprouved(true);
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
     * @Route("/mesdemandes", name="dashboard_mesdemandes")
     * @Method("GET")
     */
    public function mesdemandesAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $ventes = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => false, 'published' => true, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);

        return $this->render('dashboard/mesdemandes.html.twig', array(
                    'demands' => $ventes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus,
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

        $ventes = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'published' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);

        return $this->render('dashboard/mesdemandesbrouillons.html.twig', array(
                    'demands' => $ventes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus,
        ));
    }

    /**
     * View of dashboard.
     *
     * @Route("/mesdemandes/publies", name="dashboard_mesdemandesPublies")
     * @Method("GET")
     */
    public function mesdemandesPubliesAction(Request $request) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $ventes = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'published' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);

        return $this->render('dashboard/mesdemandespublies.html.twig', array(
                    'demands' => $ventes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus,
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

        $ventes = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'published' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);

        return $this->render('dashboard/mesdemandesresolus.html.twig', array(
                    'demands' => $ventes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus,
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

        $ventes = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'published' => false, 'user' => $userId), array(
            'createAt' => 'ASC'
        ));
        $CountBrouillons = $em->getRepository('AppBundle:Demand')->getDashboardCountBrouillons($userId);
        $CountPulibes = $em->getRepository('AppBundle:Demand')->getDashboardCountPulibes($userId);
        $CountResolus = $em->getRepository('AppBundle:Demand')->getDashboardCountResolus($userId);
        $CountExpires = $em->getRepository('AppBundle:Demand')->getDashboardCountExpires($userId);

        return $this->render('dashboard/mesdemandesexpires.html.twig', array(
                    'demands' => $ventes, 'brouillons' => $CountBrouillons, 'expires' => $CountExpires,
                    'publies' => $CountPulibes, 'resolus' => $CountResolus,
        ));
    }

    //les demandes et offres en cours pour un produit
    /**
     * View of dashboard.
     *
     * @Route("/dashboard/demandesEncoursproduit/{id}", name="dashborad_demandesEncoursproduit")
     * @Method("GET")
     */
    public function demandesEncoursproduitAction(Request $request, $id) {
        $product = $this->getDoctrine()->getManager()->getRepository('AppBundle:Product')->find($id);
        $em = $this->getDoctrine()->getManager();

        $demands = $em->getRepository('AppBundle:Demand')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'published' => true, 'product' => $product), array(
            'createAt' => 'ASC'
        ));
        $count = 0;
        foreach ($demands as $i) {
            $count++;
        }
        return $this->render('dashboard/demandesEncoursproduit.html.twig', array(
                    'demands' => $demands, 'product' => $product, 'id' => $id, 'count' => $count
        ));
    }

    /**
     * View of dashboard.
     *
     * @Route("/dashboard/offreEncoursproduit/{id}", name="dashborad_offreEncoursproduit")
     * @Method("GET")
     */
    public function offreEncoursproduitAction(Request $request, $id) {
        $product = $this->getDoctrine()->getManager()->getRepository('AppBundle:Product')->find($id);
        $em = $this->getDoctrine()->getManager();

        $demands = $em->getRepository('AppBundle:Vente')
                ->findBy(array('deleted' => false, 'canceled' => false, 'available' => true, 'published' => true, 'product' => $id), array(
            'createAt' => 'ASC'
        ));
        $count = 0;
        foreach ($demands as $i) {
            $count++;
        }

        return $this->render('dashboard/offreEncoursproduit.html.twig', array(
                    'demands' => $demands, 'product' => $product, 'id' => $id, 'count' => $count
        ));
    }

    //les commandes et souscriptions des offres et demandes
    /**
     * View of dashboard.
     *
     * @Route("/dashboard/commandesOffre/{id}", name="dashborad_commandesOffre")
     * @Method("GET")
     */
    public function commandesOffreAction(Request $request, $id) {
        $vente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Vente')->find($id);
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('AppBundle:Order')
                ->findBy(array('deleted' => false, 'canceled' => false, 'vente' => $id), array(
            'createAt' => 'ASC'
        ));
        $count = 0;
        foreach ($commandes as $i) {
            $count++;
        }

        return $this->render('dashboard/commandesOffre.html.twig', array(
                    'commandes' => $commandes, 'vente' => $vente, 'id' => $id, 'count' => $count
        ));
    }

    /**
     * View of dashboard.
     *
     * @Route("/dashboard/souscriptionsDemande/{id}", name="dashborad_souscriptionsDemande")
     * @Method("GET")
     */
    public function souscriptionsDemandeAction(Request $request, $id) {
        $vente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Demand')->find($id);
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('AppBundle:Supply')
                ->findBy(array('deleted' => false, 'canceled' => false, 'demand' => $id), array(
            'createAt' => 'ASC'
        ));
        $count = 0;
        foreach ($commandes as $i) {
            $count++;
        }

        return $this->render('dashboard/souscriptionsDemande.html.twig', array(
                    'commandes' => $commandes, 'vente' => $vente, 'id' => $id, 'count' => $count
        ));
    }

}
