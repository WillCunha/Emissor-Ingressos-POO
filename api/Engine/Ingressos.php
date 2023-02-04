<?php

use App\Database\Database;
use App\Entity\IngressoVenda;
use App\Entity\Evento;
//|| $param == ''

if ($acao == '') {
    echo json_encode(["Erro:" => "Ação não permitida"]);
} else if ($acao != '' && $param == '') {
    $eventos = Evento::getEventos();
    if ($eventos) {
        echo json_encode(["dados" => $eventos]);
    }
} else if ($acao != '' && $param != '') {
    if ($acao == 'ingressos') {
        $dadosIngressos = IngressoVenda::getIngressoAVenda($param);
        if ($dadosIngressos) {
            echo json_encode(["dados" => $dadosIngressos]);
        } else {
            echo json_encode(["dados" => "Nao ha dados!"]);
        }
    } else if ($acao == 'evento-data') {
        $dadosIngressos = Evento::getEventoData($param);
        if ($dadosIngressos) {
            echo json_encode(["dados" => $dadosIngressos]);
        } else {
            echo json_encode(["dados" => 0]);
        }
    }
}
