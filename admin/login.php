<?php include($_SERVER['DOCUMENT_ROOT'].'/hospital2/header.php') ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/hospital2/includes/adminLogin.php') ?>
    <div class="row">
      <div class="col-4"></div>
      <div class="col-4 user-login-form">
            <h1>HMS | Admin Login</h1>
            <h3 class="user-login-subtitle">Sign in to your account</h3>
            <h4>Please enter your name and password to log in.</h4>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-primary col-12">
                </div>
            </form>
      </div>
      <div class="col-4"></div>  
    </div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/hospital2/footer.php') ?>

