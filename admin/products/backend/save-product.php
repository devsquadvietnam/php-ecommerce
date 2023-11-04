<?php

include '../../backend/db_connection.php';

$name = $_POST['name'];
$price = $_POST['price'];
$categoryId = $_POST['category_id'];
$quantity = $_POST['quantity'];
$createdAt = date('Y-m-d H:i:s');
$updatedAt = date('Y-m-d H:i:s');

$sql = "INSERT INTO products (category_id, name, price, quantity, created_at, updated_at) " .
    " VALUES({$categoryId},'{$name}',{$price},{$quantity},'{$createdAt}','{$updatedAt}');";

$result = $connection->query($sql);

if($result) {
    header("Location: /admin/products");
    return;
}

header("Location: /admin/products/create.php");

$connection->close();

