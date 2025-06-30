<?php
require_once "config.php";

$search = $_POST['search'] ?? '';
$search = trim($search);

if ($search === '') {
    $sql = "SELECT * FROM students";
    $stmt = mysqli_query($link, $sql);
} else {
    $sql = "SELECT * FROM students WHERE student_name LIKE ? OR class LIKE ? OR roll_no LIKE ?";
    $stmt = mysqli_prepare($link, $sql);
    $param = "%{$search}%";
    mysqli_stmt_bind_param($stmt, "sss", $param, $param, $param);
    mysqli_stmt_execute($stmt);
    $stmt = mysqli_stmt_get_result($stmt);
}

while ($row = mysqli_fetch_assoc($stmt)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['student_name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['class']) . "</td>";
    echo "<td>" . htmlspecialchars($row['roll_no']) . "</td>";
    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
    echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
    echo "<td>" . htmlspecialchars($row['contact_number']) . "</td>";
    echo "<td>
            <a href='read.php?id=" . $row['id'] . "'><span class='fa fa-eye'></span></a>
            <a href='update.php?id=" . $row['id'] . "'><span class='fa fa-pencil'></span></a>
            <a href='delete.php?id=" . $row['id'] . "'><span class='fa fa-trash'></span></a>
          </td>";
    echo "</tr>";
}

mysqli_close($link);
