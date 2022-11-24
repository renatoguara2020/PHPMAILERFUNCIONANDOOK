<?php
class Tv {
    
    //Atributos
    var $ligar;
    var $tamanho;
    var $cor;
    var $volume;
    
    //Método Construtor
    function __construct($tamanho, $cor, $volume) {
        $this->tamanho = $tamanho;
        $this->cor     = $cor;
        $this->volume  = $volume;
        
    }   
    
    function getVolumeTv(){
        echo "Volume em {$this->volume}%..";
    }
   
    function ligarTv() {
        $this->ligar = true;
    }
    
    function desligarTv() {
        $this->ligar = false;
    }
    
    function __destruct() {
        echo "<hr/>Obejto TV finalizado.";
    }
}