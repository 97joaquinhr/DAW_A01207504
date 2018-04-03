<?php
    function connect() {
        $ENV = "dev";
        if ($ENV == "dev") {
            $mysql = mysqli_connect("localhost","joaquinhr97","","Examen");
                                            //root si estan en windows
        } else  if ($ENV == "prod"){
            $mysql = mysqli_connect("localhost","joaquinhr97","","Examen");
        }
                                            //root si estan en windows
        $mysql->set_charset("utf8");
        return $mysql;
    }
    
    function disconnect($mysql) {
        mysqli_close($mysql);
    }
    
    function success($intento) {
        $db = connect();
        if ($db != NULL) {
            if($intento=="4 8 15 16 23 42"){
                if (!$db->query("CALL success('".$intento."')")) {
                    echo "Falló CALL: (" . $db->errno . ") " . $db->error;
                }
                return true;
            }else{
                if (!$db->query("CALL failure('".$intento."')")) {
                    echo "Falló CALL: (" . $db->errno . ") " . $db->error;
                }
                return false;
            }
            return true;
        } 
        return false;
    }
    function getFails() {
        $db = connect();
        if ($db != NULL) {
            
            $NF=$db->query("CALL NF()");

            $NFR = mysqli_fetch_array($NF, MYSQLI_BOTH);

            $response= "Fails ".$NFR["count(resutlado)"]."<br>";
            return $response;
            // echo "Numero de fails ".$NF." Numero de Success ".$NS;
            mysqli_free_result($NF);
            disconnect($db);
            return true;
        } 
        return false;
    }
    function getSuccess() {
        $db = connect();
        if ($db != NULL) {
            

            $NS=$db->query("CALL NS()");

            $NSR = mysqli_fetch_array($NS, MYSQLI_BOTH);

            return "Success ".$NSR["count(resutlado)"]. "<br>";
            // echo "Numero de fails ".$NF." Numero de Success ".$NS;
            mysqli_free_result($NS);
            disconnect($db);
            return true;
        } 
        return false;
    }
    // 4 8 15 16 23 42

    function getTable() {
        $db = connect();
        if ($db != NULL) {
            
             // Query execution; returns identifier of the result group
            $results = $db->query("CALL registros()");
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
            return $html;
            // it releases the associated results
            mysqli_free_result($results);
            disconnect($db);
            //return $html;
        }
        return false;
    }
    function getSysFail() {
        $db = connect();
        if ($db != NULL) {
            
             // Query execution; returns identifier of the result group
            $results = $db->query("CALL sysF()");
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
            return $html;
            // it releases the associated results
            mysqli_free_result($results);
            disconnect($db);
            //return $html;
        }
        return false;
    }
    
    
    //var_dump(login('lalo', 'hockey'));
    //var_dump(login('joaquin', 'basket'));
    //var_dump(login('cesar', 'basket'));
?>