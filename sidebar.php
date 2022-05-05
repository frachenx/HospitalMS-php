<?php
function User()
{
    echo '
    <li class="sidebar-item">
        <div class="sidebar-item-logo">
            <a href="//localhost/hospital2/dashboard.php" style="text-decoration:none;">
                <i class="fa-solid fa-gauge"></i>
            </a>
            <span class="tooltip-text">Dashboard</span>
         </div>
        <a href="//localhost/hospital2/dashboard.php" style="text-decoration:none;">
            <span class="sidebar-item-text">Dashboard</span>
        <a/>
    </li>
    <li class="sidebar-item">
        <div class="sidebar-item-logo">
            <a href="//localhost/hospital2/book-appointment.php" style="text-decoration:none;">
                <i class="fa-solid fa-address-book"></i>
            </a>
            <span class="tooltip-text">Book Appointment</span>
         </div>
        <a href="//localhost/hospital2/book-appointment.php" style="text-decoration:none;">
            <span class="sidebar-item-text">Book Appointment</span>
        </a>
    </li> 
    <li class="sidebar-item">
        <div class="sidebar-item-logo">
        <a href="//localhost/hospital2/appointment-history.php" style="text-decoration:none;">
            <i class="fa-solid fa-book-medical"></i>
        </a>
            <span class="tooltip-text">Appointments</span>
         </div>
        <a href="//localhost/hospital2/appointment-history.php" style="text-decoration:none;">
            <span class="sidebar-item-text">Appointments</span>
        </a>
    </li> 
    ';
    $manageAppointmentsStr='
    <li class="sidebar-item">
        <div class="sidebar-item-logo">
            <a href="//localhost/hospital2/manage-medhistory.php" style="text-decoration:none;">
                <i class="fa-solid fa-notes-medical"></i>
            </a>
            <span class="tooltip-text">Medical History</span>
        </div>
        <a href="//localhost/hospital2/manage-medhistory.php" style="text-decoration:none;">
            <span class="sidebar-item-text">Medical History</span>
        </a>
    </li> ';    
}

function Doctor(){
    echo '
            <li class="sidebar-item">
                <div class="sidebar-item-logo">
                    <a href="//localhost/hospital2/dashboard.php" style="text-decoration:none;">
                        <i class="fa-solid fa-gauge"></i>
                    </a>
                    <span class="tooltip-text">Dashboard</span>
                </div>
                <a href="//localhost/hospital2/dashboard.php" style="text-decoration:none;">
                    <span class="sidebar-item-text">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-item-logo">
                    <a href="//localhost/hospital2/admin/appointment-history.php" style="text-decoration:none;">
                        <i class="fa-solid fa-calendar-check"></i>
                    </a>
                    <span class="tooltip-text">Appointments</span>
                </div>
                <a href="//localhost/hospital2/admin/appointment-history.php" style="text-decoration:none;">
                    <span class="sidebar-item-text">Appointments</span>
                </a>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-dropdown-btn">
                    <div class="sidebar-item-logo sidebar-popup" onclick="togglePopup()">
                        <i class="fa-solid fa-bed"></i>
                        <span class="tooltip-text">
                            Patients
                        </span>
                        <div class="sidebar-popup-text">
                            Patients
                            <a href="//localhost/hospital2/doctor/add-patient.php">Add Patient</a>
                            <a href="//localhost/hospital2/doctor/manage-patients.php">Manage Patient</a>
                        </div>
                    </div>
                    <div class="sidebar-item-text">
                        Patients
                    </div>
                </button>
                <div class="sidebar-dropdown-container">
                    <a href="//localhost/hospital2/doctor/add-patient.php">Add Patient</a>
                    <a href="//localhost/hospital2/doctor/manage-patients.php">Manage Patient</a>
                </div>
            </li>

            <li class="sidebar-item">
                <div class="sidebar-item-logo">
                    <a href="//localhost/hospital2/doctor/search.php" style="text-decoration:none;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <span class="tooltip-text">Search</span>
                </div>
                <a href="//localhost/hospital2/doctor/search.php" style="text-decoration:none;">
                    <span class="sidebar-item-text">Search</span>
                </a>
            </li>';
}

function Admin(){
    echo '
            <li class="sidebar-item">
                <div class="sidebar-item-logo">
                    <a href="//localhost/hospital2/dashboard.php" style="text-decoration:none;">
                        <i class="fa-solid fa-gauge"></i>
                    </a>
                    <span class="tooltip-text">Dashboard</span>
                </div>
                <a href="//localhost/hospital2/dashboard.php" style="text-decoration:none;">
                    <span class="sidebar-item-text">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <button class="sidebar-dropdown-btn">
                    <div class="sidebar-item-logo sidebar-popup" >
                        <i class="fa-solid fa-user-doctor"></i>
                        <span class="tooltip-text">
                            Doctors
                        </span>
                        <div class="sidebar-popup-text">
                            Doctors
                            <a href="//localhost/hospital2/admin/doctor-specialization.php">Doctor Specialization</a>
                            <a href="//localhost/hospital2/admin/add-doctor.php">Add Doctor</a>
                            <a href="//localhost/hospital2/admin/manage-doctors.php">Manage Doctors</a>
                        </div>
                    </div>
                    <div class="sidebar-item-text">
                        Doctors
                    </div>
                </button>
                <div class="sidebar-dropdown-container">
                    <a href="//localhost/hospital2/admin/doctor-specialization.php">Doctor Specialization</a>
                    <a href="//localhost/hospital2/admin/add-doctor.php">Add Doctor</a>
                    <a href="//localhost/hospital2/admin/manage-doctors.php">Manage Doctors</a>
                </div>
            </li>

            <li class="sidebar-item">
                <button class="sidebar-dropdown-btn">
                    <div class="sidebar-item-logo sidebar-popup" >
                        <i class="fa-solid fa-user"></i>
                        <span class="tooltip-text">
                            Users
                        </span>
                        <div class="sidebar-popup-text">
                            
                            Users
                            <a href="//localhost/hospital2/admin/manage-users.php">Manage Users</a>
                        </div>
                    </div>
                    <div class="sidebar-item-text">
                        Users
                    </div>
                </button>
                <div class="sidebar-dropdown-container">
                    <a href="//localhost/hospital2/admin/manage-users.php">Manage Users</a>
                </div>
            </li>

            <li class="sidebar-item">
                <button class="sidebar-dropdown-btn">
                    <div class="sidebar-item-logo sidebar-popup" >
                        <i class="fa-solid fa-bed"></i>
                        <span class="tooltip-text">
                            Patients
                        </span>
                        <div class="sidebar-popup-text">
                            Patients
                            <a href="//localhost/hospital2/admin/manage-patients.php">Manage Patients</a>
                        </div>
                    </div>
                    <div class="sidebar-item-text">
                        Patients
                    </div>
                </button>
                <div class="sidebar-dropdown-container">
                    <a href="//localhost/hospital2/admin/manage-patients.php">Manage Patients</a>
                </div>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-item-logo">
                    <a href="//localhost/hospital2/admin/appointment-history.php">
                        <i class="fa-solid fa-calendar-check"></i>
                    </a>
                    <span class="tooltip-text">Appointments</span>
                </div>
               <a href="//localhost/hospital2/admin/appointment-history.php" style="text-decoration:none;">
                <span class="sidebar-item-text">Appointments</span>
               </a>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-dropdown-btn">
                    <div class="sidebar-item-logo sidebar-popup" >
                        <i class="fa-solid fa-id-card-clip"></i>
                        <span class="tooltip-text">
                            Contact Us
                        </span>
                        <div class="sidebar-popup-text">
                            Contact Us
                            <a href="//localhost/hospital2/admin/unread-queries.php">Unread Queries</a>
                            <a href="//localhost/hospital2/admin/read-queries.php">Read Queries</a>
                        </div>
                    </div>
                    <div class="sidebar-item-text">
                        Contact Us
                    </div>
                </button>
                <div class="sidebar-dropdown-container">
                    <a href="//localhost/hospital2/admin/unread-queries.php">Unread Queries</a>
                    <a href="//localhost/hospital2/admin/read-queries.php">Read Queries</a>              
                </div>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-item-logo">
                    <a href="//localhost/hospital2/admin/doctor-logs.php" style="text-decoration:none;">
                        <i class="fa-solid fa-chart-simple"></i>
                    </a>
                    <span class="tooltip-text">Doctor Logs</span>
                </div>
                <a href="//localhost/hospital2/admin/doctor-logs.php" style="text-decoration:none;">
                    <span class="sidebar-item-text">Doctor Logs</span>
                </a>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-item-logo">
                    <a href="//localhost/hospital2/admin/user-logs.php" style="text-decoration:none;">
                        <i class="fa-solid fa-chart-simple"></i>
                    </a>
                    <span class="tooltip-text">User Logs</span>
                </div>
                <a href="//localhost/hospital2/admin/user-logs.php" style="text-decoration:none;">
                    <span class="sidebar-item-text">User Logs</span>
                </a>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-dropdown-btn">
                    <div class="sidebar-item-logo sidebar-popup" >
                        <i class="fa-solid fa-flag"></i>
                        <span class="tooltip-text">
                            Reports
                        </span>
                        <div class="sidebar-popup-text">
                            Reports
                            <a href="//localhost/hospital2/admin/between-dates-reports.php">Between Dates</a>
                        </div>
                    </div>
                    <div class="sidebar-item-text">
                        Reports
                    </div>
                </button>
                <div class="sidebar-dropdown-container">
                    <a href="//localhost/hospital2/admin/between-dates-reports.php">Between Dates</a>
                </div>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-item-logo">
                    <a href="//localhost/hospital2/admin/patient-search.php" style="text-decoration:none;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <span class="tooltip-text">Patient Search</span>
                </div>
                <a href="//localhost/hospital2/admin/patient-search.php" style="text-decoration:none;">
                    <span class="sidebar-item-text">Patient Search</span>
                </a>
            </li>
    ';
}
?>

<div class="sidebar">
    <div class="sidebar-brand">
        <h1 class="sidebar-brand-text">HMS</h1>
        <span class="sidebar-brand-toggle" onclick="sidebarToggle2()"><i class="fa-solid fa-bars fa-2x"></i></span>
    </div>
    <div class="sidebar-navigation">
        <h4 class="sidebar-main-subtitle">Main Navigation</h4>
        <ul>
            <?php if (isset($_SESSION['user_id'])) {
                User();
            } ?>
            <?php if (isset($_SESSION['doctor_id'])) {
                Doctor();
            } ?>
            <?php if (isset($_SESSION['admin_id'])) {
                Admin();
            } ?>
        </ul>
    </div>
</div>