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

?>