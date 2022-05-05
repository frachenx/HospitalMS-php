<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/doctor/includes/addPatient.php') ?>

<div class="main">
    <h1>PATIENT | ADD PATIENT</h1>
    <hr>
    <h3>Add Patient</h3>
    <div class="row">
        <form action="" method="post" class="col-8">
            <div class="alert alert-success" style="display: <?php ($resultString=='1') ? printf('block') : printf('none') ?>;">Patient Added Correctly</div>
            <div class="alert alert-danger" style="display: <?php ($resultString=='0') ? printf('block') : printf('none') ?>;">Failed to Add Patient</div>
            <div class="form-group">
                <label for="name">Patient Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact">Patient Contact no</label>
                <input type="tel" name="contact" id="contact" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Patient Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <select name="gender" id="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age">Patient Age</label>
                <input type="number" name="age" id="age" class="form-control">
            </div>
            <div class="form-group">
                <label for="medHistory">Medical History</label>
                <textarea name="medHistory" id="medHistory" rows="2 " class="form-textarea"></textarea>
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
