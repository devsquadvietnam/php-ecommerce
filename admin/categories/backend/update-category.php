<?php
session_start();

include '../../backend/db_connection.php';

$id = $_POST['id'];
$parentId = $_POST['parent_id'];
$name = $_POST['name'];
$updatedAt = date('Y-m-d H:i:s');

$sql = "UPDATE categories SET name = '{$name}', parent_id = '{$parentId}', updated_at = '{$updatedAt}' WHERE id = {$id};";

$result = $connection->query($sql);

if($result) {
    $_SESSION['message'] = "Update category successfully !!";
    header("Location: /admin/categories");
    return;
}

header("Location: /admin/categories/edit.php");

$connection->close();

