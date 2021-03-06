<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estimation
 *
 * @ORM\Table(name="estimation")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\EstimationRepository")
 */
class Estimation
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="secteur", type="string", length=255)
     */
    private $secteur;

    /**
     * @var string
     *
     * @ORM\Column(name="surface", type="string", length=255)
     */
    private $surface;


    /**
     * @var string
     *
     * @ORM\Column(name="typeChantier", type="string", length=255)
     */
    private $typeChantier;

    /**
     * @var string
     *
     * @ORM\Column(name="typeBatiment", type="string", length=255)
     */
    private $typeBatiment;

    /**
     * @var int
     *
     * @ORM\Column(name="temperatureMoyenne", type="smallint")
     */
    private $temperatureMoyenne;

    
    /**
     * @ORM\ManyToOne(targetEntity="Client",inversedBy="estimations" ,cascade={"persist"})
     * @ORM\JoinColumn(name="client_id",referencedColumnName="id")
     * @var \ApiBundle\Entity\Client
     */
    private $client;
    
    /**
     * @var int
     *
     * @ORM\Column(name="anneesBatiment", type="integer")
     */
    private $anneesBatiment;
    
    
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Estimation
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Estimation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set secteur
     *
     * @param string $secteur
     *
     * @return Estimation
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur
     *
     * @return string
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * Set surface
     *
     * @param string $surface
     *
     * @return Estimation
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return string
     */
    public function getSurface()
    {
        return $this->surface;
    }
    /**
     * Set typeChantier
     *
     * @param string $typeChantier
     *
     * @return Estimation
     */
    public function setTypeChantier($typeChantier)
    {
        $this->typeChantier = $typeChantier;

        return $this;
    }

    /**
     * Get typeChantier
     *
     * @return string
     */
    public function getTypeChantier()
    {
        return $this->typeChantier;
    }

    /**
     * Set typeBatiment
     *
     * @param string $typeBatiment
     *
     * @return Estimation
     */
    public function setTypeBatiment($typeBatiment)
    {
        $this->typeBatiment = $typeBatiment;

        return $this;
    }

    /**
     * Get typeBatiment
     *
     * @return string
     */
    public function getTypeBatiment()
    {
        return $this->typeBatiment;
    }

    /**
     * Set temperatureMoyenne
     *
     * @param integer $temperatureMoyenne
     *
     * @return Estimation
     */
    public function setTemperatureMoyenne($temperatureMoyenne)
    {
        $this->temperatureMoyenne = $temperatureMoyenne;

        return $this;
    }

    /**
     * Get temperatureMoyenne
     *
     * @return int
     */
    public function getTemperatureMoyenne()
    {
        return $this->temperatureMoyenne;
    }
    
    public function setClient($client)
    {
    	$this->client = $client;
    
    	return $this;
    }
    
    
    public function getClient()
    {
    	return $this->client;
    }
    /**
     * Set anneesBatiment
     *
     * @param integer $anneesBatiment
     *
     * @return Estimation
     */
    public function setAnneesBatiment($anneesBatiment)
    {
        $this->anneesBatiment = $anneesBatiment;
        
        return $this;
    }
    
    /**
     * Get anneesBatiment
     *
     * @return int
     */
    public function getAnneesBatiment()
    {
        return $this->anneesBatiment;
    }
}
