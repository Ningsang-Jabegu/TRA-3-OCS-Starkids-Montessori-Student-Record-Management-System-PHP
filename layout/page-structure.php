<div class="dashboard-wrapper">
    <?php
    // Set the active page for navbar highlighting
    include 'component/navbar-desktop.php';
    include 'component/navbar-mobile.php';
    ?>

    <div class="content-wrapper">
        <main class="main">
            <?php
            if (isset($activePage) && $activePage === 'admissions') {
                include 'component/admission-form.php';
            } elseif (isset($activePage) && $activePage === 'view-students') {
                include 'pages/view-student.php';
            } else {
                include 'component/student-record.php';
            }
            ?>
        </main>
        <?php include 'component/footer.php'; ?>
    </div>

</div>