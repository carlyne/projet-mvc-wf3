<?php 

namespace App\Model;

class Association {
    /** @var int */
    private $_id;
    /** @var Vehicule */
    private $_vehicule;
    /** @var Conducteur */
    private $_conducteur;

    public function __construct(int $id, Conducteur $conducteur, Vehicule $vehicule) 
    {
        $this->_id = $id;
        $this->_vehicule = $vehicule;
        $this->_conducteur = $conducteur;
    }

    public function getId() : int {
        return $this->_id;
    }

    public function getVehicule() : Vehicule {
        return $this->_vehicule;
    }
    
    public function getConducteur() : Conducteur {
        return $this->_conducteur;
    }
}

?>