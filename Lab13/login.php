<?php
    session_start();
    include("../Lab9/partials/_header.html");
    if(isset($_SESSION["usrname"])){
        include("Partials/_Success.html");
    }
    else if(htmlspecialchars($_POST["usrname"])=="usuario" && htmlspecialchars($_POST["psw"])=="Password1!"){
        unset($_SESSION["error"]);
        $_SESSION["usrname"]=$_POST["usrname"];
        $_SESSION["producto"]=" ";
        include("Partials/_Success.html");
    }
    else{
        $_SESSION["error"] = "Usuario y/o contraseña incorrectos";
        header("location: index.php");
    }
    include("../Lab9/partials/_footer.html");
?>