<?php

namespace Unicaen\Uniweb\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UniwebUserBundle:Default:index.html.twig');
    }
}
