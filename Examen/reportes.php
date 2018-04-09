<?php
    session_start();
    require_once("util.php");
    include("../Lab9/partials/_header.html");
    if(isset($_SESSION["intento"])){
        if($_SESSION["intento"]=="4 8 15 16 23 42"){
            include("Partials/_Reportes.html");
        }
    }
    else{
        echo "SYSTEM FAILURE";
    }
    include("Partials/_logout.html");
    include("../Lab9/partials/_footer.html");\

?>

<!--DELIMITER //-->
<!--CREATE PROCEDURE registros()-->
<!--BEGIN-->
<!--  Select intento, resutlado, hora-->
<!--  from intento-->
<!--  order by hora desc;-->
<!--END //-->
<!--DELIMITER ;-->

<!--drop procedure sysF;-->

<!--DELIMITER //-->
<!--CREATE PROCEDURE sysF()-->
<!--BEGIN-->
<!--  Select intento, resutlado, hora-->
<!--  from intento-->
<!--  where resutlado="SYSTEM FAILURE"-->
<!--  order by hora desc;-->
<!--END //-->
<!--DELIMITER ;-->

<!--DELIMITER //-->
<!--CREATE PROCEDURE NF()-->
<!--BEGIN-->
<!--  Select count(resutlado)-->
<!--  from intento-->
<!--  where resutlado="SYSTEM FAILURE";-->
<!--END //-->
<!--DELIMITER ;-->

<!--DELIMITER //-->
<!--CREATE PROCEDURE NS()-->
<!--BEGIN-->
<!--  Select count(resutlado)-->
<!--  from intento-->
<!--  where resutlado="SUCCESS";-->
<!--END //-->
<!--DELIMITER ;-->