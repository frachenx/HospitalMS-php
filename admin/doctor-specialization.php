<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/admin/includes/doctorSpecialization.php') ?>
<div class="main">
    <h1>ADMIN | ADD DOCTOR SPECIALIZATION</h1>
    <hr>
    <h4>Doctor Specialization</h4>
    <div class="alert alert-success" style="display:<?php ($resultString=='1') ? printf(''):printf('none') ?>;">Specialization Added Correctly</div>
    <div class="alert alert-danger" style="display:<?php ($resultString=='0') ? printf(''):printf('none') ?>;">Failed to Add Specialization</div>
    <div class="alert alert-success" style="display:<?php ($resultString=='3') ? printf(''):printf('none') ?>;">Specialty Deleted Successfully</div>
    <div class="alert alert-danger" style="display:<?php ($resultString=='2') ? printf(''):printf('none') ?>;">Failed to Delete Specialty</div>
    <div class="row" style="margin-bottom: 2rem;">
        <form action="" method="POST" class="col-4">
            <div class="form-group">
                <label for="doc_spec">Doctor Specialization</label>
                <input type="text" name="doc_spec" id="doc_spec" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary col-12">
            </div>
        </form>
    </div>
    <hr>
    <h3>Manage <strong>Docter Specialization</strong></h3>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th>#</th>
                <th>Specialization</th>
                <th>Creation Date</th>
                <th>Updated Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php getSpecialties() ?>
        </tbody>
    </table>
</div>

<script>
    const alertSuccess1 = document.getElementsByClassName('alert-success')[0];
    const alertSuccess2 = document.getElementsByClassName('alert-success')[1];
    setTimeout(()=>{
            alertSuccess1.style.display='none'
        },1500)
        setTimeout(()=>{
            alertSuccess2.style.display='none'
        },1500)
        const alertDanger1 = document.getElementsByClassName('alert-danger')[0];
        const alertDanger2 = document.getElementsByClassName('alert-danger')[1];
        setTimeout(()=>{
            alertDanger1.style.display='none'
        },1500)
        setTimeout(()=>{
            alertDanger2.style.display='none'
        },1500)
</script>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/footer.php') ?>