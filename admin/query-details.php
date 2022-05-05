<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/header.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/navbar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/sidebar.php') ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/admin/includes/queryDetails.php') ?>
<div class="main">
    <h1>ADMIN | QUERY DETAILS</h1>
    <table class="table table-bordered-bottom">
        <thead>
            <th colspan="2">Manage Query Details</th>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: right; padding-right:0.3rem;">Full Name: </td>
                <td style="text-align: left; padding-left:0.3rem;"><?php echo $query->name  ?></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right:0.3rem;">Email: </td>
                <td style="text-align: left; padding-left:0.3rem;"><?php echo $query->email ?></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right:0.3rem;">Conatact Numner: </td>
                <td style="text-align: left; padding-left:0.3rem;"><?php echo $query->contact ?></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right:0.3rem;">Message: </td>
                <td style="text-align: left; padding-left:0.3rem;"><?php echo $query->message ?></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right:0.3rem;">Admin Remark: </td>
                <?php
                    if($query->status==0){
                        echo'
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <textarea name="remark" id="remark" rows="2" class="form-textarea"></textarea>
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </div>
                                </form>
                            </td>
                        ';
                    }else{
                        echo'
                            <td style="text-align: left; padding-left:0.3rem;">'.$query->remark.'</td>
                        ';
                    }
                ?>
                
            </tr>
            <?php
                if($query->status==1){
                    echo'
                        <tr>
                            <td style="text-align: right; padding-right:0.3rem;">Updated Date: </td>
                            <td style="text-align: left; padding-left:0.3rem;">'.$query->updatedDate.'></td>
                        </tr>
                    ';
                }
            ?>
            
        </tbody>
    </table>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/footer.php') ?>