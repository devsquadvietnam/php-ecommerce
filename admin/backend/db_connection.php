<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "devsquad_ecommerce_app";

$connection = new mysqli($servername, $username, $password, $dbname);

if(!$connection) {
    die('Connection database failed !');
}

