<?php
require_once "config.php";

$fields = [
    "student_name",
    "class",
    "roll_no",
    "gender",
    "dob",
    "contact_number",
    "nationality",
    "religion",
    "blood_group",
    "permanent_place",
    "permanent_district",
    "permanent_zone",
    "temporary_place",
    "temporary_district",
    "temporary_zone",
    "father_name",
    "father_occupation",
    "father_office",
    "father_contact",
    "father_email",
    "mother_name",
    "mother_occupation",
    "mother_office",
    "mother_contact",
    "mother_email",
    "guardian_name",
    "guardian_relation",
    "guardian_occupation",
    "guardian_office",
    "guardian_contact",
    "guardian_email"
];

$data = [];
$errors = [];

foreach ($fields as $field) {
    $data[$field] = isset($_POST[$field]) ? trim($_POST[$field]) : "";
    if (
        in_array($field, [
            "student_name",
            "class",
            "roll_no",
            "gender",
            "dob",
            "contact_number",
            "nationality",
            "religion",
            "blood_group",
            "permanent_place",
            "permanent_district",
            "permanent_zone",
            "temporary_place",
            "temporary_district",
            "temporary_zone",
            "father_name",
            "father_occupation",
            "father_contact",
            "mother_name",
            "mother_occupation",
            "mother_contact"
        ]) && empty($data[$field])
    ) {
        $errors[$field] = "Required.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && empty($errors)) {
    $id = $_POST["id"];
    $sql = "UPDATE students SET " . implode(" = ?, ", $fields) . " = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        $params = array_values($data);
        $params[] = $id;
        $types = str_repeat("s", count($data)) . "i";

        mysqli_stmt_bind_param($stmt, $types, ...$params);

        if (mysqli_stmt_execute($stmt)) {
            header("location: index.php");
            exit();
        } else {
            echo "Update failed.";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
} elseif (isset($_GET["id"])) {
    $id = trim($_GET["id"]);
    $sql = "SELECT * FROM students WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
            } else {
                header("location: error.php");
                exit();
            }
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
    <title>Update Students Record | Starkids Montessori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
        <div class="wrapper mx-auto">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="dashboard-title">Update Student Record</h1>
                        <p class="mb-4">Please edit the input values and submit to update the student record.</p>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                            <?php foreach ($fields as $field): ?>
                                <div class="form-group">
                                    <label><?php echo ucwords(str_replace("_", " ", $field)); ?></label>
                                    <input type="text" name="<?php echo $field; ?>"
                                        class="form-control <?php echo isset($errors[$field]) ? 'is-invalid' : ''; ?>"
                                        value="<?php echo htmlspecialchars($data[$field] ?? ''); ?>">
                                    <?php if (isset($errors[$field])): ?>
                                        <div class="invalid-feedback"><?php echo $errors[$field]; ?></div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                            <input type="hidden" name="id"
                                value="<?php echo htmlspecialchars($_GET['id'] ?? $_POST['id'] ?? ''); ?>">
                            <input type="submit" class="btn btn-success px-4" value="Update">
                            <a href="index.php" class="btn btn-secondary ml-2 px-4">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>