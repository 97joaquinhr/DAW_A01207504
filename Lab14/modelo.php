<?php
    function connect() {
        $mysql = mysqli_connect("localhost","root","","tienda");
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
    
    function getProductosRaw() {
        $db = connect();
        if ($db != NULL) {
            
            //Specification of the SQL query
            $query='SELECT * FROM productos';
            $query;
             // Query execution; returns identifier of the result group
            $results = $db->query($query);
             // cycle to explode every line of the results
        
           while ($fila = mysqli_fetch_array($results, MYSQLI_BOTH)) {
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
    
    function getProductos() {
        $db = connect();
        if ($db != NULL) {
            
            //Specification of the SQL query
            $query='SELECT * FROM productos';
            $query;
             // Query execution; returns identifier of the result group
            $results = $db->query($query);
             // cycle to explode every line of the results
            $html = '';
           while ($fila = mysqli_fetch_array($results, MYSQLI_BOTH)) {
                                                // Options: MYSQLI_NUM to use only numeric indexes
                                                // MYSQLI_ASSOC to use only name (string) indexes
                                                // MYSQLI_BOTH, to use both
                    $html .= '<div class="grid-x grid-margin-x">
                                <div class="cell">
                                  <div class="card">
                                    <div class="card-divider">'.$fila["nombre"].'<div>
                                    <img src="uploads/'.$fila["imagen"].'">
                                    <div class="card-section">
                                      <p>Publicado el: '.$fila["created_at"].'.</p>
                                    </div>
                                  </div>
                                </div>
                              </div>';
            }
            echo $html;
            // it releases the associated results
            mysqli_free_result($results);
            disconnect($db);
            return true;
        }
        return true;
    }
        
    
    //var_dump(login('lalo', 'hockey'));
    //var_dump(login('joaquin', 'basket'));
    //var_dump(login('cesar', 'basket'));
?>