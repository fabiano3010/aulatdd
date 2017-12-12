<?php
/**
 * Created by PhpStorm.
 * User: cust7443
 * Date: 12/12/17
 * Time: 12:03
 */

namespace Leilao\Servico;

use Leilao\builder\LeilaoBuilder;
use Leilao\dao\LeilaoDao;
use Leilao\dao\LeilaoFakeDao;
use Leilao\dominio\Leilao;
use Leilao\servico\EncerradorLeilao;
use PHPUnit\Framework\TestCase;

class EncerradorLeilaoTest extends TestCase
{

    public function testEncerraCriadoMais7Dias()
    {
        $leilaoPlaystation = new Leilao( "Playstation" ) ;
        $leilaoPlaystation2 = new Leilao( "Playstation2" ) ;

        // builder
        $setaDiasAtrasos = new \DateTime() ;
        $setaDiasAtrasos->sub( new \DateInterval("P8D") ) ;

        $leilaoBuilder = new LeilaoBuilder( "Play 5" ) ;
        $leilaoBuilder->withDataCriacao( $setaDiasAtrasos ) ;
        $leilaoPlaystation3 = $leilaoBuilder->build() ;
        #var_dump( $leilaoPlaystation3 ) ; exit ;

        // mockar
        $leilaoDao = $this->createMock( LeilaoDao::class ) ;
        $leilaoDao->method( 'todos' )->willReturn(
            array( $leilaoPlaystation , $leilaoPlaystation2 , $leilaoPlaystation3 )
        ) ;

        $encerradorLeilao = new EncerradorLeilao( $leilaoDao ) ;
        $qtdeEncerrados = $encerradorLeilao->encerraCriadosMais7Dias() ;

        //$leilaoDao->expects( $this->exactly(1) )->method('atualiza')  ;
        $this->assertEquals( 1  ,$qtdeEncerrados ) ;
        $leilaoDao->expects( $this->once())->method( 'atualiza' ) ;
    }

    /*public function testaNenhumLeilaoEncerrado()
    {

                $leilaoDao = $this->createMock( LeilaoDao::class ) ;
                $leilaoDao->method( "correntes" )->will(
                   $this->returnValue( array() )
                ) ;

                $this->assertCount( 0  , $leilaoDao ) ;

            }
        */

}