<?php

require __DIR__.'/vendor/autoload.php';

use App\Entity\User;
use App\Session\Login;

//$senha = password_hash('cunha155', PASSWORD_DEFAULT);

$alertaLogin = '';

if(isset($_POST['acao'])){

        //faz a busca do usuário pelo e-mail
        $usuario = User::getUserCPF($_POST['cpf']);
        if(!$usuario instanceof User || !password_verify($_POST['senha'], $usuario->senha)){
            $alertaLogin = 'Usuário e/ou senha incorretos';
        }
        Login::login($usuario);
        exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form-login.php';
include __DIR__.'/includes/footer.php';
