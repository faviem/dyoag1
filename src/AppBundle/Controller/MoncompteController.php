<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Ben\UserBundle\Form\Type\ProfileFormType;

/**
 * moncompte controller.
 *
 * @Route("/dashboard")
 */
class MoncompteController extends Controller {

    /**
     * @Route("/moncompte", name="dasboard_moncompteindex")
     * @Template()
     * @Cache(smaxage="600", public="true")
     */
    public function indexAction(Request $request) {
        return $this->render('dashboard/moncompte/index.html.twig');
    }

    /**
     * Displays a form to edit an existing user entity.
     * @Route("/moncompte/profile", name="dasboard_moncompte_profile")
     * @Template()
     * @Cache(smaxage="600", public="true")
     *
     * @Route("/{id}/edit", name="vente_edit")
     * @Method({"GET", "POST"})
     */
    public function profileAction(Request $request) {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $form = $this->get('form.factory')->create(ProfileFormType::class, $user, [
            "method" => "post",
        ]);
        $form->handleRequest($request);

        return $this->render('dashboard/moncompte/profile.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
