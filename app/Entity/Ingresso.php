<?php

namespace App\Entity;

use App\Database\Database;
use \Pdo;

class Ingresso
{
    
    /**
     * Id do ingresso
     * @var string
     */
    public $id;

    /**
     * Nome do Ingresso
     * @var string
     */
    public $titulo;

    /**
     * Valor do ingresso
     * @var double
     */
    public $valor;

    /**
     * Verifica se o ingresso está ativo ou não
     * @var enum
     */
    public $ativo;

    /**
     * Função que gera o novo Ingresso
     * @return true
     */
    public function criarIngresso(){

        $obIngresso = new Database("ingresso");
        $this->id = $obIngresso->insert([
            'titulo' => $this->titulo,
            'valor' => $this->valor,
            'ativo' => $this->ativo
        ]);

    }

    /**
     * Função que pega os ingressos disponíveis
     * @param string $where
     * @param string $limit
     * @param string $order
     * @return array PDOStatement
     */
    public function getIngressos($where = null, $limit = null, $order = null){
        return (new Database("ingresso"))->select($where, $limit, $order)
                                        ->fetchAll(PDO::FETCH_CLASS, self::class);

    }

}
