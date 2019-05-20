<?php
$connection = new mysqli('localhost', 'root', '','blogs');

if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
} 
?>