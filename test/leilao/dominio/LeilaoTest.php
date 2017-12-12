<?php

namespace Leilao\dominio;

use Leilao\builder\LeilaoBuilder;
use Leilao\dominio\Leilao;
use PHPUnit\Framework\TestCase;

class LeilaoTest extends TestCase
{

    private $usuario1 ;
    private $usuario2 ;
    private $avaliador ;
    private $leilao ;
    private $leilaoBuilder ;

    public function antes()
    {
        $this->avaliador = new Avaliador() ;
    }

    public function before()
    {
        $this->leilao = new Leilao( "Joelma" ) ;
        $this->leilaoBuilder = new LeilaoBuilder( "Joelma" ) ;
    }

    protected function setUp()
    {
        $this->usuario1 = new Usuario( "Fabiano" , 1 ) ;
        $this->usuario2 = new Usuario( "Ximbinha" , 2 ) ;
        $this->antes() ;
        $this->before() ;
    }

    /*
     * @expectedException RuntimeException
     * */
    public function testaLeilaoSemLances()
    {

        try {

            $this->avaliador->avalia( $this->leilao ) ;
            $this->fail("falhe por favor") ;

        }catch (\RuntimeException $runtimeException){

            $runtimeException->getMessage() ;
            $this->assertTrue(true) ;

        }

    }

    public function testValidaLanceAtualMaiorQueAnterior()
    {

        $this->leilaoBuilder->withLance( new Lance( $this->usuario1 , 100.0 ) )
            ->withLance( new Lance( $this->usuario2 , 50.0 ) ) ;

        $this->assertCount( 1 , $this->leilao->getLances() ) ;

    }

    public function testUsuarioNaoPodeDarDoisLancesSeguidos() {

        // lances
        $lance1 = new Lance( $this->usuario1 , 100 ) ;

        $this->leilaoBuilder->withLance( $lance1 )
        ->withLance( new Lance( $this->usuario1 , 50 ) ) ;

        $this->assertNotEquals( $this->leilaoBuilder->build() , $this->usuario1->getId() ) ;

    }

    public function testUsuarioNaoPodeDarMaisQueCincoLances() {

        // lances
        $this->leilaoBuilder->withLance( new Lance( $this->usuario1 , 100 ) )
        ->withLance( new Lance( $this->usuario1 , 100 ) )
        ->withLance( new Lance( $this->usuario1 , 100 ) )
        ->withLance( new Lance( $this->usuario1 , 100 ) )
        ->withLance( new Lance( $this->usuario1 , 100 ) )
        ->withLance( new Lance( $this->usuario1 , 100 ) ) ;

        $this->assertCount( 5 , $this->leilaoBuilder->build()->getLances() ) ;

    }

}