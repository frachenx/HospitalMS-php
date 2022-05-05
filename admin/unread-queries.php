<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/admin/includes/unreadQueries.php') ?>

<div class="main">
    <h1>ADMIN | MANAGE UNREAD QUERIES</h1>
    <h3>Manage Unread Queries</h3>
    <table class="table table-bordered-bottom">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact No.</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php getUnreadQueries() ?>
        </tbody>
    </table>
</div>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>