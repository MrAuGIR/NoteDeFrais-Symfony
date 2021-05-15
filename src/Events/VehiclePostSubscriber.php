<?php

namespace App\Events;

use App\Entity\Vehicle;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\Security\Core\Security;

class VehiclePostSubscriber implements EventSubscriberInterface
{

    public function __construct(private Security $security)
    {
        
    }

    public static function getSubscribedEvents()
    {
        
    }

    public function setUserForVehicle(ViewEvent $event){
        /** @var \App\Entity\Vehicle $vehicle */
        $vehicle = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if($vehicle instanceof Vehicle && $method === "POST"){
            $user = $this->security->getUser();
            $vehicle->setUser($user);
        }

    }


}