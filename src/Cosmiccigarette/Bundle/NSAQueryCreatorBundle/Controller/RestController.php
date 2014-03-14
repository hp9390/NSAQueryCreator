<?php

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View AS FOSView;

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
}
