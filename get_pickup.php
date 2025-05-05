<?php
// Enable error logging
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'errors.log');
error_reporting(E_ALL);

// Set headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Database connection settings
$host = 'localhost';
$dbname = 'ecocollect';
$username = 'root';
$password = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verify table existence
    $tableCheck = $pdo->query("SHOW TABLES LIKE 'waste_submissions'");
    if ($tableCheck->rowCount() === 0) {
        throw new Exception("Table 'waste_submissions' does not exist.");
    }

    // Query to fetch pickups
    $stmt = $pdo->query("SELECT id, area, address, pickup_date, preferred_time, waste_type, points, special_instructions FROM waste_submissions");
    $pickups = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return success response
    echo json_encode([
        'status' => 'success',
        'pickups' => $pickups
    ]);

} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    echo json_encode([
        'status' => 'error',
        'message' => 'Database error: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    error_log("Error: " . $e->getMessage());
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>