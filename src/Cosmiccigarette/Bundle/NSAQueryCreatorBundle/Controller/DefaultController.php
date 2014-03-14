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

    public function allQueriesAction() {
//        $queries = $this->getDoctrine()->getRepository('NSAQueryCreatorBundle:queries')->findAll();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/rest/allQueries');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        $queries = json_decode($response);

        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'allQueries',
                            'queries' => $queries);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }

    public function findOneRandom() {
        $em =
            $this->getDoctrine()
                 ->getManager();
        $max =
            $em->createQuery('SELECT MAX(nsa.id) FROM NSAQueryCreatorBundle:queries nsa')
               ->getSingleScalarResult();
        return array_map('trim', $em->createQuery('SELECT nsa.query FROM NSAQueryCreatorBundle:queries nsa WHERE nsa.id >= :rand ORDER BY nsa.id ASC')
                  ->setParameter('rand', rand(0, $max))
                  ->setMaxResults(1)
                  ->getOneOrNullResult());
    }

}
