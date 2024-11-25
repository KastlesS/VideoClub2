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

//Crear un cliente existente:
$cliente1 = new Cliente("Ivan","11111111A");
$videoclub->anadirCliente($cliente1);
echo "<br>";
echo "<br>";


//Crear nuevo cliente
$cliente2 = new Cliente("Pepe","12345678B");
$videoclub->anadirCliente($cliente2);
echo "<br>";
echo "<br>";

//Cliente1 va a alquilar un procucto existente
$juego1 = new Juego("CS:GO",3,"PC","FPS");
$videoclub->alquilar($cliente1,$juego1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VideoClub</title>
</head>
<body>
    <h1>Pagina de inicio</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <button name='boton'>Haz click para mostar el objeto VideoClub (para ver si se ha cargado)</button>
    </form>
    <form action=""></form>
    <p><?php
            if(isset($_GET['boton'])){
                $videoclub->Imprimir();
            }
        ?>
    </p>
</body>
</html>