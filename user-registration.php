<?php include('header.php') ?>
<?php include('includes/userRegistration.php') ?>
    <div class="row">
      <div class="col-4"></div>
      <div class="col-4 user-login-form">
            <h1>HMS | Patient Registration</h1>
            <h3 class="user-login-subtitle">Sign Up</h3>
            <h4>Enter your personal details below:</h4>
            <form action="" method="post">
                <div class="alert alert-success" style="display:<?php ($resultString=='1') ? printf('') : printf('none')  ?>;">User registered correctly</div>
                <div class="alert alert-danger" style="display:<?php ($resultString=='0') ? printf('') : printf('none')  ?>">Failed to register user</div>
                <div class="form-group">
                    <label for="username">Full Name</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="form-control" required>
                </div>
                Gender
                <select name="gender" id="gender" class="form-control" required>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
                <span>Enter your account details below:</span>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required>
                </div>
                <div class="form-group">
                    <input id="register" type="submit" value="Register" class="btn btn-primary col-12">
                </div>
            </form>
            <div class="user-login-create-account">Already have an account?<a href="user-login.php" class="user-login-subtitle">Log-in</a></div>
      </div>
      <div class="col-4"></div>  
    </div>
    <script>   
        const alertSuccess = document.getElementsByClassName('alert-success')[0];
        const alertDanger = document.getElementsByClassName('alert-danger')[0];
        setTimeout(()=>{
            alertSuccess.style.display = 'none';
            alertDanger.style.display = 'none';
        },2000);
        document.getElementById("register").addEventListener("click", function(event){
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');

            if(password.value!=confirmPassword.value){
                alert('Passwords dont match');
                event.preventDefault();
            }
        });
    </script>
<?php include('footer.php') ?>