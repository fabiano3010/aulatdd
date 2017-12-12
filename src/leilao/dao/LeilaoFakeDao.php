<?php

namespace Leilao\Dao;


use Leilao\dominio\Leilao;

class LeilaoFakeDao
{

    public $leiloes ;

    /**
     * LeilaoDao constructor.
     * @param $leiloes
     */
    public function __construct()
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

    }

}