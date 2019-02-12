<?php

//Conexion a la bd
$server="localhost";
$username="MigueElPuto";
$password="";
$basededatos="blog";

$db=mysqli_connect($server, $username, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

//Iniciar la sesion
if (!isset($_SESSION)) {
    session_start();
}


