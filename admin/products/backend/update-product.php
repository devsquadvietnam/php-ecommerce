<?php
session_start();

include '../../backend/db_connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$updatedAt = date('Y-m-d H:i:s');

$sql = "UPDATE products SET name = '{$name}', price = {$price}, quantity = {$quantity}, updated_at = '{$updatedAt}' WHERE id = {$id};";

$result = $connection->query($sql);

if($result) {
    $_SESSION['message'] = "Update product successfully !!";
    header("Location: /admin/products");
    return;
}

header("Location: /admin/products/edit.php");

$connection->close();

