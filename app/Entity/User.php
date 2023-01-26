<?php

namespace App\Entity;

use App\Database\Database;
use \PDO;

class User
{

    /**
     * Id do Usuário
     * @var integer
     */
    public $id;

    /**
     * Cpf identificador do usuario 
     * @var string
     */
    public $cpf;

    /**
     * Hash da senha do usuario
     * @var string
     */
    public $senha;

    public static function getUserCPF($cpf){
        return (new Database("usuarios"))->select('cpf =  "'.$cpf.'"')
                                            ->fetchObject(self::class);
    }

}