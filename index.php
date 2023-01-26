<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\DadosVenda;
use \App\Entity\Evento;
use \App\Session\Login;

Login::requireLogin();

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/includes/header.php';

$buscaEvento = new Evento();
$info = new DadosVenda();
$listaEventos = $buscaEvento->getEventos();



require __DIR__ . '/includes/lista-eventos.php';
require __DIR__ . '/includes/footer.php';
