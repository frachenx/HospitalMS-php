<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/admin/includes/manageDoctors.php') ?>

    <div class="main">
        <h1>ADMIN | MANAGE DOCTORS</h1>
        <hr>
        <h3>Manage Docters</h3>
        <div class="alert alert-success" style="display: <?php ($resultString=='1') ? printf(''): printf('none') ?>;">Doctor Deleted Successfully</div>
        <div class="alert alert-danger" style="display: <?php ($resultString=='0') ? printf(''): printf('none') ?>;">Failed to Delete Doctor</div>
        <table class="table table-bordered-bottom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Specialization</th>
                    <th>Doctor Name</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php getDoctors() ?>
            </tbody>
        </table>
    </div>
    <script>
        const alertSuccess=document.getElementsByClassName('alert-success')[0];
        setTimeout(()=>{alertSuccess.style.display='none'},1500);
        const alertDanger=document.getElementsByClassName('alert-danger')[0];
        setTimeout(()=>{alertDanger.style.display='none'},1500);
    </script>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/footer.php') ?>