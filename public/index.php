<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadControllers;
use Controllers\VendedorControllers;
use Controllers\PaginasControllers;

$router = new Router();

// Zona Privada
$router->get('/admin', [PropiedadControllers::class, 'index']);
$router->get('/propiedades/crear', [PropiedadControllers::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadControllers::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadControllers::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadControllers::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadControllers::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorControllers::class, 'crear']);
$router->post('/vendedores/crear', [VendedorControllers::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorControllers::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorControllers::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorControllers::class, 'eliminar']);

// Zona Pública
$router->get('/', [PaginasControllers::class, 'index']);
$router->get('/nosotros', [PaginasControllers::class, 'nosotros']);
$router->get('/propiedades', [PaginasControllers::class, 'propiedades']);
$router->get('/propiedad', [PaginasControllers::class, 'propiedad']);
$router->get('/blog', [PaginasControllers::class, 'blog']);
$router->get('/entrada', [PaginasControllers::class, 'entrada']);
$router->get('/contacto', [PaginasControllers::class, 'contacto']);
$router->post('/contacto', [PaginasControllers::class, 'contacto']);

$router->comprobarRutas();