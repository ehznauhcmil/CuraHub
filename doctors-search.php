<?php
include 'db-connection.php';

// 2. Get Search Term and Sanitize
$searchTerm = isset($_GET['search']) ? $_GET['search'] : ''; // Get search term from query string
$searchTerm = $connect->real_escape_string($searchTerm); // Prevent SQL injection

// 3. Prepare SQL Query
$sql = "SELECT provider_id, first_name, sast_name, specialization 
        FROM provider
        WHERE first_name LIKE '%$searchTerm%' OR last_name LIKE '%$searchTerm%' OR specialization LIKE '%$searchTerm%'"; // Add more fields if needed

// 4. Execute Query
$result = $connect->query($sql);

// 5. Fetch and Format Results as JSON
$doctors = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
}

// 6. Return JSON Response
header('Content-Type: application/json');
echo json_encode($doctors);

// 7. Close Connection
$connect->close();
?>