<?php
// Our Database credentials username and passwords

    $user = "a9957173_a9957173";
    $pw = "qD)ZWCYL2BPI";
    $db = "a9957173_scpdb";

// Create connection
    $conn = new mysqli('localhost', $user, $pw, $db);
    
// Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }
//    echo "Connected successfully";



    // variable that returns all records in the database
    $all_records = $conn->query("select * from scp order by item");
    $randomV = $conn->query("select * from scp order by rand() limit 6");

?>