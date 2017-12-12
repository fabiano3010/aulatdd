<?php


namespace Leilao\Builder;

use Leilao\dominio\Lance;
use Leilao\dominio\Leilao;

class LeilaoBuilder
{

    private $descricao ;
    private $dataCriacao ;

    /**
     * LeilaoBuilder constructor.
     */
    public function __construct( $descricao )
    {
        $this->leilao =  new Leilao( $descricao ) ;
    }

    public function withLance( Lance $lance )
    {
        $this->leilao->propoe( $lance ) ;
        return $this ;
    }

    public function  build() :Leilao
    {
        return $this->leilao ;
    }

    public function withDataCriacao( $dataCriacao )
    {
        $this->leilao->setDataCriacao( $dataCriacao ) ;
    }

}