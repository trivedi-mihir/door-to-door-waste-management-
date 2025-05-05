<?php
// Start session if needed later
session_start();

// Database configuration
$host = "localhost";
$username = "root";       // Default for XAMPP
$password = "";           // Default for XAMPP
$dbname = "ecocollect";

// Initialize response array
$response = ['status' => 'error', 'message' => ''];

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read JSON input
    $input = json_decode(file_get_contents('php://input'), true);

    // Connect to database
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $response['message'] = "Connection failed: " . $conn->connect_error;
        echo json_encode($response);
        exit;
    }

    // Retrieve and sanitize input
    $waste_type = isset($input['waste_type']) ? trim($input['waste_type']) : '';
    $points = isset($input['points']) ? intval($input['points']) : 0;
    $area = isset($input['area']) ? trim($input['area']) : '';
    $address = isset($input['address']) ? trim($input['address']) : '';
    $pickup_date = isset($input['date']) ? $input['date'] : '';
    $preferred_time = isset($input['time']) ? trim($input['time']) : '';
    $special_instructions = isset($input['special_instructions']) ? trim($input['special_instructions']) : '';

    // Validate required fields
    if (
        empty($waste_type) ||
        $points <= 0 ||
        empty($area) ||
        empty($address) ||
        empty($pickup_date) ||
        empty($preferred_time)
    ) {
        $response['message'] = 'Please fill out all required fields.';
        echo json_encode($response);
        exit;
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO waste_submissions 
                            (waste_type, points, area, address, pickup_date, preferred_time, special_instructions)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        $response['message'] = 'Database prepare error: ' . $conn->error;
        echo json_encode($response);
        exit;
    }

    $stmt->bind_param("sisssss", $waste_type, $points, $area, $address, $pickup_date, $preferred_time, $special_instructions);

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Pickup scheduled successfully!';
    } else {
        $response['message'] = 'Error scheduling pickup: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    $response['message'] = 'Invalid request method.';
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>