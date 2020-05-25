<?php 

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ConducteurQuery;

class ConducteurController extends AbstractController 
{
    static public function listAll() : void {
        $conducteurQuery = new ConducteurQuery('conducteur', ['*']);
        $conducteurs = $conducteurQuery->findAll();

        echo self::getTwig()->render('conducteur/index.html', [
            'conducteurs' => $conducteurs
        ]);
    }

    static public function new() : void 
    {
        echo self::getTwig()->render('conducteur/new.html');
    }

    
    static public function create() : void 
    {   
        // futur : gérer ça en array
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];

        $conducteurQuery = new ConducteurQuery('conducteur');

        $conducteurQuery->createOne($prenom, $nom);
        self::listAll();
    }
}

?>