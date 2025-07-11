<?php
// Function to get Nepali year (Bikram Sambat) from current AD year
function get_nepali_year() {
    $currentMonth = (int) date('n');
    $currentYear = (int) date('Y');
    return ($currentMonth >= 4) ? $currentYear + 57 : $currentYear + 56;
}

function uploadStudentFile($input_name, $full_name, $roll_no, $label, $target_dir) {
    if (!isset($_FILES[$input_name]) || $_FILES[$input_name]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $ext = pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION);

    $clean_name = preg_replace('/[^a-zA-Z0-9 ]/', '', $full_name);
    $file_name = trim($clean_name) . " - $roll_no - $label.$ext";
    $destination = $target_dir . $file_name;

    if (move_uploaded_file($_FILES[$input_name]['tmp_name'], $destination)) {
        return $file_name; // Save this in DB
    }

    return null;
}

function get_student_by_id($studentId) {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'starkids';

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        return null;
    }

    $studentId = (int)$studentId;

    // Fetch student
    $sql = "SELECT * FROM students WHERE id = $studentId";
    $result = $conn->query($sql);

    if (!$result || $result->num_rows === 0) {
        $conn->close();
        return null;
    }

    $student = $result->fetch_assoc();

    // Fetch father
    $father_sql = "SELECT * FROM fathers WHERE student_id = $studentId";
    $father_result = $conn->query($father_sql);
    $father = $father_result ? $father_result->fetch_assoc() : [];

    // Fetch mother
    $mother_sql = "SELECT * FROM mothers WHERE student_id = $studentId";
    $mother_result = $conn->query($mother_sql);
    $mother = $mother_result ? $mother_result->fetch_assoc() : [];

    // Fetch guardian
    $guardian_sql = "SELECT * FROM guardians WHERE student_id = $studentId";
    $guardian_result = $conn->query($guardian_sql);
    $guardian = $guardian_result ? $guardian_result->fetch_assoc() : [];

    $conn->close();

    return [
        'student' => $student,
        'father' => $father ?: [],
        'mother' => $mother ?: [],
        'guardian' => $guardian ?: []
    ];
}

?>