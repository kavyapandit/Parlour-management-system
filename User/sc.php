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
        <section class="w3l-recent-work-hobbies mt-5"> 
            <div class="recent-work mt-4">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 g-3 p-5">
                        <?php
                                        $ret=mysqli_query($con,"select * from  service_category where sc_id=1");
                                            $cnt=1;
                                            while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                <div class="col pb-5 ">
                                    <div class="card border-dark">
                                        <img src="images/<?php echo $row['sc_img']?>" alt="product" height="200" width="329" class="img-responsive about-me">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['sc_name'];?></h5>
                                            <p class="card-text" style="font-size:15px;text-align:justify;"><?php echo $row['sc_description'];?></p>
                                            <a href="hair.php" class="btn btn-primary" style="background-color:#6c94b0;" type="button">View</a>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            $cnt=$cnt+1;
                            }?>
                        
                        <?php
                                        $ret=mysqli_query($con,"select * from  service_category where sc_id=2");
                                            $cnt=1;
                                            while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                <div class="col pb-5 ">
                                    <div class="card border-dark">
                                        <img src="images/<?php echo $row['sc_img']?>" alt="product" height="200" width="320" class="img-responsive about-me">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['sc_name'];?></h5>
                                            <p class="card-text" style="font-size:15px;text-align:justify;"><?php echo $row['sc_description'];?></p>
                                            <a href="skin.php" class="btn btn-primary" style="background-color:#6c94b0;" type="button">View</a>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            $cnt=$cnt+1;
                            }?>


                        <?php
                                        $ret=mysqli_query($con,"select * from  service_category where sc_id=3");
                                            $cnt=1;
                                            while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                <div class="col pb-5 ">
                                    <div class="card border-dark">
                                        <img src="images/<?php echo $row['sc_img']?>" alt="product" height="200" width="300" class="img-responsive about-me">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['sc_name'];?></h5>
                                            <p class="card-text" style="font-size:15px;text-align:justify;"><?php echo $row['sc_description'];?></p>
                                            <a href="spa.php" class="btn btn-primary" style="background-color:#6c94b0;" type="button">View</a>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            $cnt=$cnt+1;
                            }?>


                        <?php
                                        $ret=mysqli_query($con,"select * from  service_category where sc_id=4");
                                            $cnt=1;
                                            while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                <div class="col pb-5 ">
                                    <div class="card border-dark">
                                        <img src="images/<?php echo $row['sc_img']?>" alt="product" height="200" width="320" class="img-responsive about-me">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['sc_name'];?></h5>
                                            <p class="card-text" style="font-size:15px;text-align:justify;"><?php echo $row['sc_description'];?></p>
                                            <a href="bridal.php" class="btn btn-primary" style="background-color:#6c94b0;" type="button">View</a>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            $cnt=$cnt+1;
                            }?>


                        <?php
                                        $ret=mysqli_query($con,"select * from  service_category where sc_id=5");
                                            $cnt=1;
                                            while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                <div class="col">
                                    <div class="card border-dark">
                                        <img src="images/<?php echo $row['sc_img']?>" alt="product" height="200" width="320" class="img-responsive about-me">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['sc_name'];?></h5>
                                            <p class="card-text" style="font-size:15px;text-align:justify;"><?php echo $row['sc_description'];?></p>
                                            <a href="nail.php" class="btn btn-primary" style="background-color:#6c94b0;" type="button">View</a>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            $cnt=$cnt+1;
                            }?>


                        <?php
                                    $ret=mysqli_query($con,"select * from  service_category where sc_id=6");
                                        $cnt=1;
                                        while ($row=mysqli_fetch_array($ret)) {
                                        ?>
                            <div class="col pb-5 ">
                                <div class="card border-dark">
                                    <img src="images/<?php echo $row['sc_img']?>" alt="product" height="200" width="309" class="img-responsive about-me">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['sc_name'];?></h5>
                                        <p class="card-text" style="font-size:15px;text-align:justify;"><?php echo $row['sc_description'];?></p>
                                        <a href="personal.php" class="btn btn-primary" style="background-color:#6c94b0;" type="button">View</a>
                                    </div>
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




   