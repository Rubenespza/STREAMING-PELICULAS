document.getElementById("btn__registrarse").addEventListener("click", register);
document.getElementById("btn__login").addEventListener("click", IniciarSesion);

//Declaracion de variables
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var formulario_login = document.querySelector(".formulario__login");
var formulario__register = document.querySelector(".formulario__register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

function IniciarSesion(){
    formulario__register.style.display = "none";
    contenedor_login_register.style.left= "10px";
    formulario_login.style.display = "block";
    caja_trasera_login.style.opacity = "0";
    caja_trasera_register.style.opacity = "1";
    
    }


function register(){
formulario__register.style.display = "block";
contenedor_login_register.style.left= "410px";
formulario_login.style.display = "none";
caja_trasera_login.style.opacity = "1";
caja_trasera_register.style.opacity = "0";

}