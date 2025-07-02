<?php
// Usage: include 'component/navbar-desktop.php';
// Pass $activePage variable before including, e.g. $activePage = 'dashboard';

if (!isset($activePage)) {
    $activePage = '';
}

include_once __DIR__ . '/../helpers/nav-helper.php';


// Nav items has been moved to a separate file for better organization
include_once 'resources/nav-item.php';
?>
<nav class="navbar navbar-desktop navbar-light">
    <div class="navbar-above">
        <a class="navbar-click" href="#">
            <img src="./assets/images/Star_Kids_Montessori_Preschool_Logo.png" alt="Starkids Montessori Logo">
            <span>Starkids Montessori</span>
        </a>
        <ul class="nav">
            <?php foreach ($navItems as $item): ?>
                <?php if ($item['section'] === 'above'): ?>
                    <li class="nav-item <?php echo isActive($item['page'], $activePage); ?>">
                        <a class="nav-link <?php echo isActive($item['page'], $activePage); ?>"
                            href="<?php echo htmlspecialchars($item['href']); ?>">
                            <i class="fa icon-white <?php echo htmlspecialchars($item['icon']); ?>"></i>
                            <?php echo htmlspecialchars($item['name']); ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="navbar-below">
        <ul class="nav">
            <?php foreach ($navItems as $item): ?>
                <?php if ($item['section'] === 'below'): ?>
                    <li class="nav-item <?php echo isActive($item['page'], $activePage); ?>">
                        <a class="nav-link <?php echo isActive($item['page'], $activePage); ?>"
                            href="<?php echo htmlspecialchars($item['href']); ?>">
                            <i class="fa icon-white <?php echo htmlspecialchars($item['icon']); ?>"></i>
                            <?php echo htmlspecialchars($item['name']); ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>