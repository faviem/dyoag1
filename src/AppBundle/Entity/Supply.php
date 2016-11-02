<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Supply
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SupplyRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Supply {

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var dateCreation la date de offre.
     *
     *
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="datetime", nullable = true)
     *
     * @var \DateTime
     */
    private $dateMiseAjour;

    /**
     * @ORM\Column(type="datetime", nullable = true)
     *
     * @var \DateTime
     */
    private $dateLivraison;

    /**
     * @var quantite
     *
     *
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @var permanent boolean. Approvisionnement permanent
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $permanent = false;

    /**
     * @var accepted boolean. offre accepte
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $accepted = false;

    /**
     * @var delivered boolean. offre livre
     * @ORM\Column(name="offre_livre", type="boolean", options={"default" : false})
     */
    private $delivered = false;

    /**
     * @ORM\ManyToOne(targetEntity="Demand", inversedBy="supplies")
     */
    private $demand;

    /**
     * @var User\User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User\User", inversedBy="supplies")
     */
    private $user;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set createdAt
     * *
     * @ORM\PrePersist
     */
    public function setDateCreation() {
        $this->dateCreation = new \DateTime();
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation() {
        return $this->dateCreation;
    }

    /**
     * Set dateMiseAjour
     *
     * @ORM\PreUpdate
     */
    public function setDateMiseAjour() {
        $this->dateMiseAjour = new \DateTime();
    }

    /**
     * Get dateMiseAjour
     *
     * @return \DateTime
     */
    public function getDateMiseAjour() {
        return $this->dateMiseAjour;
    }

    /**
     * Set dateLivraison
     *
     * @param \DateTime $dateLivraison
     *
     * @return Supply
     */
    public function setDateLivraison($dateLivraison) {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * Get dateLivraison
     *
     * @return \DateTime
     */
    public function getDateLivraison() {
        return $this->dateLivraison;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Supply
     */
    public function setQuantite($quantite) {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite() {
        return $this->quantite;
    }

    /**
     * Set permanent
     *
     * @param boolean $permanent
     *
     * @return Supply
     */
    public function setPermanent($permanent) {
        $this->permanent = $permanent;

        return $this;
    }

    /**
     * Get permanent
     *
     * @return boolean
     */
    public function getPermanent() {
        return $this->permanent;
    }

    /**
     * Set accepted
     *
     * @param boolean $accepted
     *
     * @return Supply
     */
    public function setAccepted($accepted) {
        $this->accepted = $accepted;

        return $this;
    }

    /**
     * Get accepted
     *
     * @return boolean
     */
    public function getAccepted() {
        return $this->accepted;
    }

    /**
     * Set delivered
     *
     * @param boolean $delivered
     *
     * @return Supply
     */
    public function setDelivered($delivered) {
        $this->delivered = $delivered;

        return $this;
    }

    /**
     * Get delivered
     *
     * @return boolean
     */
    public function getDelivered() {
        return $this->delivered;
    }

    /**
     * Set demand
     *
     * @param \AppBundle\Entity\Demand $demand
     *
     * @return Supply
     */
    public function setDemand(\AppBundle\Entity\Demand $demand = null) {
        $this->demand = $demand;

        return $this;
    }

    /**
     * Get demand
     *
     * @return \AppBundle\Entity\Demand
     */
    public function getDemand() {
        return $this->demand;
    }

}
