<?php


require __DIR__.'/configureDB.php';

// Create connection
$conn = new mysqli(servername, username, password, dbname );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Goods (id_goods,name,price)
VALUES ('22', 'mouse', '300');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


