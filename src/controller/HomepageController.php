<?php 

namespace App\Controller;

class HomepageController extends AbstractController {
    public static function index() : void {
        echo self::getTwig()->render('accueil.html');
    }
};

?>