<?php
require_once "db/config.php";

$errors = [];
$student_id = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $required_fields = [
        'first_name',
        'last_name',
        'roll_no',
        'class',
        'gender',
        'dob',
        'contact_number',
        'nationality',
        'religion',
        'blood_group',
        'permanent_place',
        'permanent_district',
        'permanent_zone',
        'temporary_district',
        'temporary_zone'
    ];

    foreach ($required_fields as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            $errors[$field] = "$field is required.";
        }
    }

    if (count($errors) > 0) {
        echo json_encode(['status' => 'error', 'errors' => $errors]);
        exit;
    }

    $first_name = trim($_POST["first_name"] ?? '');
    $middle_name = trim($_POST["middle_name"] ?? '');
    $last_name = trim($_POST["last_name"] ?? '');
    // $student_name = ucwords(trim("$first_name $middle_name $last_name"));

    $roll_no = trim($_POST["roll_no"] ?? '');
    $class = trim($_POST["class"] ?? '');
    $gender = trim($_POST["gender"] ?? '');
    $dob = trim($_POST["dob"] ?? '');
    $contact_number = trim($_POST["contact_number"] ?? '');
    $nationality = trim($_POST["nationality"] ?? '');
    $religion = trim($_POST["religion"] ?? '');
    $blood_group = trim($_POST["blood_group"] ?? '');

    $permanent_place = trim($_POST["permanent_place"] ?? '');
    $permanent_district = trim($_POST["permanent_district"] ?? '');
    $permanent_zone = trim($_POST["permanent_zone"] ?? '');
    $temporary_place = trim($_POST["temporary_place"] ?? '');
    $temporary_district = trim($_POST["temporary_district"] ?? '');
    $temporary_zone = trim($_POST["temporary_zone"] ?? '');

    $created_at = $_POST['declaration_date'] ?? date("Y-m-d");
    $updated_at = date("Y-m-d H:i:s");

    // Assign POST values to variables before passing to bind_param
    $recommendation_factors = $_POST['recommendation_factors'] ?? '';
    $child_reaction = $_POST['child_reaction'] ?? '';
    $emergency_hospital = $_POST['emergency_hospital'] ?? '';
    $positive_attitude = $_POST['positive_attitude'] ?? '';
    $negative_attitude = $_POST['negative_attitude'] ?? '';
    $interested = $_POST['interested'] ?? '';
    $not_interested = $_POST['not_interested'] ?? '';
    $health_status = $_POST['health_status'] ?? '';
    $student_progress_report = $_POST['progress_report'] ?? '';
    $student_birth_certificate = $_POST['birth_certificate'] ?? '';
    $student_medical_report = $_POST['medical_report'] ?? '';
    $declaration_date = $_POST['declaration_date'] ?? '';
    $father_signature = $_POST['father_signature'] ?? '';
    $mother_signature = $_POST['mother_signature'] ?? '';

    // Get the last inserted student ID for use in related tables
    // Generate a unique student_id (e.g., "STU" + timestamp + random 4 digits)
    // Generate a unique student_id using roll_no, class, and dob (format: STU{roll_no}{class}{dob})
    // Example: STU1234A20240610 (if roll_no=1234, class=A, dob=2024-06-10)
    // Recommended VARCHAR length for student_id in DB: at least 20 characters
    $student_id = 'STU' . $roll_no . $class . str_replace('-', '', $dob);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $generated_roll_no = $_POST["roll_no"] ?? $generated_roll_no;

        $full_name = ucwords(trim("$first_name $middle_name $last_name"));
        $student_name = $full_name;
        // $roll_no = $generated_roll_no;

        $student_image = uploadStudentFile(
            'student_image',
            $student_name,
            $roll_no,
            'Photo',
            './web/student_images/'
        );

        $student_birth_certificate = uploadStudentFile(
            'birth_certificate',
            $student_name,
            $roll_no,
            'Birth Certificate',
            './web/student_birth_certificate/'
        );

        $student_medical_report = uploadStudentFile(
            'medical_record',
            $student_name,
            $roll_no,
            'Medical Report',
            './web/student_medical_report/'
        );

        $student_progress_report = uploadStudentFile(
            'progress_report',
            $student_name,
            $roll_no,
            'Progress Report',
            './web/student_progress_report/'
        );

        // Continue to insert into DB or handle success message
        // You can pass the $student_image etc. to your insert logic here
    }

    $insert_student_sql = "INSERT INTO students (
        star_id, roll_no, class, gender, dob, nationality, religion, blood_group,
        contact_number, student_image, permanent_place, permanent_district, permanent_zone,
        temporary_place, temporary_district, temporary_zone, recommendation_factors, child_reaction, emergency_hospital,
        positive_attitude, negative_attitude interested, not_interested, health_status, student_progress_report,
        student_birth_certificate, student_medical_report, declaration_date, father_signature, mother_signature,
         status, created_at, updated_at, first_name, middle_name, last_name
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
        ?, NULLIF(?,''), NULLIF(?,''), NULLIF(?,''), 
        NULLIF(?,''), NULLIF(?,''), NULLIF(?,''), NULLIF(?,''), NULLIF(?,''), 
        NULLIF(?,''), NULLIF(?,''), NULLIF(?,''), ?, ?, ?, 'pending', ?, ?, ?, ?, ?)";



    $stmt = mysqli_prepare($link, $insert_student_sql);
    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssssssssssssssssssssssssssssssss",
        $star_id,
        $roll_no,
        $class,
        $gender,
        $dob,
        $nationality,
        $religion,
        $blood_group,
        $contact_number,
        $student_image,
        $permanent_place,
        $permanent_district,
        $permanent_zone,
        $temporary_place,
        $temporary_district,
        $temporary_zone,
        $recommendation_factors,
        $child_reaction,
        $emergency_hospital,
        $positive_attitude,
        $interested,
        $not_interested,
        $health_status,
        $student_progress_report,
        $student_birth_certificate,
        $student_medical_report,
        $declaration_date,
        $father_signature,
        $mother_signature,
        $created_at,
        $updated_at,
        $first_name,
        $middle_name,
        $last_name
    );

    if (mysqli_stmt_execute($stmt)) {
        // Get the last inserted student ID for use in related tables
        $student_id = mysqli_insert_id($link);

        // You can now use $student_id to link records in parents, guardians, or other tables.

        // Prepare and insert father's data
        $father_first_name = trim($_POST['father_first_name'] ?? '');
        $father_middle_name = trim($_POST['father_middle_name'] ?? '');
        $father_last_name = trim($_POST['father_last_name'] ?? '');
        $father_occupation = trim($_POST['father_occupation'] ?? '');
        $father_office = trim($_POST['father_office'] ?? '');
        $father_office_contact = trim($_POST['father_office_contact'] ?? '');
        $father_residence = trim($_POST['father_residence'] ?? '');
        $father_mobile1 = trim($_POST['father_mobile1'] ?? '');
        $father_mobile2 = trim($_POST['father_mobile2'] ?? '');
        $father_email = trim($_POST['father_email'] ?? '');
        $father_facebook = trim($_POST['father_facebook'] ?? '');

        $stmt_father = mysqli_prepare($link, "INSERT INTO parents (star_id, student_id, type, first_name, middle_name, last_name, occupation, office_name, office_number, residence, mobile_1, mobile_2, email, facebook_id) VALUES (?, 'father', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param(
            $stmt_father,
            "sisssssssssss",
            $star_id,
            $student_id,
            $father_first_name,
            $father_middle_name,
            $father_last_name,
            $father_occupation,
            $father_office,
            $father_office_contact,
            $father_residence,
            $father_mobile1,
            $father_mobile2,
            $father_email,
            $father_facebook
        );
        mysqli_stmt_execute($stmt_father);

        // Prepare and insert mother's data
        $mother_first_name = trim($_POST['mother_first_name'] ?? '');
        $mother_middle_name = trim($_POST['mother_middle_name'] ?? '');
        $mother_last_name = trim($_POST['mother_last_name'] ?? '');
        $mother_occupation = trim($_POST['mother_occupation'] ?? '');
        $mother_office = trim($_POST['mother_office'] ?? '');
        $mother_office_contact = trim($_POST['mother_office_contact'] ?? '');
        $mother_residence = trim($_POST['mother_residence'] ?? '');
        $mother_mobile1 = trim($_POST['mother_mobile1'] ?? '');
        $mother_mobile2 = trim($_POST['mother_mobile2'] ?? '');
        $mother_email = trim($_POST['mother_email'] ?? '');
        $mother_facebook = trim($_POST['mother_facebook'] ?? '');

        $stmt_mother = mysqli_prepare($link, "INSERT INTO parents (star_id, student_id, type, first_name, middle_name, last_name, occupation, office_name, office_number, residence, mobile_1, mobile_2, email, facebook_id) VALUES (?, 'mother', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param(
            $stmt_mother,
            "sisssssssssss",
            $star_id,
            $student_id,
            $mother_first_name,
            $mother_middle_name,
            $mother_last_name,
            $mother_occupation,
            $mother_office,
            $mother_office_contact,
            $mother_residence,
            $mother_mobile1,
            $mother_mobile2,
            $mother_email,
            $mother_facebook
        );
        mysqli_stmt_execute($stmt_mother);

        // Prepare and insert guardian's data
        $guardian_first_name = trim($_POST['guardian_first_name'] ?? '');
        $guardian_middle_name = trim($_POST['guardian_middle_name'] ?? '');
        $guardian_last_name = trim($_POST['guardian_last_name'] ?? '');
        $guardian_relation = trim($_POST['guardian_relation'] ?? '');
        $guardian_occupation = trim($_POST['guardian_occupation'] ?? '');
        $guardian_residence = trim($_POST['guardian_residence'] ?? '');
        $guardian_mobile1 = trim($_POST['guardian_mobile1'] ?? '');
        $guardian_mobile2 = trim($_POST['guardian_mobile2'] ?? '');
        $guardian_email = trim($_POST['guardian_email'] ?? '');
        $guardian_facebook = trim($_POST['guardian_facebook'] ?? '');

        $stmt_guardian = mysqli_prepare(
            $link,
            "INSERT INTO guardians (star_id, student_id, type, first_name, middle_name, last_name, relation, occupation, residence, mobile1, mobile2, email, facebook) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $guardian_type = 'guardian';
        mysqli_stmt_bind_param(
            $stmt_guardian,
            "sisssssssssss",
            $star_id,
            $student_id,
            $guardian_type,
            $guardian_first_name,
            $guardian_middle_name,
            $guardian_last_name,
            $guardian_relation,
            $guardian_occupation,
            $guardian_residence,
            $guardian_mobile1,
            $guardian_mobile2,
            $guardian_email,
            $guardian_facebook
        );
        mysqli_stmt_execute($stmt_guardian);

        echo json_encode(['status' => 'success', 'message' => 'Student added successfully.']);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert student.']);
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admission Form | Starkids Montessori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Admission form for Starkids Montessori Preschool. Fill out the form to add a new student record.">
    <meta name="keywords" content="admission, form, student, preschool, Starkids Montessori, registration">
    <meta name="author" content="Starkids Montessori">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow">
    <!-- Bootstrap 4.5.2 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome 4.7.0 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Fonts for Modern Luxury -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/photo-preview.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Make sure jQuery and Bootstrap JS are loaded -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">
            <img src="./assets/images/Star_Kids_Montessori_Preschool_Logo.png" alt="Starkids Montessori Logo"
                style="width:180px;height:auto;vertical-align:middle;padding:4px;background: #fff; border-radius: 8px;">
            <span style="vertical-align:middle;">Starkids Montessori</span>
        </a>
    </nav>
     -->
    <?php

    include 'pages/admission-page.php';
    ?>
</body>

</html>