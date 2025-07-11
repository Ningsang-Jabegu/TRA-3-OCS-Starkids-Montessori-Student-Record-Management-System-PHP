<?php
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    require_once "db/config.php";

    // Define columns to fetch from each table
    $studentCols = [
        'id', 'first_name', 'middle_name', 'last_name', 'roll_no', 'class',
        'gender', 'dob', 'nationality', 'religion', 'blood_group',
        'contact_number', 'student_image', 'permanent_place', 'permanent_district', 'permanent_zone',
        'temporary_place', 'temporary_district', 'temporary_zone', 'recommendation_factors', 'child_reaction',
        'emergency_hospital', 'positive_attitude', 'negative_attitude', 'interested', 'not_interested',
        'health_status', 'student_progress_report', 'student_birth_certificate', 'student_medical_report', 'declaration_date',
        'status', 'created_at', 'updated_at'
    ];
    $fatherCols = [
        'id', 'student_id', 'first_name', 'middle_name', 'last_name',
        'occupation', 'office_name', 'office_number', 'residence',
        'mobile_1', 'mobile_2', 'email', 'facebook_id', 'father_signature'
    ];
    $motherCols = [
        'id', 'student_id', 'first_name', 'middle_name', 'last_name',
        'occupation', 'office_name', 'office_number', 'residence',
        'mobile_1', 'mobile_2', 'email', 'facebook_id', 'mother_signature'
    ];
    $guardianCols = [
        'id', 'student_id', 'first_name', 'middle_name', 'last_name',
        'relation', 'occupation', 'residence', 'mobile1', 'mobile2', 'email', 'facebook'
    ];

    function aliasColumns($cols, $alias) {
        return array_map(fn($col) => "$alias.$col AS {$alias}_$col", $cols);
    }

    // Build the final SQL query
    $selectFields = array_merge(
        aliasColumns($studentCols, 's'),
        aliasColumns($fatherCols, 'f'),
        aliasColumns($motherCols, 'm'),
        aliasColumns($guardianCols, 'g')
    );

    $sql = "SELECT " . implode(", ", $selectFields) . "
            FROM students s
            LEFT JOIN fathers f ON f.student_id = s.id
            LEFT JOIN mothers m ON m.student_id = s.id
            LEFT JOIN guardians g ON g.student_id = s.id
            WHERE s.id = ?";

    // Prepare and execute
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["id"]);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $student = [];
                $father = [];
                $mother = [];
                $guardian = [];

                foreach ($row as $key => $value) {
                    if (strpos($key, 's_') === 0) {
                        $student[substr($key, 2)] = $value;
                    } elseif (strpos($key, 'f_') === 0) {
                        $father[substr($key, 2)] = $value;
                    } elseif (strpos($key, 'm_') === 0) {
                        $mother[substr($key, 2)] = $value;
                    } elseif (strpos($key, 'g_') === 0) {
                        $guardian[substr($key, 2)] = $value;
                    }
                }

                // Optional: Debug in console
                // echo "<script>
                //     console.log('Student:', " . json_encode($student) . ");
                //     console.log('Father:', " . json_encode($father) . ");
                //     console.log('Mother:', " . json_encode($mother) . ");
                //     console.log('Guardian:', " . json_encode($guardian) . ");
                // </script>";
            } else {
                header("location: error.php");
                exit();
            }
        } else {
            echo "Execution failed. Try again later.";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
} else {
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Student | Starkids Montessori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
        $activePage = 'view-students';
        include 'layout/page-structure.php';
    ?>
</body>
</html>
