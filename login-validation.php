<?php
session_start();

require "connection.php";
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
            $_SESSION['usertype'] = 'user';
            header("Location: userdashboard.php"); // Redirect to user page
            exit;
        }
    } else {
        $stmt = $connect->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['usertype'] = 'admin';
                header("Location: admin-dashboard-profile.php"); // Redirect to admin page
                exit;
            }
        }
    }

    // Invalid credentials
    echo "Invalid email or password";
}
?>