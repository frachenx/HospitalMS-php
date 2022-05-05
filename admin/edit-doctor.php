<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/admin/includes/editDoctor.php') ?>

<div class="main">
    <h1>ADMIN | EDIT DOCTOR DETAILS</h1>
    <hr>
    <h4>Edit Doctor info</h4>
    <h3>
        <div><?php echo $doctor->name."'s " ?>Profile</div>
        <div><strong>Profile Reg. Date: </strong><?php echo $doctor->created ?></div>
        <div><strong>Profile Last Updated Date: </strong><?php echo $doctor->updated ?></div>
    </h3>
    <div class="row">
        <form action="" method="post" class="col-6">
            <div class="alert alert-success" style="display: <?php ($resultString=='1')? printf('') : printf('none') ?>;">Doctor Updated Successfully</div>
            <div class="alert alert-danger" style="display: <?php ($resultString=='0')? printf('') : printf('none') ?>;">Failed to Update Doctor</div>
            <div class="form-group">
                <label for="spec">Doctor Specialization</label>
                <select name="spec" id="spec" class="form-control" required>
                    <?php getSpecialties() ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Doctor Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $doctor->name ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" rows="2" class="form-textarea" required>
                    <?php echo $doctor->address ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="fee">Doctor Fee</label>
                <input type="number" name="fee" id="fee" class="form-control" value="<?php echo $doctor->fee ?>" required>
            </div>
            <div class="form group">
                <label for="contact">Doctor Contact No.</label>
                <input type="tel" name="contact" id="contact" class="form-control" value="<?php echo $doctor->contact ?>" required>
            </div>
            <div class="form group">
                <label for="email">Doctor Email</label>
                <input type="email" name="email" id="email" class="form-control" readonly value="<?php echo $doctor->email ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary col-12">
            </div>
        </form>
    </div>
</div>
    <script>
        const alertSuccess = document.getElementsByClassName('alert-success')[0];
        setTimeout(()=>{alertSuccess.style.display='none'},1500)
        const alertDanger = document.getElementsByClassName('alert-danger')[0];
        setTimeout(()=>{alertDanger.style.display='none'},1500)
    </script>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/footer.php') ?>
