<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 overflow-hidden">
                <?php
                require_once './component/functions.php';
                include_once './component/partials/roll-number-generation-logic.php';

                
                ?>

                <h2 class="admission-form-title">Student Admission Form - <?php echo get_nepali_year(); ?></h2>
                <p>Please fill this form to add a student record to the database.</p>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <?php
                    include_once './component/partials/form-fields/personal-info.php';
                    include_once './component/partials/form-fields/address-info.php';
                    // include_once './component/partials/form-fields/contact-info.php';
                    include_once './component/partials/form-fields/father-info.php';
                    include_once './component/partials/form-fields/mother-info.php';
                    include_once './component/partials/form-fields/guardian-info.php';
                    include_once './component/partials/form-fields/suggestions-info.php';
                    include_once './component/partials/form-fields/file-uploads.php';
                    include_once './component/partials/form-fields/declearation-info.php';
                    ?>
                    <div class="form-group d-flex justify-content-between">
                        <input type="submit" class="btn btn-success px-4" value="Submit">
                        <a href="index.php" class="btn btn-secondary px-4">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
