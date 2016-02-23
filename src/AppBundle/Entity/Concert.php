<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Concert
 *
 * @author pavithra
 */

/**
 * @ORM\Entity
 * @ORM\Table
 */
class Concert {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column
     */
    private $nom;
    
    /**
     * @ORM\Column
     */
    private $prix;
    
    /**
     * @ORM\Column
     */
    private $nbrPlace;
    
    /**
     * @ORM\Column(type="date")
     */
    private $date;
    
    /**
     * @ORM\Column(type="string")
     */
    private $numAddress;
    
    /**
     * @ORM\Column(type="string",length=250)
     */
    private $street1;
    
    /**
     * @ORM\Column(type="string",length=250,nullable=true)
     */
    private $street2;
    
    /**
     * @ORM\Column(length=5)
     */
    private $zipcode;
    
    /**
     * @ORM\Column(type="string")
     */
    private $city;
    
    
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function getPrix() {
        return $this->prix;
    }
    
    public function setPrix($prix) {
        $this->prix = $prix;
    }
    
    public function getNbrPlace() {
        return $this->nbrPlace;
    }
    
    public function setNbrPlace($nbrPlace) {
        $this->nbrPlace = $nbrPlace;
    }
    
    public function getDate() {
        return $this->date;
    }
    
    public function setDate($date) {
        $this->date = $date;
    }
    
    public function getNumAddress() {
        return $this->numAddress;
    }
    
    public function setNumAddress($numAddress) {
        $this->numAddress = $numAddress;
    }
    
    public function getStreet1() {
        return $this->street1;
    }
    
    public function setStreet1($street1) {
        $this->street1 = $street1;
    }
    
    public function getStreet2() {
        return $this->street2;
    }
    
    public function setStreet2($street2) {
        $this->street2 = $street2;
    }
    
    public function getZipcode() {
        return $this->zipcode;
    }
    
    public function setZipcode($zipcode) {
        $this->zipcode = $zipcode;
    }
    
    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }
}
