<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Supply controller.
 *
 * @Route("/market")
 */
class MarketController extends Controller {

    /**
     * Lists all Supply entities.
     *
     * @Route("/", name="market_index")
     * @Method("GET")
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $filter = array();
        $form = $this->createForm('AppBundle\Form\FilterType', $filter);
        $form->handleRequest($request);
        return $this->render('market/index.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/list", name="market_list")
     * @Method("GET")
     */
    public function listAction(Request $request) {
        $type = $request->query->get('type');
        //$type = $request->request->get('type');
        $em = $this->getDoctrine()->getManager();
        if ($type == 'demand') {
            $dqlDemand = "SELECT d FROM AppBundle:Demand d WHERE d.published = 1 ORDER BY d.createAt DESC";
            $query = $em->createQuery($dqlDemand);
        } else {
            $dqlVente = "SELECT v FROM AppBundle:Vente v WHERE v.published = 1 ORDER BY v.createAt DESC";
            $query = $em->createQuery($dqlVente);
        }
        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
                $query, // query NOT result
                $request->query->getInt('page', 1), //page number
                24 // limit per page
        );
        return $this->render($type . '/list.html.twig', array(
                    'pagination' => $pagination,
        ));
    }

    /**
     * @Route("/list/filter", name="market_list_lister")
     * @Method("GET")
     */
    public function filterAction(Request $request) {
        $type = $request->query->get('type');
        $key = $request->query->get('key');
        $value = $request->query->get('value');
        $em = $this->getDoctrine()->getManager();
        if ($type == 'demand') {
            if ($key == 'category')
                $query = $em->getRepository('AppBundle:Demand')->getDemandsByCategoryId($value);
            else
                $query = $em->getRepository('AppBundle:Demand')->getDemandsByProductId($value);
        } else {
            if ($key == 'category')
                $query = $em->getRepository('AppBundle:Vente')->getVentesByCategoryId($value);
            else
                $query = $em->getRepository('AppBundle:Vente')->getVentesByProductId($value);
        }
        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
                $query, // query NOT result
                $request->query->getInt('page', 1), //page number
                24 // limit per page
        );
        return $this->render($type . '/list.html.twig', array(
                    'pagination' => $pagination,
        ));
    }

}
