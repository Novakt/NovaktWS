<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\OneToMany(targetEntity="EstimationProduit", mappedBy="idProduit")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="lienImage", type="string", length=255)
     */
    private $lienImage;
    /**
    * @ORM\ManyToMany(targetEntity="Estimation", inversedBy="produits")
    * @ORM\JoinTable(name="produits_estimations")
    * 
    */
    private $estimations;
    
    /**
     * @ORM\ManyToMany(targetEntity="Chantier", inversedBy="produits")
     * @ORM\JoinTable(name="produits_chantiers")
     *
     */
    private $chantiers;
    

    /**
     * @ORM\ManyToOne(targetEntity="Categorie",inversedBy="produits")
     * @ORM\JoinColumn(name="categorie_id",referencedColumnName="id")
     * @var \ApiBundle\Entity\Categorie
     */
    private $categorie;

    public function __construct() {
    	$this->estimations = new \Doctrine\Common\Collections\ArrayCollection();
    	$this->chantiers = new \Doctrine\Common\Collections\ArrayCollection();
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
    
    public function setId($id)
    {
    	$this->id = $id;
    
    	return $this;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Produit
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
     * Set type
     *
     * @param string $type
     *
     * @return Produit
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
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
     * Set lienImage
     *
     * @param string $lienImage
     *
     * @return Produit
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
     * Add estimation
     *
     * @param \ApiBundle\Entity\Estimation $estimation
     *
     * @return Produit
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
     * Add chantier
     *
     * @param \ApiBundle\Entity\Chantier $chantier
     *
     * @return Produit
     */
    public function addChantier(\ApiBundle\Entity\Chantier $chantier)
    {
        $this->chantiers[] = $chantier;

        return $this;
    }

    /**
     * Remove chantier
     *
     * @param \ApiBundle\Entity\Chantier $chantier
     */
    public function removeChantier(\ApiBundle\Entity\Chantier $chantier)
    {
        $this->chantiers->removeElement($chantier);
    }

    /**
     * Get chantiers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChantiers()
    {
        return $this->chantiers;
    }
}
