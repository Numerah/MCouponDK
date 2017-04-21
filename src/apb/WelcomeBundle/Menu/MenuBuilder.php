<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Numerah
 * Date: 1/30/14
 * Time: 3:16 PM
 * To change this template use File | Settings | File Templates.
 */
namespace apb\WelcomeBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');

        $menu->addChild('Pass Template Builder', array('route' => 'apb_welcome_projects'))
            ->setAttribute('icon', 'icon-edit');

        $menu->addChild('Manage Passes', array('route' => 'apb_welcome_employees'))
            ->setAttribute('icon', 'icon-list');

        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

        /*
        You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.

        if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles
        $username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user

        */
        $menu->addChild('User', array('label' => 'Hi visitor'))
            ->setAttribute('dropdown', true)
            ->setAttribute('icon', 'icon-user');

        $menu['User']->addChild('Edit profile', array('route' => 'apb_welcome_profile'))
            ->setAttribute('icon', 'icon-edit');

        return $menu;
    }
}