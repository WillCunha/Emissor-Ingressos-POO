<?php

namespace Api\Engine;

use App\Database\Database;
use \Pdo;

class Venda
{

    /**
     * Define o ID do Ingresso na tabela de Ingressos a Venda.
     * @var string
     */
    public $id;

    /**
     * Define o ID do Evento na tabela de vendas.
     * @var string
     */
    public $id_evento;

    /**
     * Define a quantidade de ingressos que foram adquiridos.
     * @var integer
     */
    public $quantidade;

    /**
     * Define a quantidade de ingressos que há na tabela "vendas"
     */
    public $quantidadeNovaVendas;

    /**
     * Define a quantidade de ingressos que há na tabela "vendas"
     */
    public $quantidadeVendas;

    /**
     * Faz a seleção no banco de ingressos a venda
     */
    public $dadosDash;

    
    /**
     * Faz a seleção no banco de ingressos a venda
     */
    public $buscaIngressos;

    /**
     * Define o novo numero de ingressos disponível.
     * @var string
     */

    public $quantidadeNova;

    /**
     * Método que busca o ingresso citado no ID
     */
    public function atualiza()
    {
        $banco = new Database("ingresso_avenda");
        $this->buscaIngressos = $banco->select('id = ' . $this->id)->fetch();
        $this->quantidadeNova = $this->buscaIngressos['quantidade'] - $this->quantidade;
        $this->id_evento = $this->buscaIngressos['id_evento'];
        $this->resultado();
    }

    /**
     * Método que faz a atualização no banco sobre a quantidade nova de ingressos disponíveis
     * @return array
     */
    public function resultado()
    {
        $atualizaIngresso = new Database("ingresso_avenda");
        $atualizaIngresso->update('id = ' . $this->id, [
            'quantidade' => $this->quantidadeNova
        ]);
        $this->buscaDash();

    }

    /**
     * Recupera os dados da dash daquele evento e ingresso específicos.
     */
    public function buscaDash()
    {
        $buscaDash = new Database("vendas");
        $this->dadosDash = $buscaDash->select('id_evento = ' . $this->id_evento . ' AND id_ingresso = ' . $this->id)->fetch();
        $this->quantidadeVendas = $this->dadosDash['quantidade'];
        $this->quantidadeNovaVendas = $this->quantidadeVendas + $this->quantidade;
        $this->atualizaDash();
    }

    /**
     * Método que faz a atualização da quantidade de ingressos vendidos na tabela de vendas
     */
    public function atualizaDash()
    {
        $atualizaVendas = new Database("vendas");
        $atualizaVendas->update('id_evento =' . $this->id_evento . ' AND id_ingresso =' . $this->id , [
            'quantidade' => $this->quantidadeNovaVendas
        ]);
        echo json_encode(['Quantidade disponível' => $this->quantidadeNova, 'Quantidade Vendida' => $this->quantidadeNovaVendas]);
        return;
    }
}
