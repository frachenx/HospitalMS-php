<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>

<div class="main">
    <h1>BETWEEN DATES | REPORTS</h1>
    <hr>
    <h3>Between Dates Reports</h3>
    <div class="row">
        <form action="betweendates-detailsreports.php" method="post" class="col-8">
            <div class="form-group">
                <label for="start">From Date:</label>
                <input type="date" name="start" id="start" class="form-control">
            </div>
            <div class="form-group">
                <label for="end">End Date:</label>
                <input type="date" name="end" id="end" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Search" class="btn btn-primary col-12">
            </div>
        </form>
    </div>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>