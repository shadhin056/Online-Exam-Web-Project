<?php require_once 'templates/header.php';?>
<div class="content">
    <div class="container">
        <div class="row">
            <?php require_once 'templates/ads.php';?>
            <?php require_once 'templates/message.php';?>
            <?php //require_once 'templates/tutorials.php';?>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="row btn-c well">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <a href="allcourse.php" class="btn btn-success btn-home">All course</a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <a href="mycourse" class="btn btn-info btn-home">My Course</a>
                    </div>
                </div>
            </div>
            <?php //require_once 'templates/sidebar.php';?>
        </div>
    </div>
</div> <!-- /container -->
<?php require_once 'templates/footer.php';?>

