<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commercial
 *
 * @ORM\Table(name="commercial")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\CommercialRepository")
 */
class Commercial
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * 
     * @var string
     * @ORM\Column(name="nom",type="string",length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255,nullable=true)
     */
    private $token;
    
    /**
     * @ORM\OneToMany(targetEntity="Client",mappedBy="commercial")
     * @var \ApiBundle\Entity\Commercial
     */
    private $clients;
    /**
     * @ORM\Column(name="dateToken",type="datetime",nullable=true)
     * @var \DateTime
     */
    private $dateToken;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    
    /**
     * Set Nom
     *
     * @param string $nom
     *
     * @return Commercial
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        
        return $this;
    }
    
    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    
    /**
     * Set login
     *
     * @param string $login
     *
     * @return Commercial
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Commercial
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Commercial
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add client
     *
     * @param \ApiBundle\Entity\Client $client
     *
     * @return Commercial
     */
    public function addClient(\ApiBundle\Entity\Client $client)
    {
        $this->clients[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \ApiBundle\Entity\Client $client
     */
    public function removeClient(\ApiBundle\Entity\Client $client)
    {
        $this->clients->removeElement($client);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Set dateToken
     *
     * @param \DateTime $dateToken
     *
     * @return Commercial
     */
    public function setDateToken($dateToken)
    {
        $this->dateToken = $dateToken;

        return $this;
    }

    /**
     * Get dateToken
     *
     * @return \DateTime
     */
    public function getDateToken()
    {
        return $this->dateToken;
    }
}
