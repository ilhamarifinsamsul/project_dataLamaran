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

