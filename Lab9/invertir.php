<?php include("partials/_header.html"); ?>
       
        <section class="hero">
            <div class="wrapper"><h2>Inversor de números</h2></div>
        </section>
        <?php
            echo '<section class="main wrapper">';
            $n=$_GET["inv"];
            $aux=$n;
            $inver=0;
            while($n>0){
                $inver*=10;
                $inver+=($n%10);
                $n=floor($n/10);
            }
            echo "El número a invertir: ".$aux;
            echo "<br>El número invertido: ".$inver;
            echo "</section>";
        ?>
<?php include("partials/_footer.html"); ?> 