<?php  include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/header.php') ?>
<?php  include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/navbar.php') ?>
<?php  include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/sidebar.php') ?>
<?php  include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/includes/dashboard.php') ?>

<div class="main">
    <?php
    if (isset($_SESSION['admin_id'])) {
        DashboardAdmin();
    }
    ?>
    <?php
    if (isset($_SESSION['doctor_id'])) {
        DashboardDoctor();
    }
    ?>
    <?php
    if (isset($_SESSION['user_id'])) {
        DashboardUser();
    }
    ?>
</div>
<?php  include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/footer.php') ?>
