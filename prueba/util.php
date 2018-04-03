<?php
    function connect() {
        $ENV = "dev";
        if ($ENV == "dev") {
            $mysql = mysqli_connect("localhost","joaquinhr97","","c9");
                                            //root si estan en windows
        } else  if ($ENV == "prod"){
            $mysql = mysqli_connect("localhost","joaquinhr97","","c9");
        }
                                            //root si estan en windows
        $mysql->set_charset("utf8");
        return $mysql;
    }
    
    function disconnect($mysql) {
        mysqli_close($mysql);
    }
    
    function login($user, $passwd) {
        $db = connect();
        if ($db != NULL) {
            
            //Specification of the SQL query
            $query='SELECT nombre FROM usuarios WHERE nombre="'.$user.
                '" AND passwd="'.$passwd.'"';
            $query;
             // Query execution; returns identifier of the result group
            $results = $db->query($query);
             // cycle to explode every line of the results
             
            if (mysqli_num_rows($results) > 0)  {
                // it releases the associated results
                mysqli_free_result($results);
                disconnect($db);
                return true;
            }
            return false;
        } 
        return false;
    }
    function crearProducto($nombre, $image) {
        $db = connect();
        //funciona con stored procedure
        if ($db != NULL) {

            if (!$db->query("CALL p('".$nombre."','".$image."')")) {
                echo "Falló CALL: (" . $db->errno . ") " . $db->error;
            }
            disconnect($db);
            return true;
        } 
        return false;
    }
    function update_by_name($name,$image){
        $db = connect();
        if ($db != NULL) {
            $sql="Update productos set nombre='".$name."',imagen='".$image."' where nombre='".$name."'";
            if ($db->query($sql) === TRUE) {
                echo "editado completo";
            }
            else {
                echo "Error: " . $sql. "<br>" . $db->error;
            }
            disconnect($db);
            return true;
        }
        return false;

    }
    function getTable($tabla) {
        $db = connect();
        if ($db != NULL) {
            
            //Specification of the SQL query
            $query='SELECT * FROM '.$tabla;
            $query;
             // Query execution; returns identifier of the result group
            $results = $db->query($query);
             // cycle to explode every line of the results
        
           $html = '<table>';
           $html .= '<thead>';
           $html .= '<tr>';
           $columnas = $results->fetch_fields();
           for($i=0; $i<count($columnas); $i++) {
                $html .= '<th>'.$columnas[$i]->name.'</th>';
           }
           $html .= '</tr>';
           $html .= '</thead>';
           
           $html .= '<tbody>';
           while ($fila = mysqli_fetch_array($results, MYSQLI_BOTH)) {
                                                // Options: MYSQLI_NUM to use only numeric indexes
                                                // MYSQLI_ASSOC to use only name (string) indexes
                                                // MYSQLI_BOTH, to use both
                    $html .= '<tr>';
                    for($i=0; $i<count($fila); $i++) {
                        // use of numeric index
                        $html .= '<td>'.$fila[$i].'</td>'; 
                    }
                    $html .= '</tr>';
            }
            $html .= '</tbody></table>';   
            // it releases the associated results
            mysqli_free_result($results);
            disconnect($db);
            return $html;
        }
        return false;
    }
    
    function getProductosRaw() {
        $db = connect();
        if ($db != NULL) {
            
            //Specification of the SQL query
            $query='SELECT * FROM productos';
            $query;
             // Query execution; returns identifier of the result group
            $results = $db->query($query);
             // cycle to explode every line of the results
        
           while ($fila = mysqli_fetch_array($results, MYSQLI_NUM)) {
                                                // Options: MYSQLI_NUM to use only numeric indexes
                                                // MYSQLI_ASSOC to use only name (string) indexes
                                                // MYSQLI_BOTH, to use both
                    for($i=0; $i<count($fila); $i++) {
                        // use of numeric index
                        echo $fila[$i].' '; 
                    }
                    echo '<br>';
            }
               
            // it releases the associated results
            mysqli_free_result($results);
            disconnect($db);
            return true;
        }
        return true;
    }
    function delete_by_name($name){
        $db = connect();
        if ($db != NULL) {
            $sql='Delete from productos where nombre="'.$name.'"';
             if ($db->query($sql) === TRUE) {
                echo "borrado completo";
            } 
            else {
                echo "Error: " . $sql. "<br>" . $db->error;
            }
            disconnect($db);
            return true;
        }
        return false;
        
    }
    
    function getProductos() {
        $db = connect();
        if ($db != NULL) {
            
            //Specification of the SQL query
            $query='SELECT * FROM productos';
            $query;
             // Query execution; returns identifier of the result group
            $results = $db->query($query);
             // cycle to explode every line of the results
            $html = '<div class="grid-container"> 
                        <div class="grid-x grid-padding-x small-up-2 medium-up-3">';

           while ($fila = mysqli_fetch_array($results, MYSQLI_BOTH)) {
                                                // Options: MYSQLI_NUM to use only numeric indexes
                                                // MYSQLI_ASSOC to use only name (string) indexes
                                                // MYSQLI_BOTH, to use both
              
               $html .= '<div class="cell">
                                <div class="card">
                                   <div class="card-divider">
                                        '.$fila["nombre"].'
                                   </div>
                                   <img src="uploads/'.$fila["imagen"].'">
                                   <div class="card-section">
                                        <p>Publicado el: '.$fila["created_at"].'.</p>
                                        <!-- <form action="Veditar.php" method="post">
                                          <input type="hidden" name="nombre" value='.$fila["nombre"].'>
                                          <input type="submit" value="Editar">
                                        </form>     --> 
                                        <form action="delete.php" method="post">
                                          <input type="hidden" name="nombre" value='.$fila["nombre"].'>
                                          <input type="submit" value="Borrar">
                                        </form>
                                   </div>
                                </div>
                            </div>';

            }
            $html .='</div>
                </div>';
            
            echo $html;
            // it releases the associated results
            mysqli_free_result($results);
            disconnect($db);
            return true;
        }
        return true;
    }
    function getNombres() {
        $db = connect();
        if ($db != NULL) {

            //Specification of the SQL query
            $query='SELECT nombre from productos';
            $query;
            // Query execution; returns identifier of the result group
            $results = $db->query($query);
            $nombres= array();
            // cycle to explode every line of the results
            while ($fila = mysqli_fetch_array($results, MYSQLI_BOTH)) {
                $nombres[] = $fila['nombre'];
            }
            // it releases the associated results
            mysqli_free_result($results);
            disconnect($db);
            return $nombres;
        }
        return false;
    }

        
    
    //var_dump(login('lalo', 'hockey'));
    //var_dump(login('joaquin', 'basket'));
    //var_dump(login('cesar', 'basket'));
?>