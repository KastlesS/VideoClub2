<?php

class Cliente{
    private string $nombre;
    private string $dni;
    private array $productos;

    public function __construct($nombre,$dni){
        $this->nombre = $nombre;
        $this->dni=$dni;
        $this->productos=[];
    }

	public function getNombre(): string {return $this->nombre;}

	public function getDni(): string {return $this->dni;}

	public function getProductos(): array {return $this->productos;}

    public function setNombre(string $nombre): void {$this->nombre = $nombre;}

	public function setDni(string $dni): void {$this->dni = $dni;}

	public function setProductos(array $productos): void {$this->productos = $productos;}

    public function anadirProducto(Producto $p){
        $this->productos[]=$p;
    }
    
    public function __tostring():string{
        return $this->nombre;
    }

}