<?php

namespace Ben\WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializationContext;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcher;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

/**
 * @Rest\RouteResource("Vente")
 */
class VenteController extends Controller {

    /**
     * Récupération des projects de l'utilisateur connecté
     * [GET] /ventes
     *
     * @Rest\QueryParam(name="category", requirements="\d+", description="Category to filter By")
     * @Rest\QueryParam(name="sortedby", requirements="\w+", description="Column to sortby")
     * @Rest\QueryParam(name="page", requirements="\d+", default="1", description="Page of the overview")
     *
     * ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     * @param string $page
     * @Rest\View()
     * @Cache(smaxage="600", public="true")
     */
    public function cgetAction($category, $sortedby, $page) {

        $mappingSortedby = array(
            'location' => 'location',
            'product' => 'product',
            'createAt' => 'createAt',
        );
        $sortColumn = null;
        if ($sortedby) {
            $sortColumn = $mappingSortedby[$sortedby];
        } else {
            $sortColumn = 'createAt';
        }


//        //$maxVentes = $this->container->getParameter('max_ventes_per_page');
        $maxVentes = 4;
        $repository = $this->getDoctrine()->getRepository('AppBundle:Vente');

        $ventes_count = $repository->getCountVente();

        $pagination = array(
            'page' => $page,
            'pages_count' => floor($ventes_count / $maxVentes),
        );

        if ($category) {
            $ventes = $repository->getVentesByCategory(
                    $category, $maxVentes, ($page - 1) * $maxVentes, $sortColumn
            );
        } else {
            $ventes = $repository->getVentes(
                    $maxVentes, ($page - 1) * $maxVentes, $sortColumn
            );
        }

        $aResponses = array();
        foreach ($ventes as $vente) {
            $url = $this->generateUrl('vente_show', array('id' => $vente->getId()));
            ;
            $image = $this->container->getParameter('app.path.product_images') . '/' . $vente->getImageName();
            /** @var CacheManager */
            $imagineCacheManager = $this->get('liip_imagine.cache.manager');

            /** @var string */
            $ImageResize = $imagineCacheManager->getBrowserPath($image, 'my_thumb');

            $aResponses[] = array(
                'id' => $vente->getId(),
                'lieu' => $vente->getLieu(),
                'image' => $ImageResize,
                'product' => $vente->getProduct()->getName(),
                'prix' => $vente->getPrixUnit(),
                'measure' => $vente->getMeasure()->getName(),
                'url' => $url
            );
        }
        // return url for view the preview
        $aResult = [
            'code' => 'OK',
            'messages' => '',
            'pagination' => $pagination,
            'ventes' => $aResponses,
        ];

        return new JsonResponse($aResult);
    }

}
