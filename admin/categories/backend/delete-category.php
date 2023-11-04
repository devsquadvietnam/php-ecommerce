<?php
session_start();

include '../../backend/db_connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = {$id}; ";

$result = $connection->query($sql);

if ($result) {
    $_SESSION['message'] = "Delete product successfully !!";
}

header("Location: /admin/products");

$connection->close();
