<?php include('header.php') ?>
<?php include('./includes/contactus.php') ?>
<nav class="home-navbar">
    <div class="home-navbar-brand">
        <h1>Hospital Management System</h1>
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

<div class="contact-main row">
    <div class="col-4">
        <div class="contact-title">
            <strong>Hospital Address</strong>
        </div>
        <div>350 Lorem ipsum dolor sit amet.</div>
        <div>Lorem ipsum dolor sit amet.</div>
        <div>Mexico</div>
        <div>Phone: 55-5555-5555</div>
        <div>Fax: 00-00-0000</div>
        <div>Info:this@gmail.com</div>
    </div>
    <div class="col-7">
        <div class="contact-title">
            <strong>Contact Us</strong>
        </div>
        <div class="alert alert-success" style="display: <?php ($resultString=='1') ? printf(''):printf('none') ?>;">Contact info sent correctly</div>
        <div class="alert alert-danger" style="display: <?php ($resultString=='0') ? printf(''):printf('none') ?>;">Failed to send contact info</div>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required="true">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" required="true">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile No.</label>
                <input type="text" name="mobile" id="mobile" class="form-control" required="true">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="10" class="form-textarea" required="true"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-secondary col-12">
            </div>
        </form>
    </div>
</div>

<script>
    const alertSuccess=document.getElementsByClassName('alert-success')[0];
    const alertDanger=document.getElementsByClassName('alert-danger')[0];
    setTimeout(()=>{
        alertSuccess.style.display='none';
        alertDanger.style.display='none';
    },2000)
</script>
<?php include('footer.php') ?>