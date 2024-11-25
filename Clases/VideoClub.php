<?php

class VideoClub{
    private string $nombre;
    private array $clientes;
    private array $productos;

    public function __construct($nombre){
        $this->nombre=$nombre;
        $this->clientes=[];
        $this->productos=[];
    }

    public function getNombre(): string {return $this->nombre;}

	public function setNombre(string $nombre): void {$this->nombre = $nombre;}

    public function anadirCliente(Cliente $c){
        $flag=false;
        foreach($this->clientes as $cliente){
            if($cliente->getDni() == $c->getDni()){
                $flag=true;
            }
        }
        if(!$flag){
            echo "Se ha introducido el cliente {$c->getNombre()} correctamente. <br>";
            $this->clientes[]=$c;
        }else{
            echo "El cliente {$c->getNombre()} ya esta introducido.";
        }
    }

    public function anadirClientes(Cliente ...$c){
        $this->clientes=$c;
        echo "Los clientes se han introducido correctamente. <br>";
    }

    public function anadirProducto(Producto $p){
        $this->productos[]=$p;
        echo "El producto se ha introducido correctamente. <br>";
    }

    public function anadirProductos(Producto ...$p){
        $this->productos=$p;
        echo "Los productos se han introducido correctamente. <br>";
    }

    public function alquilar(Cliente $c, Producto $p){
        $cont=0;
        foreach($this->clientes as $cliente){
            if($cliente == $c){
               $cont++;
            }
        }

        foreach($this->productos as $producto){
            if($producto == $p){
                $cont++;
            }
        }

        if($cont==2){
            $c->anadirProducto($p);
            echo "El cliente {$c->getNombre()} ha alquilado el producto: {$p->getNombre()} <br>";
        }else{
            echo "El cliente/Producto no esta en el videoclub. <br>";
        }
    }

	public function getClientes(): array {return $this->clientes;}

	public function getProductos(): array {return $this->productos;}

    public function Imprimir():void{
        echo "Nombre del VideoClub: {$this->nombre} <br>";
        echo "<hr>";
        echo "Clientes: <br>";
        foreach($this->clientes as $c){
            echo "- {$c->getNombre()} <br>";
        }
        echo "<hr>";
        echo "Productos: <br>";
        foreach($this->productos as $p){
            echo "- {$p->getNombre()} <br>";
        }
    }

    public function __tostring():string{
        return $this->nombre;
    }
	
}