<?php 
    session_start();
    if(isset($_SESSION["usrname"])){
        header("location: login.php");
    }
    else{
        include("../Lab9/partials/_header.html"); 
        include("Partials/_login.html");
        include("../Lab9/partials/_footer.html");
    }
 ?>