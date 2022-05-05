<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/admin/includes/manageUsers.php') ?>

<div class="main">
    <h1>ADMIN | MANAGE USERS</h1>
    <hr>
    <h3>Manage Users</h3>
    <div class="alert alert-success" style="display: <?php ($resultString=='1')?printf(''):printf('none') ?>;">User Deleted Correctly</div>
    <div class="alert alert-danger" style="display: <?php ($resultString=='0')?printf(''):printf('none') ?>;">Failed to Delete User</div>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php getUsers() ?>
        </tbody>
    </table>
</div>

<script>
    const alertSuccess =  document.getElementsByClassName('alert-success')[0];
    setTimeout(()=>{alertSuccess.style.display='none'},1500);
    const alertDanger =  document.getElementsByClassName('alert-danger')[0];
    setTimeout(()=>{alertDanger.style.display='none'},1500);
</script>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/footer.php') ?>
