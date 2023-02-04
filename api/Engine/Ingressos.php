<?php

use App\Database\Database;
use App\Entity\IngressoVenda;
use App\Entity\Evento;

if ($acao == '' || $param == '') {
    echo json_encode(["Erro" => "Acao nao permitida!"]);
    exit;
}
if ($acao == 'online') {
    $dadosIngressos = IngressoVenda::getIngressoAVenda($param);
    if ($dadosIngressos) {
        echo json_encode(["dados" => $dadosIngressos]);
    } else {
        echo json_encode(["dados" => "Nao ha dados!"]);
    }
} else if ($acao == 'pdv') {
    $dadosIngressos = Evento::getEventoData($param);
    if ($dadosIngressos) {
        echo json_encode(["dados" => $dadosIngressos]);
    } else {
        echo json_encode(["dados" => 0]);
    }
} else {
    echo json_encode(["Erro" => "Acao nao permitida!"]);
    exit;
}
