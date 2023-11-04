<?php

include '../../backend/db_connection.php';

$name = $_POST['name'];
$parentId = $_POST['parent_id'];
$createdAt = date('Y-m-d H:i:s');
$updatedAt = date('Y-m-d H:i:s');

$sql = "INSERT INTO categories (name, parent_id, created_at, updated_at) " .
    " VALUES('{$name}', {$parentId} ,'{$createdAt}','{$updatedAt}');";

$result = $connection->query($sql);

if($result) {
    header("Location: /admin/categories");
    return;
}

header("Location: /admin/categories/create.php");

$connection->close();

