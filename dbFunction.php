<?php

function newDBConnect()
{
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

function selectAll($table)
{

    $conn = newDBConnect();
    $sql = "SELECT * FROM $table";
    $results = $conn->query($sql);
    $records = [];

    if ($results && $results->num_rows > 0) {

        while ($record = $results->fetch_assoc()) {
            $records[] = $record;
        }
    }

    $conn->close();
    return $records;
}

function insertRecord($sql)
{
    $conn = newDBConnect();
    $result = true;

    if (mysqli_query($conn, $sql) === FALSE) {
        $result = false;
    }

    $conn->close();
    return $result;
}

function queryInsert()
{
    insertRecord("DROP TABLE IF EXISTS main_anime");
    insertRecord("CREATE TABLE main_anime (id INT AUTO_INCREMENT NOT NULL, element_name text, parent_id INT, PRIMARY KEY (id))");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Naruto', '0')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Naruto Shippuden', '1')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Boruto', '2')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Boruto Movie', '2')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Naruto Movie 1', '1')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Naruto Movie 2', '5')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Naruto Movie 3', '6')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Naruto Movie 4', '7')");

    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Attack on Titan', '0')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Attack on Titan S2', '9')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Attack on Titan S3', '10')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Attack on Titan S4 Part 1', '11')");
    insertRecord("INSERT INTO main_anime (element_name, parent_id) VALUES ('Attack on Titan S4 Part 1', '11')");
}
