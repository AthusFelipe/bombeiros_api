<?php

namespace App\Models;

use App\DAO\UsuariosDAO;

define('SENHA', 'athus123');

class JWT
{

    private $header;
    private $payload;
    private $sign;
    public $token;


    public function __construct($usuario, $senha)
    {
        $this->setHeader();
        $this->setPayload($usuario, $senha);
        $this->setSignToken();
        $this->setToken();
    }


    private function setHeader()
    {
        $content = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];

        $jsonContent = json_encode($content);
        $base64Content = base64_encode($jsonContent);
        $this->header = $base64Content;
    }


    private function setPayload($usuario, $senha)
    {
        $user = new UsuariosDAO;
        $militar = $user->loginUser($usuario, $senha);
        $content = [
            'codfunc' => $militar['codfunc'],
            'usuario' => $militar['cargo'] . $militar['nomeguerra']
        ];
        $jsonContent = json_encode($content);
        $base64Content = base64_encode($jsonContent);
        $this->payload = $base64Content;
    }

    private function setSignToken()
    {
        $sign = hash_hmac("sha256", $this->header . "." . $this->payload, SENHA, true);
        $this->sign = base64_encode($sign);
    }

    private function setToken()
    {
        $this->token = $this->header . '.' . $this->payload . '.' . $this->sign;
    }
}
