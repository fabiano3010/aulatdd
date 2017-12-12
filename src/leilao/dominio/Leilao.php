<?php

namespace Leilao\dominio;

class Leilao
{

    private $descricao ;
    private $lances = array() ;
    private $lanceAnterior = null ;
    private $dataCriacao = "" ;
    private $isEncerrado = false ;

    public function __construct($descricao)
    {
        $this->descricao = $descricao;
        $this->dataCriacao = new \DateTime() ;
    }

    public function encerra()
    {
        echo "encerra" ;
    }

    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    public function setDataCriacao( $dataCriacao )
    {
        $this->dataCriacao = $dataCriacao ;
    }


    public function getLances(): array
    {
        return $this->lances;
    }

    public function propoe( Lance $lance ) {

        if( empty( $this->lanceAnterior ) || $lance->getValor() > $this->lanceAnterior ) {
            $this->lanceAnterior = $lance->getValor() ;
            $this->lances[] = $lance ;
        }

    }

}