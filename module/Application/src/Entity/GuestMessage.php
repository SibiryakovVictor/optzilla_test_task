<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;
use Zend\Hydrator\ObjectProperty;

/**
 * @ORM\Entity(repositoryClass="\Application\Repository\GuestMessageRepository")
 * @ORM\Table(name="guest_messages")
 * 
 * @Annotation\Name("guest_message")
 * @Annotation\Hydrator("Zend\Hydrator\ObjectProperty")
 */
class GuestMessage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="guest_message_id")
     * 
     * @Annotation\Exclude()   
     */
    protected $id;

    /** 
     * @ORM\Column(name="guest_message_text")
     * 
     * @Annotation\Options({"label":"Your message:"})
     * @Annotation\Required(true)  
     * @Annotation\Validator({"name":"StringLength", "options":{"min":2, "max":255}})
     */
    protected $content;

    /** 
     * @ORM\Column(name="guest_email")
     * 
     * @Annotation\Required(true)
     * @Annotation\Options({"label":"Your email address:"})  
     */
    protected $email;

    /**
     * @ORM\Column(name="guest_message_date_created")
     * 
     * @Annotation\Exclude()   
     */
    protected $dateCreated;

    public function getGuestEmail()
    {
        return $this->email;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function setGuestEmail(string $email)
    {
        $this->email = $email;
    }

    public function setDateCreated()
    {
        $this->dateCreated = date('Y-m-d H:i:s');
    }
}