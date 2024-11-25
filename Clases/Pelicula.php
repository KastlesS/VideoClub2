<?php

class Pelicula extends Producto{
    private string $idiomas;
    private int $duracion;
    private string $genero;

    public function __construct(string $nombre,int $precio,string $idiomas, int $duracion, string $genero){
        parent::__construct($nombre,$precio);
        $this->idiomas = $idiomas;
        $this->duracion = $duracion;
        $this->genero = $genero;
    }

    public function getPrecio():int{
        return 2;
    }
	
    public function __tostring():string{
        return $this->nombre;
    }
}