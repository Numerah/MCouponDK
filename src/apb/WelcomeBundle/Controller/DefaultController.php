<?php

namespace apb\WelcomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('apbWelcomeBundle:Default:index.html.twig');
    }

    public function projectsAction()
    {
        return $this->render('apbWelcomeBundle:Default:index.html.twig');
    }

    public function addProjectAction()
    {
        return $this->render('apbWelcomeBundle:Default:index.html.twig');
    }

    public function employeesAction()
    {
        return $this->render('apbWelcomeBundle:Default:index.html.twig');
    }

    public function addEmployeeAction()
    {
        return $this->render('apbWelcomeBundle:Default:index.html.twig');
    }

    public function profileAction()
    {
        return $this->render('apbWelcomeBundle:Default:index.html.twig');
    }
}
