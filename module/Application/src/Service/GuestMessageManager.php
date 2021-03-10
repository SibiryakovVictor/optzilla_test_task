<?php

namespace Application\Service;

use Application\Entity\GuestMessage;

class GuestMessageManager
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;
    
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addNewMessage($data) 
    {
        $message = new GuestMessage();
        $message->setGuestEmail($data['email']);
        $message->setContent($data['content']);
        $message->setDateCreated();      
        
        $this->entityManager->persist($message);
        
        $this->entityManager->flush();
    }

    public function findMessages()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('g')
            ->from(GuestMessage::class, 'g')
            ->orderBy('g.dateCreated', 'DESC');

        return $queryBuilder->getQuery();
    }
}