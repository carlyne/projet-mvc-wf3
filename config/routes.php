<?php

use App\Controller\ConducteurController;
use App\Controller\VehiculeController;
use Bramus\Router\Router;

$router = new Router();
$router->setNamespace('App\Controller');


// Navigation Principale
$router->get('/', 'HomepageController@index');
$router->get('/conducteur', 'ConducteurController@listAll');
$router->get('/association', 'AssociationController@listAll');
$router->get('/vehicule', 'VehiculeController@listAll');

// Navigation Modification
$router->get('/vehicule/edit/(\d+)', function($id) {
    VehiculeController::edit($id);
});

$router->get('/conducteur/edit/(\d+)', function($id) {
    ConducteurController::edit($id);
});


// Modifications
$router->post('conducteur/create', 'ConducteurController@create');
$router->post('vehicule/create', 'VehiculeController@create');
$router->post('association/create', 'AssociationController@create');

$router->post('/vehicule/update/(\d+)', function($id) {
    VehiculeController::update($id);
});

$router->post('/conducteur/update/(\d+)', function($id) {
    ConducteurController::update($id);
});

$router->run();