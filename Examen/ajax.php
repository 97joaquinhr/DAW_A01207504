<?php

    require_once ("util.php");
    $response = "";
    $response.=getFails();
    $response.=getSuccess();
    $response.=getTable();
    $response.=getSysFail();
    echo $response;
    // $size = 0;
    // for ($i = 0; $i < count($words); $i++) {
    //     $pos = stripos(strtolower($words[$i]), $pattern);
    //     if (!($pos === false)) {
    //         $size++;
    //         $word = $words[$i];
    //         $response .= "<option value=\"$word\">$word</option>";
    //     }
    // }
    // if ($size > 0)
    //     echo "<select id=\"list\" size=$size onclick=\"selectValue()\">$response</select>";
?>

