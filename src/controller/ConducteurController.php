<?php 

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\Conducteur;
use App\Model\ConducteurQuery;

class ConducteurController extends AbstractController 
{
    static public function listAll() : void {
        // futur : mettre le nom de la table dans une variable
        $conducteurQuery = new ConducteurQuery('conducteur', ['*']);
        $conducteurs = $conducteurQuery->findAll();

        echo self::getTwig()->render('conducteur/index.html', [
            'conducteurs' => $conducteurs
        ]);
    }

    static public function listOne(int $id) : Conducteur {
        $conducteurQuery = new ConducteurQuery('conducteur');
        return $conducteurQuery->findOne($id);
    }

    static public function new() : void 
    {
        echo self::getTwig()->render('conducteur/new.html');
    }

    
    static public function create() : void 
    {   
        // futur : gérer ça en array dans la classe pour le réutiliser dans les autres fonctions
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];

        $conducteurQuery = new ConducteurQuery('conducteur');

        $conducteurQuery->createOne($prenom, $nom);
        self::listAll();
    }

    static public function update(int $id) : void {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];

        $conducteurQuery = new ConducteurQuery('conducteur');

        $conducteurQuery->updateOne($id, $prenom, $nom);
        self::listAll();
    }

    static public function edit(int $id) : void {
        $conducteur = self::listOne($id);

        echo self::getTwig()->render(
            'conducteur/edit.html',
            ['conducteur' => $conducteur]
        );
    }
}

?>