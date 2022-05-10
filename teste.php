<?php
require __DIR__ . '/vendor/autoload.php';

use App\Conexao;
use App\DAO\UsuariosDAO;
use App\Models\JWT;
use App\Models\Usuarios;

$conn = Conexao::conectar();


$token = new JWT(1);

echo "<pre>";
print_r($token);
echo "</pre>";
