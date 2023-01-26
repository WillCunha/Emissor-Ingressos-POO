<?php

use App\Database\Database;
use App\Entity\IngressoVenda;

if ($acao == '' || $param == '') {
    echo json_encode(["Erro" => "Acao nao permitida!"]);
    exit;
}
if ($acao == 'ingressos') {
    $dadosIngressos = IngressoVenda::getIngressoAVenda($param);
    if ($dadosIngressos) {
        echo json_encode(["dados" => $dadosIngressos]);
    } else {
        echo json_encode(["dados" => "Nao ha dados!"]);
    }
} else {
    echo json_encode(["Erro" => "Acao nao permitida!"]);
    exit;
}
