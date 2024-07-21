<?php
include "db-connection.php";
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
       $stmt = $connect->prepare("INSERT INTO doctors (first_name, last_name, specialization,  
           hospital_id, qualification, university, contact) VALUES (?, ?, ?, ?, ?, ?, ?)");
       $stmt->bind_param("sssisss", $first_name, $last_name, $specialization,  
       $hospital_id, $qualification, $university, $contact);
       
       if ($stmt->execute()) {
        echo "<script type='text/javascript'>
                alert('Data stored in the database successfully.');
                window.location.href = 'admin-dashboard.php';
              </script>";
        exit();
    } else {
        echo "<script type='text/javascript'>
                alert('ERROR: Hush! Sorry, there was an error. " . $stmt->error . "');
              </script>";
    }
       
       // Close the statement
       $stmt->close();
}
?>

