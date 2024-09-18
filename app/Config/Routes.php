<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->post('/authcontroller/proses_login', 'AuthController::proses_login');
$routes->get('/authcontroller', 'AuthController::index');
$routes->get('/authcontroller/index', 'AuthController::index');
$routes->get('/authcontroller/register', 'AuthController::register');
$routes->post('authcontroller/register', 'AuthController::registered');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/logout', 'AuthController::logout');

$routes->resource('master/portal', ['controller' => 'Portal']);
$routes->get('master/portal(:any)', 'Portal::edit/$1');
$routes->get('master/portal(:any)', 'Portal::update/$1');
$routes->post('master/portal(:any)', 'Portal::update/$1');
$routes->put('master/portal(:any)', 'Portal::update/$1');

$routes->resource('master/lamaran', ['controller' => 'Lamaran']);
$routes->get('master/lamaran(:any)', 'Lamaran::edit/$1');
$routes->get('master/lamaran(:any)', 'Lamaran::update/$1');
$routes->post('master/lamaran(:any)', 'Lamaran::update/$1');
$routes->put('master/lamaran(:any)', 'Lamaran::update/$1');

$routes->resource('users', ['controller' => 'Users']);
$routes->get('users(:any)', 'Users::edit/$1');
$routes->get('users(:any)', 'Users::update/$1');
$routes->post('users(:any)', 'Users::update/$1');
$routes->put('users(:any)', 'Users::update/$1');
