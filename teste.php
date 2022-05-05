<?php
require __DIR__ . '/vendor/autoload.php';

use App\Conexao;
use App\DAO\UsuariosDAO;
use App\Models\Usuarios;

$conn = Conexao::conectar();
