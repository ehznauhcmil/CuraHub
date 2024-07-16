<?php
session_start();
include "db-connection.php";
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form Data Collection and Validation
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $dateOfBirth = $_POST['dob'];
    $gender = $_POST['gender'];
    $identityNo = $_POST['identity'];
    $phoneNo = $_POST['phone'];

    // Basic Validation (Add more rigorous checks as needed)
    $errors = [];

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (empty($errors)) {
        // Hash the password securely
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Use a prepared statement to prevent SQL injection
        $stmt = $connect->prepare("INSERT INTO users (email, password, first_name, last_name, date_of_birth, gender, identity_no, phone_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $email, $hashedPassword, $firstName, $lastName, $dateOfBirth, $gender, $identityNo, $phoneNo);

        if ($stmt->execute()) {
            echo "Registration successful!";
            header('Location: login.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        // Display errors to the user
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}