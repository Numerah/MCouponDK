<?php
namespace apb\appassBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use apb\appassBundle\Form\RegistrationType;
use apb\appassBundle\Entity\Registration;

class AccountController extends Controller
{
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('apb_appass_create'),
        ));

        return $this->render(
            'apbappassBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new RegistrationType(), new Registration());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $registration = $form->getData();

            $em->persist($registration->getUser());
            $em->flush();
            return $this->render('apbappassBundle:Default:index.html.twig');
        }

        return $this->render(
            'apbappassBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }

}