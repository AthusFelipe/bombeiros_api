<?php


require __DIR__ . '/vendor/autoload.php';

use App\Usuarios;
use App\Controllers\UsuariosController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

$app = AppFactory::create();

$app->addRoutingMiddleware();

$errorMidleware = $app->addErrorMiddleware(true, true, true);


$routes = require "src/Rotas/Rotas.php";
$routes($app);






$app->run();
