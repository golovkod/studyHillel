<?php


require __DIR__.'/configureDB.php';

// Create connection
$conn = new mysqli(servername, username, password, dbname );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE Orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_orders INT(6) UNSIGNED NOT NULL UNIQUE ,
id_goods INT(6) UNSIGNED NOT NULL,
quantity INT(6) UNSIGNED NOT NULL,
id_contragents INT(6) UNSIGNED NOT NULL,
data_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
CONSTRAINT FK_id_goods FOREIGN KEY (id_goods)
    REFERENCES Goods(id_goods),
    CONSTRAINT FK_id_contragents FOREIGN KEY (id_contragents)
    REFERENCES Contragents(id_contragents)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



$conn->close();


