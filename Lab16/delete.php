<?php
    session_start();
    require_once("util.php");
    $name=$_POST["producto"];
    if(delete_by_name($name)){
        header ("location:login.php");
    }else{
        echo 'error';
    }
    
?>