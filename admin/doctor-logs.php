<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/admin/includes/doctorLogs.php') ?>

<div class="main">
    <h1>ADMIN | DOCTOR SESSION LOGS</h1>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th>#</th>
                <th>User Id</th>
                <th>Username</th>
                <th>IP</th>
                <th>Login Time</th>
                <th>Logout Time</th>
            </tr>
        </thead>
        <tbody>
            <?php getDoctorLogs() ?>
        </tbody>
    </table>
</div>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>