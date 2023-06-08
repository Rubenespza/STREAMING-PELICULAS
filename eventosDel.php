<?php
    require_once('php/config.php');

    $id=$_POST["id"];

    $sql = "UPDATE usuarioevento SET estatus = 0 where idUsuarioEvento=". $id;

    $resultado = mysqli_query($conexion,$sql);

    header("Location: eventos.php"); 
    mysqli_close( $conexion );

?>