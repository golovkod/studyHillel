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

$sql = "CREATE TABLE Payment (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_orders INT(6) UNSIGNED NOT NULL,
status_payment BOOLEAN,
data_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 CONSTRAINT FK_id_orders FOREIGN KEY (id_orders)
    REFERENCES Orders(id_orders)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table Payment created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

