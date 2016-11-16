<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Supply;
use AppBundle\Form\SupplyType;

/**
 * Supply controller.
 *
 * @Route("/supply")
 */
class SupplyController extends Controller {

    /**
     * Lists all Supply entities.
     *
     * @Route("/", name="supply_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $supplys = $em->getRepository('AppBundle:Supply')->findAll();

        return $this->render('supply/index.html.twig', array(
                    'supplys' => $supplys,
        ));
    }

    /**
     * Creates a new Supply entity.
     *
     * @Route("/new", name="supply_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {

        $user = $this->getUser();

        $supply = new Supply();
        $form = $this->createForm('AppBundle\Form\SupplyType', $supply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $supply->setUser($user);
            $demandId = $request->request->get('demand_id');
            $demand = $em->getRepository('AppBundle:Demand')->find($demandId);
            $supply->setDemand($demand);
            $em->persist($supply);
            //update demand quantity
            $supply->getDemand()->setQuantite($supply->getDemand()->getQuantite() - $supply->getQuantite());
            $this->addFlash(
                    'success', "Votre offre d'approvisionnement a été bien enregistrée!"
            );

            $em->flush();

            return $this->redirectToRoute('market_index');
        }

        //return $this->redirectToRoute('demand_index');
    }

}
