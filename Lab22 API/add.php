<?php
    session_start();
    
    if($_SESSION["usrname"] == "usuario" ) {
        include("../Lab9/partials/_header.html");
        include("Partials/_upload.html");
        include("../Lab9/partials/_footer.html"); 
    } else {
        //header("location:index.php");
    }
?>