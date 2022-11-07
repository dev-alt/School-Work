<?php
// Our Database credentials username and passwords
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    

// Create connection
try{
    $user = "a9957173_a9957173";
    $pw = "qD)ZWCYL2BPI";
    $db = "a9957173_scpdb";
    
    $conn = new mysqli('localhost', $user, $pw, $db);
}
catch (exception $e){
        $error = "SQL+Connection+Error";
        header("Location:status.php?error=".$error);
        exit();
}

    

    $all_records = $conn->query("select * from scp order by item");
    $randomV = $conn->query("select * from scp order by rand() limit 6");

?>