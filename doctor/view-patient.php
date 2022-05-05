<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/doctor/includes/viewPatient.php') ?>

<div class="main">
    <h1>DOCTOR | MANAGE PATIENTS</h1>
    <h3>Manage Patients</h3>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th colspan="4" class="table-title">
                    Patient Details
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="table-cell-fit"><strong>Patient Name</strong></td>
                <td><strong><?php echo $patient->name ?></strong></td>
                <td class="table-cell-fit"><strong>Patient Email</strong></td>
                <td><strong><?php echo $patient->email ?></strong></td>
            </tr>
            <tr>
                <td class="table-cell-fit"><strong>Patient Mobile Number</strong></td>
                <td><strong><?php echo $patient->contact ?></strong></td>
                <td class="table-cell-fit"><strong>Patient Address</strong></td>
                <td><strong><?php echo $patient->address ?></strong></td>
            </tr>
            <tr>
                <td class="table-cell-fit"><strong>Patient Gender</strong></td>
                <td><strong><?php echo $patient->gender ?></strong></td>
                <td class="table-cell-fit"><strong>Patient Age</strong></td>
                <td><strong><?php echo $patient->age ?></strong></td>
            </tr>
            <tr>
                <td class="table-cell-fit"><strong>Patient Medical History(if any)</strong></td>
                <td><strong><?php echo $patient->history ?></strong></td>
                <td class="table-cell-fit"><strong>Patient Reg Date</strong></td>
                <td><strong><?php echo $patient->createdDate ?></strong></td>
            </tr>
        </tbody>
    </table>
    <h3 style="text-align:center;">Medical History</h3>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th>#</th>
                <th>Blood Pressure</th>
                <th>Weight</th>
                <th>Blood Sugar</th>
                <th>Body Temprature</th>
                <th>Medical Prescription</th>
                <th>Visit Date</th>
            </tr>
        </thead>
        <tbody>
            <?php printHistory() ?>
        </tbody>
    </table>
    <button id="btnModal" class="btn btn-primary" onclick="toggleModal()">Add Medical History</button>
</div>
<div class="modal-container">
    <div id="myModal" class="modal">
        <span class="close-modal" onclick="toggleModal()">&times;</span>
        <div class="modal-content">
            <h1>Add Medical History</h1>
            <hr style="border: solid white;">
            <form action="" method="post">
                <div class="">
                    <label for="bloodPressure">Blood Pressure :</label>
                    <input type="text" name="bloodPressure" id="bloodPressure" class="form-control">
                </div>
                <div class="">
                    <label for="bloodSugar">Blood Sugar :</label>
                    <input type="text" name="bloodSugar" id="bloodSugar" class="form-control">
                </div>
                <div class="">
                    <label for="weight">Weight :</label>
                    <input type="text" name="weight" id="weight" class="form-control">
                </div>
                <div class="">
                    <label for="bodyTemp">Body Temprature :</label>
                    <input type="text" name="bodyTemp" id="bodyTemp" class="form-control">
                </div>
                <div class="">
                    <label for="prescription">Prescription :</label>
                    <textarea name="prescription" id="prescription" rows="2" class="form-textarea"></textarea>
                </div>
                <div class="">
                    <input type="submit" value="Add" class="btn btn-primary col-12">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const btnModal =  document.getElementById('btnModal');
    const myModal = document.getElementById('myModal');
    const modalContainer=document.getElementsByClassName('modal-container')[0];
    const mainContent1 = document.getElementsByClassName('main')[0];
    const closeModal = document.getElementsByClassName('close-modal')[0];

    function toggleModal(){
        modalContainer.classList.toggle('show-modal-container');
        myModal.classList.toggle('show-modal');
        mainContent1.classList.toggle('blur');
    }

    window.onclick = function(event) {
        if (event.target == modalContainer){
            modalContainer.classList.toggle('show-modal-container');
            myModal.classList.toggle('show-modal');
            mainContent1.classList.toggle('blur');
        }
    }
</script>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/footer.php') ?>