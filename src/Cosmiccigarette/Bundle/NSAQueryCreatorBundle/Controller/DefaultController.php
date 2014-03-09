<?php

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {
    public function indexAction() {
        $searchQueryOne = $this->findOneRandom();
        $searchQueryTwo = $this->findOneRandom();
        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'index',
                            'searchQueryOne' => $searchQueryOne,
                            'searchQueryTwo' => $searchQueryTwo);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }

    public function learnMoreAction() {
        $searchQueryOne = $this->findOneRandom();
        $searchQueryTwo = $this->findOneRandom();
        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'learnMore',
                            'searchQueryOne' => $searchQueryOne,
                            'searchQueryTwo' => $searchQueryTwo);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }

    public function ajaxUpdateQueryAction() {
        $searchQueryOne = $this->findOneRandom();
        $searchQueryTwo = $this->findOneRandom();
        return new JsonResponse(array('searchQueryOne' => $searchQueryOne, 'searchQueryTwo' => $searchQueryTwo));
    }

    public function findOneRandom() {
        $em =
            $this->getDoctrine()
                 ->getManager();
        $max =
            $em->createQuery('SELECT MAX(nsa.id) FROM NSAQueryCreatorBundle:queries nsa')
               ->getSingleScalarResult();
        return $em->createQuery('SELECT nsa.query FROM NSAQueryCreatorBundle:queries nsa WHERE nsa.id >= :rand ORDER BY nsa.id ASC')
                  ->setParameter('rand', rand(0, $max))
                  ->setMaxResults(1)
                  ->getOneOrNullResult();
    }
}
