<?php
/**
 * Sidebar Template
 *
 * @package NewsHub
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside class="sidebar" id="secondary">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>
