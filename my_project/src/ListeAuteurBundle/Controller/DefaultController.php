<?php

namespace ListeAuteurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ListeAuteurBundle:Default:index.html.twig');
    }
}
