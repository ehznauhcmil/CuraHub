<?php
header('Content-Type: application/json');

include "db-connection.php";

try {
    if (!isset($_GET['doctor_id']) || !isset($_GET['date'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Provider ID and date are required']);
        exit;
    }

    $doctorId = intval($_GET['doctor_id']);
    $date = $_GET['date'];

    // Fetch all slots
    $sql = "SELECT s.slot_id, s.start_time, s.end_time,
                   CASE WHEN a.appointment_id IS NOT NULL THEN 1 ELSE 0 END AS is_booked
            FROM slots s
            LEFT JOIN appointments a ON s.slot_id = a.slot_id
                AND a.doctor_id = ?
                AND a.date = ?
            ORDER BY slot_id ASC";

    $stmt = $connect->prepare($sql);
    $stmt->bind_param("is", $doctorId, $date);
    $stmt->execute();
    $result = $stmt->get_result();

    $slots = [];
    while ($row = $result->fetch_assoc()) {
        $slots[] = $row;
    }

    echo json_encode($slots);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    if (isset($connect) && $connect instanceof mysqli) {
        $connect->close();
    }
}
?>