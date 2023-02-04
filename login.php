<?php

require __DIR__.'/vendor/autoload.php';

use App\Entity\User;
use App\Session\Login;
Login::requireLogout();

$alertaLogin = '';

if(isset($_POST['acao'])){

        //faz a busca do usuário pelo cpf
        $usuario = User::getUserCPF($_POST['cpf']);
        if($usuario instanceof User || password_verify($_POST['senha'],$usuario->senha)){            
            Login::login($usuario);
            exit;
        }
        $alertaLogin = 'Usuário e/ou senha incorretos';
}

include __DIR__.'/includes/header-login.php';
include __DIR__.'/includes/form-login.php';
include __DIR__.'/includes/footer.php';
