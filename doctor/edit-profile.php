<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/doctor/includes/editProfile.php') ?>

<div class="main">
    <h1>DOCTOR | EDIT DOCTOR DETAILS</h1>
    <hr>
    <h3>Edit Doctor</h3>
    <h3><?php echo $doctor->doctor_name ?>'s Profile</h3>
    <h3>Profile Reg. Date: <?php echo $doctor->createdDate ?></h3>   
    <h3>Profile Last Updation Date: <?php echo $doctor->updatedDate ?></h3>
    <div class="row">
        <form action="" method="post" class="col-8">
            <div class="alert alert-success" style="display: <?php ($resultString=='1') ? printf('block') : printf('none') ?>;">Updated Profile Correctly</div>
            <div class="alert alert-danger" style="display: <?php ($resultString=='0') ? printf('block') : printf('none') ?>;">Failed to Update Profile</div>
            <div class="form-group">
                <label for="spec">Doctor Specialization</label>
                <select name="spec" id="spec" class="form-control">
                    <?php getSpecialties() ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Doctor Name</label>
                <input value="<?php  echo $doctor->doctor_name ?>" type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Doctor Clinic Address</label>
                <textarea name="address" id="address" rows="2" class="form-textarea" required>
                    <?php echo $doctor->address ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="fee">Doctor Consultancy Fees</label>
                <input value="<?php echo $doctor->fee ?>" type="number" name="fee" id="fee" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact">Doctor Contact no</label>
                <input value="<?php  echo $doctor->contact ?>" type="tel" name="contact" id="contact" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Doctor Email</label>
                <input value="<?php echo $doctor->email ?>" type="email" name="email" id="email" class="form-control" readonly autocomplete="false" >
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary col-12">
            </div>
        </form>
    </div>
</div>
<script>
    const alertSuccess =  document.getElementsByClassName('alert-success')[0];
    setTimeout(()=>{alertSuccess.style.display='none'},1500);
    const alertDanger =  document.getElementsByClassName('alert-danger')[0];
    setTimeout(()=>{alertDanger.style.display='none'},1500);
</script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>
