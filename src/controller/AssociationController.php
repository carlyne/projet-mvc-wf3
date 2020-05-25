<?php 

namespace App\Controller;

use App\Model\AssociationQuery;
use App\Model\ConducteurQuery;
use App\Model\VehiculeQuery;

class AssociationController extends AbstractController {

    static public function listAll() : void {
        $conducteurQuery = new ConducteurQuery('conducteur');
        $conducteurs = $conducteurQuery->findAll();

        $vehiculeQuery = new VehiculeQuery('vehicule');
        $vehicules = $vehiculeQuery->findAll();

        $associationQuery = new AssociationQuery($conducteurQuery, $vehiculeQuery);
        $associations = $associationQuery->findAll();

        echo self::getTwig()->render('association/index.html', [
            'associations' => $associations,
            'conducteurs' => $conducteurs,
            'vehicules' => $vehicules,
        ]);
    }

    static public function create() : void 
    {
        // futur : gérer ça en array
        $conducteur = $_POST['conducteur'];
        $vehicule = $_POST['vehicule'];

        $associationQuery = new AssociationQuery();

        $associationQuery->createOne($conducteur, $vehicule);
        self::listAll();
    }

}

?>