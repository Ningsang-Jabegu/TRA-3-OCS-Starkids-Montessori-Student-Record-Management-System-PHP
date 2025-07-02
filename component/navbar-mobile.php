<?php
if (!isset($activePage)) {
    $activePage = '';
}

include_once __DIR__ . '/../helpers/nav-helper.php';
include_once 'resources/nav-item.php';
?>

<div class="navbar-mobile">
    <!-- Toggle Button -->
    <button id="openMobileNav" class="btn btn-light d-md-none"
        style="position: fixed; top: 10px; left: 10px; z-index: 1051;">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Backdrop -->
    <div id="mobileNavBackdrop"
        style="position: fixed; inset: 0; background: rgba(0, 0, 0, 0.75); z-index: 1050; display: none;"></div>

    <!-- Sidebar Nav -->
    <div id="mobileNav" class="navbar navbar-light" style="
        position: fixed;
        top: 0;
        left: -260px;
        width: 260px;
        height: 100vh;
        z-index: 1051;
        overflow-y: auto;
        transition: left 0.3s ease;
        padding: 20px;
    ">
        <div class="navbar-above">
            <a class="navbar-click" href="#">
                <img src="./assets/images/Star_Kids_Montessori_Preschool_Logo.png" alt="Starkids Montessori Logo">
                <span>Starkids Montessori</span>
            </a>
            <ul class="nav flex-column">
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
        <hr>
        <div class="navbar-below">
            <ul class="nav flex-column">
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

                <!-- This is not generated from nav-item.php since, it's work is different. Here it closes the mobile nav-bar. -->
                <li class="nav-item <?php echo isActive($item['page'], $activePage); ?>" style="width:100%; cursor: pointer;">
                    <span id="closeMobileNav" class="nav-link <?php echo isActive($item['page'], $activePage); ?>">
                        <i class="fa icon-white fa-times"></i> Close
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    const openBtn = document.getElementById('openMobileNav');
    const closeBtn = document.getElementById('closeMobileNav');
    const sidebar = document.getElementById('mobileNav');
    const backdrop = document.getElementById('mobileNavBackdrop');

    function openSidebar() {
        sidebar.style.left = '0';
        backdrop.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.style.left = '-260px';
        backdrop.style.display = 'none';
        document.body.style.overflow = '';
    }

    openBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
    backdrop.addEventListener('click', closeSidebar);
</script>