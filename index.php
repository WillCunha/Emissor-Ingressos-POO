<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\DadosVenda;
use \App\Entity\Evento;
use \App\Session\Login;

date_default_timezone_set('America/Sao_Paulo');
Login::requireLogin();

require __DIR__ . '/includes/header.php';

$buscaEvento = new Evento();
$info = new DadosVenda();
$listaEventos = $buscaEvento->getEventos();
$nomeUser = $_SESSION['user']['nome'];



require __DIR__ . '/includes/lista-eventos.php';
require __DIR__ . '/includes/footer.php';
