<?php
require "connection.php";

$admin_id = 8801;
$password = "1234";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$email = "cz@ch.com";
$first_name = "Lim";
$last_name = "ChuanZhe";


// Use a prepared statement to insert the hashed password into the database
$stmt = $connect->prepare("INSERT INTO admin (admin_id, email, password, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $admin_id, $email, $hashedPassword, $first_name, $last_name); // Assuming the email is "cz@ch.com"
$stmt->execute();
