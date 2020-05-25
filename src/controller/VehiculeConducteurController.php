<?php 

namespace App\Controller;

use App\Controller\AbstractController;

class VehiculeConducteurController extends AbstractController {
    static public function listAll() : void {
        echo self::getTwig()->render('association/index.html');
    }
}

?>