<?php
namespace Application\Service\Factory;

use Interop\Container\ContainerInterface;
use Application\Service\GuestMessageManager;
use Zend\ServiceManager\Factory\FactoryInterface;

class GuestMessageManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new GuestMessageManager($entityManager);
    }
}