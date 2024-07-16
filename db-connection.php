<?php
$serverhost = 'localhost';
$username = 'root';
$password = '';
$database = 'CuraHub';

// Create connection
$connect = new mysqli($serverhost, $username, $password, $database);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>