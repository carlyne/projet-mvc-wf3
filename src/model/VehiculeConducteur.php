<?php 

namespace App\Model;

class VehiculeConducteur {
    /** var int */
    private $_idAssociation;
    /** var int */
    private $_idVehicule;
    /** var int */
    private $_idConducteur;

    public function getId() : int {
        return $this->_idAssociation;
    }

    public function getIdVehicule() : int {
        return $this->_idVehicule;
    }

    public function getIdConducteur() : int {
        return $this->_idConducteur;
    }

    public function setId(int $id) : self {
        $this->_idAssociation = $id;
        return $this;
    }

    public function setIdVehicule(int $vehicule) : self {
        $this->_idVehicule = $vehicule;
        return $this;
    }

    public function setIdConducteur(int $conducteur) : self {
        $this->idConducteur = $conducteur;
        return $this;
    }
}

?>