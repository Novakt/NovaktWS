<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstimationProduit
 *
 * @ORM\Table(name="estimation_produit")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\EstimationProduitRepository")
 */
class EstimationProduit
{

    /**
     * @ORM\id
     * @ORM\ManyToOne(targetEntity="Estimation", inversedBy="id")
     * @ORM\JoinColumn(name="estimation_id", referencedColumnName="id")
     * @ORM\Column(name="idEstimation", type="integer")
     */
    private $idEstimation;

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
     * Set idEstimation
     *
     * @param integer $idEstimation
     *
     * @return EstimationProduit
     */
    public function setIdEstimation($idEstimation)
    {
        $this->idEstimation = $idEstimation;

        return $this;
    }

    /**
     * Get idEstimation
     *
     * @return int
     */
    public function getIdEstimation()
    {
        return $this->idEstimation;
    }

    /**
     * Set idProduit
     *
     * @param integer $idProduit
     *
     * @return EstimationProduit
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
     * @return EstimationProduit
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

