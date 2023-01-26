<?php

use App\Entity\Evento;
use App\Entity\IngressoVenda;
use App\File\Upload;

require __DIR__.'/vendor/autoload.php';

define('TITULO', 'Editar Evento');
define('TITULOPAGE', 'Editar o evento: ');

$obEvento = Evento::getEvento($_GET['id']);
$obIngressos = new IngressoVenda();
$dadosIngresso = $obIngressos->getIngressoAVenda($_GET['id']);

$nomeArquivo = '';

if(isset($_POST['titulo'], $_POST['local'])){

    if(isset($_FILES['arquivo'])){
        $upload = new Upload($_FILES['arquivo']);
        $upload->generateNewName();
        $sucesso = $upload->upload(__DIR__.'/src/images');
        if($sucesso){
            $nomeArquivo = $upload->getBasename();
        }
    }

    $obEvento->titulo = $_POST['titulo'];
    $obEvento->descricao = $_POST['descricao'];
    $obEvento->local = $_POST['local'];
    $obEvento->data = $_POST['data'];
    $obEvento->imagem = '/src/images/' . $nomeArquivo;
    $obEvento->atualizaEvento();

    $obIngressos->idIngresso = $_POST['idIngresso'];
    $obIngressos->valor = $_POST['valorIngresso'];
    $obIngressos->quantidade = $_POST['quantidadeIngresso'];
    $obIngressos->prazo = $_POST['dataIngresso'];
    $obIngressos->atualizaIngresso();

    header('Location: index.php');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form_editaEvento.php';
include __DIR__.'/includes/footer.php';

?>