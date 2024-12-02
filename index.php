<?php
spl_autoload_register(function($clases){
    require_once __DIR__."/Clases/".$clases.".php";
});

session_start();

$videoclub = new VideoClub("Radio Patio");

$cliente1 = new Cliente("Ivan","11111111A");
$cliente2 = new Cliente("María", "22222222B");
$cliente3 = new Cliente("Carlos", "33333333C");
$cliente4 = new Cliente("Ana", "44444444D");
$cliente5 = new Cliente("Jorge", "55555555E");
$cliente6 = new Cliente("Laura", "66666666F");
$cliente7 = new Cliente("Miguel", "77777777G");
$cliente8 = new Cliente("Sofía", "88888888H");
$cliente9 = new Cliente("Luis", "99999999I");
$cliente10 = new Cliente("Elena", "10101010J");

$pelicula1 = new Pelicula("El silencio de los corderos",2,"es,us",100,"thriller");
$pelicula2 = new Pelicula("El Padrino", 2, "es,us,it",120,"drama");
$pelicula3 = new Pelicula("Titanic", 2, "es,us,uk", 200,"romance");
$pelicula4 = new Pelicula("Matrix", 2, "es,us", 134,"ciencia ficción");
$pelicula5 = new Pelicula("Forrest Gump", 2, "es,us",145 ,"drama");

$cd1 = new Cd("Linking Park",1,100,"pop");
$cd2 = new Cd("Adele", 1, 50, "soul");
$cd3 = new Cd("Coldplay", 1, 80, "rock");
$cd4 = new Cd("Ed Sheeran", 1, 120, "pop");
$cd5 = new Cd("Imagine Dragons", 1, 90, "alternative");

$juego1 = new Juego("CS:GO",3,"PC","FPS");
$juego2 = new Juego("Minecraft", 3, "PC,Console,Mobile", "Sandbox");
$juego3 = new Juego("The Witcher 3", 3, "PC,Console", "RPG");
$juego4 = new Juego("Fortnite", 3, "PC,Console,Mobile", "Battle Royale");
$juego5 = new Juego("League of Legends", 3, "PC", "MOBA");

$videoclub->anadirProductos($pelicula1,$pelicula2,$pelicula3,$pelicula4,$pelicula1,$cd1,$cd2,$cd3,$cd4,$cd5,$juego1,$juego2,$juego3,$juego4,$juego5);
echo "<br> <br>";
$videoclub->anadirClientes($cliente1,$cliente2,$cliente3,$cliente4,$cliente5,$cliente6,$cliente7,$cliente8,$cliente9,$cliente10);
echo "<br> <br>";

$_SESSION['videoclub']=$videoclub;

header("location:carga_de_datos.php");
exit();