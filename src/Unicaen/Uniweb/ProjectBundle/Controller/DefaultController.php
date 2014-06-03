<?php

namespace Unicaen\Uniweb\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $projet = new \Unicaen\Uniweb\ProjectBundle\Entity\Project();
        var_dump($projet);

        //return $this->render('ProjectBundle:Default:index.html.twig', array('name' => $name));
    }

    public function createAction()
    {

        
    }
}
