<?php

namespace Leilao\dominio;

class Avaliador
{

    private $maiorDeTodos = -INF ;
    private $menorDeTodos = INF ;

    public  function avalia( Leilao $leilao ) {
        $lances = $leilao->getLances() ;

        if( empty( $lances ) )
            throw new \RuntimeException("Nao pode dara lance vazio") ;

        foreach (  $leilao->getLances() as $lance ) {

            if( $lance->getValor() > $this->maiorDeTodos ) {
                $this->maiorDeTodos = $lance->getValor() ;
            }

            if( $lance->getValor() < $this->menorDeTodos ) {
                $this->menorDeTodos = $lance->getValor() ;
            }

        }

    }

    public function getMaiorDeTodos() {
        return $this->maiorDeTodos ;
    }

    public function getMenorDeTodos() {
        return $this->menorDeTodos ;
    }

}