<?php

require __DIR__.'/configureDB.php';

// Create connection
$conn = new mysqli(servername, username, password, dbname );
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE Goods (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_goods INT(6) UNSIGNED NOT NULL UNIQUE,
name VARCHAR(30) NOT NULL,
price INT(6) UNSIGNED NOT NULL,
data_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)";
if ($conn->query($sql) === TRUE) {
    echo "Table Goods created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();

