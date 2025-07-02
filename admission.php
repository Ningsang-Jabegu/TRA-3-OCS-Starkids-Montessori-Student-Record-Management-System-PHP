<?php
// Include config file
require_once "config.php";

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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">
            <img src="./assets/images/Star_Kids_Montessori_Preschool_Logo.png" alt="Starkids Montessori Logo"
                style="width:180px;height:auto;vertical-align:middle;padding:4px;background: #fff; border-radius: 8px;">
            <span style="vertical-align:middle;">Starkids Montessori</span>
        </a>
    </nav>
    <div class="container">
        <div class="wrapper">
            <h2 class="dashboard-title">Add New Student</h2>
            <p>Please fill this form to add a student record to the database.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Student Name <span class="text-danger">*</span></label>
                    <input type="text" name="student_name"
                        class="form-control <?php echo (!empty($errors["student_name"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $student_name; ?>">
                    <div class="invalid-feedback"><?php echo $errors["student_name"]; ?></div>
                </div>
                <div class="form-group">
                    <label>Student Image <span class="text-danger">*</span></label>
                    <input type="file" id="photo" name="student_image"
                        class="form-control p-0 <?php echo (!empty($errors["student_image"])) ? 'is-invalid' : ''; ?>"
                        accept="image/*" style="height: fit-content;">
                    <div class="invalid-feedback"><?php echo $errors["student_image"] ?? ''; ?></div>
                </div>
                <script>
                    document.getElementById('photo').addEventListener('change', function () {
                        // const file = this.files[0];
                        // if (file) {
                        //     const reader = new FileReader();
                        //     reader.onload = function (e) {
                        //         // You can display the image preview here if needed
                        //         console.log(e.target.result);
                        //     };
                        //     reader.readAsDataURL(file);
                        // }
                        if (this.files && this.files[0]) {
                            let fileName = this.files[0].name;
                            let lastDot = fileName.lastIndexOf('.');
                            let name = fileName.substring(0, lastDot);
                            let ext = fileName.substring(lastDot + 1);

                            // Remove all special characters and symbols, replace with space, and trim
                            let cleanName = name.replace(/[^a-zA-Z0-9]/g, ' ').replace(/\s+/g, ' ').trim();

                            // Capitalize first letter of each word
                            let capitalizedName = cleanName.replace(/\b\w/g, function (char) {
                                return char.toUpperCase();
                            });

                            // If you want to capitalize only initials of student's name (assuming student's name is in cleanName)
                            // let studentInitials = cleanName.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');

                            console.log("Image Name: " + capitalizedName);
                            console.log("Extension: " + ext);
                        }
                        // console.log("File Extension: " + this.files);
                    });
                </script>
                <div class="form-group">
                    <label>Class <span class="text-danger">*</span></label>
                    <input type="text" name="class"
                        class="form-control <?php echo (!empty($errors["class"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $class; ?>">
                    <div class="invalid-feedback"><?php echo $errors["class"]; ?></div>
                </div>
                <div class="form-group">
                    <label>Roll No <span class="text-danger">*</span></label>
                    <input type="text" name="roll_no"
                        class="form-control <?php echo (!empty($errors["roll_no"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $roll_no; ?>">
                    <div class="invalid-feedback"><?php echo $errors["roll_no"]; ?></div>
                </div>
                <div class="form-group">
                    <label>Gender <span class="text-danger">*</span></label>
                    <select name="gender"
                        class="form-control <?php echo (!empty($errors["gender"])) ? 'is-invalid' : ''; ?>">
                        <option value="">Select</option>
                        <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                    <div class="invalid-feedback"><?php echo $errors["gender"]; ?></div>
                </div>
                <div class="form-group">
                    <label>Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" name="dob"
                        class="form-control <?php echo (!empty($errors["dob"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $dob; ?>">
                    <div class="invalid-feedback"><?php echo $errors["dob"]; ?></div>
                </div>
                <div class="form-group">
                    <label>Contact Number <span class="text-danger">*</span></label>
                    <input type="text" name="contact_number"
                        class="form-control <?php echo (!empty($errors["contact_number"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $contact_number; ?>">
                    <div class="invalid-feedback"><?php echo $errors["contact_number"]; ?></div>
                </div>
                <div class="form-group">
                    <label>Nationality <span class="text-danger">*</span></label>
                    <input type="text" name="nationality"
                        class="form-control <?php echo (!empty($errors["nationality"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $nationality ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["nationality"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Religion <span class="text-danger">*</span></label>
                    <input type="text" name="religion"
                        class="form-control <?php echo (!empty($errors["religion"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $religion ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["religion"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Blood Group <span class="text-danger">*</span></label>
                    <input type="text" name="blood_group"
                        class="form-control <?php echo (!empty($errors["blood_group"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $blood_group ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["blood_group"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Permanent Place <span class="text-danger">*</span></label>
                    <input type="text" name="permanent_place"
                        class="form-control <?php echo (!empty($errors["permanent_place"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $permanent_place ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["permanent_place"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Permanent District <span class="text-danger">*</span></label>
                    <input type="text" name="permanent_district"
                        class="form-control <?php echo (!empty($errors["permanent_district"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $permanent_district ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["permanent_district"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Permanent Zone <span class="text-danger">*</span></label>
                    <input type="text" name="permanent_zone"
                        class="form-control <?php echo (!empty($errors["permanent_zone"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $permanent_zone ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["permanent_zone"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Temporary Place <span class="text-danger">*</span></label>
                    <input type="text" name="temporary_place"
                        class="form-control <?php echo (!empty($errors["temporary_place"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $temporary_place ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["temporary_place"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Temporary District <span class="text-danger">*</span></label>
                    <input type="text" name="temporary_district"
                        class="form-control <?php echo (!empty($errors["temporary_district"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $temporary_district ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["temporary_district"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Temporary Zone <span class="text-danger">*</span></label>
                    <input type="text" name="temporary_zone"
                        class="form-control <?php echo (!empty($errors["temporary_zone"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $temporary_zone ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["temporary_zone"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Father's Name <span class="text-danger">*</span></label>
                    <input type="text" name="father_name"
                        class="form-control <?php echo (!empty($errors["father_name"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $father_name ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["father_name"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Father's Occupation <span class="text-danger">*</span></label>
                    <input type="text" name="father_occupation"
                        class="form-control <?php echo (!empty($errors["father_occupation"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $father_occupation ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["father_occupation"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Father's Office</label>
                    <input type="text" name="father_office"
                        class="form-control <?php echo (!empty($errors["father_office"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $father_office ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["father_office"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Father's Contact <span class="text-danger">*</span></label>
                    <input type="text" name="father_contact"
                        class="form-control <?php echo (!empty($errors["father_contact"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $father_contact ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["father_contact"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Father's Email</label>
                    <input type="email" name="father_email"
                        class="form-control <?php echo (!empty($errors["father_email"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $father_email ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["father_email"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Mother's Name <span class="text-danger">*</span></label>
                    <input type="text" name="mother_name"
                        class="form-control <?php echo (!empty($errors["mother_name"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $mother_name ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["mother_name"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Mother's Occupation <span class="text-danger">*</span></label>
                    <input type="text" name="mother_occupation"
                        class="form-control <?php echo (!empty($errors["mother_occupation"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $mother_occupation ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["mother_occupation"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Mother's Office</label>
                    <input type="text" name="mother_office"
                        class="form-control <?php echo (!empty($errors["mother_office"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $mother_office ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["mother_office"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Mother's Contact <span class="text-danger">*</span></label>
                    <input type="text" name="mother_contact"
                        class="form-control <?php echo (!empty($errors["mother_contact"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $mother_contact ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["mother_contact"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Mother's Email</label>
                    <input type="email" name="mother_email"
                        class="form-control <?php echo (!empty($errors["mother_email"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $mother_email ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["mother_email"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Guardian Name</label>
                    <input type="text" name="guardian_name"
                        class="form-control <?php echo (!empty($errors["guardian_name"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $guardian_name ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["guardian_name"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Guardian Relation</label>
                    <input type="text" name="guardian_relation"
                        class="form-control <?php echo (!empty($errors["guardian_relation"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $guardian_relation ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["guardian_relation"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Guardian Occupation</label>
                    <input type="text" name="guardian_occupation"
                        class="form-control <?php echo (!empty($errors["guardian_occupation"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $guardian_occupation ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["guardian_occupation"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Guardian Office</label>
                    <input type="text" name="guardian_office"
                        class="form-control <?php echo (!empty($errors["guardian_office"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $guardian_office ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["guardian_office"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Guardian Contact</label>
                    <input type="text" name="guardian_contact"
                        class="form-control <?php echo (!empty($errors["guardian_contact"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $guardian_contact ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["guardian_contact"] ?? ''; ?></div>
                </div>
                <div class="form-group">
                    <label>Guardian Email</label>
                    <input type="email" name="guardian_email"
                        class="form-control <?php echo (!empty($errors["guardian_email"])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $guardian_email ?? ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors["guardian_email"] ?? ''; ?></div>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <input type="submit" class="btn btn-success px-4" value="Submit">
                    <a href="index.php" class="btn btn-secondary px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>