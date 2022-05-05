<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/admin/includes/betweenDatesDetailsReports.php') ?>

<div class="main">
    <h1>ADMIN | VIEW PATIENTS</h1>
    <hr>
    <h3>Between dates reports</h3>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Gender</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php  
                getReports();
            ?>
        </tbody>
    </table>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>