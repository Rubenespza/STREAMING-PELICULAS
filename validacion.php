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
$pago = $_GET['pago'];
$fecha = date("Y-m-d");
$date = date("Y-m-d",strtotime($fecha."+ 1 month"));
switch ($pago) {
    case 1:
        $query = "INSERT INTO suscripcion(tipo, fechaInicial, fechaTerminal, metodoPago, precio) 
        VALUES('Basica', '$fecha','$date', 'Tarjeta de debito', '$10')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM suscripcion WHERE estatus = 1 AND tipo='Basica' AND fechaInicial='$fecha'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariosuscripcion(idUsuario,idSuscripcion) 
            VALUES('".$row['idUsuario']."', '".$row2['idSuscripcion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;
        
    case 2:
        $query = "INSERT INTO suscripcion(tipo, fechaInicial, fechaTerminal, metodoPago, precio) 
        VALUES('Premium', '$fecha','$date', 'Tarjeta de debito', '$20')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM suscripcion WHERE estatus = 1 AND tipo='Premium' AND fechaInicial='$fecha'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariosuscripcion(idUsuario,idSuscripcion) 
            VALUES('".$row['idUsuario']."', '".$row2['idSuscripcion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;

    case 3:
        $query = "INSERT INTO suscripcion(tipo, fechaInicial, fechaTerminal, metodoPago, precio) 
        VALUES('Familiar', '$fecha','$date', 'Tarjeta de debito', '$25')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM suscripcion WHERE estatus = 1 AND tipo='Familiar' AND fechaInicial='$fecha'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariosuscripcion(idUsuario,idSuscripcion) 
            VALUES('".$row['idUsuario']."', '".$row2['idSuscripcion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;

    case 4:
        $query = "INSERT INTO suscripcion(tipo, fechaInicial, fechaTerminal, metodoPago, precio) 
        VALUES('Premium Plus', '$fecha','$date', 'Tarjeta de debito', '$30')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM suscripcion WHERE estatus = 1 AND tipo='Premium Plus' AND fechaInicial='$fecha'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariosuscripcion(idUsuario,idSuscripcion) 
            VALUES('".$row['idUsuario']."', '".$row2['idSuscripcion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;
    default:
        echo'
        <script>
        alert("Ocurrio un error");
        window.location = "bienvenido.php";
        </script>
        ';
        break;
}

?>