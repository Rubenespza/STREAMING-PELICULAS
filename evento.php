<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo'
    <script>
    alert("Por favor debe iniciar sesion");
    window.location = "index.php";
    </script>
    ';
    session_destroy();
    die();   
}
else {
    $user = $_SESSION['usuario'];
}
include 'php/config.php';
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$tipo = $_POST['tipo'];
switch ($tipo) {
    case 'ins':
        $query = "INSERT INTO evento(titulo, fecha, hora) 
        VALUES('$titulo', '$fecha','$hora')";
    
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM evento WHERE estatus = 1 AND titulo='$titulo'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuarioevento(idUsuario,idEvento) 
            VALUES('".$row['idUsuario']."', '".$row2['idEvento']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "eventos.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "eventos.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;
    case 'mod':
        $id = $_POST['id'];
        $query = "UPDATE evento SET titulo='$titulo', fecha='$fecha', hora='$hora' WHERE idEvento=$id";
    
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo'
            <script>
            window.location = "eventos.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "eventos.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;
    default:
        echo'
        <script>
        alert("Ocurrio un error");
        window.location = "eventos.php";
        </script>
        ';
        break;
}
?>