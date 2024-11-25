<?php

class Cd extends Producto{
    private int $duracion;
    private string $genero;

    public function __construct(string $nombre,int $precio,int $duracion, string $genero){
        parent::__construct($nombre,$precio);
        $this->duracion=$duracion;
        $this->genero=$genero;
    }

    public function getPrecio():int{
        return 1;
    }

    public function __tostring():string{
        return $this->nombre;
    }
}