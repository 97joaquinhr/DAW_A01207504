<?php include("partials/_header.html"); 
    function prom($arr){
        $suma=0;
        $contador=0;
        foreach($arr as $value){
            $suma+=$value;
            $contador++;
        }
        return $suma/count($arr);
    }

?>
       
        <section class="hero">
            <div class="wrapper"><h2>Tabla de potencias de 1 a N</h2></div>
        </section>
        <?php
            $n=$_GET["pot"];
            echo '<section class="main wrapper"><table><thead><tr><td>Número</td><td>Cuadrado</td><td>Cubo</td></tr></thead><tbody>';
            for($i=1;$i<=$_GET["pot"];$i++){
                echo "<tr><td>".$i."</td><td>".($i*$i)."</td><td>".($i*$i*$i)."</td></tr>";
            }
            echo "</tbody></table></section>";
        ?>
<?php include("partials/_footer.html"); ?> 