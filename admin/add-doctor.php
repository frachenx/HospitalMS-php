<?php include($_SERVER['DOCUMENT_ROOT'].'/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/admin/includes/addDoctor.php') ?>
    <div class="main">
        <h1>ADMIN | ADD DOCTOR</h1>
        <hr>
        <div class="row">
            <div class="col-8">
                <h3>Add Doctor</h3>
                <div class="alert alert-success" style="display: <?php ($resultString=='1') ? printf(''): printf('none') ?>;">Doctor Added Correctly</div>
                <div class="alert alert-danger" style="display: <?php ($resultString=='0') ? printf(''): printf('none') ?>;">Failed to Add Doctor</div>
                <form action="" method="post" id="myForm">
                    <div class="form-group">
                        <label for="spec">Doctor Specialization</label>
                        <select name="spec" id="spec" class="form-control">
                            <?php 
                                getSpecialties();
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="docName">Doctor Name</label>
                        <input type="text" name="docName" id="docName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Doctor Clinic Address</label>
                        <textarea name="address" id="address" rows="2" class="form-textarea" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fee">Doctor Consultancy Fees</label>
                        <input type="text" name="fee" id="fee" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Doctor Contact no</label>
                        <input type="tel" name="contact" id="contact" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Doctor Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required autocomplete="false">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required autocomplete="false" onchange="checkPasswords()">
                        <small class="text-danger" id="wrongPassword"><strong>Passwords don't match</strong></small>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Add Doctor" class="btn btn-primary col-12" >
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const myForm = document.getElementById('myForm')
        const mPassword = document.getElementById('password');
        const mConfirmPassword = document.getElementById('confirmPassword');
        const wrongPasssword = document.getElementById('wrongPassword');
        const alertSuccess = document.getElementsByClassName('alert-success')[0];
        const alertDanger =  document.getElementsByClassName('alert-danger')[0];
        setTimeout(()=>{alertSuccess.style.display='none'},1500)
        setTimeout(()=>{alertDanger.style.display='none'},1500)
        wrongPasssword.style.display='none';
        myForm.addEventListener("submit",(e)=>{
            if(mPassword.value!=mConfirmPassword.value){
                alert("Passwords don't match");
                e.preventDefault();
            }
        })

        function checkPasswords(){
            if(mPassword.value!=mConfirmPassword.value){
                wrongPasssword.style.display='block';
            }else{
                wrongPasssword.style.display='none';
            }
        }
    </script>
<?php include($_SERVER['DOCUMENT_ROOT'].'/hospital2/footer.php') ?>