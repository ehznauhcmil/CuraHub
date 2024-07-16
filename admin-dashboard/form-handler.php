<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $hospital_id = $_POST['hospital_id'];
    $specialization = $_POST['specialization'];
    $qualification = $_POST['qualification'];
    $university = $_POST['university'];
    $contact = $_POST['contact'];

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO doctors (first_name, last_name, specialization,  
            hospital_id, qualification, university, contact) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $first_name, $last_name, $specialization,  
        $hospital_id, $qualification, $university, $contact);
        
        if ($stmt->execute()) {
            echo "<h3>Data stored in the database successfully.</h3>";
        
            header("Refresh: 2; url=admin-dashboard.php");
            exit();
        } else {
            echo "ERROR: Hush! Sorry, there was an error. " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
 }
 ?>