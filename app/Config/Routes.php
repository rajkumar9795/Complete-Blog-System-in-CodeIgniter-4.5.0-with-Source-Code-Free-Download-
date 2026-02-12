<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('blogview/(:num)', 'Home::blogview/$1');
$routes->get('loginadmin', 'Home::loginpage');
$routes->post('login', 'Home::LoginUser');



//========== Admin===============
$routes->get('dashboard', 'Admin::index',['filter' => 'auth']);
$routes->get('blogindex', 'Admin::blogindex',['filter' => 'auth']);
$routes->get('blogNewRowCreate', 'Admin::blogNewRowCreate',['filter' => 'auth']);
$routes->get('blogadd/(:num)', 'Admin::blogadd/$1',['filter' => 'auth']);
$routes->post('blogupdate', 'Admin::blogupdate',['filter' => 'auth']);
$routes->post('blogimg', 'Admin::uploadImage', ['filter' => 'auth']);
$routes->post('delblogimg', 'Admin::delblogimg');
$routes->post('blogdelete', 'Admin::blogdelete', ['filter' => 'auth']);
$routes->get('logout', 'Admin::logout');