<?php

//Conexion a la bd
$server="localhost";
$username="gps";
$password="Admin12345";
$basededatos="blog";

$db=mysqli_connect($server, $username, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

//Iniciar la sesion
if (!isset($_SESSION)) {
    session_start();
}


