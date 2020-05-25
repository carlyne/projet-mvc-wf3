<?php

use App\Controller\VehiculeController;
use Bramus\Router\Router;

$router = new Router();
$router->setNamespace('App\Controller');


// Navigation Principale
$router->get('/', 'HomepageController@index');
$router->get('/conducteur', 'ConducteurController@listAll');
$router->get('/association', 'VehiculeConducteurController@listAll');
$router->get('/vehicule', 'VehiculeController@listAll');

// Navigation Modification
$router->get('/conducteur/new', 'ConducteurController@new');
$router->get('/vehicule/new', 'VehiculeController@new');

$router->get('/vehicule/edit/(\d+)', function($id) {
   VehiculeController::edit($id);
});


// Modifications
$router->post('conducteur/create', 'ConducteurController@create');
$router->post('vehicule/create', 'VehiculeController@create');

$router->post('/vehicule/update/(\d+)', function($id) {
    VehiculeController::update($id);
});

$router->run();