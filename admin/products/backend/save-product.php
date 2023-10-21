<?php

include '../../backend/db_connection.php';

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$createdAt = date('Y-m-d H:i:s');
$updatedAt = date('Y-m-d H:i:s');

$sql = "INSERT INTO products (name, price, quantity, created_at, updated_at) " .
    " VALUES('{$name}',{$price},{$quantity},'{$createdAt}','{$updatedAt}');";

$result = $connection->query($sql);

if($result) {
    header("Location: /admin/products");
    return;
}

header("Location: /admin/products/create.php");

$connection->close();

