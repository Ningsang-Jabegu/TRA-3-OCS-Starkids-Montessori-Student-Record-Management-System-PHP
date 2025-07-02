<?php
// Function to get Nepali year (Bikram Sambat) from current AD year
function get_nepali_year() {
    $currentMonth = (int) date('n');
    $currentYear = (int) date('Y');
    return ($currentMonth >= 4) ? $currentYear + 57 : $currentYear + 56;
}
?>