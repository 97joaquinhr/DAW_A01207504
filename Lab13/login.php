<?php
 
    include("../Lab9/partials/_header.html");
    if(htmlspecialchars($_POST["usrname"])=="usuario" && htmlspecialchars($_POST["psw"])=="Password1!"){
        include("Partials/_Success.html");
    }
    else{
        include("Partials/_Fail.html");
    }
    include("../Lab9/partials/_footer.html");
?>