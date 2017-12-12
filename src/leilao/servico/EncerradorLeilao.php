<?php
/**
 * Created by PhpStorm.
 * User: cust7443
 * Date: 12/12/17
 * Time: 11:55
 */

namespace Leilao\Servico;


use Leilao\Dao\LeilaoDao;
use Leilao\Dao\LeilaoFakeDao;
use Leilao\dominio\Leilao;

class EncerradorLeilao
{

    private $leilaoDao ;

    /**
     * EncerradorLeilao constructor.
     * Injeção de dependencias
     * @param LeilaoDao $leilaoDao
     */
    public function __construct( LeilaoDao $leilaoDao )
    {
        $this->leilaoDao = $leilaoDao;
    }

    public function encerraCriadosMais7Dias()
    {

        $leiloes = $this->leilaoDao->todos() ;

        $seteDias = new \DateTime() ;
        $seteDias->sub(new \DateInterval("P7D")) ;
        $qtdeEncerrados = 0 ;

        /* @var Leilao $leilao */
        foreach ( $leiloes as $leilao ) {
            if( $leilao->getDataCriacao() < $seteDias ) {
                $leilao->encerra() ;

                try {
                    $this->leilaoDao->atualiza( $leilao ) ;
                }catch ( \RuntimeException $runtimeException ) {
                    $runtimeException->getMessage() ;
                }

                $qtdeEncerrados++ ;
            }
        }

        return $qtdeEncerrados ;

    }
    
}