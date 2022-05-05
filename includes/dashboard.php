<?php
include_once('classes/admin.php');
function getUsers(){
    return Admin::GetUsersCount();
}
function getDoctors(){
    return Admin::GetDoctorsCount();
}
function getAppointments(){
    return Admin::GetAppointmentsCount();
}
function getPatients(){
    return Admin::GetPatientsCount();
}
function getNewQueries(){
    return Admin::GetNewQueries();
}

function DashboardAdmin()
{
    echo '
        <h1>ADMIN | DASHBOARD</h1>
        <div class="card-group">
            <div class="card col-3">
                <div class="card-header">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="card-body">
                    Manage Users
                    <a href="//localhost/hospital2/admin/manage-users.php" class="card-link">Total Users: '.getUsers().'</a>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-header">
                    <i class="fa-solid fa-user-doctor"></i>
                </div>
                <div class="card-body">
                    Manage Doctors
                    <a href="//localhost/hospital2/admin/manage-doctors.php" class="card-link">Total Doctors: '.getDoctors().'</a>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-header">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <div class="card-body">
                    Appointments
                    <a href="//localhost/hospital2/admin/appointment-history.php" class="card-link">Total Appointments: '.getAppointments().'</a>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-header">
                    <i class="fa-solid fa-bed-pulse"></i>
                </div>
                <div class="card-body">
                    Manage Patients
                    <a href="//localhost/hospital2/admin/manage-patients.php" class="card-link">Total Patients: '.getPatients().'</a>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-header">
                    <i class="fa-solid fa-clipboard-question"></i>
                </div>
                <div class="card-body">
                    New Queries
                    <a href="//localhost/hospital2/admin/unread-queries.php" class="card-link">Total New Queries: '.getNewQueries().'</a>
                </div>
            </div>
        </div>
        ';
}

function DashboardDoctor()
{
    echo '
        <h1>DOCTOR | DASHBOARD</h1>
        <div class="card-group">
            <div class="card col-5">
                <div class="card-header">
                    <i class="fa-solid fa-address-card"></i>
                </div>
                <div class="card-body">
                    My Profile
                    <a href="//localhost/hospital2/doctor/edit-profile.php" class="card-link">Update Profile</a>
                </div>
            </div>
            <div class="card col-5">
                <div class="card-header">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <div class="card-body">
                    My Appointments
                    <a href="//localhost/hospital2/doctor/appointment-history.php" class="card-link">View Appointment History</a>
                </div>
            </div>
        </div>
        ';
}

function DashboardUser()
{
    echo '
        <h1>USER | DASHBOARD</h1>
        <div class="card-group">
            <div class="card col-4">
                <div class="card-header">
                    <i class="fa-solid fa-address-card"></i>
                </div>
                <div class="card-body">
                    My Profile
                    <a href="//localhost/hospital2/edit-profile.php" class="card-link">Update Profile</a>
                </div>
            </div>
            <div class="card col-4">
                <div class="card-header">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <div class="card-body">
                    My Appointments
                    <a href="//localhost/hospital2/appointment-history.php" class="card-link">View Appointment History</a>
                </div>
            </div>
            <div class="card col-4">
                <div class="card-header">
                    <i class="fa-solid fa-terminal"></i>
                </div>
                <div class="card-body">
                    Book My Appointment
                    <a href="//localhost/hospital2/book-appointment.php" class="card-link">Book Appointment</a>
                </div>
            </div>
        </div>
        ';
}