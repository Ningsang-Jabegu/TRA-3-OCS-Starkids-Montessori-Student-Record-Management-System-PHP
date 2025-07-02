<div class="dashboard-wrapper">
    <?php
        // Always include both navbars
        include './component/navbar-desktop.php';
        include './component/navbar-mobile.php';
    ?>
    
    <div class="content-wrapper">
        <main class="main">
            <?php include './component/student-record.php'; ?>
        </main>
        <?php include './component/footer.php'; ?>
    </div>
</div>
