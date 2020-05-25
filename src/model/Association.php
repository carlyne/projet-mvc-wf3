<?php 

namespace App\Model;

class Association {
    /** @var int */
    private $_id;
    /** @var Conducteur */
    private $_conducteur;
    /** @var Vehicule */
    private $_vehicule;

    public function __construct(int $id, Conducteur $conducteur = null, Vehicule $vehicule = null) 
    {
        $this->_id = $id;
        $this->_conducteur = $conducteur;
        $this->_vehicule = $vehicule;
    }

    public function getId() : int {
        return $this->_id;
    }

    public function getVehicule() : ?Vehicule {
        return $this->_vehicule;
    }
    
    public function getConducteur() : ?Conducteur {
        return $this->_conducteur;
    }
}

?>