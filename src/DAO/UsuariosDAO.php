<?php

namespace App\DAO;

use App\Conexao;
use App\Models\Usuarios;

class UsuariosDAO
{
    public array  $militar;
    private $conn;


    public function __construct()
    {

        $this->conn = Conexao::conectar();
    }

    public function cadastrarNovo_Usuario($nomeusuario, $senha, $cargo, $nomeguerra)
    {

        $this->conn->prepare('INSERT INTO usuarios (nomeusuario, senhausuario, nomeguerra, cargo) VALUES (?, ?, ?, ?)')
            ->execute([$nomeusuario, $senha, $nomeguerra, $cargo]);
    }




    public function retornaMilitar($id)
    {

        $user = $this->conn->query("SELECT codfunc, nivelacesso, nomeguerra, cargo FROM usuarios WHERE CODFUNC = $id")->fetch(Conexao::FETCH_ASSOC);
        return $user;
    }

    public function listarTodos()
    {

        $resultado =  $this->conn->query('SELECT codfunc, cargo, nomeguerra FROM usuarios')->fetchAll(Conexao::FETCH_ASSOC);
        return $resultado;
    }

    public function buscarUsuario(int $codfunc)
    {

        $resultado = $this->conn->query("SELECT codfunc, cargo, nomeguerra FROM usuarios WHERE codfunc = $codfunc")
            ->fetchAll(Conexao::FETCH_ASSOC);
        return $resultado;
    }

    public static function removerUsuario($id)
    {
        $s = new UsuariosDAO;
        $s->conn->prepare('DELETE FROM usuarios WHERE codfunc = ?')->execute([$id]);
    }
}
