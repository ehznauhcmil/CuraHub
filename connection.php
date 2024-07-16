<?php

$serverhost = 'localhost';
$username = 'root';
$password = '';
$database = 'CuraHub';

$connect = new mysqli($serverhost, $username, $password, $database);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


