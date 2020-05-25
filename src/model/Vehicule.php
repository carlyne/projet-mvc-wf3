<?php 

namespace App\Model;

class Vehicule {
    /** var int */
    private $_idVehicule;
    /** var string */
    private $_marque;
    /** var string */
    private $_modele;
    /** var string */
    private $_couleur;
    /** var string */
    private $_immatriculation;

    public function getId() : int {
        return $this->_idVehicule;
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
        $this->_idVehicule = $id;
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