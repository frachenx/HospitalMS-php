<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/admin/includes/managePatients.php') ?>

<div class="main">
    <h1>ADMIN | VIEW PATIENTS</h1>
    <h3>View Patients</h3>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th>#</th>
                <th>Patient Name</th>
                <th>Contact No.</th>
                <th>Gender</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php getPatients() ?>
            
        </tbody>
    </table>
</div>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/footer.php') ?>
