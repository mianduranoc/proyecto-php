<?php
// iniciar la sesion y la bd
require_once 'includes/conexion.php';
//Recoger datos del formulario
if (isset($_POST)) {
    if (isset($_SESSION['error_login'])) {
        unset($_SESSION['error_login']);
    }
    $email=trim($_POST['email']);
    $password=$_POST['password'];
    
    //consulta para comprobar las credenciales del usuario
    $sql="SELECT * FROM usuarios WHERE email='$email'";
    $login= mysqli_query($db,$sql);
    if ($login && mysqli_num_rows($login)==1) {
        $usuario= mysqli_fetch_assoc($login);
        
        $verify=password_verify($password, $usuario['password']);
        if ($verify) {
            $_SESSION['usuario']=$usuario;
        }
        else{
            $_SESSION['error_login']="Login incorrecto";
        }
    }
    else{
        $_SESSION['error_login']="Login incorrecto";
    }
}
//Comprobar la contraseña

//utilizar una sesion para guardar los datos del usuario logueado


//Si algo falla enviar una sesion con el fallo

//redirigir al index.php
header('Location:index.php');
