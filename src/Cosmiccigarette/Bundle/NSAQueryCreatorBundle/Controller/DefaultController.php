<?php

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Controller;

use Cosmiccigarette\Bundle\NSAQueryCreatorBundle\DependencyInjection\helper;
use Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Entity\queries;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {
    public function indexAction() {

        $queries = helper::returnSearchQueries(0,
                                               $this->generateUrl('nsa_query_creator_rest_random_query',
                                                                  $params = array(),
                                                                  $absolute = true));

        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'index',
                            'searchQueryOne' => $queries['first'],
                            'searchQueryTwo' => $queries['second']);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }

    public function learnMoreAction() {
        $queries = helper::returnSearchQueries(0,
                                               $this->generateUrl('nsa_query_creator_rest_random_query',
                                                                  $params = array(),
                                                                  $absolute = true));
        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'learnMore',
                            'searchQueryOne' => $queries['first'],
                            'searchQueryTwo' => $queries['second']);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }

    public function addQueryAction(Request $request) {
        $em =
            $this->getDoctrine()
                 ->getManager();
        $query = new queries();
        $form =
            $this->createFormBuilder($query)
                 ->add('query',
                       'text',
                       array('label' => 'Enter a new query you know the NSA uses!',))
                 ->add('save', 'submit')
                 ->getForm();
        $queries = helper::returnSearchQueries(0,
                                               $this->generateUrl('nsa_query_creator_rest_random_query',
                                                                  $params = array(),
                                                                  $absolute = true));
        $form->handleRequest($request);
        if ($this->get('request_stack')
                 ->getCurrentRequest()
                 ->isMethod('post')) {
            $repo =
                $this->getDoctrine()
                     ->getManager()
                     ->getRepository('NSAQueryCreatorBundle:queries');
            $newQuery = $repo->findOneByQuery($query->getQuery());
            if ($newQuery == null) {
                $em->persist($query);
                $em->flush();
            } else {
                $error = 'This keyword already exists in our database! :-) Thank you anyway!';
                $form['query']->addError(new FormError($error));
            }
        }
        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'addQuery',
                            'form' => $form->createView(),
                            'searchQueryOne' => $queries['first'],
                            'searchQueryTwo' => $queries['second']);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }

    public function allQueriesAction() {
        $queries = helper::returnSearchQueries(0,
                                               $this->generateUrl('nsa_query_creator_rest_all_queries',
                                                                  $params = array(),
                                                                  $absolute = true));
        $parameters = array('yearICreatedThis' => 2014,
                            'thisYear' => date("Y"),
                            'name' => 'NSA Query Creator',
                            'site' => 'allQueries',
                            'queries' => $queries);

        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }


}
