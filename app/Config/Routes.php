<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/about', 'AboutController::index');
$routes->get('/contactus', 'ContactUsController::index');

$routes->resource('/job_posting',  ['controller' => 'JobPostsController']);

