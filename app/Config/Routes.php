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
$routes->setDefaultController('Usuarios');
$routes->setDefaultMethod('login');
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
$routes->get('/', 'Usuarios::login');
$routes->get('/index', 'Home::index');

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
$routes->get('productos/buscarPorCodigo/(:num)', 'Productos::buscarPorCodigo/$1');

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
$routes->post('configuracion/actualizar', 'Configuracion::actualizar');
// rutas get
$routes->get('configuracion', 'Configuracion::index');

// Cajas
// rutas post 
$routes->post('cajas/insertar', 'Cajas::insertar');
$routes->post('cajas/actualizar', 'Cajas::actualizar');
// rutas get
$routes->get('cajas', 'Cajas::index');
$routes->get('cajas/nuevo', 'Cajas::nuevo');
$routes->get('cajas/editar/(:num)', 'Cajas::editar/$1');
$routes->get('cajas/eliminar/(:num)', 'Cajas::eliminar/$1');
$routes->get('cajas/eliminados', 'Cajas::eliminados');
$routes->get('cajas/reingresar/(:num)', 'Cajas::reingresar/$1');

// Usuarios
// rutas post 
$routes->post('usuarios/insertar', 'Usuarios::insertar');
$routes->post('usuarios/actualizar', 'Usuarios::actualizar');
$routes->post('usuarios/actualizar_password', 'Usuarios::actualizar_password');
$routes->post('usuarios/valida', 'Usuarios::valida');
// rutas get
$routes->get('usuarios/logout', 'Usuarios::logout');
$routes->get('usuarios/cambia_password', 'Usuarios::cambia_password');
$routes->get('usuarios', 'Usuarios::index');
$routes->get('usuarios/nuevo', 'Usuarios::nuevo');
$routes->get('usuarios/editar/(:num)', 'Usuarios::editar/$1');
$routes->get('usuarios/eliminar/(:num)', 'Usuarios::eliminar/$1');
$routes->get('usuarios/eliminados', 'Usuarios::eliminados');
$routes->get('usuarios/reingresar/(:num)', 'Usuarios::reingresar/$1');

// Roles
// rutas post 
$routes->post('roles/insertar', 'Roles::insertar');
$routes->post('roles/actualizar', 'Roles::actualizar');
// rutas get
$routes->get('roles', 'Roles::index');
$routes->get('roles/nuevo', 'Roles::nuevo');
$routes->get('roles/editar/(:num)', 'Roles::editar/$1');
$routes->get('roles/eliminar/(:num)', 'Roles::eliminar/$1');
$routes->get('roles/eliminados', 'Roles::eliminados');
$routes->get('roles/reingresar/(:num)', 'Roles::reingresar/$1');

// Compras
// rutas post 
$routes->post('compras/guarda', 'Compras::guarda');
$routes->post('compras/actualizar', 'Compras::actualizar');
// rutas get
$routes->get('compras', 'Compras::index');
$routes->get('compras/nuevo', 'Compras::nuevo');
$routes->get('compras/editar/(:num)', 'Compras::editar/$1');
$routes->get('compras/eliminar/(:num)', 'Compras::eliminar/$1');
$routes->get('compras/eliminados', 'Compras::eliminados');
$routes->get('compras/reingresar/(:num)', 'Compras::reingresar/$1');
