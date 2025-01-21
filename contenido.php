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
        $text="<div class='principal'>";
        foreach ($clientes as $k) {
            $text.="<div class='cliente'><h2>".$k->getNombre()."</h2><img src='anonimo.png' class='imagen'></img><p>DNI:".$k->getDni()."</p><select name='products' class='products'>";
            foreach($k->getProductos() as $p){
                $text.="<option value='{$p->getId()}'>".$p->getNombre()."</option>";
            }
            $text.="</select></div>";
        }
        $text.="</div>";
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
        $text="<div class='principal'>";
        foreach($productos as $p){
            $text.="<div class='producto'>";
            $tipo = tipoProducto($p);
            $text.="<h2>".$p->getNombre()."</h2><img src='product.png'></img><h3>Tipo: ".$tipo."<h3><h4>Precio: ".$p->getPrecio()."</h4>";
        }
        $text.="</div>";
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
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <div class="container">
        <p><?=$contenido?></p>
        <button class="boton"><a href="carga_de_datos.php">Volver al inicio</a></button>
    </div>
</body>
</html>