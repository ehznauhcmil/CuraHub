<?php
header('Content-Type: application/json');

require "connection.php";

try {
    if (!isset($_POST['doctor_id']) || !isset($_POST['date']) || !isset($_POST['slot_id']) || !isset($_POST['user_id'])) {
        http_response_code(400);
        echo json_encode(['error' => 'All fields are required']);
        exit;
    }

    $doctorId = intval($_POST['doctor_id']);
    $date = $_POST['date'];
    $slotId = intval($_POST['slot_id']);
    $userId = intval($_POST['user_id']);

    // Check if the slot is already booked
    $checkSql = "SELECT appointment_id FROM appointments 
                 WHERE doctor_id = ? AND date = ? AND slot_id = ?";
    $checkStmt = $connect->prepare($checkSql);
    $checkStmt->bind_param("isi", $doctorId, $date, $slotId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo json_encode(['success' => false, 'error' => 'This slot is already booked']);
        exit;
    }

    // Book the appointment
    $bookSql = "INSERT INTO appointments (doctor_id, user_id, date, slot_id) 
                VALUES (?, ?, ?, ?)";
    $bookStmt = $connect->prepare($bookSql);
    $bookStmt->bind_param("iisi", $doctorId, $userId, $date, $slotId);
    $bookResult = $bookStmt->execute();

    if ($bookResult) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to book appointment']);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
} finally {
    if (isset($connect) && $connect instanceof mysqli) {
        $connect->close();
    }
}
?>