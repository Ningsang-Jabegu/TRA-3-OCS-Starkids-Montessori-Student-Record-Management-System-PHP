<div class="dashboard-wrapper">
    <?php
    // Set the active page for navbar highlighting
    include 'component/navbar-desktop.php';
    include 'component/navbar-mobile.php';
    ?>

    <div class="content-wrapper">
        <main class="main">
            <?php
            switch ($activePage ?? '') {
                case 'admissions':
                    include 'component/admission-form.php';
                    break;
                case 'view-student':
                    include 'pages/view-student.php';
                    break;
                case 'student_status':
                    include 'component/student-status.php';
                    break;
                default:
                    include 'component/student-record.php';
                    break;
            }
            ?>
        </main>
        <?php include 'component/footer.php'; ?>
    </div>

</div>