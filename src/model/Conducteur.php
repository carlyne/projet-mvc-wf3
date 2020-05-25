<?php 

namespace App\Model;

class Conducteur {
    /** var int */
    private $_idConducteur;
    /** var string */
    private $_prenom;
    /** var string */
    private $_nom;

    public function __construct(int $id, string $prenom, string $nom) 
    {
        $this->_idConducteur = $id;
        $this->_prenom = $prenom;
        $this->_nom = $nom;
    }

    public function getId() : int {
        return $this->_idConducteur;
    }

    public function getPrenom() : string {
        return $this->_prenom;
    }

    public function getNom() : string {
        return $this->_nom;
    }
    
    public function setId(int $id) : self {
        $this->_idConducteur = $id;
        return $this;
    }

    public function setPrenom(string $prenom) : self {
        $this->_prenom = $prenom;
        return $this;
    }

    public function setNom(string $nom) : self {
        $this->_nom = $nom;
        return $this;
    }

}

?>