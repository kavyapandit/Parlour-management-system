<?php
session_start();
error_reporting(0);
include('dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
{
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=($_POST['newpassword']);
    $query=mysqli_query($con,"select cust_id from customer_registration where  email='$email' and phone='$contactno' ");
    $ret=mysqli_num_rows($query);
    if($ret>0)
    {
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
      $query1=mysqli_query($con,"update customer_registration set password='$password'  where  email='$email' && phone='$contactno' ");
       if($query1)
       {
        echo "<script>alert('Password successfully changed');</script>";
       }
     
    }
    else
    {
    
      echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>
<body id="home">
<?php include_once('navbar.php');?>
<section class="w3l-contact-info-main mt-5" id="contact">
    <div class="contact-sec	">
        <div class="container">
            <div class="d-grid contact-view">
                <div class="cont-details">
                    <div class="map-content-9 mt-lg-0 mt-4">
                        <h3 style="padding-bottom: 10px;">Reset your password and Fill below details</h3>
                        <form method="post">
                            <div>
                                <input type="text" class="form-control" name="email" placeholder="Enter Your Email" required="true">
                            
                            </div>
                            <div style="padding-top: 30px;">
                                <input type="text" class="form-control" name="contactno" placeholder="Contact Number" required="true" pattern="[0-9]+">
                            </div>
                            <div style="padding-top: 30px;">
                                <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password">
                            </div>
                            <div style="padding-top: 30px;">
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
                            </div>
                            <div class="twice-two" style="padding-top: 30px;">
                                <a class="link--gray" style="color: blue;" href="login.php">Sign In</a>
                            </div>
                            <button type="submit" class="btn btn-contact" name="submit">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once('footer.php');?>
</body>
</html>