<?php
session_start();
include "db-connection.php";

$admin_id = 10011;
$password = "123";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$email = "safar@gmail.com";
$first_name = "Abdulla";
$last_name = "Safar";


// Use a prepared statement to insert the hashed password into the database
$stmt = $connect->prepare("INSERT INTO admin (admin_id, email, password, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $admin_id, $email, $hashedPassword, $first_name, $last_name); // Assuming the email is "cz@ch.com"
$stmt->execute();
