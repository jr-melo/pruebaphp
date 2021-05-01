<?php

function dbConnect(){
    $servername = "localhost";
    $username = "pruebaphp";
    $password = "pruebaphp";
    $dbname = "pruebaphp";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset('utf8');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

?>