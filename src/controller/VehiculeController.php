<?php 

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\VehiculeQuery;

class VehiculeController extends AbstractController {
    static public function listAll() : void {
        $vehiculeQuery = new VehiculeQuery('vehicule', ['*']);
        $vehicules = $vehiculeQuery->findAll();

        echo self::getTwig()->render('vehicule/index.html', [
            'vehicules' => $vehicules
        ]);
    }

    static public function new() : void 
    {
        echo self::getTwig()->render('vehicule/new.html');
    }

    static public function create() : void 
    {
        // futur : gérer ça en array
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $couleur = $_POST['couleur'];
        $immatriculation = $_POST['immatriculation'];

        $vehiculeQuery = new VehiculeQuery('vehicule');

        $vehiculeQuery->createOne($marque, $modele, $couleur, $immatriculation);
        self::listAll();
    }
}

?>