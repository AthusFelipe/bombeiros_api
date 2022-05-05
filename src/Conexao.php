<?php

namespace App;

use PDO;

//WINDOWS 
// define('HOST', 'localhost');
// define('DBNAME', 'intranet');
// define('USER', 'root');
// define('PASS', '');

//LINUX
define('HOST', 'localhost');
define('DBNAME', 'intranet');
define('USER', 'devbombeiro');
define('PASS', '193');





class Conexao extends PDO
{
    public $pdo;

    public static function conectar()
    {
        $pdo =  new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASS);
        // $pdo = new PDO("mysql:host=localhost;dbname=intranet", "devbombeiro", "193");
        return $pdo;
    }

    public function __construct($pdo)
    {

        $this->pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASS);
        //  $this->pdo = new PDO("mysql:host=localhost;dbname=intranet", "root", "");
        // $this->pdo = new PDO("mysql:host=localhost;dbname=intranet", "devbombeiro", "193");
        return $pdo;
    }
}
