<?php
    session_start();
    include("../Lab9/partials/_header.html");
    if(htmlspecialchars($_POST["usrname"])=="usuario" && htmlspecialchars($_POST["psw"])=="Password1!"){
        unset($_SESSION["error"]);
        $_SESSION["usrname"]=$_POST["usrname"];
        include("Partials/_Success.html");
    }
    else{
        $_SESSION["error"] = "Usuario y/o contraseña incorrectos";
        header("location: index.php");
    }
    include("../Lab9/partials/_footer.html");
?>