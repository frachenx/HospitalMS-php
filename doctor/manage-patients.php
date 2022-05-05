<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/doctor/includes/managePatients.php') ?>

<div class="main">
    <h1>DOCTOR | MANAGE PATIENTS</h1>
    <hr>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th>#</th>
                <th>Patient Name</th>
                <th>Patient Contact Number</th>
                <th>Patient Gender</th>
                <th>Creation Date</th>
                <th>Updation Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           <?php getPatients() ?>
        </tbody>
    </table>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>