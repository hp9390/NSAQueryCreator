<?php

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {
    public function indexAction() {
        $searchQueryOne = $this->findOneRandom();
        $searchQueryTwo = $this->findOneRandom();
        $parameters = array('yearICreatedThis' => 2014, 'thisYear' => date("Y"), 'name' => 'NSA Query Creator', 'site' => 'index', 'searchQueryOne' => $searchQueryOne, 'searchQueryTwo' => $searchQueryTwo);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }
    public function learnMoreAction() {
        $searchQuery = $this->findOneRandom();
        $parameters = array('yearICreatedThis' => 2014, 'name' => 'NSA Query Creator', 'site' => 'learnMore', 'searchQuery' => $searchQuery);
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', $parameters);
    }
    public function findOneRandom()
    {
        $em = $this->getDoctrine()->getManager();
        $max = $em->createQuery('
            SELECT MAX(nsa.id) FROM NSAQueryCreatorBundle:queries nsa
            ')
                  ->getSingleScalarResult();
        return $em->createQuery('
            SELECT nsa.query FROM NSAQueryCreatorBundle:queries nsa
            WHERE nsa.id >= :rand
            ORDER BY nsa.id ASC
            ')
                  ->setParameter('rand',rand(0,$max))
                  ->setMaxResults(1)
                  ->getOneOrNullResult();
    }
}
