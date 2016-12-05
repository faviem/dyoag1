<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//use AppBundle\Form\ContactType;
use AppBundle\Form\ContactHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

/**
 * moncompte controller.
 *
 * @Route("/dashboard")
 */
class MoncompteController extends Controller
{
    /**
     * @Route("/moncompte", name="dasboard_moncompteindex")
     * @Template()
     * @Cache(smaxage="600", public="true")
     */
    public function indexAction(Request $request)
    {        
        return $this->render('dashboard/moncompte/index.html.twig');
        
    }    
    
}
