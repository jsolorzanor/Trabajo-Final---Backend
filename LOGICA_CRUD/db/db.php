<?php

    $db = new mysqli("localhost", "root","juan28","hoteles_tf");
    $db->set_charset("utf8");

    if($db->connect_errno) {
        echo "Error | Connect to database MySQL";
        exit();
    }

    // echo "Connection db succesful!!";
?>