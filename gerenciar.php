<?php

use App\Entity\DadosVenda;
use App\Entity\IngressoVenda;
use App\Entity\Evento;

require __DIR__ . '/vendor/autoload.php';

define('TITULO', 'Dashboard: ');
define('TITULOPAGE', 'Dashboard: ');

$info = new DadosVenda();

//Seleciona o nome do Evento com base no id da URL
$evento = Evento::getEvento($_GET['id']);

//Seleciona os Ingressos do evento com base no id da URL
$ingressos = IngressoVenda::getIngressoAVenda($_GET['id']);

//Seleciona os números do Evento com base no id da URL
$obEvento = $info->getData($_GET['id']);
$graficoIngresso = $info->getDataIngresso($_GET['id']);

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/tela_graficos.php';
include __DIR__ . '/includes/footer.php';
