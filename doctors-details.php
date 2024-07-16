<?php
header('Content-Type: application/json');

include "db-connection.php";
try {
    if (!isset($_GET['doctor_id'])) {
        http_response_code(200);
        echo json_encode(['error' => 'Doctor ID is required']);
        exit;
    }

    $doctorId = intval($_GET['doctor_id']);

    $sql = "SELECT d.*, 
                   h.hospital_name AS hospital_name, h.hospital_type AS hospital_type, 
                   h.hospital_address AS hospital_address, h.hospital_contact AS hospital_contact
            FROM doctors d
            JOIN hospitals h ON h.hospital_id = d.hospital_id
            WHERE d.doctor_id = ?";

    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $doctorId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $doctorDetails = $result->fetch_assoc();
        echo json_encode($doctorDetails);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Doctor not found']);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    if (isset($connect) && $connect instanceof mysqli) {
        $connect->close();
    }
}
?>