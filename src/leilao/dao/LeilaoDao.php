<?php

namespace Leilao\Dao;


use Leilao\dominio\Leilao;

class LeilaoDao
{

    public $leiloes ;

    /**
     * LeilaoDao constructor.
     * @param $leiloes
     */
    public function __construct($leiloes)
    {
        $this->leiloes = array() ;
    }

    public function save(Leilao $leilao )
    {
    $this->leiloes[] = $leilao ;
    }

    public function todos()
    {
        return $this->leiloes ;
    }

    public function atualiza( Leilao $leilao )
    {
        echo "atualiza" ;
    }

    public function correntes()
    {
        return array() ;
    }

}