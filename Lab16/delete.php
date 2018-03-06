<?php
    session_start();
    $name=$_POST["nombre"];
    echo '<h1>'.$name.'</h1>';
    require_once("util.php");
    if(delete_by_name($name)){
        //header ("location:login.php");
    }else{
        echo 'error';
    }
    
?>