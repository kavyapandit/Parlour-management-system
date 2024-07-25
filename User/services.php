<?php
session_start();
error_reporting(0);
include('dbconnection.php');
  ?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="par.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Including the bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body id="home">
    <?php include_once('navbar.php');?>
<section class="w3l-recent-work-hobbies"> 
    <div class="recent-work  mt-4">
        <div class="container">
            <div class="row ">
<?php
               $ret=mysqli_query($con,"select * from  service_category");
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
                ?>
                <div class="col-lg-4 col-md-5 col-sm-5  mt-5 propClone">
                 <img src="images/<?php echo $row['sc_img']?>" alt="product" height="333" width="500" class="img-responsive about-me">
                    <div class="about-grids">
                        <hr>
                        <h5 class="para"><?php echo $row['sc_name'];?></h5>
                        <p class="para" style="font-size:15px;text-align:justify;"><?php echo $row['sc_description'];?></p>
                        <a href="#" class="btn btn-primary" style="background-color:#6c94b0;" type="button">View</a>
                    </div>
                </div>                
<?php 
$cnt=$cnt+1;
}?>
</div>
        </div>
    </div>
</section>
<?php include_once('footer.php');?>
</body>
</html>