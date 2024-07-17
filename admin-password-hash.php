<?php
session_start();
include "db-connection.php";

$admin_id = 1009;
$password = "1234";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$email = "curahub@gmail.com";
$first_name = "Ad";
$last_name = "Min";


// Use a prepared statement to insert the hashed password into the database
$stmt = $connect->prepare("INSERT INTO admins (admin_id, email, password, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $admin_id, $email, $hashedPassword, $first_name, $last_name); // Assuming the email is "cz@ch.com"
$stmt->execute();
