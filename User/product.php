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
<style>
ul
{
        align-items: center;
        padding-top: 0;
        list-style:none;
        display: flex;
        
}
.li
{
    padding-top: 5px;
    font-size:5px;

} 
.fa
{
    font-size: 16px;
    transition: .4s;
    margin: 3px;
    background-color:white;

} 
.checked
{
    color: #ffd700;
}
.fa:hover
{
    transform: scale(1.3); 
    transition: .6s;
}
</style>
</head>
<?php include_once('navbar.php');?>
<body id="home">
    
    <section class="w3l-recent-work-hobbies mt-5"> 
    <div class="recent-work  mt-4">
        <div class="container">
            <div class="row">
                <p class="mt-5" style="text-align:center;font-weight:bold;font-family: cursive;font-size:30px;text-shadow: 2px 2px #6c94b0">SKIN CARE IS A RITUAL , NOT A ROUTINE ! ! !</P>
<?php
               $ret=mysqli_query($con,"select * from  product");
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
                ?>
                <div class="col-lg-4 col-md-5 col-sm-5  mt-5 propClone card border-#6c94b0 ">
                 <img src="images/<?php echo $row['pr_image']?>" alt="product" height="203" width="300" class="img-responsive about-me m-1 mx-auto d-block">
                    <div class="about-grids ">
                        <hr>
                        <h5 class="para" style="text-align:center;font-weight:bold;font-family: cursive;font-size:30px;text-shadow: 2px 2px #6c94b0"><?php echo $row['pr_name'];?></h5>
                        <p class="para" style="font-size:15px;text-align:center;font-family: system-ui;"><?php echo $row['pr_description'];?></p>
                        <p class="para" style="font-size:15px;text-align:center;font-weight:bold;font-family: cursive;font-size:20px;text-shadow: 2px 2px #6c94b0""><?php echo $row['pr_price'];?></p>
                        <ul>Ratings
            <li><i class="fa fa-star checked"></i></li>
            <li><i class="fa fa-star checked"></i></li>
            <li><i class="fa fa-star checked"></i></li>
            <li><i class="fa fa-star checked"></i></li>
            <li><i class="fa fa-star checked"></i></li>
</ul>                  <div class="d-grid gap-2 col-6 mx-auto m-1">
                        <a href="order.php" class="btn btn-primary" style="background-color:#6c94b0;" type="button">Buy Now</a>
                </div></div>
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