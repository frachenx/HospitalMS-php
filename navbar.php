
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/includes/navbar.php') ?>
<nav class="navbar">
    <span class="navbar-sidebar-toggle" onclick="sidebarToggle1()">
        <i class="fa-solid fa-bars fa-2x"></i>
    </span>
    <div class="navbar-brand ">
        Hospital Management System
    </div>
    <ul class="navbar-items ">
        <li class="navbar-item">
            <button class="profile-dropdown row" onclick="profileDropdown()">
                <div class="col-2 profile-logo">
                    <i class="fa-solid fa-user fa-3x"></i>
                </div>
                <div class="col-10 profile-name">
                    <h4><?php echo $username ?></h4>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
            </button>
            <ul class="profile-list">
                <?php
                    if(!isset($_SESSION['admin_id'])){
                        echo '
                        <a href="'.EditProfile().'" class="profile-link">
                            <li class="profile-option">
                                My Profile
                            </li>
                        </a>
                        ';
                    }
                ?>
                <?php
                    echo '
                    <a href="'.ChangePassword().'" class="profile-link">
                        <li class="profile-option">
                            Change Password
                        </li>
                    </a>
                    ';
                ?>
                <a href="//localhost/hospital2/logout.php" class="profile-link">
                <li class="profile-option">
                    Logout
                </li>
                </a>
            </ul>
        </li>
    </ul>
</nav>