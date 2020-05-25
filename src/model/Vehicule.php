<?php 

namespace App\Model;

class Vehicule {
    /** @var int */
    private $_id;
    /** @var string */
    private $_marque;
    /** @var string */
    private $_modele;
    /** @var string */
    private $_couleur;
    /** @var string */
    private $_immatriculation;

    public function __construct(int $id, string $marque, string $modele, string $couleur, string $immatriculation) 
    {
        $this->_id = $id;
        $this->_marque = $marque;
        $this->_modele = $modele;
        $this->_couleur = $couleur;
        $this->_immatriculation = $immatriculation;
    }

    public function getId() : int {
        return $this->_id;
    }

    public function getMarque() : string {
        return $this->_marque;
    }

    public function getModele() : string {
        return $this->_modele;
    }

    public function getCouleur() : string {
        return $this->_couleur;
    }

    public function getImmatriculation() : string {
        return $this->_immatriculation;
    }

    
    public function setId(int $id) : self {
        $this->_id = $id;
        return $this;
    }

    public function setMarque(string $marque) : self {
        $this->_marque = $marque;
        return $this;
    }

    public function setModele(string $modele) : self {
        $this->_modele = $modele;
        return $this;
    }

    public function setCouleur(string $couleur) : self {
        $this->_couleur = $couleur;
        return $this;
    }

    public function setImmatriculation(string $immatriculation) : self {
        $this->immatriculation = $immatriculation;
        return $this;
    }
}

?>