<?php
session_start();
if(isset($_SESSION['usuario'])){
    header("location: bienvenido.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STREAMING DE PELICULAS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia Sesion para entrar en la pagina</p>
                    <button id="btn__login">Iniciar Sesion</button>
                </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Registrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Registrarse</button>
            </div>
        </div>
        <!--Formulario de login y Registro-->
        <div class="contenedor__login-register">
            <!--Login-->
            <form action="php/login.php" method ="POST"class="formulario__login">
                <h2>Iniciar Sesion</h2>
                <input type="text" placeholder="Correo Electronico" name ="correo">
                <input type="password" placeholder="Contraseña" name = "contrasena">
                <button>Entrar</button>
            </form>
            <!--Registro-->
            <form action="php/registroDatos.php" method = "POST" class="formulario__register">
                <h2>Registrarse</h2>
                <input type="text" placeholder="Nombre Completo" name = "nombre_completo">
                <input type="text" placeholder="Correo Electronico" name = "correo">
                <input type="text" placeholder="Usuario" name = "usuario"> 
                <input type="password" placeholder="Contraseña" name = "contrasena">
                <button>Crear Cuenta</button>
            </form>
        </div>
     
    </main>
    <script src="js/script.js"></script>
</body>
</html>