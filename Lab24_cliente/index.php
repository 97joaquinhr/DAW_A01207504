<?php
/**
 * Created by PhpStorm.
 * User: joaqu
 * Date: 4/12/2018
 * Time: 5:59 PM
 */
session_start();
require_once("util.php");
if(isset($_SESSION["usrname"])){
    header("location: login.php");
}
else{
    include("../Lab9/partials/_header.html");
//    include("Partials/_login.html")
    $name = "joaquin";
    $url = "http://localhost:8080/DAW_A01207504/Lab24_servicio/public/$name"; //Route to the REST web service
    $c = curl_init($url);
    $response = curl_exec($c);
    curl_close($c);
    $url = "http://localhost:8080/DAW_A01207504/Lab24_servicio/public/bd/insertar"; //Route to the REST web service
    $c = curl_init($url);
    $response = curl_exec($c);
    curl_close($c);
    echo "<p>Cuando entra a la página, inserta una entrada en la base de datos con CrearProducto() del util.php</p>";
//var_dump($response);
    include("Partials/_preguntas.html");
    include("../Lab9/partials/_footer.html");
}
