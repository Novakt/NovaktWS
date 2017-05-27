<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChantierProduit
 *
 * @ORM\Table(name="chantier_produit")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ChantierProduitRepository")
 */
class ChantierProduit
{
	/**
	 * @ORM\id
	 * @ORM\ManyToOne(targetEntity="Estimation", inversedBy="id")
	 * @ORM\JoinColumn(name="estimation_id", referencedColumnName="id")
	 * @ORM\Column(name="idChantier", type="integer")
	 */
	private $idChantier;
	
	/**
	 * @ORM\id
	 * @ORM\ManyToOne(targetEntity="Produit", inversedBy="id")
	 * @ORM\JoinColumn(name="produit_id", referencedColumnName="id")
	 * @ORM\Column(name="idProduit", type="integer")
	 */
	private $idProduit;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


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
     * Set idChantier
     *
     * @param integer $idChantier
     *
     * @return ChantierProduit
     */
    public function setIdChantier($idChantier)
    {
        $this->idChantier = $idChantier;

        return $this;
    }

    /**
     * Get idChantier
     *
     * @return int
     */
    public function getIdChantier()
    {
        return $this->idChantier;
    }

    /**
     * Set idProduit
     *
     * @param integer $idProduit
     *
     * @return ChantierProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    /**
     * Get idProduit
     *
     * @return int
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return ChantierProduit
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}

