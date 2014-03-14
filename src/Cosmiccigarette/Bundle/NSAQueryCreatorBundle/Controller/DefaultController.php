<?php

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Cosmiccigarette\Bundle\NSAQueryCreatorBundle\DependencyInjection\helper;

class DefaultController extends Controller {
    public function indexAction() {

       $queries = helper::returnSearchQueries(5, $this->generateUrl('nsa_query_creator_rest_random_query', $params = array(), $absolute = true));

        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'index',
                            'searchQueryOne' => $queries['first'],
                            'searchQueryTwo' => $queries['second']);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }

    public function learnMoreAction() {
        $queries = helper::returnSearchQueries(5, $this->generateUrl('nsa_query_creator_rest_random_query', $params = array(), $absolute = true));

        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'learnMore',
                            'searchQueryOne' => $queries['first'],
                            'searchQueryTwo' => $queries['second']);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }


    public function allQueriesAction() {
        $queries = helper::returnSearchQueries(0, $this->generateUrl('nsa_query_creator_rest_all_queries', $params = array(), $absolute = true));
var_dump($queries);
        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'allQueries',
                            'queries' => $queries['first']);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }


}
