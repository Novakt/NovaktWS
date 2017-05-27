<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chantier
 *
 * @ORM\Table(name="chantier")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ChantierRepository")
 */
class Chantier
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="lienImage", type="string", length=255)
     */
    private $lienImage;

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
     * @var int
     *
     * @ORM\Column(name="nbBatiment", type="smallint")
     */
    private $nbBatiment;

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
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var int
     *
     * @ORM\Column(name="etages", type="smallint")
     */
    private $etages;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Chantier
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
     * Set lienImage
     *
     * @param string $lienImage
     *
     * @return Chantier
     */
    public function setLienImage($lienImage)
    {
        $this->lienImage = $lienImage;

        return $this;
    }

    /**
     * Get lienImage
     *
     * @return string
     */
    public function getLienImage()
    {
        return $this->lienImage;
    }

    /**
     * Set secteur
     *
     * @param string $secteur
     *
     * @return Chantier
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
     * @return Chantier
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
     * Set nbBatiment
     *
     * @param integer $nbBatiment
     *
     * @return Chantier
     */
    public function setNbBatiment($nbBatiment)
    {
        $this->nbBatiment = $nbBatiment;

        return $this;
    }

    /**
     * Get nbBatiment
     *
     * @return int
     */
    public function getNbBatiment()
    {
        return $this->nbBatiment;
    }

    /**
     * Set typeChantier
     *
     * @param string $typeChantier
     *
     * @return Chantier
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
     * @return Chantier
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
     * @return Chantier
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

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Chantier
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }
    
    /**
     * Set description
     *
     * @param string $description
     *
     * @return Chantier
     */
    public function setDescription($description)
    {
    	$this->description = $description;
    
    	return $this;
    }
    
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
    	return $this->description;
    }

    /**
     * Set etages
     *
     * @param integer $etages
     *
     * @return Chantier
     */
    public function setEtages($etages)
    {
        $this->etages = $etages;

        return $this;
    }

    /**
     * Get etages
     *
     * @return int
     */
    public function getEtages()
    {
        return $this->etages;
    }
}

