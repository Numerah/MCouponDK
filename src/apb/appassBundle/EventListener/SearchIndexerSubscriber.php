<?php
/**
 * Created by PhpStorm.
 * User: Numerah
 * Date: 2/24/14
 * Time: 4:31 PM
 */

namespace apb\appassBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use apb\appassBundle\Entity\mgeneral;
use apb\appassBundle\Entity\mappearance;
use apb\appassBundle\Entity\mdatasetting;
use apb\appassBundle\Entity\mheader;
use apb\appassBundle\Entity\mprimary;
use apb\appassBundle\Entity\msecondary;
use apb\appassBundle\Entity\mauxiliary;
use apb\appassBundle\Entity\mbackfields;
use apb\appassBundle\Entity\mrelevance;
use apb\appassBundle\Entity\madvanced;

class SearchIndexerSubscriber implements EventSubscriber {

    public function getSubscribedEvents()
    {
        return array(
            'postPersist',
            'postUpdate',
        );
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function index(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if ($entity instanceof mgeneral) {
            // ... do something with the entity
        }
        if ($entity instanceof mappearance) {
            // ... do something with the entity
        }
        if ($entity instanceof mdatasetting) {
            // ... do something with the entity
        }
        if ($entity instanceof mheader) {
            // ... do something with the entity
        }
        if ($entity instanceof mprimary) {
            // ... do something with the entity
        }
        if ($entity instanceof msecondary) {
            // ... do something with the entity
        }
        if ($entity instanceof mauxiliary) {
            // ... do something with the entity
        }
        if ($entity instanceof mbackfields) {
            // ... do something with the entity
        }
        if ($entity instanceof mrelevance) {
            // ... do something with the entity
        }
        if ($entity instanceof madvanced) {
            // ... do something with the entity
        }
    }
} 