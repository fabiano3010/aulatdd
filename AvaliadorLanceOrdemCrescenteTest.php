<?php

require_once 'src/dominio/Avaliador.php';
require_once 'src/dominio/Lance.php';
require_once 'src/dominio/Leilao.php';
require_once 'src/dominio/Usuario.php';

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

var_dump( $avaliador->getMaiorDeTodos() ) ;
var_dump( $avaliador->getMenorDeTodos() ) ;