<?php include('header.php') ?>
    <nav class="home-navbar">
        <div class="home-navbar-brand">
            <h1 >Hospital Management System</h1>
        </div>
        <ul class="home-navbar-items">
            <li class="home-navbar-item">
                <a href="index.php">
                    <i class="fa-solid fa-house fa-3x"></i>
                </a>
            </li>
            <li class="home-navbar-item">
                <a href="contact.php">
                    <i class="fa-solid fa-address-card fa-3x"></i>
                </a>          
            </li>
        </ul>
    </nav>

    <div class="home-main">
        <div class="home-login">
            <div class="card-login">
                <div class="card-login-logo">
                    <i class="fa-solid fa-user fa-3x"></i>
                </div>
                <div class="card-login-text">
                    <div class="card-login-title">
                        <strong>Patients</strong>
                    </div>
                    <div class="card-login-description">
                        Register & Book Appointment
                    </div>
                    <div class="card-login-button">
                        <a href="user-login.php">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="card-login">
                <div class="card-login-logo">
                    <i class="fa-solid fa-user-doctor fa-3x"></i>
                </div>
                <div class="card-login-text">
                    <div class="card-login-title">
                        <strong>Doctors Login</strong>
                    </div>
                    <div class="card-login-button">
                       <a href="doctor/login.php">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="card-login">
                <div class="card-login-logo">
                    <i class="fa-solid fa-lock fa-3x"></i>
                </div>
                <div class="card-login-text">
                    <div class="card-login-title">
                        <strong>Admin Login</strong>
                    </div>
                    <div class="card-login-button">
                        <a href="admin/login.php">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php') ?>
