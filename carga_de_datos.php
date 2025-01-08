<?php
spl_autoload_register(function($clases){
    require_once __DIR__."/Clases/".$clases.".php";
});

session_start();

if(!isset($_SESSION['videoclub'])){
    header("location:inicio_aplicacion.php");
    exit();
}

$videoclub = $_SESSION['videoclub'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VideoClub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="cabecera">
            <h1>Bienvenido al video club: <?=$videoclub->getNombre()?></h1>
        </header>
        <main class="principal">
            <form action="contenido.php" method="get" class="formulario">
                <button class="boton" name='video' value='clientes'>Mostrar Clientes</button>
                <button class="boton" name='video' value='productos'>Mostar Productos</button>
                <button class='boton' name='video' value='alquilar'>Alquilar Producto</button>
                <button class="boton" name='video' value='alquileres'>Mostrar Alquileres</button>
            </form>
        </main>
    </div>
</body>
</html>