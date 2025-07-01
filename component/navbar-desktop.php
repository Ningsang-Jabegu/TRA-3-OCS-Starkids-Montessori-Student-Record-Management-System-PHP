<?php
// Usage: include 'component/navbar-desktop.php';
// Pass $activePage variable before including, e.g. $activePage = 'dashboard';

if (!isset($activePage)) {
    $activePage = '';
}

function isActive($page, $activePage) {
    return $page === $activePage ? 'active' : '';
}
?>

<nav class="navbar navbar-light">
    <div class="navbar-above">
        <a class="navbar-click" href="#">
            <img src="./assets/images/Star_Kids_Montessori_Preschool_Logo.png" alt="Starkids Montessori Logo">
            <span>Starkids Montessori</span>
        </a>
        <ul class="nav">
            <li class="nav-item <?php echo isActive('dashboard', $activePage); ?>">
                <a class="nav-link <?php echo isActive('dashboard', $activePage); ?>" href="index.php">
                    <i class="fa icon-white fa-dashboard"></i> Dashboard
                </a>
            </li>
            <li class="nav-item <?php echo isActive('students', $activePage); ?>">
                <a class="nav-link <?php echo isActive('students', $activePage); ?>" href="students.php">
                    <i class="fa icon-white fa-users"></i> Students
                </a>
            </li>
            <li class="nav-item <?php echo isActive('classes', $activePage); ?>">
                <a class="nav-link <?php echo isActive('classes', $activePage); ?>" href="classes.php">
                    <i class="fa icon-white fa-building"></i> Classes
                </a>
            </li>
            <li class="nav-item <?php echo isActive('attendance', $activePage); ?>">
                <a class="nav-link <?php echo isActive('attendance', $activePage); ?>" href="attendance.php">
                    <i class="fa icon-white fa-calendar-check-o"></i> Attendance
                </a>
            </li>
            <li class="nav-item <?php echo isActive('reports', $activePage); ?>">
                <a class="nav-link <?php echo isActive('reports', $activePage); ?>" href="reports.php">
                    <i class="fa icon-white fa-bar-chart"></i> Reports
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-below">
        <ul class="nav">
            <li class="nav-item <?php echo isActive('settings', $activePage); ?>">
                <a class="nav-link <?php echo isActive('settings', $activePage); ?>" href="settings.php">
                    <i class="fa icon-white fa-cog"></i> Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fa icon-white fa-sign-out"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>