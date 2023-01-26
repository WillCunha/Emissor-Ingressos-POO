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
    }

    /**
     * Atualiza os ingressos do evento especifico
     * @return boolean
     */
    public function atualizaIngresso(){
        $id = $this->idIngresso;
        $valor = $this->valor;
        $quantidade = $this->quantidade;
        $prazo = $this->prazo;

        $obDatabase = new Database('ingresso_avenda');
        for ($i = 0, $count = count($id); $i < $count; $i++){
            $this->id = $obDatabase->update('id =' .$id[$i], [
                'valor' => $valor[$i],
                'quantidade' => $quantidade[$i],
                'prazo' => $prazo[$i],
            ]);

        }

        return;

    }


    /**
     * Traz os ingressos do evento respectivo com os seus dados particulares
     * @param string id
     * @return IngressoAVenda
     */
    public static function getIngressoAVenda($id){
        return (new Database('ingresso_avenda'))->select('id_evento  =' .$id)
                                                    ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
