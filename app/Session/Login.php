<?php

namespace App\Session;

class Login{


    public static function init(){
        //VERIFICA O STATUS DA SESSÃO
        if(session_status() !== PHP_SESSION_ACTIVE){
            //INICIA A SESSÃO
            session_start();
        }
    }

    public static function getUserLogado(){
        self::init();

        return self::isLogged() ? $_SESSION['user'] : null;
    }


    /**
     * Método que inicia o user
     * @param $usuario
     */
    public static function login($usuario){
        //Chama o método que fará o início da sessão
        self::init();

        $_SESSION['user'] = [
            'id' => $usuario->id,
            'nome' => $usuario->nome,
            'cpf' => $usuario->cpf,
            'email' => $usuario->email
        ];

        header ('Location: index.php');
        exit;
    }

    public static function logout(){
        self::init();

        unset( $_SESSION['user'] );

        header('Location: login.php');
        exit;
    }

    /**
     * Método que verifica se o usuario está logado
     * @return boolean
     */
    public static function isLogged(){
        self::init();

        return isset($_SESSION['user']['id']);
    }   

    /**
     * Método que requere o login nas páginas em que se fazem necessário.
     */
    public static function requireLogin(){
        if(!self::isLogged()){
            header('Location: login.php');
            exit;
        }
    }

    public static function requireLogout(){
        if(self::isLogged()){
            header('Location: index.php');
            exit;
        }
    }


}


