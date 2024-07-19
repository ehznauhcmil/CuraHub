<?php 
    include "db-connection.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_status = $_POST['status-selector'];
        $appointment_id = $_POST['appointment_id'];
        
        // Update the status in your database
        $sql = "UPDATE appointments SET status = '$new_status' WHERE appointment_id = '$appointment_id'";
        if ($connect->query($sql) === TRUE) {
            echo "Status updated successfully";
            header("Refresh: 2; url=admin-dashboard.php");
        } else {
            echo "Error updating status: " . $connect->error;
        }
    }
?>