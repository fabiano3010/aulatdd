<?php

namespace Leilao\dominio;

class Lance
{

    private $usuario ;
    private $valor ;

    public function __construct( Usuario $usuario, float $valor)
    {
        $this->usuario = $usuario;
        $this->valor = $valor;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getValor()
    {
        return $this->valor;
    }


}