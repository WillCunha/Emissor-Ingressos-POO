<?php

use App\Entity\Evento;
use App\Entity\Ingresso;
use App\Entity\IngressoVenda;
use App\File\Upload;

require __DIR__ . '/vendor/autoload.php';

define('TITULOPAGE', 'Gerar novo evento');

$obEvento = new Evento();
$ingressos = new Ingresso();
$ingressoVenda = new IngressoVenda();

$obIngressos = $ingressos->getIngressos();
$nomeArquivo = '';

if (isset($_POST['titulo'], $_POST['data'], $_POST['local'])) {

    if (isset($_FILES['arquivo'])) {
        $upload = new Upload($_FILES['arquivo']);
        $upload->generateNewName();
        $sucesso = $upload->upload(__DIR__ . '/src/images');
        if ($sucesso) {
            $nomeArquivo = $upload->getBasename();
        }

    }
    $obEvento->titulo = $_POST['titulo'];
    $obEvento->data =  $_POST['data'];
    $obEvento->local = $_POST['local'];
    $obEvento->descricao = $_POST['descricao'];
    $obEvento->imagem = '/src/images/' . $nomeArquivo;
    $idEvento = $obEvento->criaEvento();

    $ingressoVenda->idIngresso = $_POST['idIngresso'];
    $ingressoVenda->nomeIngresso = $_POST['nomeIngresso'];
    $ingressoVenda->valor = $_POST['valorIngresso'];
    $ingressoVenda->quantidade = $_POST['quantidadeIngresso'];
    $ingressoVenda->prazo = $_POST['dataIngresso'];
    $ingressoVenda->idEvento = $idEvento;
    $ingressoVenda->geraIngresso();
            

    header('Location: index.php');
    exit;
}

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/form_criaEvento.php';
require __DIR__ . '/includes/footer.php';
