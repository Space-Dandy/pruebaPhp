<?php  

$servidor = "localhost";
$usuario = "root";
$pwd = "";
$bd = "bhermanos";

$conn = mysqli_connect($servidor, $usuario, $pwd, $bd);

if(!$conn){
    die("Conexión fallida: ".mysqli_connect_error());
}