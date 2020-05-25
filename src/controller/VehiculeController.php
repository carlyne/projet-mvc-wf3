<?php 

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\Vehicule;
use App\Model\VehiculeQuery;

class VehiculeController extends AbstractController {
    static public function listAll() : void {
        $vehiculeQuery = new VehiculeQuery('vehicule', ['*']);
        $vehicules = $vehiculeQuery->findAll();

        echo self::getTwig()->render('vehicule/index.html', [
            'vehicules' => $vehicules
        ]);
    }

    static public function listOne(int $id) : Vehicule {
        $vehiculeQuery = new VehiculeQuery('vehicule');
        return $vehiculeQuery->findOne($id);
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

    static public function update(int $id) : void {
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $couleur = $_POST['couleur'];
        $immatriculation = $_POST['immatriculation'];

        $vehiculeQuery = new VehiculeQuery('vehicule');

        $vehiculeQuery->updateOne($id, $marque, $modele, $couleur, $immatriculation);
        self::listAll();
    }

    static public function edit(int $id) : void {
        $vehicule = self::listOne($id);

        echo self::getTwig()->render(
            'vehicule/edit.html',
            ['vehicule' => $vehicule]
        );
    }
}

?>