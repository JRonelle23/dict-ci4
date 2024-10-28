<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/about', 'AboutController::index', ['filter' => 'guestFilter']);
$routes->get('/contactus', 'ContactUsController::index');

$routes->resource('/job_posting',  ['controller' => 'JobPostsController', 'filter' => 'authFilter']);

$routes->get('/register', 'auth\RegisterController::index');
$routes->post('/register', 'auth\RegisterController::create');

$routes->get('/login', 'auth\LoginController::index');
$routes->post('/authenticate', 'auth\LoginController::authenticate');
$routes->post('/logout', 'auth\LoginController::logout');