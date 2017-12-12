<?php

use Leilao\dominio\Avaliador;
use Leilao\dominio\Lance;
use Leilao\dominio\Leilao;
use Leilao\dominio\Usuario;
use Leilao\servico\FiltroDeLances;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase {

    public  function testLancesEmOrdemAleatoria() {

        $usuario = new Usuario( "fabiano" ) ;
        $lance10 = new Lance( $usuario , 10 ) ;
        $lance100 = new Lance( $usuario , 100 ) ;
        $lance1000 = new Lance( $usuario , 1000 ) ;

        $leilao = new Leilao( "descficao" ) ;
        $leilao->propoe( $lance10 ) ;
        $leilao->propoe( $lance100 ) ;
        $leilao->propoe( $lance1000 ) ;

        $avaliador = new Avaliador() ;
        $avaliador->avalia( $leilao ) ;
        $maiorLance = $avaliador->getMaiorDeTodos() ;

        $menorLance = $avaliador->getMenorDeTodos() ;
        $this->assertEquals( 1000 , $maiorLance ) ;
        $this->assertEquals( 10 , $menorLance ) ;

    }

    public function testAvaliadorComApenasUmLance() {

        $usuario = new Usuario( "fabiano" ) ;
        $lance10 = new Lance( $usuario , 10 ) ;
        $lance100 = new Lance( $usuario , 100 ) ;
        $lance1000 = new Lance( $usuario , 1000 ) ;

        $leilao = new Leilao( "descficao" ) ;
        $leilao->propoe( $lance10 ) ;
        $leilao->propoe( $lance100 ) ;
        $leilao->propoe( $lance1000 ) ;

        $avaliador = new Avaliador() ;
        $avaliador->avalia( $leilao ) ;

        $maiorLance = $avaliador->getMaiorDeTodos() ;
        $menorLance = $avaliador->getMenorDeTodos() ;

        $this->assertEquals( 1000 , $maiorLance ) ;
        $this->assertEquals( 10 , $menorLance ) ;

    }

    public function testLancesValidos() {

        $usuario = new Usuario( "fabiano" ) ;
        $lance10 = new Lance( $usuario , 10 ) ;
        $lance100 = new Lance( $usuario , 100 ) ;
        $lance1000 = new Lance( $usuario , 8000 ) ;

        $leilao = new Leilao( "pao-de-lo" ) ;
        $leilao->propoe( $lance10 ) ;
        $leilao->propoe( $lance100 ) ;
        $leilao->propoe( $lance1000 ) ;

        $filtroDeLances = new FiltroDeLances() ;
        $lancesValidos = $filtroDeLances->filtraLancesMaior5000( $leilao ) ;

        $this->assertCount(1 , $lancesValidos ) ;

    }

}