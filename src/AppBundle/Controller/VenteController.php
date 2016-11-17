<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Vente;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Order;
use AppBundle\Entity\Product;

/**
 * Vente controller.
 *
 * @Route("/market/sale")
 */
class VenteController extends Controller {

    /**
     * Lists all Vente entities.
     *
     * @Route("/", name="vente_index")
     * @Method("GET")
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AppBundle:Category')->findAll();

// pagination http://stackoverflow.com/questions/14817817/symfony-knppaginator-query-with-custom-filters-from-form-fields
// http://achreftlili.github.io/2015/08/23/Ajaxify-Knp-Bundle-pagination/
        $dql = "SELECT o FROM AppBundle:Vente o";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 24/* limit per page */
        );
        return $this->render('vente/index.html.twig', array(
//            'ventes' => $ventes,
                    'pagination' => $pagination,
                    'categories' => $categories
        ));
    }

    /**
     * Creates a new Vente entity.
     *
     * @Route("/new", name="vente_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $vente = new Vente();
        $form = $this->createForm('AppBundle\Form\VenteType', $vente);
        $form->handleRequest($request);
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if (null === $vente->getImageName()) {
                $vente->setImageName($vente->getProduct()->getImageName());
            }
            $vente->setUser($user);
            $em->persist($vente);
            $em->flush();
            $this->addFlash(
                    'success', "Votre offre de produit a été bien enregistré!"
            );
            return $this->redirectToRoute('vente_index');
        }

        return $this->render('vente/new.html.twig', array(
                    'vente' => $vente,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new Order entity.
     *
     * @Route("/order/new/", name="order_new")
     * @Method({"POST"})
     */
    public function newOrderAction(Request $request) {
//        if (!$request->isXmlHttpRequest()) {
//            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
//        }

        $user = $this->getUser();

        $username = $user->getUsername();
        $email = $user->getEmail();

        $commande = new Order();
        $form = $this->createForm('AppBundle\Form\OrderType', $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $commande->setUser($user);
            $venteId = $request->request->get('vente_id');
            $vente = $em->getRepository('AppBundle:Vente')->find($venteId);
            $commande->setVente($vente);
            $em->persist($commande);
            //update vente quantity
            $commande->getVente()->setQuantite($commande->getVente()->getQuantite() - $commande->getQuantite());
            $em->flush();
            $this->addFlash(
                    'success', "Votre commande a été bien enregistrée!"
            );
//            return new JsonResponse(array(
//                'success' => true,
//                'email' => $email
//                    )
//                    , 200);
            return $this->redirectToRoute('dashboard_index');
        }

        return $this->redirectToRoute('vente_index');

//        $response = new JsonResponse(
//                array(
//            'message' => 'Error',
////            'form' => $this->renderView('AcmeDemoBundle:Demo:form.html.twig',
////                    array(
////                'entity' => $entity,
////                'form' => $form->createView(),
////            ))
//                ), 400);
//
//        return $response;
    }

    /**
     * Finds and displays a Vente entity.
     *
     * @Route("/{id}", name="vente_show")
     * @Method("GET")
     */
    public function showAction(Vente $vente) {
        $deleteForm = $this->createDeleteForm($vente);

        $commande = new Order();
        $form = $this->createForm('AppBundle\Form\OrderType', $commande);

        return $this->render('vente/show.html.twig', array(
                    'vente' => $vente,
                    'delete_form' => $deleteForm->createView(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Vente entity.
     *
     * @Route("/{id}/edit", name="vente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vente $vente) {
        $deleteForm = $this->createDeleteForm($vente);
        $editForm = $this->createForm('AppBundle\Form\VenteType', $vente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vente);
            $em->flush();

            return $this->redirectToRoute('vente_edit', array('id' => $vente->getId()));
        }

        return $this->render('vente/edit.html.twig', array(
                    'vente' => $vente,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Vente entity.
     *
     * @Route("/{id}/recap", name="vente_edit")
     * @Method({"GET", "POST"})
     */
    public function recapitulationAction(Request $request, Vente $vente) {
        $deleteForm = $this->createDeleteForm($vente);
        $editForm = $this->createForm('AppBundle\Form\VenteRecapType', $vente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vente);
            $em->flush();

            return $this->redirectToRoute('vente_show', array('id' => $vente->getId()));
        }

        return $this->render('vente/recapitulation.html.twig', array(
                    'vente' => $vente,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Vente entity.
     *
     * @Route("/{id}", name="vente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vente $vente) {
        $form = $this->createDeleteForm($vente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vente);
            $em->flush();
        }

        return $this->redirectToRoute('vente_index');
    }

    /**
     * Creates a form to delete a Vente entity.
     *
     * @param Vente $vente The Vente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vente $vente) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('vente_delete', array('id' => $vente->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    /**
     * @Route("/select/mesures", name="vente_select_measures")
     */
    public function measuresAction(Request $request) {
        $product_id = $request->request->get('product_id');
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->getMeasures($product_id);
        return new JsonResponse($product);
    }

    /**
     * Search a Vente entity.
     *
     * @Route("/search", name="vente_search")
     * @Method({"GET", "POST"})
     */
    public function searchAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $query = $request->get('query');

        if (!$query) {
            if (!$request->isXmlHttpRequest()) {
                return $this->redirect($this->generateUrl('vente_index'));
            } else {
                return new JsonResponse('No results.');
            }
        }

        $ventes = $em->getRepository('AppBundle:Vente')->getForLuceneQuery($query);
        $categories = $em->getRepository('AppBundle:Category')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $ventes, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 24/* limit per page */
        );

        if ($request->isXmlHttpRequest()) {
            if ('*' == $query || !$ventes || $query == '') {
                return new JsonResponse('No results.');
            }
            return $this->render('vente/searchAjax.html.twig', array(
                        'pagination' => $pagination,
                        'categories' => $categories
            ));
        }

        return $this->render('vente/search.html.twig', array(
                    'pagination' => $pagination,
                    'categories' => $categories
        ));
    }

    /**
     * Filter by (Category)
     *
     * @Route("/filter", name="vente_filter")
     * @Method("POST")
     */
    public function filterAction(Request $request) {
        $filter = $request->request->get('filter');
        $em = $this->getDoctrine()->getManager();
        $ventes = $em->getRepository('AppBundle:Vente')->getOffresByCategory($filter);

        if (!$ventes) {
            return new JsonResponse('No results.');
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $ventes, $request->query->getInt('page', 1)/* page number */, 24/* limit per page */
        );

        return $this->render('vente/searchAjax.html.twig', array(
                    'pagination' => $pagination
        ));
    }

}
