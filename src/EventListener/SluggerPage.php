<?php

namespace App\EventListener;

use App\Entity\Page;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class SluggerPage implements EventSubscriberInterface
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public static function getSubscribedEvents()
    {
        return [];
    }

    public function preUpdate(PreUpdateEventArgs $args): void
    {
        $entity = $args->getObject();

        if (!$entity instanceof Page) {
            return;
        }

        $pageName = $entity->getName();
        $entity->setSlug($this->slugger->slug($pageName)->lower());
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if (!$entity instanceof Page) {
            return;
        }

        $pageName = $entity->getName();
        $entity->setSlug($this->slugger->slug($pageName)->lower());
    }
}
