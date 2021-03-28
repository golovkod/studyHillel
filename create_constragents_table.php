<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "testDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// sql to create table
$sql = "CREATE TABLE Contragents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_contragents INT(6) UNSIGNED NOT NULL UNIQUE,
name_contragents VARCHAR(3g0) NOT NULL,
data_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Contragents created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
