<?php

namespace leilao\servico;


use Leilao\dominio\Lance;
use Leilao\dominio\Leilao;

class FiltroDeLances
{

    public function filtraLancesMaior5000( Leilao $leilao ) {

        $lancesValidos = array() ;
        /** @var Lance $lance */
        foreach ($leilao->getLances() as $lance ) {

            if( $lance->getValor() > 5000 ) {
                $lancesValidos[] = $lance ;
            }

        }

        return $lancesValidos ;

    }
}