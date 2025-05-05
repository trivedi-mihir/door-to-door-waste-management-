<?php
include 'conn.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid pickup data']);
    exit;
}

$waste_type = $data['waste_type'] ?? '';
$area = $data['area'] ?? '';
$address = $data['address'] ?? '';
$date = $data['date'] ?? '';
$time = $data['time'] ?? '';
$special_instructions = $data['special_instructions'] ?? '';

if (!$waste_type || !$area || !$date || !$time) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}

$stmt = $conn->prepare("
    INSERT INTO pickups (waste_type, area, address, date, time, special_instructions) VALUES (?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "sssssss",
    $waste_type,
    $area,
    $address,
    $date,
    $time,
    $special_instructions
);

if ($stmt->execute()) {
    echo json_encode([
        'status' => 'success',
        'message' => "Pickup scheduled successfully!"
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => "Failed to schedule pickup"
    ]);
}

$stmt->close();
$conn->close();
?>