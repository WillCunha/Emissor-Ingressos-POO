<?php

namespace App\File;

class Upload{

    /**
     * Nome do arquivo
     * @var string;
     */
    private $name;

    /**
     * Tipo do arquivo
     * @var string;
     */
    private $type;

    /**
     * Extensão do arquivo
     * @var string
     */
    private $extension;

    /**
     * Diretório temporário do arquivo
     * @var string
     */
    private $tmpName;

    /**
     * Código de erro
     * @var integer
     */
    private $error;

    /**
     * Tamanho do arquivo
     * @var integer
     */
    private $size;

    /**
     * Contador de duplicação do arquivo
     * @var integer
     */
    private $duplicates = 0;

    /**
     * Construtor da classe
     * @param array $file $_FILES[campo]
     */
    public function __construct($file){
        //Pega os dados do arquivo
        $this->type = $file['type'];
        $this->tmpName = $file['tmp_name'];
        $this->error = $file['error'];
        $this->size = $file['size'];

        //Pega o nome do arquivo e a extensão, ambos separadamente
        $info = pathinfo($file['name']);
        $this->name = $info['filename'];
        $this->extension = $info['extension'];
    }

    /**
     * Gera um nome aleatório para o arquivo
     */
    public function generateNewName(){
        //Gera um código aleatorio usando timestamp, número aleatório e um id unico do PHP
        $this->name = time().'-'.rand(100000,999999).'-'.uniqid();
    }

    public function getBasename(){
        //Valida a extensão
        $extension = strlen($this->extension) ? '.'.$this->extension : '';

        //Valida a duplicação
        $duplicates = $this->duplicates > 0 ? '-'.$this->duplicates : '';

        //Retorna o nome completo
        return $this->name.$duplicates.$extension;
    }
 

    /**
     * Método que obtem um nome para o arquivo
     * @param string $dir
     * @return string
     */
    public function getPossibleName($dir){
        $basename = $this->getBasename();

        //Verifica se ha algum arquivo com o mesmo nome
        if(!file_exists($dir.'/'.$basename)){
            return $basename;
        }

        //Incrementa uma duplicação
        $this->duplicates++;
        return $this->getPossibleName($dir);
    }

    /**
     * Metodo que faz o upload do arquivo
     * @param string $dir
     * @return boolean
     */
    public function upload($dir){
        if($this->error != 0 ) return false;

        $path = $dir.'/'.$this->getPossibleName($dir);

        //Movimenta o arquivo para a pasta
        return move_uploaded_file($this->tmpName, $path);

    }

}

?>