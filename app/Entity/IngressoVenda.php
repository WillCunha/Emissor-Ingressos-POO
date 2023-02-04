<?php

namespace App\Entity;

use App\Database\Database;

use \PDO;

class IngressoVenda
{

    /**
     * ID interno da tabela
     * @var string
     */
    public $id;

    /**
     * ID do respectivo ingresso
     * @array integer
     */
    public $idIngresso;

    /**
     * Nome do Ingresso
     * @var string
     */
    public $nomeIngresso;

    /**
     * ID do Evento
     * @var integer
     */
    public $idEvento;

    /**
     * Valor que o ingresso será vendido
     * @var array
     */
    public $valor;

    /**
     * Define o prazo de venda do ingresso
     * @var array
     */
    public $prazo;

    /**
     * Define o obs_etiqueta de venda do ingresso
     * @var array
     */
    public $obs_etiqueta;

    /**
     * Define o prazo de venda do ingresso
     * @var array
     */
    public $quantidade;



    /**
     * Gera o ingresso para a venda com seus valores
     * @return boolean
     */
    public function geraIngresso()
    {
        $id = $this->idIngresso;
        $nome = $this->nomeIngresso;
        $valor = $this->valor;
        $quantidade = $this->quantidade;
        $prazo = $this->prazo;
        $evento = $this->idEvento;


        $obDatabase = new Database("ingresso_avenda");
        $obIngresso = new Database("vendas");
        for ($i = 0, $count = count($id); $i < $count; $i++) {
            $this->id = $obDatabase->insert([
                'id_ingresso' => $id[$i],
                'nome_ingresso' => $nome[$i],
                'id_evento' => $evento,
                'valor' => $valor[$i],
                'quantidade' => $quantidade[$i],
                'prazo' => $prazo[$i],
            ]);
        }
        for ($i = 0, $count = count($id); $i < $count; $i++) {
            $this->id = $obIngresso->insert([
                'id_ingresso' => $id[$i],
                'nome_ingresso' => $nome[$i],
                'id_evento' => $evento,
            ]);
        }
    }

    /**
     * Atualiza os ingressos do evento especifico
     * @return boolean
     */
    public function atualizaIngresso()
    {
        $id = $this->idIngresso;
        $valor = $this->valor;
        $quantidade = $this->quantidade;
        $prazo = $this->prazo;
        $obs_etiqueta = $this->obs_etiqueta;

        $obDatabase = new Database('ingresso_avenda');
        for ($i = 0, $count = count($id); $i < $count; $i++) {
            $this->id = $obDatabase->update('id =' . $id[$i], [
                'valor' => $valor[$i],
                'quantidade' => $quantidade[$i],
                'prazo' => $prazo[$i],
                'obs_etiqueta' => $obs_etiqueta[$i],
            ]);
        }

        return;
    }
    /**
     * Atualiza os ingressos do evento especifico
     * @return boolean
     */
    public function atualizaObs()
    {
        $id = $this->idIngresso;
        $obs_etiqueta = $this->obs_etiqueta;

        $obDatabase = new Database('ingresso_avenda');
        $obIngresso = new Database('ingresso');
        for ($i = 0, $count = count($id); $i < $count; $i++) {
            $this->id = $obDatabase->update('id =' . $id[$i], [
                'obs_etiqueta' => $obs_etiqueta[$i],
            ]);
            $this->id = $obIngresso->update('id =' . $id[$i], [
                'obs_etiqueta' => $obs_etiqueta[$i],
            ]);
        }

        return;
    }


    /**
     * Traz os ingressos do respectivo evento com os seus dados particulares
     * @param string id
     * @return IngressoAVenda
     */
    public static function getIngressoAVenda($id)
    {
        return (new Database('ingresso_avenda'))->select('id_evento  =' . $id)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
