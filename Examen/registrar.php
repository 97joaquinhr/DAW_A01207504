<?php
    session_start();
    require_once("util.php");
    include("../Lab9/partials/_header.html");
    echo "";
    if(isset($_SESSION["intento"])){
        if($_SESSION["intento"]=="4 8 15 16 23 42"){
            echo 'SUCCESS';
            
            include("Partials/_Success.html");
            include("Partials/_logout.html");
            include("../Lab9/partials/_footer.html");
        }
    }
    else if(success($_POST["intento"])){
        $_SESSION["intento"]=$_POST["intento"];
        echo 'SUCCESS';
        include("Partials/_Success.html");
        include("Partials/_logout.html");
        include("../Lab9/partials/_footer.html");
    }
    else{
        echo "SYSTEM FAILURE";
        include("Partials/_logout.html");
            include("../Lab9/partials/_footer.html");
    }
?>