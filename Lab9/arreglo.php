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
            <div class="wrapper"><h2>Problemas con arreglos</h2></div>
        </section>
        <?php
            $arr=array();
            for($i=0;$i<10;$i++){
                $j=$i+1;
                array_push($arr,$_GET["n"."$j"]);
            }
            switch($_GET["probl"]){
                case "probl1":
                    echo '<section class="main"><div class="wrapper"><h2>Problema 1</h2>';
                    echo "El promedio del arreglo es " . prom($arr)."</div></section>";
                    break;
                case "probl2":
                    echo '<section class="main"><div class="wrapper"><h2>Problema 2</h2>';
                    sort($arr);
                    echo "La mediana es: ".($arr[4]+$arr[5])/2 . "</div></section>";
                    break;
                case "probl3":
                    echo '<section class="main"><div class="wrapper"><h2>Problema 3</h2>';
                    echo "<ul>";
                    echo "<li>";
                    $suma=0;
                    $suma+=$arr[0];
                    echo "$arr[0]</li>";
                    $i=0;
                    $n=10;
                    for($i=0;$i<$n-1;$i++){
                        echo "<li>";
                        $suma+=$arr[$i+1];
                        echo "".$arr[$i+1]."</li>";
                    }
                    echo "</ul>";
                    sort($arr);
                    echo "El promedio es: ".($suma)/$n;
                    echo "<br>";
                    echo "La mediana es: ".($arr[4]+$arr[5])/2;
                    echo "<br>";
                    echo "Sort ascending: ";
                    for($i=0;$i<$n;$i++){
                        echo "$arr[$i] ";
                    }
                    echo "<br>";
                    echo "Sort descending: ";
                    rsort($arr);
                    for($i=0;$i<$n;$i++){
                        echo "$arr[$i] ";
                    }
                    echo "<br>";
                    echo "</div></section>";
                    break;
                default:
                    break;
            }
        ?>
<?php include("partials/_footer.html"); ?> 