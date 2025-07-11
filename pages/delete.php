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