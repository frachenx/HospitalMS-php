<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/doctor/includes/editPatient.php') ?>

<div class="main">
    <h1>PATIENT | EDIT PATIENT</h1>
    <hr>
    <h3>Edit Patient</h3>
    <div class="row">
        <form action="" method="post" class="col-8">
            <div class="alert alert-success" style="display: <?php ($resultString=='1') ? printf('block') : printf('none') ?>;">Patient Edited Correctly</div>
            <div class="alert alert-danger" style="display: <?php ($resultString=='0') ? printf('block') : printf('none') ?>;">Failed to Edit Patient</div>
            <div class="form-group">
                <label for="name">Patient Name</label>
                <input value="<?php echo $doctor->name ?>" type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact">Patient Contact no</label>
                <input value="<?php echo $doctor->contact ?>" type="tel" name="contact" id="contact" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Patient Email</label>
                <input value="<?php echo $doctor->email ?>" type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" rows="2 " class="form-textarea"><?php echo $doctor->address; ?></textarea>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select  value="<?php echo $doctor->gender ?>" name="gender" id="gender" class="form-control">
                    <option <?php ($doctor->gender=='male') ? printf('selected') : printf('') ?> value="male">Male</option>
                    <option <?php ($doctor->gender=='female') ? printf('selected') : printf('') ?> value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age">Patient Age</label>
                <input value="<?php echo $doctor->age ?>" type="number" name="age" id="age" class="form-control">
            </div>
            <div class="form-group">
                <label for="medHistory">Medical History</label>
                <textarea name="medHistory" id="medHistory" rows="2 " class="form-textarea"><?php echo $doctor->history; ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary col-12">
            </div>
        </form>
    </div>
</div>
<script>
    const alertSuccess = document.getElementsByClassName('alert-success')[0];
    setTimeout(()=>{alertSuccess.style.display='none'},1500);
    const alertDanger = document.getElementsByClassName('alert-danger')[0];
    setTimeout(()=>{alertDanger.style.display='none'},1500);
</script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>
