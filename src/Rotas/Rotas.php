<?php

namespace App\Rotas;

use App\Controllers\UsuariosController;
use App\DAO\UsuariosDAO;
use App\Models\Usuarios as ModelsUsuarios;
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Models\Usuarios;



use Slim\App;

return function (App $app) {

    $app->group('/usuarios', function (RouteCollectorProxy $group) {

        $group->get('', [UsuariosController::class, 'getAllUsuarios']);



        $group->post('', [UsuariosController::class, 'getUsuario']);


        $group->get('/{codfunc}', [UsuariosController::class, 'getUsuario']);

        $group->post('/cadastrar', [UsuariosController::class, 'postNovoUsuario']);



        $group->post('/delete', [UsuariosController::class, 'deleteUsuario']);
        $group->post('/delete/{codfunc}', [UsuariosController::class, 'deleteUsuario']);
    });
};
