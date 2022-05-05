<?php

declare(strict_types=1);

namespace App\Controllers;

use App\DAO\UsuariosDAO;
use App\Models\Usuarios;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class UsuariosController
{



    public function getAllUsuarios(Request $request, Response $response, $args)
    {
        $objUsuario = new UsuariosDAO;

        $response->getBody()->write(json_encode($objUsuario->listarTodos()));
        return $response->withHeader('Content-type', 'application/json');
    }

    public function getUsuario(Request $request, Response $response, $args)

    {
        if ($request->getParsedBody() !== null) {
            $dados = $request->getParsedBody();
            $codfunc = $dados['codfunc'];
        } else {
            $codfunc = $args['codfunc'];
        }
        $militar = new UsuariosDAO;


        $response->getBody()->write(json_encode($militar->retornaMilitar($codfunc)));
        return $response;
    }


    public function postNovoUsuario(Request $request, Response $response, $args)
    {
        $dados = $request->getParsedBody();
        $nomeguerra = $dados['nomeguerra'];
        $cargo = $dados['cargo'];
        $nomeusuario = $dados['nomeusuario'];
        $senhausuario = $dados['senhausuario'];

        $novoMilitar = new Usuarios;

        $novoMilitar->novoUsuario($nomeguerra, $cargo, $nomeusuario, $senhausuario);




        $response->getStatusCode() == 200 ? $msgfinal = ['action' => 'true', 'msg' => 'success'] : $msgfinal = ['action' => 'false', 'msg' => 'fail'];

        $response->getBody()->write(json_encode($msgfinal));
        return $response;
    }


    public function deleteUsuario(Request  $request, Response  $response, $args)
    {
        if ($request->getParsedBody() == null) {
            $codfunc = $args['codfunc'];
        } else {
            $dados = $request->getParsedBody();
            $codfunc = $dados['codfunc'];
        }

        UsuariosDAO::removerUsuario($codfunc);

        $response->getBody()->write(json_encode(['msg' => 'success']));
        return $response;
    }
}
