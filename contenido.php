<?php
    spl_autoload_register(function($clases){
        require_once __DIR__."/Clases/".$clases.".php";
    });

    session_start();

    if(!isset($_GET['video'])){
        header("location:carga_de_datos.php");
        exit();
    }

    $videoclub = $_SESSION['videoclub'];

    function mostrarClientes($videoclub):string{
        $clientes = $videoclub->getClientes();
        $text="<table class='client'><tr><th>Nombre</th><th>DNI</th><th>Productos</th></tr>";
        foreach ($clientes as $k) {
            $productos = "";
            foreach($k->getProductos() as $p){
                $productos = $p.", ";
            }
            $text.="<tr><td>".$k->getNombre()."</td><td>".$k->getDni()."</td><td>".$productos."</td></tr>";
        }
        $text.="</table>";
        return $text;
    }

    function tipoProducto($p):string{
        $tipo = "";
        if($p->getPrecio()==2){
            $tipo = "Pelicula";
        }else if($p->getPrecio()==3){
            $tipo = "Juego";
        }else if($p->getPrecio()==1){
            $tipo = "CD";
        }
        return $tipo;
    }

    function mostarProductos($videoclub):string{
        $productos = $videoclub->getProductos();
        $text="<table><tr><th>ID</th><th>Tipo</th><th>Nombre</th><th>Precio</th></tr>";
        foreach($productos as $p){
            $tipo = tipoProducto($p);
            $text.="<tr><td>".$p->getId()."</td><td>".$tipo."</td><td>".$p->getNombre()."</td><td>".$p->getPrecio()."$</td></tr>";
        }
        $text.="</table>";
        return $text;
    }

    $opcion = $_GET['video'];

    $contenido = "";

    switch($opcion){
        case "clientes":
            $contenido = mostrarClientes($videoclub);
                break;
        case "productos":
            $contenido = mostarProductos($videoclub);
                break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido</title>
</head>
<body>
    <div class="container">
        <p><?=$contenido?></p>
        <button class="boton"><a href="carga_de_datos.php">Volver al inicio</a></button>
    </div>
</body>
</html>