<?php

use App\Entity\DadosVenda;
use App\Entity\IngressoVenda;
use App\Entity\Evento;
use App\Session\Login;

require __DIR__ . '/vendor/autoload.php';
Login::requireLogin();

define('TITULO', 'Dashboard: ');
define('TITULOPAGE', 'Dashboard: ');

$obIngressos = new IngressoVenda();
$info = new DadosVenda();

//Seleciona o nome do Evento com base no id da URL
$evento = Evento::getEvento($_GET['id']);

//Seleciona os Ingressos do evento com base no id da URL
$ingressos = $obIngressos->getIngressoAVenda($_GET['id']);

//Seleciona os números do Evento com base no id da URL
$obEvento = $info->getData($_GET['id']);
$graficoIngresso = $info->getDataIngresso($_GET['id']);

if(isset($_POST['observacoes'])){
    
    $obIngressos->idIngresso = $_POST['idIngresso'];
    $obIngressos->obs_etiqueta = $_POST['observacoes'];
    $obIngressos->atualizaObs();

}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/tela_graficos.php';
include __DIR__ . '/includes/footer.php';
