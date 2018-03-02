<?php
    session_start();
    require_once("modelo.php");
    include("../Lab9/partials/_header.html");
    if(isset($_SESSION["usrname"])){
        if($_SESSION["usrname"]=="usuario"){
            include("Partials/_Success.html");
        }
    }
    else if(login(htmlspecialchars($_POST["usrname"]), htmlspecialchars($_POST["psw"]))){
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