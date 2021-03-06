<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Exclude;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ClientRepository")
 */
class Client
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
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=255)
     */
    private $intitule;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;
    
    /**
     * @ORM\OneToMany(targetEntity="Estimation",mappedBy="client")
     * @var \ApiBundle\Entity\Client
     */
    private $estimations;
    
    /**
     * @ORM\ManyToOne(targetEntity="Commercial",inversedBy="clients")
     * @ORM\JoinColumn(name="commercial_id",referencedColumnName="id")
     * @var \ApiBundle\Entity\Client
     * @Exclude
     */
    private $commercial;

    public function __construct()
    {
    	$this->estimations = new ArrayCollection();
    }

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
     * Set intitule
     *
     * @param string $intitule
     *
     * @return Client
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Client
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Client
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Client
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Client
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Add estimation
     *
     * @param \ApiBundle\Entity\Estimation $estimation
     *
     * @return Client
     */
    public function addEstimation(\ApiBundle\Entity\Estimation $estimation)
    {
        $this->estimations[] = $estimation;

        return $this;
    }

    /**
     * Remove estimation
     *
     * @param \ApiBundle\Entity\Estimation $estimation
     */
    public function removeEstimation(\ApiBundle\Entity\Estimation $estimation)
    {
        $this->estimations->removeElement($estimation);
    }

    /**
     * Get estimations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstimations()
    {
        return $this->estimations;
    }

    /**
     * Set commercial
     *
     * @param \ApiBundle\Entity\Commercial $commercial
     *
     * @return Client
     */
    public function setCommercial(\ApiBundle\Entity\Commercial $commercial = null)
    {
        $this->commercial = $commercial;

        return $this;
    }

    /**
     * Get commercial
     *
     * @return \ApiBundle\Entity\Commercial
     */
    public function getCommercial()
    {
        return $this->commercial;
    }
}
