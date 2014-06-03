<?php

namespace Unicaen\Uniweb\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Unicaen\Uniweb\ProjectBundle\Entity\Project;
use Unicaen\Uniweb\ProjectBundle\Form\ProjectType;
use Unicaen\Uniweb\ProjectBundle\Form\ProjectEditType;

class DefaultController extends Controller
{
    /**
    * Create a project and save it
    **/
    public function createAction()
    {

        $project = new Project();
        
        $form = $this->createForm(new ProjectType, $project);

        $request = $this->get('request');
        $form->handleRequest($request);
        if($form->isValid()){
            // On l'enregistre notre objet $article dans la base de données
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            return $this->render('ProjectBundle:crud:create.html.twig', array(
                'form' => $form->createView(),
            ));            
        }


        return $this->render('ProjectBundle:crud:create.html.twig', array(
            'form' => $form->createView(),
          ));
    }

    /**
    * Show the details of the project
    * @param Project $project an instance of project
    **/
    public function viewAction(Project $project){
    
        return $this->render('ProjectBundle:crud:view.html.twig', array(
            'project' => $project
          ));
    } 
    
    /**
    * Modify a project
    * @param Project $project an instance of project
    **/
    public function updateAction(Project $project){

        $form = $this->createForm(new ProjectType, $project);
        $request = $this->get('request');
        $form->handleRequest($request);

        if($form->isValid()){
            // On l'enregistre notre objet $article dans la base de données
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            return $this->render('ProjectBundle:crud:create.html.twig', array(
                'form' => $form->createView(),
            ));            
        }

        return $this->render('ProjectBundle:crud:create.html.twig', array(
            'form' => $form->createView()
          ));
    }

    /**
    * Show a list of all projects
    **/
    public function listAction(){
        $projects = $this->getDoctrine()
                    ->getManager()
                    ->getRepository("ProjectBundle:Project")
                    ->findAll();

        return $this->render('ProjectBundle:crud:list.html.twig', array(
            'projects' => $projects
          ));
    }

    /**
    * Remove a project
    * @param Project $project an instance of project
    **/
    public function deleteAction(Project $project){
        $em = $this->getDoctrine()->getManager();
        $em->remove($project);
        $em->flush();
        return $this->redirect($this->generateUrl('project_list'));
    }

    /**
    * Publish a project
    * @param Project $project an instance of project
    **/
    public function publishAction(Project $project){
        $em = $this->getDoctrine()->getManager();
        $project->setValid(true);
        $em->persist($project);
        $em->flush();
        return $this->redirect($this->generateUrl('project_list'));
    }
}
