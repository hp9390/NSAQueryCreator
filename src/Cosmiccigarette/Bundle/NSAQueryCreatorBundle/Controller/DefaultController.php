<?php

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {
    public function indexAction() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->generateUrl('nsa_query_creator_rest_random_query', $params = array(), $absolute = true));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $searchQueryOne = json_decode(curl_exec($ch))->queries->query;
        $searchQueryTwo = json_decode(curl_exec($ch))->queries->query;

        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'index',
                            'searchQueryOne' => $searchQueryOne,
                            'searchQueryTwo' => $searchQueryTwo);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }

    public function learnMoreAction() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->generateUrl('nsa_query_creator_rest_random_query', $params = array(), $absolute = true));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $searchQueryOne = json_decode(curl_exec($ch))->queries->query;
        $searchQueryTwo = json_decode(curl_exec($ch))->queries->query;

        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'learnMore',
                            'searchQueryOne' => $searchQueryOne,
                            'searchQueryTwo' => $searchQueryTwo);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }


    public function allQueriesAction() {
//        $queries = $this->getDoctrine()->getRepository('NSAQueryCreatorBundle:queries')->findAll();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->generateUrl('nsa_query_creator_rest_all_queries', $params = array(), $absolute = true));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $queries = json_decode(curl_exec($ch))->queries;

        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'allQueries',
                            'queries' => $queries);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }


}
