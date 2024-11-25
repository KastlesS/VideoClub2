<?php

class Juego extends Producto{
    private string $plataforma;
    private string $genero;

    public function __construct(string $nombre, string $precio, string $plataforma, string $genero){
        parent::__construct($nombre,$precio);
        $this->plataforma=$plataforma;
        $this->genero=$genero;
    }

    public function getPrecio():int{
        return 3;
    }

    public function __tostring():string{
        return $this->nombre;
    }
}