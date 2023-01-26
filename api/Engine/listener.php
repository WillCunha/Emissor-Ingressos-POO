<?php

namespace Api\Eventos;

use Api\Engine\Venda;

if ($api == 'eventos') {
    if ($method == 'GET') {
        require_once('Ingressos.php');
    }else{
        $fp = fopen('php://input', 'r');
        $rawData = stream_get_contents($fp);
        $data =  json_decode($rawData);
        $venda = new Venda();
        $venda->id = $data->id;
        $venda->quantidade = $data->quantidade;
        $atualiza = $venda->atualiza();
    }
}
