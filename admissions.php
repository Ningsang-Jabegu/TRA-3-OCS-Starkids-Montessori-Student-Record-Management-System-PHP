<?php
// Include config file
require_once "db/config.php";

// Define variables and initialize with empty values
$student_name = $class = $roll_no = $gender = $dob = $contact_number = "";
$errors = ["student_name" => "", "class" => "", "roll_no" => "", "gender" => "", "dob" => "", "contact_number" => ""];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate each field
    $student_name = trim($_POST["student_name"]);
    $class = trim($_POST["class"]);
    $roll_no = trim($_POST["roll_no"]);
    $gender = trim($_POST["gender"]);
    $dob = trim($_POST["dob"]);
    $contact_number = trim($_POST["contact_number"]);
    $nationality = trim($_POST["nationality"] ?? '');
    $religion = trim($_POST["religion"] ?? '');
    $blood_group = trim($_POST["blood_group"] ?? '');
    $permanent_place = trim($_POST["permanent_place"] ?? '');
    $permanent_district = trim($_POST["permanent_district"] ?? '');
    $permanent_zone = trim($_POST["permanent_zone"] ?? '');
    $temporary_place = trim($_POST["temporary_place"] ?? '');
    $temporary_district = trim($_POST["temporary_district"] ?? '');
    $temporary_zone = trim($_POST["temporary_zone"] ?? '');
    $father_name = trim($_POST["father_name"] ?? '');
    $father_occupation = trim($_POST["father_occupation"] ?? '');
    $father_office = trim($_POST["father_office"] ?? '');
    $father_contact = trim($_POST["father_contact"] ?? '');
    $father_email = trim($_POST["father_email"] ?? '');
    $mother_name = trim($_POST["mother_name"] ?? '');
    $mother_occupation = trim($_POST["mother_occupation"] ?? '');
    $mother_office = trim($_POST["mother_office"] ?? '');
    $mother_contact = trim($_POST["mother_contact"] ?? '');
    $mother_email = trim($_POST["mother_email"] ?? '');
    $guardian_name = trim($_POST["guardian_name"] ?? '');
    $guardian_relation = trim($_POST["guardian_relation"] ?? '');
    $guardian_occupation = trim($_POST["guardian_occupation"] ?? '');
    $guardian_office = trim($_POST["guardian_office"] ?? '');
    $guardian_contact = trim($_POST["guardian_contact"] ?? '');
    $guardian_email = trim($_POST["guardian_email"] ?? '');

    if (empty($student_name))
        $errors["student_name"] = "Enter student name.";
    if (empty($class))
        $errors["class"] = "Enter class.";
    if (empty($roll_no))
        $errors["roll_no"] = "Enter roll number.";
    if (empty($gender))
        $errors["gender"] = "Select gender.";
    if (empty($dob))
        $errors["dob"] = "Enter date of birth.";
    if (empty($contact_number))
        $errors["contact_number"] = "Enter contact number.";
    if (empty($nationality))
        $errors["nationality"] = "Enter nationality.";
    if (empty($religion))
        $errors["religion"] = "Enter religion.";
    if (empty($blood_group))
        $errors["blood_group"] = "Enter blood group.";
    if (empty($permanent_place))
        $errors["permanent_place"] = "Enter permanent place.";
    if (empty($permanent_district))
        $errors["permanent_district"] = "Enter permanent district.";
    if (empty($permanent_zone))
        $errors["permanent_zone"] = "Enter permanent zone.";
    if (empty($temporary_place))
        $errors["temporary_place"] = "Enter temporary place.";
    if (empty($temporary_district))
        $errors["temporary_district"] = "Enter temporary district.";
    if (empty($temporary_zone))
        $errors["temporary_zone"] = "Enter temporary zone.";
    if (empty($father_name))
        $errors["father_name"] = "Enter father's name.";
    if (empty($father_occupation))
        $errors["father_occupation"] = "Enter father's occupation.";
    if (empty($father_contact))
        $errors["father_contact"] = "Enter father's contact.";
    if (empty($mother_name))
        $errors["mother_name"] = "Enter mother's name.";
    if (empty($mother_occupation))
        $errors["mother_occupation"] = "Enter mother's occupation.";
    if (empty($mother_contact))
        $errors["mother_contact"] = "Enter mother's contact.";

    $has_error = array_filter($errors);

    if (!$has_error) {
        $check_sql = "SELECT id FROM students WHERE class = ? AND roll_no = ?";
        if ($check_stmt = mysqli_prepare($link, $check_sql)) {
            mysqli_stmt_bind_param($check_stmt, "ss", $class, $roll_no);
            mysqli_stmt_execute($check_stmt);
            mysqli_stmt_store_result($check_stmt);

            if (mysqli_stmt_num_rows($check_stmt) > 0) {
                echo "<script>alert('A student with the same class and roll number already exists.'); window.history.back();</script>";
                mysqli_stmt_close($check_stmt);
                exit();
            }

            mysqli_stmt_close($check_stmt);
        }


        $sql = "INSERT INTO students (
            student_name, class, roll_no, gender, dob, contact_number,
            nationality, religion, blood_group,
            permanent_place, permanent_district, permanent_zone,
            temporary_place, temporary_district, temporary_zone,
            father_name, father_occupation, father_office, father_contact, father_email,
            mother_name, mother_occupation, mother_office, mother_contact, mother_email,
            guardian_name, guardian_relation, guardian_occupation, guardian_office, guardian_contact, guardian_email
        ) VALUES (
            ?, ?, ?, ?, ?, ?,
            ?, ?, ?,
            ?, ?, ?,
            ?, ?, ?,
            ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?
        )";

        $check_sql = "SELECT id FROM students WHERE student_name = ? AND class = ? AND roll_no = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param(
                $stmt,
                "sssssssssssssssssssssssssssssss",
                $student_name,
                $class,
                $roll_no,
                $gender,
                $dob,
                $contact_number,
                $nationality,
                $religion,
                $blood_group,
                $permanent_place,
                $permanent_district,
                $permanent_zone,
                $temporary_place,
                $temporary_district,
                $temporary_zone,
                $father_name,
                $father_occupation,
                $father_office,
                $father_contact,
                $father_email,
                $mother_name,
                $mother_occupation,
                $mother_office,
                $mother_contact,
                $mother_email,
                $guardian_name,
                $guardian_relation,
                $guardian_occupation,
                $guardian_office,
                $guardian_contact,
                $guardian_email
            );
            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admission Form | Starkids Montessori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admission form for Starkids Montessori Preschool. Fill out the form to add a new student record.">
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