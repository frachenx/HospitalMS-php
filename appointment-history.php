<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/includes/appointmentHistory.php') ?>

<div class="main">
    <h1>USER | APPOINTMENT HISTORY</h1>
    <hr>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th>#</th>
                <th>Doctor Name</th>
                <th>Specialization</th>
                <th>Consultancy Fee</th>
                <th>Appointment Date / Time</th>
                <th>Appointment Creation Date</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    
                </td>
            </tr>
                <?php
                    getAppointments()
                ?>
        </tbody>
    </table>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>