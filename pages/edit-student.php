<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 overflow-hidden">
                <?php
                require_once './component/functions.php';
                include_once './component/partials/roll-number-generation-logic.php';

                // Fetch student data from DB
                $studentId = $_GET['id'] ?? $_POST['id'] ?? null;
                $studentData = [];
                if ($studentId) {
                    // Replace with your actual DB fetching logic
                    $studentData = get_student_by_id($studentId); // returns associative array
                }
                ?>

                <h2 class="admission-form-title">Update Student Record</h2>
                <p>Please edit this form to update the student record in the database.</p>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($studentId); ?>">
                    <?php
                    // Pass $studentData to each partial for pre-filling
                    include './component/partials/form-fields/personal-info.php';
                    include './component/partials/form-fields/address-info.php';
                    // include './component/partials/form-fields/contact-info.php';
                    include './component/partials/form-fields/father-info.php';
                    include './component/partials/form-fields/mother-info.php';
                    include './component/partials/form-fields/guardian-info.php';
                    include './component/partials/form-fields/suggestions-info.php';
                    include './component/partials/form-fields/file-uploads.php';
                    include './component/partials/form-fields/declearation-info.php';
                    ?>
                    <div class="form-group d-flex justify-content-between">
                        <input type="submit" class="btn btn-success px-4" value="Update">
                        <a href="index.php" class="btn btn-secondary px-4">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>