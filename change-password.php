<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/includes/changePassword.php') ?>
<div class="main">
    <h1>USER | CHANGE PASSWORD</h1>
    <hr>
    <h3>Change Password</h3>
    <div class="row">
        <form action="" method="post" class="col-8">
            <div class="alert alert-success" style="display: <?php ($resultString=='1') ? printf('block') : printf('none') ?>;">Password Changed Correctly</div>
            <div class="alert alert-danger" style="display: <?php ($resultString=='0') ? printf('block') : printf('none') ?>;">Failed to Change Password</div>
            <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" name="currentPassword" id="currentPassword" class="form-control" required autocomplete="false">
            </div>
            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" name="newPassword" id="newPassword" class="form-control" required autocomplete="false">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required onchange="checkPasswords()" autocomplete="false">
                <small id="passwordError" class="text-danger">Passwords don't match</small>
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

    const currentPassword = document.getElementById('currentPassword');
    const newPassword = document.getElementById('newPassword');
    const confirmPassword = document.getElementById('confirmPassword');
    const passwordError = document.getElementById('passwordError');
    passwordError.style.display='none';
    function checkPasswords(){
        console.log('hey');
        if(newPassword.value!=confirmPassword.value){
            passwordError.style.display='block';
        }else{
            passwordError.style.display='none';
        }
    }
</script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>