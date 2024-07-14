<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $provider_id = 13221;
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $specialization = $_POST['specialization'];
    $qualification = $_POST['qualification'];
    $university = $_POST['university'];
    $contact = $_POST['contact'];

    // Performing insert query execution
        $sql = "INSERT INTO healthcarepro VALUES ('$provider_id', '$first_name', '$last_name', '$specialization', '$qualification', 
            '$university', '$contact')";
        
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." ; 

                header("Refresh: 2; url=admin-dashboard.php");
                exit();
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
}
?>