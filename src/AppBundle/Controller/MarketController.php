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
    public function indexAction() {
        return $this->render('market/home.html.twig', array(
        ));
    }

}
