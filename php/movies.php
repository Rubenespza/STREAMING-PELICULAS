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
include 'config.php';
$movie = $_GET['movie'];
$fecha = date("Y-m-d H:i:s");
$time = "00";
for ($i=0; $i < 2; $i++) { 
    $time = $time.':'.rand(0, 59);
}
switch ($movie) {
    case 1:
        $query = "INSERT INTO historialvisualizacion(nombrePelicula,fechaVisualizacion,duracionVisualizacion) 
        VALUES('Django', '$fecha','$time')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM historialvisualizacion WHERE estatus = 1 AND nombrePelicula='Django' AND duracionVisualizacion='$time'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariohistorialvisualizacion(idUsuario,idHistorialVisualizacion) 
            VALUES('".$row['idUsuario']."', '".$row2['idHistorialVisualizacion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "../bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "../bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;
        
    case 2:
        $query = "INSERT INTO historialvisualizacion(nombrePelicula,fechaVisualizacion,duracionVisualizacion) 
        VALUES('Her', '$fecha','$time')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM historialvisualizacion WHERE estatus = 1 AND nombrePelicula='Her' AND duracionVisualizacion='$time'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariohistorialvisualizacion(idUsuario,idHistorialVisualizacion) 
            VALUES('".$row['idUsuario']."', '".$row2['idHistorialVisualizacion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "../bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "../bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;

    case 3:
        $query = "INSERT INTO historialvisualizacion(nombrePelicula,fechaVisualizacion,duracionVisualizacion) 
        VALUES('Star Wars', '$fecha','$time')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM historialvisualizacion WHERE estatus = 1 AND nombrePelicula='Star Wars' AND duracionVisualizacion='$time'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariohistorialvisualizacion(idUsuario,idHistorialVisualizacion) 
            VALUES('".$row['idUsuario']."', '".$row2['idHistorialVisualizacion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "../bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "../bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;
        
    case 4:
        $query = "INSERT INTO historialvisualizacion(nombrePelicula,fechaVisualizacion,duracionVisualizacion) 
        VALUES('Storm', '$fecha','$time')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM historialvisualizacion WHERE estatus = 1 AND nombrePelicula='Storm' AND duracionVisualizacion='$time'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariohistorialvisualizacion(idUsuario,idHistorialVisualizacion) 
            VALUES('".$row['idUsuario']."', '".$row2['idHistorialVisualizacion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "../bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "../bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;
    case 5:
        $query = "INSERT INTO historialvisualizacion(nombrePelicula,fechaVisualizacion,duracionVisualizacion) 
        VALUES('1917', '$fecha','$time')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM historialvisualizacion WHERE estatus = 1 AND nombrePelicula='1917' AND duracionVisualizacion='$time'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariohistorialvisualizacion(idUsuario,idHistorialVisualizacion) 
            VALUES('".$row['idUsuario']."', '".$row2['idHistorialVisualizacion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "../bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "../bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;
        
    case 6:
        $query = "INSERT INTO historialvisualizacion(nombrePelicula,fechaVisualizacion,duracionVisualizacion) 
        VALUES('Avengers', '$fecha','$time')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM historialvisualizacion WHERE estatus = 1 AND nombrePelicula='Avengers' AND duracionVisualizacion='$time'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariohistorialvisualizacion(idUsuario,idHistorialVisualizacion) 
            VALUES('".$row['idUsuario']."', '".$row2['idHistorialVisualizacion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "../bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "../bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;

    case 7:
        $query = "INSERT INTO historialvisualizacion(nombrePelicula,fechaVisualizacion,duracionVisualizacion) 
        VALUES('Rampage', '$fecha','$time')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM historialvisualizacion WHERE estatus = 1 AND nombrePelicula='Rampage' AND duracionVisualizacion='$time'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariohistorialvisualizacion(idUsuario,idHistorialVisualizacion) 
            VALUES('".$row['idUsuario']."', '".$row2['idHistorialVisualizacion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "../bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "../bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;
        
    case 8:
        $query = "INSERT INTO historialvisualizacion(nombrePelicula,fechaVisualizacion,duracionVisualizacion) 
        VALUES('Ender's Game', '$fecha','$time')";

        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            $ejecutar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$user' AND estatus = 1");
            $row = mysqli_fetch_assoc($ejecutar);
            $ejecutar = mysqli_query($conexion, "SELECT * FROM historialvisualizacion WHERE estatus = 1 AND nombrePelicula='Ender's Game' AND duracionVisualizacion='$time'");
            $row2 = mysqli_fetch_assoc($ejecutar);
            $query = "INSERT INTO usuariohistorialvisualizacion(idUsuario,idHistorialVisualizacion) 
            VALUES('".$row['idUsuario']."', '".$row2['idHistorialVisualizacion']."')";
            $ejecutar = mysqli_query($conexion, $query);
            echo'
            <script>
            window.location = "../bienvenido.php";
            </script>
            ';
        }else{
            echo'
            <script>
            alert("Ocurrio un error");
            window.location = "../bienvenido.php";
            </script>
            ';
        }
        mysqli_close($conexion);
        break;
    default:
        echo'
            <script>
            alert("Ocurrio un error");
            window.location = "../bienvenido.php";
            </script>
            ';
        break;
}

?>