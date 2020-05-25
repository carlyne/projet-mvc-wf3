<?php

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

// Modifications
$router->post('conducteur/create', 'ConducteurController@create');

$router->run();