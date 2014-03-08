<?php

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NSAQueryCreatorBundle:Default:index.html.twig', array('name' => $name));
    }
}
