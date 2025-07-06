<?php
// Make sure $pdo is a valid PDO connection

// Get the lowest available roll number
$stmt = $pdo->query("SELECT roll_no FROM students ORDER BY roll_no ASC");
$existingRolls = $stmt->fetchAll(PDO::FETCH_COLUMN);

$roll_no = null;
for ($i = 1; $i <= 999; $i++) {
    $formatted = str_pad($i, 2, '0', STR_PAD_LEFT);
    if (!in_array($formatted, $existingRolls)) {
        $roll_no = $formatted;
        break;
    }
}

// Now $roll_no contains the next available roll number as a string
?>
