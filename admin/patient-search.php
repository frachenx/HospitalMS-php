<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/admin/includes/patientSearch.php') ?>

<div class="main">
    <h1>ADMIN | VIEW PATIENTS</h1>
    <hr>
    <form action="" method="post">
        <div class="form-group">
            <label for="search">Search By Name</label>
            <input type="text" name="search" id="search" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Search" class="btn btn-primary">
        </div>
    </form>
    <div class="result" style="display: <?php ($searchWord=='') ? printf('none') : printf('') ?>;">
        <h3>Result against "<?php echo $searchWord ?>" keyword</h3>
        <table class="table table-bordered-bottom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Patient Name</th>
                    <th>Patient Contact Number</th>
                    <th>Patient Gender</th>
                    <th>Creation Date</th>
                    <th>Updation Date</th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php getPatients() ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>