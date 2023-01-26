<?php

namespace App\Entity;

use App\Database\Database;

use \Pdo;

class Evento
{

    /**
     * ID do evento
     * @var string
     */
    public $id;

    /**
     * Nome do Evento
     * @var string
     */
    public $titulo;

    /**
     * Local do Evento
     * @var string
     */
    public $local;

    /**
     * Dia e hora do evento
     * @var string
     */
    public $data;


    /**
     * Descrição do evento
     * @var string
     */
    public $descricao;

    /**
     * Define se o evento já estará apto para venda ou não
     * @var string 
     */
    public $ativo;

    /**
     * Define a imagem do evento
     * @var string
     */
    public $imagem;

    
    /**
     * Função responsável pela criação do evento
     * @return boolean
     */
    public function criaEvento(){
        $obEvento = new Database('eventos');
        $this->id = $obEvento->insert([
            'titulo' => $this->titulo,
            'data' => $this->data,
            'local' => $this->local,
            'descricao' => $this->descricao,
            'imagem' => $this->imagem
        ]);

        return $this->id;
        
    }

    /**
     * Função que faz a atualização dos dados de um determinado evento
     * @return boolean
     */
    public function atualizaEvento(){
        return (new Database('eventos'))->update('id = ' .$this->id, [
            'titulo' => $this->titulo,
            'data' => $this->data,
            'local' => $this->local,
            'descricao' => $this->descricao,
            'imagem' => $this->imagem
        ]);

        return true;
    }

    /**
     * Método que seleciona todos os eventos
     * @param string $where
     * @param string $limit
     * @param string $order
     * @return array PDOStatement
     */
    public static function getEventos($where = null, $limit = null, $order = null){
        return (new Database('eventos'))->select($where, $limit, $order)
                                        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * Método que busca um evento selecionado
     * @param string $id
     * @return Evento
     */
    public static function getEvento($id){
        return (new Database('eventos'))->select('id = ' .$id)
                                        ->fetchObject(self::class);
    }

}
