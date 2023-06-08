<?php
include 'config.php';
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
//contraseña encriptada
$contrasena = hash('sha512', $contrasena);

$query = "INSERT INTO usuario(nombre_completo,correo,usuario,contrasena) 
VALUES('$nombre_completo', '$correo','$usuario', '$contrasena')";

$ejecutar = mysqli_query($conexion, $query);
if($ejecutar){
    echo'
    <script>
    alert("Usuario Registrado Correctamente");
    window.location = "../index.php";
    </script>
    ';
}else{
    echo'
    <script>
    alert("Intenta Registrarte de nuevo");
    window.location = "../index.php";
    </script>
    ';
}
mysqli_close($conexion);
?>