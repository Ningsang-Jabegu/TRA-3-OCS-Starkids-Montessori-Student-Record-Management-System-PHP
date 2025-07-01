<?php
require_once "config.php";

$sql = "SELECT * FROM students";
$stmt = mysqli_query($link, $sql);

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
            <a href='read.php?id=" . $row['id'] . "' class='mr-3' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
            <a href='update.php?id=" . $row['id'] . "' class='mr-3' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
            <a href='delete.php?id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
          </td>";
    echo "</tr>";
}

mysqli_close($link);
?>
