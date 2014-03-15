<?php

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View AS FOSView;
use Cosmiccigarette\Bundle\NSAQueryCreatorBundle\DependencyInjection\helper;

class RestController extends Controller {

    public function getAllQueriesAction(Request $request) {
        $em =
            $this->get('doctrine')
                 ->getManager();
        $queries =
            $em->getRepository('NSAQueryCreatorBundle:queries')
               ->findAll();

        $view = FOSView::create();

        $view->setFormat('json');

        if ($queries) {
            $view->setStatusCode(200);
            if ($request->getRequestFormat() === 'html') {
                $view->setData(array('queries' => $queries));
            } else {
                $view->setData($queries);
            }
        } else {
            $view->setStatusCode(404);
        }

        return $view;
    }

    public function getRandomQueryAction(Request $request) {
        $query = $this->findOneRandom();
        $view = FOSView::create();

        $view->setFormat('json');

        if ($query) {
            $view->setStatusCode(200);
            if ($request->getRequestFormat() === 'html') {
                $view->setData(array('queries' => $query));
            } else {
                $view->setData($query);
            }
        } else {
            $view->setStatusCode(404);
        }

        return $view;
    }


    public function ajaxUpdateQueryAction() {
        $queries = helper::returnSearchQueries(5, $this->generateUrl('nsa_query_creator_rest_random_query', $params = array(), $absolute = true));

        $view = FOSView::create();

        $view->setFormat('json');

        $response = array('searchQueryOne' => $queries['first'],
                          'searchQueryTwo' => $queries['second']);

        if ($response && $queries['first'] && $queries['second']) {
            $view->setStatusCode(200);
                $view->setData($response);
        } else {
            $view->setStatusCode(404);
        }

        return $view;
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
