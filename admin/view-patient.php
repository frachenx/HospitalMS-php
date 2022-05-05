<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/admin/includes/viewPatient.php') ?>

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
</div>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>