<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
// unidades
// rutas post
$routes->post('unidades/insertar', 'Unidades::insertar');
$routes->post('unidades/actualizar', 'Unidades::actualizar');
// rutas get
$routes->get('unidades', 'Unidades::index');
$routes->get('unidades/nuevo', 'Unidades::nuevo');
$routes->get('unidades/eliminar/(:num)', 'Unidades::eliminar/$1');
$routes->get('unidades/editar/(:num)', 'Unidades::editar/$1');
$routes->get('unidades/eliminados', 'Unidades::eliminados');
$routes->get('unidades/reingresar/(:num)', 'Unidades::reingresar/$1');

// categorias
// rutas post 
$routes->post('categorias/insertar', 'Categorias::insertar');
$routes->post('categorias/actualizar', 'Categorias::actualizar');
// rutas get
$routes->get('categorias', 'Categorias::index');
$routes->get('categorias/nuevo', 'Categorias::nuevo');
$routes->get('categorias/editar/(:num)', 'Categorias::editar/$1');
$routes->get('categorias/eliminar/(:num)', 'Categorias::eliminar/$1');
$routes->get('categorias/eliminados', 'Categorias::eliminados');
$routes->get('categorias/reingresar/(:num)', 'Categorias::reingresar/$1');

// Productos
// rutas post 
$routes->post('productos/insertar', 'Productos::insertar');
$routes->post('productos/actualizar', 'Productos::actualizar');
// rutas get
$routes->get('productos', 'Productos::index');
$routes->get('productos/nuevo', 'Productos::nuevo');
$routes->get('productos/editar/(:num)', 'Productos::editar/$1');
$routes->get('productos/eliminar/(:num)', 'Productos::eliminar/$1');
$routes->get('productos/eliminados', 'Productos::eliminados');
$routes->get('productos/reingresar/(:num)', 'Productos::reingresar/$1');

// Clientes
// rutas post 
$routes->post('clientes/insertar', 'Clientes::insertar');
$routes->post('clientes/actualizar', 'Clientes::actualizar');
// rutas get
$routes->get('clientes', 'Clientes::index');
$routes->get('clientes/nuevo', 'Clientes::nuevo');
$routes->get('clientes/editar/(:num)', 'Clientes::editar/$1');
$routes->get('clientes/eliminar/(:num)', 'Clientes::eliminar/$1');
$routes->get('clientes/eliminados', 'Clientes::eliminados');
$routes->get('clientes/reingresar/(:num)', 'Clientes::reingresar/$1');

// Administracion / configuracion
// rutas post 
$routes->post('configuracion/insertar', 'Configuracion::insertar');
$routes->post('configuracion/actualizar', 'Configuracion::actualizar');
// rutas get
$routes->get('configuracion', 'Configuracion::index');
$routes->get('configuracion/nuevo', 'Configuracion::nuevo');
$routes->get('configuracion/editar/(:num)', 'Configuracion::editar/$1');
$routes->get('configuracion/eliminar/(:num)', 'Configuracion::eliminar/$1');
$routes->get('configuracion/eliminados', 'Configuracion::eliminados');
$routes->get('configuracion/reingresar/(:num)', 'Configuracion::reingresar/$1');
