<?php
if (!function_exists('isActive')) {
    function isActive($page, $activePage) {
        return $page === $activePage ? 'active' : '';
    }
}
