<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db-connection.php";
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = $_POST['password'];

    // Check credentials against BOTH tables using prepared statements
    $stmt = $connect->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['usertype'] = 'user';
            header("Location: user-dashboard.php"); // Redirect to user page
            $_SESSION['username'] = $row['first_name'] . ' ' . $row['last_name'];
            exit;
        }
    } else {
        $stmt = $connect->prepare("SELECT * FROM admins WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['usertype'] = 'admin';
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['username'] = $row['first_name'] . ' ' . $row['last_name'];
                header("Location: admin-dashboard.php"); // Redirect to admin page
                exit;
            }
        }
    }

    // Invalid credentials
    echo "Invalid email or password";
    header("Location: login.php");
}
?>