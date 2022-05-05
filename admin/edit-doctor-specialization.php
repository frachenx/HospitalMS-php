<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/admin/includes/editDoctorSpecialization.php') ?>

<div class="main">
    <h1>ADMIN | EDIT DOCTOR SPECIALIZATION</h1>
    <hr>
    <div class="row">
        <div class="col-4">
        <div class="alert alert-success" style="display: <?php ($resultString=='1') ? printf('') : printf('none') ?>;">Specialty Updated Correctly</div>
        <div class="alert alert-danger" style="display: <?php ($resultString=='0') ? printf('') : printf('none') ?>;">Failed to Update</div>
        <form action="" method="post">
                <div class="form-group">
                    <label for="spec">Edit Doctor Specialization</label>
                    <input type="text" name="spec" id="spec" class="form-control" value="<?php echo  $specialty->spec ?>">
                </div>
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary col-12">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const alertSuccess = document.getElementsByClassName('alert-success')[0];
    setTimeout(()=>{
        alertSuccess.style.display = 'none';
    },1500)
    const alertDanger = document.getElementsByClassName('alert-danger')[0];
    setTimeout(()=>{
        alertDanger.style.display = 'none';
    },1500)
</script>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/footer.php') ?>