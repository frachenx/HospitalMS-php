<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/admin/includes/changePassword.php') ?>

<div class="main">
    <h1>ADMIN | CHANGE PASSWORD</h1>
    <div class="alert alert-success" style="display: <?php ($resultString=='1') ? printf('block') : printf('none') ?>;">Password Changed Correctly</div>
    <div class="alert alert-danger" style="display: <?php ($resultString=='0') ? printf('block') : printf('none') ?>;">Failed to Change Passwrod</div>
    <div class="row">
        <form action="" method="post" class="col-8" id="myForm">
            <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" name="currentPassword" id="currentPassword" class="form-control" autocomplete="false" required>
            </div>
            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" name="newPassword" id="newPassword" class="form-control" autocomplete="false" required >
            </div>
            <div class="form-group">
                <label for="confirmPassword">Current Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" autocomplete="false" required onchange="checkPasswords()">
                <small id="passwordError" class="text-danger">Passwords don't match</small>
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary col-12">
            </div>
        </form>
    </div>
</div>
<script>
    const newPassword=document.getElementById('newPassword');
    const confirmPassword = document.getElementById('confirmPassword');
    const passwordError = document.getElementById('passwordError');
    const mForm = document.getElementById('myForm');
    document.getElementById('myForm').addEventListener("submit",(e)=>{
        if(newPassword.value!==confirmPassword.value){
            alert("Passwords don't match");
            e.preventDefault();
        }
    })
    passwordError.style.display='none';
    function checkPasswords(){
        if(newPassword.value!==confirmPassword.value){
            passwordError.style.display='block';
        }else{
            passwordError.style.display='none';
        }
    }

    const alertSuccess =  document.getElementsByClassName('alert-success')[0];
    setTimeout(()=>{alertSuccess.style.display='none'},1500);
    const alertDanger =  document.getElementsByClassName('alert-danger')[0];
    setTimeout(()=>{alertDanger.style.display='none'},1500);
</script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>