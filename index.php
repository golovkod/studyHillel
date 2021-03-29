<?php

require __DIR__ . '/configureDB.php';

// Create connection
$conn = new mysqli(servername, username, password, dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Реализовать выборку всех заказов по одному из контрагентов" . "<br>";
$sql = "SELECT * FROM Orders INNER JOIN Goods on Goods.id_goods=Orders.id_goods
                    WHERE Orders.id_contragents=123";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " id_orders: " . $row["id_orders"] .
            " quantity: " . $row["quantity"] . " id_goods: " . $row["id_goods"] .
            " name: " . $row["name"] . " id_contragents " . $row["id_contragents"] . "<br>";
    }
} else {
    echo "0 results";
}


echo "Реализовать выборку задвоенных контрагентов" . "<br>";
$sql = "SELECT * FROM Contragents WHERE name_contragents IN
        (SELECT name_contragents  FROM Contragents GROUP BY name_contragents HAVING COUNT(name_contragents) > 1)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " id_contragents: " . $row["id_contragents"] . " name_contragents " . $row["name_contragents"] . "<br>";
    }
} else {
    echo "0 results";
}

echo "Реализовать выборку всех оплаченных заказов" . "<br>";
$sql = "SELECT * FROM Payment WHERE status_payment = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " id_orders: " . $row["id_orders"] . " status_payments " . $row["status_payment"] . "<br>";
    }
} else {
    echo "0 results";
}

echo "Реализовать выборку по сумме всех заказов на контрагентов" . "<br>";

$sql = "SELECT Contragents.id, Contragents.name_contragents, SUM(Orders.quantity * Goods.price) AS
    allsum FROM Orders, Goods, Contragents
WHERE Orders.id_goods = Goods.id_goods AND Contragents.id_contragents = Orders.id_contragents
GROUP BY Orders.id_contragents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " id_contragents: " . $row["name_contragents"] . " name_contragents " . $row["allsum"] . "<br>";
    }
} else {
    echo "0 results";
}


$conn->close();




