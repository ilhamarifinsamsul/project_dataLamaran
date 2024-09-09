<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->post('/authcontroller/proses_login', 'AuthController::proses_login');
$routes->get('/authcontroller', 'AuthController::index');
$routes->get('/dashboard', 'Dashboard::index');

$routes->resource('master/portal', ['controller' => 'Portal']);
$routes->get('master/portal(:any)', 'Portal::edit/$1');
$routes->get('master/portal(:any)', 'Portal::update/$1');
$routes->post('master/portal(:any)', 'Portal::update/$1');
$routes->put('master/portal(:any)', 'Portal::update/$1');

$routes->resource('master/lamaran', ['controller' => 'Lamaran']);

