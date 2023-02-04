<?php

use App\Entity\Ingresso;
use App\Session\Login;

require __DIR__.'/vendor/autoload.php';

Login::requireLogin();



if(isset($_POST['titulo'], $_POST['valor'])){
    $ingressoNovo = new Ingresso();
    $ingressoNovo->titulo = $_POST['titulo'];
    $ingressoNovo->valor = $_POST['valor'];
    $ingressoNovo->ativo = 's';
    $ingressoNovo->criarIngresso();

    header('Location: cria_ingresso.php');
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form_criaIngresso.php';
include __DIR__.'/includes/footer.php';


?>