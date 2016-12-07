<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Demand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Supply;

/**
 * Demand controller.
 *
 * @Route("market/demand")
 */
class DemandController extends Controller {

    /**
     * Lists all demand entities.
     *
     * @Route("/", name="demand_index")
     * @Method("GET")
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $filter = array();
        $form = $this->createForm('AppBundle\Form\FilterType', $filter);
        $form->handleRequest($request);
        $dql = "SELECT d FROM AppBundle:Demand d WHERE d.published = 1 ORDER BY d.createAt DESC";
        $query = $em->createQuery($dql);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, // query NOT result
                $request->query->getInt('page', 1), //page number
                $this->getParameter('max_data_per_page') // limit per page
        );

        return $this->render('demand/index.html.twig', array(
                    'pagination' => $pagination,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new demand entity.
     *
     * @Route("/new", name="demand_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $demand = new Demand();
        $form = $this->createForm('AppBundle\Form\DemandType', $demand);
        $form->handleRequest($request);
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if (null === $demand->getImageName()) {
                $demand->setImageName($demand->getProduct()->getImageName());
            }
            $demand->setUser($user);
            $em->persist($demand);
            $em->flush();
            $this->addFlash(
                    'success', "Votre demande d'approvisionnement a été bien enregistrée!"
            );
            return $this->redirectToRoute('demand_index');
        }

        return $this->render('demand/new.html.twig', array(
                    'demand' => $demand,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demand entity.
     *
     * @Route("/{id}", name="demand_show")
     * @Method("GET")
     */
    public function showAction(Demand $demand) {
        $supply = new Supply();
        $form = $this->createForm('AppBundle\Form\SupplyType', $supply);
        $em = $this->getDoctrine()->getManager();
        $relativeDemands = $em->getRepository('AppBundle:Demand')->getDemandsByProductId($demand->getProduct()->getId());
        return $this->render('demand/show.html.twig', array(
                    'demand' => $demand,
                    'form' => $form->createView(),
                    'relativeDemands' => $relativeDemands
        ));
    }

    /**
     * Displays a form to edit an existing demand entity.
     *
     * @Route("/{id}/edit", name="demand_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Demand $demand) {
        $deleteForm = $this->createDeleteForm($demand);
        $editForm = $this->createForm('AppBundle\Form\DemandType', $demand);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demand_edit', array('id' => $demand->getId()));
        }

        return $this->render('demand/edit.html.twig', array(
                    'demand' => $demand,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a demand entity.
     *
     * @Route("/{id}", name="demand_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Demand $demand) {
        $form = $this->createDeleteForm($demand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demand);
            $em->flush($demand);
        }

        return $this->redirectToRoute('demand_index');
    }

    /**
     * Creates a form to delete a demand entity.
     *
     * @param Demand $demand The demand entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Demand $demand) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('demand_delete', array('id' => $demand->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    /**
     * Search a Demand entity.
     *
     * @Route("/search", name="demand_search")
     * @Method({"GET", "POST"})
     */
    public function searchAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $query = $request->get('query');

        if (!$query) {
            if (!$request->isXmlHttpRequest()) {
                return $this->redirect($this->generateUrl('demand_index'));
            } else {
                return new JsonResponse('No results.');
            }
        }

        $demands = $em->getRepository('AppBundle:Demand')->getForLuceneQuery($query);
        $categories = $em->getRepository('AppBundle:Category')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $demands, //
                $request->query->getInt('page', 1), // page number
                $this->getParameter('max_data_per_page')// limit per page
        );

        if ($request->isXmlHttpRequest()) {
            if ('*' == $query || !$demands || $query == '') {
                return new JsonResponse('No results.');
            }
            return $this->render('demand/searchAjax.html.twig', array(
                        'pagination' => $pagination,
                        'categories' => $categories
            ));
        }

        return $this->render('demand/search.html.twig', array(
                    'pagination' => $pagination,
                    'categories' => $categories
        ));
    }

}
