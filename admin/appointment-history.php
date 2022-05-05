<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/admin/includes/appointmentHistory.php') ?>
<div class="main">
    <h1>PATIENTS | APPOINTMENT HISTORY</h1>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th>#</th>
                <th>Doctor Name</th>
                <th>Patient Name</th>
                <th>Specialization</th>
                <th>Fee</th>
                <th>Appointment Date / Time</th>
                <th>Creation Date</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php getAppointments() ?>
        </tbody>
    </table>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>
