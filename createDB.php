<?php


require __DIR__.'/configureDB.php';

// Create connection
$conn = new mysqli(servername, username, password, dbname );
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE testDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

