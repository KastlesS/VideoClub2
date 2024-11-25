<?php

abstract class Producto{
    protected string $nombre;
    protected int $precio;
    protected static $cont=0;
    protected int $id;

    public function __construct(string $nombre, int $precio){
        $this->nombre = $nombre;
        $this->precio = $precio;
        self::$cont++;
        $this->id=self::$cont;
    }

    public function getNombre(): string {return $this->nombre;}

	public abstract function getPrecio();

	public function getId(): int {return $this->id;}

    public function __tostring():string{
        return $this->nombre;
    }
}