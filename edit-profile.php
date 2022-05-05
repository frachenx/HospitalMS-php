<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/includes/editProfile.php') ?>

<div class="main">
    <h1>USER | EDIT PROFILE</h1>
    <hr>
    <h3>Edit Profile</h3>
    <div><?php echo $user->fullname ?>'s Profile</div>
    <div>Profile Reg. Date: <?php echo $user->createdDate ?></div>
    <div>Profile Last Updated Date: <?php echo $user->updatedDate ?></div>
    <div class="row">
        <form action="" method="post" class="col-8">
            <div class="alert alert-success" style="display:<?php ($resultString=='1') ? printf('block') : printf('none') ?>;">User Info Updated Correctly</div>
            <div class="alert alert-danger" style="display:<?php ($resultString=='0') ? printf('block') : printf('none') ?>;">Failed Updating User</div>
            <div class="form-group">
                <label for="name">User Name</label>
                <input value="<?php echo $user->fullname ?>" type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" rows="2" class="form-textarea" required>
                    <?php echo $user->address ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input value="<?php echo $user->city ?>" type="text" name="city" id="city" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option <?php ($user->gender=='male') ? printf('selected') : printf('') ?> value="male">Male</option>
                    <option <?php ($user->gender=='female') ? printf('selected') : printf('') ?> value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">User Email</label>
                <input value="<?php echo $user->email ?>" type="email" name="email" id="email" class="form-control" readonly>
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