<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/includes/bookAppointment.php') ?>

<div class="main">
    <h1>USER | BOOK APPOINTMENT</h1>
    <hr>
    <h3>Book Appointment</h3>
    <div class="row">
        <form action="" method="post" class="col-8">
            <div class="alert alert-success" style="display: <?php ($resultString=='1') ? printf('block') : printf('none')  ?>;">Appointment Added Correctly</div>
            <div class="alert alert-danger" style="display: <?php ($resultString=='0') ? printf('block') : printf('none')  ?>;">Failed to Add Appointment</div>
            <div class="form-group">
                <label for="docSpec">Doctor Specialization</label>
                <select name="docSpec" id="docSpec" class="form-control" onchange="CheckDoctors()">
                    <option value="">Select Specialization</option>
                    <?php
                    getSpecialties();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="doctor">Doctors</label>
                <select name="doctor" id="doctor" class="form-control" onchange="SetFee()">
                    <option value="">Select Specialization</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fee">Consultancy Fee</label>
                <input type="number" name="fee" id="fee" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" name="time" id="time" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary col-12">
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script>
    const docSpec = document.getElementById('docSpec');
    const doctorsSelect = document.getElementById('doctor');
    const doctorFee=document.getElementById('fee');
    function CheckDoctors() {
        const selectedSpecID = docSpec.value;
        $.ajax({
            url: 'includes/bookAppointmetAJAX.php',
            type: 'GET',
            data: {
                'specID': selectedSpecID
            },
            complete: function(response) {
                const doctors = JSON.parse(response.responseText);
                // console.log(doctorsSelect);
                $("#doctor").empty();
                $("#doctor").append('<option value="">Select Specialization</option>')
                doctors.forEach((doctor)=>{
                    const appendStr ='<option value="'+ doctor.id +'">'+ doctor.docName +'</option>';
                    $("#doctor").append(appendStr);
                })
            }
        });
    }
    function SetFee(){
        const selectedDoctorID = doctorsSelect.value;
        if (selectedDoctorID!=''){
            $.ajax({
            url: 'includes/bookAppointmetAJAX.php',
            type: 'GET',
            data: {
                'docID': selectedDoctorID
            },
            complete: function(response) {
                const doctor = JSON.parse(response.responseText);
                console.log(doctor);
                console.log(doctor.fee);
                $("#fee").val(doctor.fee);
            }
        });
        }
        
    }

    const alertSuccess=document.getElementsByClassName('alert-success')[0];
    setTimeout(()=>{alertSuccess.style.display='none'},1500);
    const alertDanger=document.getElementsByClassName('alert-danger')[0];
    setTimeout(()=>{alertDanger.style.display='none'},1500);
</script>
<script>

</script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>