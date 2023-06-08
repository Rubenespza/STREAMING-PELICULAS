<?php
session_start();
include 'config.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);
$validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo' and contrasena ='$contrasena'");

$fecha = date("Y-m-d");

if(mysqli_num_rows($validar_login) > 0){
    $ip = $_SERVER['REMOTE_ADDR'];
    $_SESSION['usuario'] = $correo;
    $id = mysqli_fetch_assoc($validar_login);
    $validar_login = mysqli_query($conexion, "INSERT INTO dispositivo(idUsuario, ubicacion, fecha) VALUES (".$id['idUsuario'].", '".$ip."', '".$fecha."')");
    header("location: ../bienvenido.php");
    exit;
}else{
    echo'
    <script>
    alert("Usuario no existe, porfavor verifique los datos introducidos");
    window.location = "../index.php";
    </script>
    ';
    exit;
}

?>
