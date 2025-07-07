<?php
header('Content-Type: application/json');

// Database connection settings
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'starkids';

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Get search term if provided
$searchTerm = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Base SQL query
$sql = "SELECT * FROM students";

// Add search conditions if search term exists
if (!empty($searchTerm)) {
    $sql .= " WHERE 
        first_name LIKE '%$searchTerm%' OR
        middle_name LIKE '%$searchTerm%' OR
        last_name LIKE '%$searchTerm%' OR
        class LIKE '%$searchTerm%' OR
        roll_no LIKE '%$searchTerm%' OR
        contact_number LIKE '%$searchTerm%'";
}

$result = $conn->query($sql);

$students = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $student_id = $row['id'];
        
        // Fetch father details
        $father_sql = "SELECT * FROM fathers WHERE student_id = $student_id";
        $father_result = $conn->query($father_sql);
        $father = $father_result->fetch_assoc() ?: [];

        // Fetch mother details
        $mother_sql = "SELECT * FROM mothers WHERE student_id = $student_id";
        $mother_result = $conn->query($mother_sql);
        $mother = $mother_result->fetch_assoc() ?: [];

        // Fetch guardian details
        $guardian_sql = "SELECT * FROM guardians WHERE student_id = $student_id";
        $guardian_result = $conn->query($guardian_sql);
        $guardian = $guardian_result->fetch_assoc() ?: [];

        // Combine student details with family details
        $students[] = [
            'student' => $row,
            'father' => $father,
            'mother' => $mother,
            'guardian' => $guardian
        ];
    }
}

echo json_encode($students);

$conn->close();
?>