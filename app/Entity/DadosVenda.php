<?php

namespace App\Entity;

use App\Database\Database;
use PDO;

class DadosVenda
{

    /**
     * ID do Evento
     * @var int
     */
    public $id;

    /**
     * Dados do Ingresso
     * @var string
     */
    public $buscaDados;

    /**
     * Método que conta a quantidade de ingressos vendidos do evento
     * @param string $id
     * 
     */
    static public function getData($id)
    {
        return (new Database('vendas'))->selectSum('id_evento = ' . $id, 'quantidade')
            ->fetchColumn();
    }


    /**
     * Método que retorna todos os ingressos vendidos do evento
     * @param string $id
     */
    static public function getDataIngresso($id)
    {
        $dados = new Database('vendas');
        $buscaDados = $dados->select('id_evento = ' . $id)->fetchAll(PDO::FETCH_ASSOC);
        return $buscaDados;
    }
}
