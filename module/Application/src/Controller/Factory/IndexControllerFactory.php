<?php

namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Application\Controller\IndexController;
use Application\Service\GuestMessageManager;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $guestMessageManager = $container->get(GuestMessageManager::class);
        return new IndexController($guestMessageManager);
    }
}