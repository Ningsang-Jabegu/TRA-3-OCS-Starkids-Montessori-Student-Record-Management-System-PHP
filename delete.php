<?php
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    require_once "config.php";

    $sql = "DELETE FROM students WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);

        if (mysqli_stmt_execute($stmt)) {
            header("location: index.php");
            exit();
        } else {
            echo "Delete failed.";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    if (empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Student | Starkids Montessori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
    <!-- Custom Style -->
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
            <div class="row">
                <div class="col-md-12">
                    <h2 class="dashboard-title">Delete Student Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                            <p>Are you sure you want to delete this student record?</p>
                            <div class="mt-3">
                                <input type="submit" value="Yes" class="btn btn-danger px-4">
                                <a href="index.php" class="btn btn-secondary ml-2 px-4">No</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>