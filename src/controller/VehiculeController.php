<?php 

namespace App\Controller;

use App\Controller\AbstractController;

class VehiculeController extends AbstractController {
    static public function listAll() : void {
        echo self::getTwig()->render('vehicule/index.html');
    }
}

?>